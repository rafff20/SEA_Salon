<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-navlink>
                            <x-nav-link href="/reservation" :active="request()->is('reservation')">Reservation</x-navlink>
                                <x-nav-link href="/review" :active="request()->is('review')">Review</x-navlink>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <!-- Authenticated dropdown menu -->
                        <div class="relative inline-block text-left">
                            <div>
                                <button @click="isOpen = !isOpen"
                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    Options
                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div x-show="isOpen" @click.away="isOpen = false"
                                class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    
                                    <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Dashboard</a>
                                    <!-- Sign out form -->
                                    <form method="POST" action="/logout" role="none">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="mx-3 flex items-center space-x-2">
                        <a href="/login"
                            class="text-white px-4 py-2 text-lg bg-indigo-700 hover:bg-indigo-900 border-none rounded cursor-pointer outline-2 flex-shrink-0">Login</a>
                        <a href="/signup"
                            class="text-white px-4 py-2 text-lg bg-emerald-500 hover:bg-emerald-900 border-none rounded cursor-pointer outline-2 flex-shrink-0">Sign
                            Up</a>
                    </div>

                    @endauth
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-navlink>
                <x-nav-link href="/reservation" :active="request()->is('reservation')">Reservation</x-navlink>
                    <x-nav-link href="/review" :active="request()->is('review')">Review</x-navlink>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            @auth
                <!-- Authenticated mobile dropdown -->
                <div class="space-y-1">
                    <!-- Dashboard link -->
                    <a href="/dashboard"
                        class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Dashboard</a>
                    <!-- Sign out form -->
                    <form method="POST" action="/logout"
                        class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                        @csrf
                        <button type="submit">Sign out</button>
                    </form>
                </div>
            @else
                <!-- Guest mobile links -->
                <div class="space-y-1">
                    <a href="/login"
                        class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
                    <a href="/signup"
                        class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        Up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
