<?php

namespace Modules\Frontend\Http\Livewire\Contacts;

use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;

    public function render()
    {
        $this->notification()->success('test');
        return view('frontend::livewire.contacts.index');
    }
}
