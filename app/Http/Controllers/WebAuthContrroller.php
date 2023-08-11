<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebAuthContrroller extends Controller
{

    public function AuthGet($token, Request $request){    

        $ti = $request->input('ti');

        if ($ti != null) {

            $getTg = DB::table('vr_2fa')->where('userId', $ti)->first();

            if ($getTg != null) {

                $auth = DB::table('web_token')
                ->where('token', $token)
                ->select('owner', 'token')
                ->get();
                    
        
                if (!$auth->isEmpty()) {            
                    // return [
                    //     'success' => true,
                    //     'tg_user_id' => $ti,
                    //     'infoToken' => $auth
                    // ];
                    session()->put('accountName', $auth['0']->owner);
                    session()->put('tgId', $ti);
                    DB::table('web_token')->where('token', $token)->delete();
                    return redirect(route('account.home'));

                } else {
                    return [
                        'success' => false,
                        'msg' => 'token not found.'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'msg' => 'tg id user not found.'
                ];
            }
            
        } else {
            return [
                'success' => false,
                'msg' => 'TI parameter not passed.'
            ];
        }
        
        
    }

    public function AccountHome(){

        

        if (session()->get('accountName')) {            
            return view('Account.Home');
        } else {
            sweetalert()
            ->timer(99999)
            ->timerProgressBar(false)
            ->addWarning('Чтобы войти в свой аккаунт на сайте, пожалуйста, зайдите на сервер и пропишите команду /web и перейдите по ссылке.');
            return redirect(route('homePage'));
        }
            
    }
}
