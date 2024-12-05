<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FormLogin extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return $this->redirect('/dashboard', navigate: true);
        }

        session()->flash('error', 'Email atau password salah');
    }

    public function render()
    {
        return view('livewire.auth.form-login');
    }
}
