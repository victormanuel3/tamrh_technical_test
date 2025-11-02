<div x-data="{showModal: false}" @open-register-modal.window="showModal = true" x-cloak>
    <div x-show="showModal">
        <!-- Modal -->
        <div class="modal d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" @click.away="showModal = false">
                <div class="modal-content p-4 position-relative" style="width: 27rem; font-size: 16px">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" @click="showModal = false" aria-label="Close"></button>
                    
                    <h2 class="text-primary mb-4">Registrarse</h2>
                    
                    <form wire:submit="register" class="w-100">
                        <div class="mb-3">
                            <label class="form-label">
                                Nombre de usuario
                            </label>
                            <input type="text" class="form-control" wire:model.blur="name">
                            @error('name') 
                                <span class="text-danger small">{{ $message }}</span> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>
                            <input type="email" class="form-control" wire:model.blur="email" autocomplete="username">
                            @error('email') 
                                <span class="text-danger small">{{ $message }}</span> 
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">
                                Contraseña
                            </label>
                            <input type="password" class="form-control" wire:model.blur="password" autocomplete="new-password">
                            @error('password') 
                                <span class="text-danger small">{{ $message }}</span> 
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn text-white w-100" style="background-color: #4338ca;">
                            <span wire:loading.remove>Registrarse</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                Cargando...
                            </span>
                        </button>
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