<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ServerMap extends Component
{

    Use LivewireAlert;

    public $connectMap = false;
    public $renderMap = false;
    public $selectMap = true;
    public $worldName = "";

    protected $listeners = [
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function doSomething($selectMapName){        
        $this->selectMap = false;
        sleep(4);
        $this->connectMap = true;
        $this->renderMap = true;
        $this->worldName = $selectMapName;
        
        sweetalert()
        ->showConfirmButton()
        //->timerProgressBar(false)
        ->confirmButtonText("Закрыть")
        // ->timer(999999)
        ->addError('render_map_' . $this->convertNameMap($selectMapName) . '_error');
    }

    public function sweetalertConfirmed(array $payload)
    {
        $this->selectMap = true;
        $this->renderMap = false;
    }

    public function closeMap(){
        $this->selectMap = true;
        $this->renderMap = false;

    }

    public function render()
    {
        return view('livewire.server-map');
    }

    public function convertNameMap($map){

        if ($map == "Верхний мир") {
            return "world";
        } else if ($map == "Нижний мир") {
            return "world_nether";
        } else if ($map == "Край") {
            return "world_end";
        }
        
    }
}
