<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-nav-link>
                    <x-nav-link :href="route('sell')" :active="request()->routeIs('sell')">
                        {{ __('Sell') }}
                    </x-nav-link>
                    <x-nav-link :href="route('rent')" :active="request()->routeIs('rent')">
                        {{ __('Rent') }}
                    </x-nav-link>
                    <x-nav-link :href="route('request')" :active="request()->routeIs('request')">
                        {{ __('Request') }}
                    </x-nav-link>
                    <x-nav-link :href="route('auction')" :active="request()->routeIs('auction')">
                        {{ __('Auction') }}
                    </x-nav-link>
                    <x-nav-link :href="route('businessCreation')" :active="request()->routeIs('businessCreation')">
                        {{ __('Create Business') }}
                    </x-nav-link>
                    <x-nav-link :href="route('active')" :active="request()->routeIs('active')">
                        {{ __('Active Business') }}
                    </x-nav-link>
                    <x-nav-link :href="route('application')" :active="request()->routeIs('application')">
                        {{ __('Pending applications') }}
                    </x-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </form>
                    </x-nav-link>
                </div>
            </div>
</nav>