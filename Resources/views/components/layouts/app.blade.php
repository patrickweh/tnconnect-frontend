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
<body class="h-full overflow-hidden">
    <div x-data="{ open: false }" @keydown.window.escape="open = false" class="h-full flex">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-show="open"
             class="fixed inset-0 flex z-40 lg:hidden"
             x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state."
             x-ref="dialog"
             aria-modal="true">
            <div x-show="open"
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-600 bg-opacity-75"
                 x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." @click="open = false" aria-hidden="true">
            </div>
            <div x-show="open"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                 class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">

                <div x-show="open"
                     x-transition:enter="ease-in-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in-out duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute top-0 right-0 -mr-12 pt-4"
                     x-description="Close button, show/hide based on off-canvas menu state.">
                    <button @click="open = false" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="pt-5 pb-4">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <x-frontend::logo class="h-8 w-auto"/>
                    </div>
                    <x-frontend::nav.mobile />
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="#" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">Emily Selman</p>
                                <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">Account Settings</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-20">
                <div class="flex-1 flex flex-col min-h-0 overflow-y-auto bg-indigo-600">
                    <div class="flex-1">
                        <div class="bg-indigo-700 py-4 flex items-center justify-center">
{{--                            <x-frontend::logo class="h-8 w-auto"/>--}}
                        </div>
                        <x-frontend::nav.desktop />
                    </div>
                    <div class="flex-shrink-0 flex pb-5">
                        <a href="#" class="flex-shrink-0 w-full">
                            <img class="block mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="sr-only">
                                <p>Emily Selman</p>
                                <p>Account settings</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 min-w-0 flex flex-col overflow-hidden">
            <!-- Mobile top navigation -->
            <div class="lg:hidden">
                <div class="bg-indigo-600 py-2 px-4 flex items-center justify-between sm:px-6 lg:px-8">
                    <div>
{{--                        <x-frontend::logo class="h-8 w-auto"/>--}}
                    </div>
                    <div>
                        <button @click="open = ! open" type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center bg-indigo-600 rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <main class="flex-1 flex overflow-hidden p-5">
                <!-- Primary column -->
                <section aria-labelledby="primary-heading" class="min-w-0 flex-1 h-full flex flex-col overflow-y-auto lg:order-last">

                {{$slot}}
                    <!-- Your content -->
                </section>
            </main>
        </div>
    </div>
    @livewireScripts
    <script src="{{ mix('js/frontend.js') }}"></script>
</body>
</html>
