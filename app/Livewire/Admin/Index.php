<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('Front.master1')]
    public function render()
    {
        return view('livewire.admin.index');
    }
}
