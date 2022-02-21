<nav aria-label="Sidebar" class="pb-6 flex flex-col items-center space-y-3">
    <a href="{{route('dashboard')}}"
       class="flex items-center p-4 rounded-lg text-indigo-200 hover:bg-indigo-600 {{!Route::is('dashboard') ?: 'bg-indigo-900'}}">
        <i class="fa-solid fa-gauge-high"></i>
        <span class="sr-only">{{__('Dashboard')}}</span>
    </a>

    <a href="{{route('contacts')}}"
       class="flex items-center p-4 rounded-lg text-indigo-200 hover:bg-indigo-600  {{!Route::is('contacts') ?: 'bg-indigo-900'}}">
        <i class="fa-solid fa-address-book"></i>
        <span class="sr-only">{{__('Kontakte')}}</span>
    </a>
</nav>
