<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormRegister extends Component
{
    public $name;
    public $email;
    public $password;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ];
    
    public $password_confirmation;
    
    public function register()
    {
        try {
            $this->validate();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            Auth::login($user);

            return $this->redirect('/dashboard', navigate: true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return session()->flash('error', $e->validator->errors()->first());
        }
    }
    public function render()
    {
        return view('livewire.auth.form-register');
    }
}
