<div x-show="sidebarOpen" 
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm md:hidden"
     style="display: none;"></div>

<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-primary text-white transition-transform duration-300 transform md:translate-x-0 md:static md:inset-auto flex flex-col shadow-2xl shadow-primary/20 dark:bg-slate-900 dark:border-r dark:border-slate-800"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <div class="h-20 flex items-center gap-3 px-6 border-b border-white/10 dark:border-slate-800">
        <div class="bg-white/10 p-2 rounded-xl backdrop-blur-sm">
            <i data-lucide="graduation-cap" class="text-accent h-6 w-6"></i>
        </div>
        <div class="font-serif font-bold text-xl tracking-tight text-white">
            RE-MENTOR
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        
        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-accent text-primary font-bold shadow-lg shadow-accent/20' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-slate-400 group-hover:text-white' }}"></i>
            <span>Dashboard</span>
        </a>

        <div class="pt-4 pb-2 px-4 text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-600">
            Management
        </div>

        <a href="{{ route('enrollees') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('enrollees') ? 'bg-accent text-primary font-bold shadow-lg shadow-accent/20' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <i data-lucide="users" class="w-5 h-5 {{ request()->routeIs('enrollees') ? 'text-primary' : 'text-slate-400 group-hover:text-white' }}"></i>
            <span>Enrollees</span>
        </a>

        
    </nav>

    <div class="p-4 border-t border-white/10 dark:border-slate-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-red-300 hover:bg-red-500/10 hover:text-red-200 transition-all">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span>Sign Out</span>
            </button>
        </form>
    </div>
</aside>