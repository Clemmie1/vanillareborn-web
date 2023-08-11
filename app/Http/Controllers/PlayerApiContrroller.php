<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerApiContrroller extends Controller
{
    public static function getBalance($player){
        $UserInfo = DB::table('player_statistic')->where('account_name', $player)->first();
        return $UserInfo->balance;
    }

    public static function getExpiresDate($date)
    {

        $currentDate = date('d.m.Y');
        $targetDate = $date;

        $daysRemaining = strtotime($targetDate) - strtotime($currentDate);
        $daysRemaining = round($daysRemaining / (60 * 60 * 24));

        return $daysRemaining;
    }
}
