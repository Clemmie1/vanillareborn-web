<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LoadTopPlayer extends Component
{

    public $loadTopPlayer = false;
    public $type;

    public function loadTopPlayer(){
        sleep(1);
        $info = DB::select("SELECT * FROM `player_statistic` ORDER BY `player_hours_played` DESC, `player_total_exp` DESC, `mine_block_all` DESC");
        $this->loadTopPlayer = $info;
    }

    public function render()
    {
        return view('livewire.load-top-player');
    }
}
