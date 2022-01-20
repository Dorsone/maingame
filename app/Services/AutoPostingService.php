<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;
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
        $fb = new facebook([
            'app_id' => 'xxx',
            'app_secret' => 'xxx',
            'default_graph_version' => 'v12.0',
        ]);
        $pageAccessToken ='xxx';

        $message = $article->seo_title.' '.$article->seo_description.' #tag1'.' #tag2'.' #tag3';
        $imagePath = 'https://maingame.gg/uploads/Pokemon-Go.jpg';

        $data = [
            'url' => $imagePath,
            'message' => $message
        ];

        try {
            $response = $fb->post('/me/photos', $data, $pageAccessToken);
        } catch(FacebookResponseException $e)
        {
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        } catch(FacebookSDKException $e)
        {
            echo 'Facebook SDK returned an error: '.$e->getMessage();
            exit;
        }
            $graphNode = $response->getGraphNode();
            $article->facebook_id = $graphNode['post_id'];
            $article->save();
    }

    /**
     * Sending the post via Twitter API to Twitter page
     * @param $article
     * @return void
     */
    public function createArticleTwitter($article) {
        $consumer_key = 'xxx';
        $consumer_key_secret = 'xxx';
        $access_token = 'xxx';
        $access_token_secret = 'xxx';

        $connection = new TwitterOAuth($consumer_key, $consumer_key_secret, $access_token, $access_token_secret);
        $content = $connection->get("account/verify_credentials");
        $connection->setTimeouts(10, 30);

        $message = $article->seo_title.' '.$article->seo_description.' #tag1'.' #tag2'.' #tag3';
        $imagePath1 = 'https://maingame.gg/uploads/Pokemon-Go.jpg';
        $imagePath2 = 'https://maingame.gg/uploads/Screenshot_1_large.png';

        $image1 = $connection->upload('media/upload', ['media' => $imagePath1]);
        $image2 = $connection->upload('media/upload', ['media' => $imagePath2]);

        $parameters = [
            'status' => $message,
            'media_ids' => implode(',', [$image1->media_id_string, $image2->media_id_string]),
        ];

        $result = $connection->post('statuses/update', $parameters);
    }
}
