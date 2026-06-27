<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $subject;
    public $message;
    public function render()
    {
        return view('livewire.frontend.contact-component')->extends('livewire.frontend.master');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
    }

    public function storeContact(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $this->email;
        $contact->email = $this->email;
        $contact->mobile = $this->mobile;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();

        $this->emit('added','Inserted successfully!');
    }
}
