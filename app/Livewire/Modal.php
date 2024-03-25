<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class Modal extends Component
{
    public function render()
    {

        return view('livewire.modal', [
            'clients' => Client::all(),]);
    }
}
