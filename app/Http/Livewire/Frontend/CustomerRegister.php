<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CustomerRegister extends Component
{
    public $table = 'customers';
    public $name;
    public $email;
    public $mobile;
    public $password;
    public $password_confirmation;
    public $agree_with_terms;
    public function render()
    {
        return view('livewire.frontend.customer-register')->extends('livewire.frontend.master');
    }

    public function saveCustomerRegister()
    {
         
        try {
            $customer = new Customer();
            $customer->name = $this->name;
            $customer->email = $this->email;
            $customer->mobile = $this->mobile;
            $customer->password = Hash::make($this->password);
            $customer->save();
            $this->emit('added', 'You have been registered successfully');
            redirect()->route('customer-login');
        } catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
        }
    }
}
