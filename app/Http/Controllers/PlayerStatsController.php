<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerStatsController extends Controller
{
    public function playerHomeStats($playerName)
    {
        $get = DB::table('player_statistic')->where('account_name', $playerName)->first();
        $getTop = DB::table('player_statistic')->orderBy('player_hours_played', 'desc')->orderBy('player_total_exp', 'desc')->first();

        if ($get) {
            

            if (!$get->private_stats) {
                return view('playerHomeStats')->with("ps", $get)->with("pstop", $getTop);
            } else {
                return view('components.PrivateStatsPlayer')->with("ps", $playerName);
            }
            
        } else {

            return abort(404, "dsa");
            // return redirect(route('homePage'));
        }

    }
}
