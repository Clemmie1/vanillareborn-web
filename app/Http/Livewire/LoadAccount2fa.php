<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LoadAccount2fa extends Component
{

    public $loadAccount = false;

    Use LivewireAlert;

    public function loadAccount(){
        sleep(2.5);

        $ti = session()->get('tgId');

        $info = DB::table('vr_2fa')->where('userId', $ti)->get();
        $this->loadAccount = $info;
    }


    public function deleteAccount($account){
        sleep(1);
        DB::table('vr_2fa')->where('userId', session()->get('tgId'))->where('account_name', $account)->delete();
        return $this->redirect(route('account.home'));
    }



    public function render()
    {
        return view('livewire.load-account2fa');
    }
}
