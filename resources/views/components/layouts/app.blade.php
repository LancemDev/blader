<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- HEADER --}}

        <x-mary-header separator progress-indicator>
       
            <x-slot:actions>
            
            <x-mary-button label="Upload Video" onclick="modal17.showModal()" responsive icon="o-cloud" class="btn-primary mt-5" />
                @auth
                    <div class="flex items-center space-x-2 ml-10 text-20px mt-5">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                @endauth

            </x-slot:actions>
        </x-mary-header>

    <!-- Image placed here -->
    <img class="logo-img hidden md:block absolute top-1.5 left-10 w-20 h-auto z-50 rounded-full" src="thumbnails/Blader.png" alt="Logo">

</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- Menu items --}}
                <x-mary-menu-item title="Home" link="/home" icon="o-home" />
                <x-mary-menu-item title="Trending" link="/trending" icon="o-fire" />
                <x-mary-menu-item title="Recommendations" link="/recommendations" icon="o-star" />
                <x-mary-menu-sub title="More" icon="o-cog-6-tooth"><x-mary-menu-item title="theme" icon="o-moon" @click="$dispatch('toggle-theme')" />
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-mary-menu-item title="Logout" icon="o-wifi" onclick="event.preventDefault(); this.closest('form').submit();" />
                        </form>
                    @endauth
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-mary-toast />


    {{-- MODALS --}}

    @livewire('chatty')
    @livewire('upload-video')

    {{-- FOOTER --}}


    {{-- SCRIPTS --}}
    
</body>
</html>
