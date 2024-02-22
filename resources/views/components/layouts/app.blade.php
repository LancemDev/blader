<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- HEADER --}}
    <x-mary-header separator progress-indicator>
        <x-slot:brand>
            <x-mary-icon name="o-envelope" class="p-5 pt-3" />
        </x-slot:brand>
        <x-slot:middle class="!justify-end">
            <x-mary-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button label="Upload Video" onclick="modal17.showModal()" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-mary-header>
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

                {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                        <x-slot:actions>
                            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" />
                        </x-slot:actions>
                    </x-mary-list-item>
                @endif

                <x-mary-menu-item title="Home" link="/home" icon="o-home" />
                <x-mary-menu-item title="Trending" link="/trending" icon="o-fire" />
                <x-mary-menu-item title="Recommendations" link="/recommendations" icon="o-star" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    @livewire('logout')
                    <x-mary-menu-item title="Logout" icon="o-wifi" wire:click="logout" />
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
    <x-mary-modal id="modal17" title="Upload Video" class="p-5">
        <x-slot:actions>
            <x-mary-button label="Cancel" onclick="modal17.closeModal()" class="btn-ghost" />
            <x-mary-button label="Upload" onclick="modal17.closeModal()" class="btn-primary" />
        </x-slot:actions>
        <br />
        <x-mary-input label="Title" placeholder="Title" />
        <br />
        <x-mary-input label="Description" placeholder="Description" />
        <br />
        <x-mary-input label="Tags" placeholder="Tags" />
        <br />
        <x-mary-input label="Video" placeholder="Video" />
    </x-mary-modal>
</body>
</html>