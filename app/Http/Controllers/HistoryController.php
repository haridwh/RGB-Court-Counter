<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends BaseController
{
    public function getHistory(Request $req){
      $history = History::where('nim', $req->nim)->get();
      if (count($history)) {
        return $this->jsonResponse('200', 'success',$history);
      }else {
        return $this->jsonResponse('200', 'NIM tidak ada',$history);
      }
    }

    public function storeHistory(Request $req){
      $history = new History;
      $history->nim = $req->nim;
      $history->team_a = $req->team_a;
      $history->team_b = $req->team_b;
      $history->score_a = $req->score_a;
      $history->score_b = $req->score_b;
      $history->date = $req->date;

      $history->save();
      return $this->jsonResponse('200', 'success', null);
    }
}
