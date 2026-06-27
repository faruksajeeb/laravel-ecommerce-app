<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerLogout extends Component
{
    public function render()
    {
        return view('livewire.frontend.customer-logout');
    }

    public function customerLogout(){
        Auth::guard('customer')->logout();
        return redirect()->route('/');
    }
}
