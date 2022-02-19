<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Frontend</title>
       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
        @livewireStyles
    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('js/frontend.js') }}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    </body>
</html>
