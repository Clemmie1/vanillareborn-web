<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class LoadVkPost extends Component
{

    public $load = false;

    public function getPost(){
        sleep(3);
        
        

    }

    public function render()
    {
        return view('livewire.load-vk-post');
    }
}
