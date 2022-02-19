<nav aria-label="Sidebar" class="py-6 flex flex-col items-center space-y-3">
    <a href="{{route('dashboard')}}" class="flex items-center p-4 rounded-lg text-indigo-200 hover:bg-indigo-900 {{!Route::is('dashboard') ?: 'bg-indigo-700'}}">
        <i class="fa-solid fa-gauge-high"></i>
        <span class="sr-only">{{__('Dashboard')}}</span>
    </a>

    <a href="{{route('contacts')}}" class="flex items-center p-4 rounded-lg text-indigo-200 hover:bg-indigo-900  {{!Route::is('contacts') ?: 'bg-indigo-700'}}">
        <i class="fa-solid fa-address-book"></i>
        <span class="sr-only">{{__('Kontakte')}}</span>
    </a>
</nav>
