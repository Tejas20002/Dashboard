<?php

namespace App\Http\Livewire\Modal;

use App\Models\Application;
use Livewire\Component;
use LivewireUI\Modal\Contracts\ModalComponent;

class UserauthModel extends \LivewireUI\Modal\ModalComponent
{
    public $app;

    public function mount(Application $apps){
        $this->app = $apps;
    }
    public function render()
    {
        return view('livewire.modal.userauth-model');
    }
}
