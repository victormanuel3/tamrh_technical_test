<div x-data="{showModal: false}" @open-register-modal.window="showModal = true" x-cloak>
    <div x-show="showModal">
        <!-- Modal -->
        <div class="modal d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" @click.away="showModal = false">
                <div class="modal-content">
                    <h2>Registrarse</h2>
                    <form wire:submit="register">
                        <div>
                            <label>Nombre de usuario</label>
                            <input type="text" wire:model.blur="name">
                            @error('name') 
                                <span>{{ $message }}</span> 
                            @enderror
                        </div>
            
                        <div>
                            <label>Email</label>
                            <input type="email" wire:model.blur="email" autocomplete="username">
                            @error('email') 
                                <span>{{ $message }}</span> 
                            @enderror
                        </div>
            
                        <div>
                            <label>Contraseña</label>
                            <input type="password" wire:model.blur="password" autocomplete="new-password">
                            @error('password') 
                                <span>{{ $message }}</span> 
                            @enderror
                        </div>
            
                        <div>
                            <label>Confirmar Contraseña</label>
                            <input type="password" wire:model.blur="password_confirmation" autocomplete="new-password">
                        </div>
            
                        <button type="submit">Registrarse</button>
                        <button type="button" @click="showModal = false">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Backdrop -->
        <div 
            class="modal-backdrop fade show"
        ></div>
    </div>
</div>
