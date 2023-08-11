<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddAccount2fa extends Component
{

    Use LivewireAlert;

    public $accountName;

    public function addAccount(){
        sleep(2);

        $ti = session()->get('tgId');
        $account = $this->accountName;

        $user = DB::table('vr_2fa')->where('userId', $ti)->where('account_name', $account)->first();

        date_default_timezone_set("Europe/Moscow");
        $time = date('d.m.Y H:i');

        if ($user == null) {

            DB::table('vr_2fa')->insert([
                'userId' => $ti,
                'account_name' => $account,
                'created' => $time
            ]);

            return $this->redirect(route('account.home'));
            
        } else {
            return $this->alert('warning', 'FeiK уже привязан к 2FA', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
               ]);
        }
        
    }

    public function render()
    {
        return view('livewire.add-account2fa');
    }
}
