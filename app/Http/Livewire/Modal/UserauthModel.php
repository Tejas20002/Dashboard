<?php

namespace App\Http\Livewire\Modal;

use App\Models\Application;
use Livewire\Component;
use LivewireUI\Modal\Contracts\ModalComponent;

class UserauthModel extends \LivewireUI\Modal\ModalComponent
{
    public $app;
    public $username;
    public $password;

    public function mount(Application $apps){
        $this->app = $apps;
        $this->username = $this->app->app_user;
        $this->password = $this->app->app_password;
    }
    public function render()
    {
        return view('livewire.modal.userauth-model');
    }

    public function changePassword(){
        $id = $this->app->id;
        $application = Application::find($id);
        $status = $application->update(['app_user'=>$this->username, 'app_password'=>$this->password]);
        if ($status){
            session()->flash('success', 'Successfully Updated.');
            
        }

    }
}
