<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerLogin extends Component
{
    public $email;
    public $password;
    public $remember;
    public function render()
    {
        return view('livewire.frontend.customer-login')->extends('livewire.frontend.master');
    }

    public function customerLogin(){
      
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'            
        ]);
       //dd($this->remember_me);
        if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
           
            return redirect()->intended('/');
        }
        session()->flash('error', 'Check your login credentials');
        //return back()->withInput($this->only('email', 'remember'));

    }
}
