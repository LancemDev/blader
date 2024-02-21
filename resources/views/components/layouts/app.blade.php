<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

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
            <x-mary-button label="Upload Video" onclick="modal18.showModal()" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
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
                    <x-mary-menu-item title="Logout" icon="o-wifi" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" />
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
        <x-mary-input placeholder="Title" />
        <x-mary-input placeholder="Description" />
        <x-mary-input placeholder="Tags" />
        <x-mary-input placeholder="Video" />
    </x-mary-modal>

    <x-mary-modal id="modal18" class="p-5 items-center">
        <label for="file-upload" class="cursor-pointer">
            <span class="mt-2 text-white">Upload Video or Drag and Drop here</span>
        </label>
        <input wire:model="file" id="file-upload" type="file" class="hidden" />
    </x-mary-modal>
</body>
</html>