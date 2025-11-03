<?php

namespace App\Livewire\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';


    protected function rules()
    {
        return (new RegisterRequest())->rules();
    }

    protected function messages()
    {
        return (new RegisterRequest())->messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

        public function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
        $this->resetValidation();
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
