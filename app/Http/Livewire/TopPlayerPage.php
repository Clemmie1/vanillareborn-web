<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class TopPlayerPage extends Component
{

    public $load = true;
    public $type;
    public $listTop = null;

    public $int = 4;

    /**
     * @throws ValidationException
     */
    public function updated()
    {

        if ($this->type == "time") {
            $list = DB::select("SELECT * FROM `vanillareborn`.`player_statistic` ORDER BY `player_hours_played` DESC LIMIT 10 OFFSET 0");
            if ($list != null) {
                $this->listTop = $list;
            }
        } else if ($this->type == "exp") {
            $list = DB::select("SELECT * FROM `vanillareborn`.`player_statistic` ORDER BY `player_total_exp` DESC LIMIT 10 OFFSET 0");
            if ($list != null) {
                $this->listTop = $list;
            }
        } else if ($this->type == "block"){
            $list = DB::select("SELECT * FROM `vanillareborn`.`player_statistic` ORDER BY `mine_block_all` DESC LIMIT 10 OFFSET 0");
            if ($list != null) {
                $this->listTop = $list;
            }
        }
        

    }
    
    public function loadTop()
    {
        sleep(1.3);
        $list = DB::select("SELECT * FROM `vanillareborn`.`player_statistic` ORDER BY `player_hours_played` DESC LIMIT 10 OFFSET 0");
        if ($list != null) {
            $this->listTop = $list;
        }
        $this->load = false;
    
    }
    


    public function render()
    {
        return view('livewire.top-player-page');
    }
}
