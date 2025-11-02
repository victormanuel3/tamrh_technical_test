<?php

namespace App\Livewire\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $user = '';
    public $password = '';

    protected function rules()
    {
        return (new LoginRequest())->rules();
    }

    protected function messages()
    {
        return (new LoginRequest())->messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetForm()
    {
        $this->reset(['user', 'password']);
        $this->resetValidation();
    }
    
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
