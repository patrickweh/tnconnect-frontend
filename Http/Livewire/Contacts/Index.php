<?php

namespace Modules\Frontend\Http\Livewire\Contacts;

use App\Models\Address;
use App\Models\Contact;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;

    public int $currentRecord = 1;
    public int $totalRecords = 100;

    public Contact $contact;
    public Address $mainAddress;

    public function render()
    {
        $this->contact = Contact::all()->first();
        $this->mainAddress = $this->contact->addresses()->where('is_main_address', true)->first();

        return view('frontend::livewire.contacts.index')
            ->layout('frontend::components.layouts.app',
                [
                    'currentRecord' => $this->currentRecord,
                    'totalRecords' => $this->totalRecords
                ]);
    }
}
