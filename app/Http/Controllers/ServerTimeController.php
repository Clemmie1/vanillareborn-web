<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTimeZone;

class ServerTimeController extends Controller
{
    public static function formatLastLogin($lastLogin)
    {
        $now = Carbon::now(new DateTimeZone('Europe/Moscow')); // Установка часового пояса Москвы
        $lastLogin = Carbon::createFromFormat('d.m.Y H:i', $lastLogin, new DateTimeZone('Europe/Moscow'));

        $diff = $lastLogin->diff($now);

        if ($diff->days > 0) {
            return $diff->days . ' д. назад';
        } elseif ($diff->h > 0) {
            return $diff->h . ' ч. назад';
        } elseif ($diff->i > 0) {
            return $diff->i . ' мин. назад';
        } else {
            return $diff->s . ' сек. назад';
        }
    }

    public static function formatInGame($firstLogin)
    {
        $now = Carbon::now(new DateTimeZone('Europe/Moscow')); // Установка часового пояса Москвы
        $lastLogin = Carbon::createFromFormat('d.m.Y H:i', $firstLogin, new DateTimeZone('Europe/Moscow'));

        $diff = $lastLogin->diffInDays($now); // Получение разницы в днях

        return $diff . ' д.';
    }

    public static function getDate($date){
        Carbon::setLocale('ru');
        return Carbon::parse($date)->diffForHumans();
    }
}
