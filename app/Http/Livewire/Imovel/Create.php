<?php

namespace App\Http\Livewire\Imovel;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Create extends Component
{
    public ?string $body = null;

    public function render():View
    {
        return view(view ('livewire.imovel.create'));
    }

    public function imovel():void
    {

        $this->emit(event ('imovel::created'));
    }

}