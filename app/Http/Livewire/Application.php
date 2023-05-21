<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Application extends Component
{
    public function render()
    {
        $apps =\App\Models\Application::all();
        return view('livewire.application', compact('apps'));
    }
}
