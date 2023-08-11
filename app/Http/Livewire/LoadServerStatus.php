<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ServerStatusOnlineController;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LoadServerStatus extends Component
{

    public $load = false;

    public function loadStatus(){
        sleep(1);
        $info = DB::select("SELECT * FROM `vanillareborn`.`server_bungee` LIMIT 1");
        $this->load = $info;
    }

    public function render()
    {
        return view('livewire.load-server-status');
    }
}
