<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 09.10.2020 15:11
 */

namespace App\Services;

use App\Models\Articles;
use App\Models\Search;
use App\Models\SearchItems;
use cijic\phpMorphy\Facade\Morphy;
use Illuminate\Support\Str;

class IndexingText
{

    public function updateArticleIndex(Articles $article)
    {

        $url = $this->getUrl($article);

        $item = SearchItems::updateOrCreate(['url' => $url], [
            'title' => $article->title,
            'url' => $url,
            'description' => Str::limit($article->content_preview),
            'breadcrumbs' => '',
        ]);

        $result = [];

        $words = $this->getIndex($article->title);
        foreach ($words as $word) {
            if (!isset($result[$word])) {
                $result[$word] = 3;
            } else {
                $result[$word] += 3;
            }
        }

        $words = $this->getIndex($article->content_preview);
        foreach ($words as $word) {
            if (!isset($result[$word])) {
                $result[$word] = 1;
            } else {
                $result[$word] += 1;
            }
        }

        $words = $this->getIndex($article->content);
        foreach ($words as $word) {
            if (!isset($result[$word])) {
                $result[$word] = 1;
            } else {
                $result[$word] += 1;
            }
        }

        foreach ($result as $word => $weight) {
            $data = [
                'weight' => $weight,
                'need_delete' => false,
            ];
            Search::updateOrCreate(['text' => $word, 'items_id' => $item->id], $data);
        }
    }

    public function deleteArticleIndex(Articles $article)
    {
        SearchItems::where(['url' => $this->getUrl($article)])->delete();
    }

    public function start()
    {
        Search::where('need_delete', 0)->update(['need_delete' => 1]);

        $articlesList = Articles::where('active', 1)->get();

        foreach ($articlesList as $article) {
            $this->updateArticleIndex($article);
        }

        Search::where('need_delete', 1)->delete();

    }

    public function getIndex($text)
    {
        $textUp = Str::upper($text);
        $textUp = str_replace('Ё', 'E', strip_tags($textUp));
        $words = explode(' ', $textUp);
        foreach ($words as $j => $word) {
            $words[$j] = trim($word);
        }

        $morph = new \cijic\phpMorphy\Morphy('ua');

        $root = [];

        foreach ($words as $word) {

            $keys = $morph->getBaseForm($word);
            //$gramInfo = \Morphy::getGramInfo($word);

            if (is_array($keys)) {
                foreach ($keys as $key) {
                    $root[] = $key;
                }
            } else {
                $root[] = $word;
            }
        }

        return $root;
    }

    public function lemmatize($text)
    {
        return Morphy::lemmatize($text);
    }

    private function getUrl(Articles $article)
    {
        return route('site.article', ['articleSlug' => $article->slug, 'categorySlug' => $article->category->slug]);

    }
}
