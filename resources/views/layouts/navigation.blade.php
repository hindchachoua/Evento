<nav x-data="{ open: false }" class=" dark:bg-black border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        Evento Live
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @role('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link style="color: rgb(255, 255, 255);" :href="route('admin.user.index')" :active="request()->routeIs('admin.user.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link style="color: rgb(255, 255, 255);" :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link style="color: rgb(255, 255, 255);" :href="route('admin.events.index')" :active="request()->routeIs('admin.events.index')">
                        {{ __('Events') }}
                    </x-nav-link>
                    <x-nav-link style="color: rgb(255, 255, 255);" :href="route('admin.admin')" :active="request()->routeIs('admin.admin')">
                        {{ __('statistics') }}
                    </x-nav-link>
                </div>
            @else
                @role('organizer')
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link style="color: rgb(229, 53, 0); " :href="route('organizer.index')" :active="request()->routeIs('organizer.index')" >
                            {{ __('Events') }}
                        </x-nav-link>
                        <x-nav-link style="color: rgb(255, 255, 255);" :href="route('organizer.reservation')" :active="request()->routeIs('organizer.reservation')" >
                            {{ __('Reservations') }}
                        </x-nav-link>

                        <x-nav-link style="color: rgb(255, 255, 255);" :href="route('organizer.statistics')" :active="request()->routeIs('organizer.statistics')" >
                            {{ __('Statistics') }}
                        </x-nav-link>
                    </div>
                @else
                    @role('user')
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link style="color: rgb(255, 60, 0); font-weight:bold; font-size: 1rem;"  :href="route('user.index')" :active="request()->routeIs('user.index')">
                                {{ __('All events') }}
                            </x-nav-link>
                            {{-- <x-nav-link style="color: rgb(197, 46, 0); font-weight:bold; font-size: 1rem;" >
                                {{ __('tickets') }}
                            </x-nav-link> --}}
                            <x-nav-link style="color: rgb(255, 255, 255); font-weight:bold; font-size: 1rem;"  :href="route('user.myhistory')" :active="request()->routeIs('user.myhistory')">
                                {{ __('My history') }}
                            </x-nav-link>

                            <x-nav-link style="color: rgb(255, 255, 255); font-weight:bold; font-size: 1rem;"  :href="route('user.reservation')" :active="request()->routeIs('user.reservation')">
                                {{ __('My reservations') }}
                            </x-nav-link>
                        </div>
                        
                    @endrole
                @endrole
            @endrole
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-orange-500  hover:text-white dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" style="color:#ee5007;">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color:#ee5007;">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
