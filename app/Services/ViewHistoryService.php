<?php


namespace App\Services;
use App\Models\ViewHistory;

/**
 * Class ViewHistoryService
 * @package App\Services
 */
class ViewHistoryService
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
     * @param $historyId
     * @return string
     */
    public function deleteHistory($historyId) {
        ViewHistory::where('article_id', '=', $historyId)->delete();
        return 'Success deleted';
    }

}
