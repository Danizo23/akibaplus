<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AkibaPlus</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-[#F4F7FE] text-[#1B2559] min-h-screen">
        <x-banner />

        <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">
            
            <!-- Mobile Sidebar -->
            <div class="fixed inset-0 z-50 flex lg:hidden" x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                <!-- Backdrop -->
                <div class="fixed inset-0 bg-gray-600/75" @click="sidebarOpen = false"></div>
                <!-- Sidebar content container -->
                <div class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4" x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
                    <!-- Close button -->
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Mobile Sidebar Logo -->
                    <div class="flex flex-shrink-0 items-center px-6">
                        <span class="text-2xl font-bold tracking-tight text-[#1B2559]"><span class="font-extrabold text-[#4318FF]">AKIBA</span>PLUS</span>
                    </div>
                    <div class="mt-8 h-0 flex-1 overflow-y-auto">
                        <nav class="space-y-1 px-3">
                            @include('layouts.partials.sidebar-links')
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Desktop Sidebar -->
            <div class="hidden lg:flex lg:flex-shrink-0">
                <div class="flex w-72 flex-col bg-white border-r border-[#E9EDF7] pt-5 pb-4">
                    <div class="flex flex-shrink-0 items-center px-8 mb-8">
                        <span class="text-2xl font-bold tracking-tight text-[#1B2559]"><span class="font-extrabold text-[#4318FF]">AKIBA</span>PLUS</span>
                    </div>
                    <div class="flex flex-1 flex-col overflow-y-auto">
                        <nav class="flex-1 space-y-1 px-4">
                            @include('layouts.partials.sidebar-links')
                        </nav>
                        
                        <!-- Bottom Promo Card -->
                        <div class="px-4 mt-auto">
                            <div class="relative overflow-hidden rounded-[20px] bg-gradient-to-br from-[#4318FF] to-[#b19cff] p-6 text-white shadow-md">
                                <div class="absolute -right-6 -bottom-6 h-24 w-24 rounded-full bg-white/10 blur-xl"></div>
                                <div class="relative">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/20 text-xl mb-4">📈</span>
                                    <h4 class="font-bold text-base mb-1">Save & Grow</h4>
                                    <p class="text-xs text-indigo-100 leading-relaxed mb-4">Monitor your savings, deposits, and mature accounts effortlessly.</p>
                                    <span class="text-xs font-semibold bg-white text-[#4318FF] py-2 px-4 rounded-xl shadow-sm block text-center">AkibaPlus v1.0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            <div class="flex flex-1 flex-col overflow-y-auto focus:outline-none bg-[#F4F7FE]">
                <!-- Top Nav -->
                <header class="flex flex-shrink-0 items-center justify-between px-6 py-4 md:px-8 bg-[#F4F7FE]/80 backdrop-blur-md sticky top-0 z-30">
                    <div class="flex items-center gap-4">
                        <!-- Hamburger menu button -->
                        <button type="button" class="border-r border-gray-200 pr-4 text-gray-500 focus:outline-none lg:hidden" @click="sidebarOpen = true">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                        
                        <!-- Breadcrumbs & Heading -->
                        <div>
                            <div class="text-xs font-normal text-slate-400">
                                Pages / <span class="text-slate-500 capitalize">{{ request()->segment(1) ? str_replace('-', ' ', request()->segment(1)) : 'Dashboard' }}</span>
                            </div>
                            <h1 class="text-xl md:text-2xl font-bold text-[#1B2559]">
                                @if (isset($header))
                                    {{ $header }}
                                @else
                                    AkibaPlus Dashboard
                                @endif
                            </h1>
                        </div>
                    </div>

                    <!-- Navbar Control Panel (Right Side) -->
                    <div class="flex items-center gap-4 bg-white/80 rounded-full py-1.5 px-3 shadow-sm border border-slate-100">
                        <!-- Search bar -->
                        <div class="relative hidden sm:block">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.604 10.604z" />
                                </svg>
                            </span>
                            <input type="text" placeholder="Search..." class="w-40 md:w-48 bg-[#F4F7FE] text-xs rounded-full pl-9 pr-4 py-1.5 focus:outline-none focus:ring-1 focus:ring-[#4318FF] border-none text-[#1B2559] placeholder-slate-400">
                        </div>

                        <!-- Notifications -->
                        <button class="text-slate-400 hover:text-slate-600 transition">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>

                        <!-- Information -->
                        <button class="text-slate-400 hover:text-slate-600 transition">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.083.985l-.04.02-.041.02a.75.75 0 001.082.985l.04-.02m-9-1.354c0-2.208 1.944-3.93 4.2-3.228 1.765.547 2.91 2.052 2.91 3.829V12c0 2.208-1.944 3.93-4.2 3.228-1.765-.547-2.91-2.052-2.91-3.829v-.708z" />
                            </svg>
                        </button>

                        <!-- Theme Toggle -->
                        <button class="text-slate-400 hover:text-slate-600 transition" @click="document.documentElement.classList.toggle('dark')">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                            </svg>
                        </button>

                        <!-- User Dropdown (Jetstream) -->
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-indigo-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </header>

                <!-- Slot (Main page content) -->
                <main class="flex-1 p-6 md:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
