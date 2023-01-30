<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use Livewire\Component;

class NewsLetterComponent extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.frontend.news-letter-component');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'email' => 'required|email'
        ]);
    }

    public function subscribe(){
        $this->validate([
            'email' => 'required|email'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email =$this->email;
        $subscriber->save();
        $this->emit('added','Suscribed successfully!');
    }
}
