<?php


namespace App\Services;
use App\Models\ViewHistory;

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
     * @param $userId
     * @return string
     */
    public function deleteHistory($articles, $userId) {
        $history = ViewHistory::where('article_id', '=', $articles->id)->first();
        if($history->user_id == $userId){
            $history->delete();
            return 'Success deleted';
        }else {
            return view('errors.404');
        }
    }

    public function storeCover($request) {
        $user = auth()->user();
        if($request->hasFile('userCoverFile')){
            if(empty(auth()->user()->getMedia('covers')[0])){
                $user->addMedia($request->userCoverFile)->toMediaCollection('covers');
            }else{
                $user->getMedia('covers')[0]->delete();
                $user->addMedia($request->userCoverFile)->toMediaCollection('covers');
            }
        }
    }

}
