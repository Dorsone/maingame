<?php


namespace App\Services;

use App\Models\User;
use App\Models\ViewHistory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class AccountService
 * @package App\Services
 */
class AccountService
{

    /**
     * It`s for adding user`s histories to DB
     * @param $articleId
     * @return string
     */
    public function addHistory($articleId){
        $CheckHistory = ViewHistory::where('article_id', '=', $articleId)->first();
        if(empty($CheckHistory)){
            $history = new ViewHistory();
            $history->user_id = 1;
            $history->article_id = $articleId;
            $history->save();
        }
        return 'Success added';
    }


    /**
     * It`s for deleting user`s histories from DB
     * @param $articles
     * @param $user
     * @return string
     */
    public function deleteHistory($articles, $user) {
        $history = ViewHistory::where('article_id', '=', $articles->id)->first();
        if($history->user_id == $user->id){
            $history->delete();
            return 'Success deleted';
        }else {
            return view('errors.404');
        }
    }

    /**
     * It`s for adding the cover to DB
     * @param $request
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function storeCover($request) {
        auth()->user()->clearMediaCollection(User::COVER_IMAGE_COLLECTION);
        auth()->user()->addMedia($request->userCoverFile)->toMediaCollection(User::COVER_IMAGE_COLLECTION);
    }

}
