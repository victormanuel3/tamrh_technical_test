<div class="d-flex flex-column sidebar-custom" style="width: 280px; min-height: 100vh; background: linear-gradient(180deg, #5b52d6 0%, #4a42b8 100%);">
    <!-- Header -->
    <div class="p-4 pb-5">
        <h2 class="text-white fw-bold mb-0">TAM-RH</h2>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-grow-1">
        <ul class="list-unstyled">
            <li class="border-bottom" style="border-color: rgba(255, 255, 255, 0.2) !important;">
                <a href="{{ route('dashboard') }}" 
                   class="d-block px-4 py-3 text-white text-decoration-none {{ request()->routeIs('dashboard') ? 'active-link' : '' }}" 
                   wire:navigate>
                    Home
                </a>
            </li>
            <li class="border-bottom" style="border-color: rgba(255, 255, 255, 0.2) !important;">
                <a href="{{ route('dashboard.about') }}" 
                   class="d-block px-4 py-3 text-white text-decoration-none {{ request()->routeIs('dashboard.about') ? 'active-link' : '' }}" 
                   wire:navigate>
                    About
                </a>
            </li>
            <li class="border-bottom" style="border-color: rgba(255, 255, 255, 0.2) !important;">
                <a href="{{ route('dashboard.contact') }}" 
                   class="d-block px-4 py-3 text-white text-decoration-none {{ request()->routeIs('dashboard.contact') ? 'active-link' : '' }}" 
                   wire:navigate>
                    Contact
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="px-4 pb-4 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-light w-100 text-dark">
                Cerrar sesión
            </button>
        </form>
    </div>

    <!-- Footer -->
    <div class="px-4 pb-4">
        <p class="text-white-50 small mb-0" style="font-size: 0.85rem; line-height: 1.6;">
            Copyright ©2025 All rights reserved
        </p>
    </div>
</div>