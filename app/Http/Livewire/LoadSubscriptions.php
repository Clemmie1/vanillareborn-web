<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PlayerApiContrroller;
use Livewire\Component;

class LoadSubscriptions extends Component
{

    public $loadSub = false;
    public $expiresDay = "";

    public function loadSubscriptions(){
        sleep(2.5);

        $this->expiresDay = PlayerApiContrroller::getExpiresDate("14.08.2023");
        $this->loadSub = true;
    }


    public function render()
    {
        return view('livewire.load-subscriptions');
    }
}
