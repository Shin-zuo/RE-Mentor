<header class="sticky top-0 z-40 w-full glass-card h-20 px-6 flex items-center justify-between shadow-sm">
    
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg dark:text-slate-400 dark:hover:bg-slate-800">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        
        <div>
            <h1 class="font-serif font-bold text-xl text-slate-900 dark:text-white hidden sm:block">
                {{ $title ?? 'Overview' }}
            </h1>
        </div>
    </div>

    <div class="flex items-center gap-3 sm:gap-6">
        
        <button @click="toggleTheme()" 
                class="p-2 rounded-full text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-colors relative group">
            <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
            <i x-show="darkMode" data-lucide="sun" class="w-5 h-5 text-accent" style="display: none;"></i>
        </button>

        <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-1"></div>

        <div class="flex items-center gap-3">
            <div class="text-right hidden md:block">
                <div class="text-sm font-bold text-slate-900 dark:text-white">{{auth()->user()->name}}</div>
                <div class="text-xs text-slate-500 dark:text-slate-400">Administrator</div>
            </div>
                <div class="h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center font-serif font-bold ring-4 ring-slate-50 dark:ring-slate-900 shadow-md">
                    @if(auth()->user()->avatar)
    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" 
         alt="{{ auth()->user()->name }}" 
         class="h-10 w-10 rounded-full object-cover border border-slate-200">
@else
    <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold border border-blue-700">
        {{ substr(auth()->user()->name, 0, 1) }}
    </div>
@endif
                </div>
        </div>
    </div>
</header>