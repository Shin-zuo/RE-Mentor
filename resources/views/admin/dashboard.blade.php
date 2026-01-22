<x-layouts.app title="Dashboard">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-center gap-4 mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl text-blue-600 dark:text-blue-400">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <div class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Enrollees</div>
            </div>
            <div class="text-3xl font-serif font-bold text-slate-900 dark:text-white">{{ $enrolleeCount }}</div>
        </div>

         </div>

</x-layouts.app>