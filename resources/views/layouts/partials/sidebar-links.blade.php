@php
    $user = Auth::user();
@endphp

@if ($user)
    @if ($user->isCustomer())
        <!-- Customer Links -->
        <a href="{{ route('customer.dashboard') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('customer.dashboard') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('customer.dashboard') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
            </div>
        </a>

        <a href="{{ route('customer.savings.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('customer.savings.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('customer.savings.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Deposit Money</span>
            </div>
        </a>

        <a href="{{ route('customer.savings.withdrawal') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('customer.savings.withdrawal') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('customer.savings.withdrawal') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h10a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                </svg>
                <span>Withdraw Savings</span>
            </div>
        </a>
    @endif

    @if ($user->isStaff() && !$user->isManager() && !$user->isProgrammer())
        <!-- Staff Links -->
        <a href="{{ route('staff.dashboard') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('staff.dashboard') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('staff.dashboard') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
            </div>
        </a>

        <a href="{{ route('staff.reports.create') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('staff.reports.create') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('staff.reports.create') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375H13.5A1.125 1.125 0 0112 11.25V9.75M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span>Create Daily Report</span>
            </div>
        </a>
    @endif

    @if ($user->isManager())
        <!-- Manager Links -->
        <a href="{{ route('manager.dashboard') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('manager.dashboard') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('manager.dashboard') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
            </div>
        </a>

        <a href="{{ route('manager.staff.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('manager.staff.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('manager.staff.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span>Manage Staff</span>
            </div>
        </a>

        <a href="{{ route('manager.customers.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('manager.customers.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('manager.customers.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.097-4.012l-.022-.067L10.477 12.75" />
                </svg>
                <span>Customers</span>
            </div>
        </a>

        <a href="{{ route('manager.reports.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('manager.reports.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('manager.reports.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375H13.5A1.125 1.125 0 0112 11.25V9.75M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span>Reports</span>
            </div>
        </a>
    @endif

    @if ($user->isProgrammer())
        <!-- Programmer Links -->
        <a href="{{ route('programmer.dashboard') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('programmer.dashboard') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('programmer.dashboard') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
            </div>
        </a>

        <a href="{{ route('programmer.staff.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('programmer.staff.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('programmer.staff.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Manage Staff</span>
            </div>
        </a>

        <a href="{{ route('programmer.customers.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('programmer.customers.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('programmer.customers.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.097-4.012l-.022-.067L10.477 12.75" />
                </svg>
                <span>Customers</span>
            </div>
        </a>

        <a href="{{ route('programmer.reports.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('programmer.reports.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('programmer.reports.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375H13.5A1.125 1.125 0 0112 11.25V9.75M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span>Reports</span>
            </div>
        </a>

        <a href="{{ route('programmer.features.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('programmer.features.index') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 {{ request()->routeIs('programmer.features.index') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                </svg>
                <span>Platform Features</span>
            </div>
        </a>
    @endif

    <div class="border-t border-slate-100 my-4"></div>

    <!-- Profile link for everyone -->
    <a href="{{ route('profile.show') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 {{ request()->routeIs('profile.show') ? 'text-[#1B2559] bg-[#F4F7FE] border-r-4 border-[#4318FF]' : 'text-slate-400 hover:text-slate-600 hover:bg-[#F4F7FE]/50' }}">
        <div class="flex items-center gap-3">
            <svg class="h-5 w-5 {{ request()->routeIs('profile.show') ? 'text-[#4318FF]' : 'text-slate-400 group-hover:text-slate-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Account Profile</span>
        </div>
    </a>

    <!-- Logout link for everyone -->
    <form method="POST" action="{{ route('logout') }}" x-data id="sidebar-logout-form">
        @csrf
        <a href="{{ route('logout') }}" @click.prevent="$el.closest('form').submit()" class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-bold transition-all duration-200 text-red-400 hover:text-red-600 hover:bg-red-50/50">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 text-red-400 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <span>Log Out</span>
            </div>
        </a>
    </form>
@endif
