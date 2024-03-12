<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('admin')
    

    <div>
        @include('layouts.footer')
    </div>
    @endrole
    @role('organizer')
    <div>
        @include('layouts.footer')
    </div>
    
    @endrole
    @role('user')
    <div>
        @include('layouts.footer')
    </div>
    @endrole
</x-app-layout>
