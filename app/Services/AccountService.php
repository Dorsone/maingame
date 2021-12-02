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
        $user->history($articles->id)->detach();
    }

    /**
     * It`s for adding the cover to DB
     * @param User $user
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function storeCover($user) {
        $user->clearMediaCollection(User::COVER_IMAGE_COLLECTION);
        $user->addMediaFromRequest('userCoverFile')->toMediaCollection(User::COVER_IMAGE_COLLECTION);
    }

}
