<?php

namespace App\Services;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class AutoPostService
{
    /**
     *
     */
    public function facebook($article){
        $fb = new facebook([
            'app_id' => '1447471915679794',
            'app_secret' => '771f574f3389391d96162e7fe3a48450',
            'default_graph_version' => 'v12.0',
        ]);

        $linkData = [
            'url' => 'https://maingame.gg/uploads/Pokemon-Go.jpg',
            'message' => 'Your message here API'
        ];
        $pageAccessToken ='EAAUkd9FbQDIBALp27j8FMibQltS9PN2NHOSUOGBbXhqP7U1vUy8jDftOO6vfxdlt94fV0xobf5FqOD2EZB8HAGANl4v2iMnz1zhAvZB7jsde2EXreszHC7DTPucsfh806bFMBLpopru1TNrjZBR04iM0lyukC2nPRcU6LwxAJKv0HLctpz2';

        try {
            $response = $fb->post('/me/photos', $linkData, $pageAccessToken);
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
        }
}
