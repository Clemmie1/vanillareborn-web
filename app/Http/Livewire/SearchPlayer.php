<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SearchPlayer extends Component
{

    use LivewireAlert;

    public $nickname;

    public function search(){

        $nickname = $this->nickname;

        $UserInfo = DB::table('player_statistic')->where('account_name', $nickname)->first();

        if ($UserInfo) {
            return $this->redirect(route('playerPageStats', $UserInfo->account_name)); 
        } else {
            $this->alert('warning', 'Игрок не найден', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => true,
                'timerProgressBar' => true,
                ]);
        }
        

    }

    public function render()
    {
        return view('livewire.search-player');
    }
}
