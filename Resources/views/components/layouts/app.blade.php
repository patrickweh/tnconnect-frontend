<!DOCTYPE html>
<HTML class="h-full bg-gray-50" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TNConnect') }}</title>
    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
    @livewireStyles
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <script src="{{ mix('js/turbolinks.js') }}"></script>
</head>
<body class="h-full">
<div x-data="{ open: false }" @keydown.window.escape="open = false">

    <div x-show="open" class="fixed inset-0 flex z-40 md:hidden"
         x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
         aria-modal="true" style="display: none;">

        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"
             x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." @click="open = false"
             aria-hidden="true" style="display: none;">
        </div>

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             x-description="Off-canvas menu, show/hide based on off-canvas menu state."
             class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700" style="display: none;">

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 x-description="Close button, show/hide based on off-canvas menu state."
                 class="absolute top-0 right-0 -mr-12 pt-2" style="display: none;">
                <button type="button"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        @click="open = false">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                <x-frontend::logo class="h-8 w-auto"/>
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <x-frontend::nav.mobile/>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>


    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-20 md:flex-col md:fixed md:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow pt-5 bg-indigo-700 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <x-frontend::logo class="h-8 w-auto"/>

            </div>
            <div class="flex-1 flex flex-col">
                <x-frontend::nav.desktop/>
            </div>
        </div>
    </div>
    <div class="md:pl-20 flex flex-col flex-1">
        <div class="sticky top-0 z-20 flex-shrink-0 flex h-16 bg-white shadow">
            <button type="button"
                    class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
                    @click="open = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-2"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-between align-middle">
                <div class="m-auto pr-5">
                    <a wire:click.prevent="previous()" href="#">
                        <i class="pr-4 fa-solid fa-eye"></i>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-list"></i>
                    </a>
                </div>
                <div class="m-auto pl-5 pr-5">
                    <button wire:click="previous()" type="button" class="h-8 w-8">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <span class="text-sm text-gray-700">{{$currentRecord ?? 0}} von {{$totalRecords ?? 0}}</span>
                    <button wire:click="next()" type="button" class="h-8 w-8">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                <div class="flex-1 flex">
                    <form class="w-full flex md:ml-0" action="#" method="GET">
                        <label for="search-field" class="sr-only">{{__('Suchen')}}</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/search"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="search-field"
                                   class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm"
                                   placeholder="{{__('Suchen')}}" type="search" name="search">
                        </div>
                    </form>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div x-data="{profileOpen: false}" @keydown.escape.stop="profileOpen = false"
                         @click.away="profileOpen = false" class="ml-3 relative">
                        <div>
                            <button type="button"
                                    class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="user-menu-button" x-ref="button" @click="profileOpen = true"
                                    aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                     alt="">
                            </button>
                        </div>

                        <div x-show="profileOpen"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                             @keydown.tab="profileOpen = false" @keydown.enter.prevent="profileOpen = false"
                             @keyup.space.prevent="profileOpen = false" x-cloak>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0" @click="profileOpen = false">{{__('Mein Profil')}}</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1" @click="profileOpen = false">{{__('Einstellungen')}}</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-2" @click="profileOpen = false">{{__('Abmelden')}}</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <main>
            {{$slot}}
        </main>
    </div>
</div>
@livewireScripts
<script src="{{ mix('js/frontend.js') }}"></script>
</body>
</html>
