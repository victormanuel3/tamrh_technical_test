<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|string|min:4|max:15|unique:users,name',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 4 caracteres.',
        'name.unique' => 'Este nombre de usuario ya está en uso.',
        'email.required' => 'Este campo es obligatorio.',
        'email.email' => 'Debe ser un email válido.',
        'email.unique' => 'Este email ya está registrado.',
        'password.required' => 'Este campo es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register() {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        session()->regenerate();

        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
