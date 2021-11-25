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
     * @param $historyId
     * @return string
     */
    public function delHistory($historyId) {
        ViewHistory::where('article_id', '=', $historyId)->delete();
        return 'Success deleted';
    }

}
