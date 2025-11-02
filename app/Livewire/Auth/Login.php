<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $user = '';
    public $password = '';

    protected $rules = [
        'user' => 'required|string',
        'password' => 'required|string|min:6',
    ];

    protected $messages = [
        'user.required' => 'Este campo es obligatorio.',
        'password.required' => 'Este campo es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
    ];

    public function login() {
        $this->validate();

        $user = User::where('email', $this->user)
                    ->orWhere('name', $this->user)
                    ->first();

        if($user && Hash::check($this->password, $user->password)){
            Auth::login($user);
            session()->regenerate();

            $this->dispatch('close-login-modal');
            return redirect()->route('dashboard');
        }
        $this->addError('user', 'Las credenciales son incorrectas.');

    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
