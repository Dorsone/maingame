<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Articles;
use App\Models\ArticlesTags;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class AutoPostingService
{
    /**
     * Sending the post via API Graph to Facebook page
     * @throws FacebookSDKException
     */
    public function createArticleFacebook($article){
        $fb = new Facebook([
            'app_id' => config('services.facebook.app_id'),
            'app_secret' => config('services.facebook.app_secret'),
            'default_graph_version' => 'v12.0',
        ]);
        $pageAccessToken = config('services.facebook.access_token');

        $message = $article->title;
        $imagePath = $article->image ? asset($article->image) : asset('/images/favicon/favicon-32x32.png');
        $data = [
            'url' => $imagePath,
            'message' => $message
        ];

        try {
            $response = $fb->post('/me/photos', $data, $pageAccessToken);
        }
        catch(FacebookResponseException $e)
        {
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        }
        catch(FacebookSDKException $e)
        {
            echo 'Facebook SDK returned an error: '.$e->getMessage();
            exit;
        }
        $graphNode = $response->getGraphNode();
    }

    /**
     * Sending the post via Twitter API to Twitter page
     * @param $article
     * @return void
     */
    public function createArticleTwitter($article) {
        $connection = new TwitterOAuth(
            config('services.twitter.consumer_key'),
            config('services.twitter.consumer_key_secret'),
            config('services.twitter.access_token'),
            config('services.twitter.access_token_secret')
        );
        $content = $connection->get("account/verify_credentials");
        $connection->setTimeouts(10, 30);

        $message = $article->title;
        $imagePath = $article->image ? asset($article->image) : asset('/images/favicon/favicon-32x32.png');

        $image = $connection->upload('media/upload', ['media' => $imagePath]);

        $parameters = [
            'status' => $message,
            'media_ids' => implode(',', [$image->media_id_string]),
        ];

        $result = $connection->post('statuses/update', $parameters);
    }

}
