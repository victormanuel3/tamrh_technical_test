<?php

use App\Livewire\Auth\Login;
use Livewire\Livewire;

test('password validation fails when too short', function () {
    Livewire::test(Login::class)
        ->set('user', 'testuser')
        ->set('password', '123')
        ->call('login')
        ->assertHasErrors(['password' => 'min']);
});

test('unauthenticated user redirected from dashboard', function () {
    $response = $this->get('/dashboard');
    
    $response->assertRedirect();
});