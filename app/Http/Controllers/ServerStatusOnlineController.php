<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerStatusOnlineController extends Controller
{
    public static function getServerStats(){
        $UserInfo = DB::table('server_bungee')->first();
        return $UserInfo;
    }


    public static function formatNumber($number)
    {
        if ($number < 1000) {
            return $number; // возвращаем число без изменений, если оно меньше 1000
        } elseif ($number < 1000000) {
            return round($number / 1000, 1) . 'K'; // возвращаем число, разделенное на 1000 с одним десятичным знаком и добавляем "K"
        } elseif ($number < 1000000000) {
            return round($number / 1000000, 1) . 'M'; // возвращаем число, разделенное на 1000000 с одним десятичным знаком и добавляем "M"
        } elseif ($number < 1000000000000) {
            return round($number / 1000000000, 1) . 'B'; // возвращаем число, разделенное на 1000000000 с одним десятичным знаком и добавляем "B"
        } else {
            return round($number / 1000000000000, 1) . 'T'; // возвращаем число, разделенное на 1000000000000 с одним десятичным знаком и добавляем "T"
        }
    }


    public static function homeStatsAll(){
        $info = DB::select("SELECT SUM(player_hours_played) AS total_player_hours_played, SUM(player_total_exp) AS total_player_total_exp, SUM(mine_block_all) AS total_mine_block_all, COUNT(account_name) AS total_user FROM player_statistic");
        return $info;
    }
}
