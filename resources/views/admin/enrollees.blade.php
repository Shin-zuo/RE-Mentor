<x-layouts.app title="Enrollees">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            {{-- <h1 class="font-serif font-bold text-3xl text-slate-900 dark:text-white">Enrollees</h1> --}}
            <div class="flex gap-2 mt-2">
                {{-- <button class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors shadow-sm">
                    Export CSV
                </button>
                <button class="px-4 py-2 bg-primary text-white rounded-xl text-sm font-bold hover:bg-primary-95 transition-colors shadow-lg shadow-primary/20">
                    + Add Student
                </button> --}}
            </div>
        </div>
        <div class="flex gap-2">
            <form method="GET" action="{{ route('enrollees') }}" class="relative" x-data>
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    @input.debounce.400ms="$el.form.submit()"
                    placeholder="Search enrollees..." 
                    class="pl-10 pr-4 py-2 border border-slate-200 rounded-xl focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all placeholder:text-slate-300 font-medium w-64"
                >
            </form>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                        <th class="p-6 text-xs font-bold uppercase tracking-wider text-slate-500">Student Name</th>
                        <th class="p-6 text-xs font-bold uppercase tracking-wider text-slate-500">Plan Type</th>
                        <th class="p-6 text-xs font-bold uppercase tracking-wider text-slate-500">Payment Ref</th>
                        <th class="p-6 text-xs font-bold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="p-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($enrollees as $enrollee)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-serif font-bold">
                                        {{ substr($enrollee->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 dark:text-white">{{ $enrollee->name }}</div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1">
                                            <span>{{ $enrollee->email }}</span>
                                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                            <span>{{ $enrollee->phone }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-6">
                                @if($enrollee->plan_type === 'full')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-accent/50 text-accent-foreground border border-accent/20">
                                        <i data-lucide="crown" class="w-3 h-3"></i> Full Access
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        Free Trial
                                    </span>
                                @endif
                            </td>

                            <td class="p-6">
                                @if($enrollee->payment_reference)
                                    <code class="font-mono text-xs bg-slate-100 px-2 py-1 rounded text-slate-700 select-all">
                                        {{ $enrollee->payment_reference }}
                                    </code>
                                @else
                                    <span class="text-slate-400 text-xs italic">N/A</span>
                                @endif
                            </td>

                            <td class="p-6">
                                @if($enrollee->status === 'approved')
                                    <div class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                                        Active
                                    </div>
                                @elseif($enrollee->status === 'pending')
                                    <div class="inline-flex items-center gap-2 text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full animate-pulse">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
                                        Reviewing
                                    </div>
                                @else
                                    <div class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 bg-slate-50 px-3 py-1 rounded-full">
                                        Inactive
                                    </div>
                                @endif
                            </td>

                            <td class="p-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($enrollee->status === 'pending')
                                        {{-- 
                                            NOTE: We don't need to send 'email' here anymore.
                                            The controller finds the email using the ID in the route.
                                        --}}
                                        <form action="{{ route('enrollees.approve', $enrollee->id) }}" method="POST">
                                            @csrf 
                                            <button type="submit" title="Approve Student" class="p-2 bg-green-50 rounded-lg text-green-600 hover:bg-green-100 transition-colors transform active:scale-95">
                                                <i data-lucide="check-circle" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <button title="View Details" class="p-2 hover:bg-slate-100 rounded-lg text-slate-400 hover:text-primary transition-colors">
                                        <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <div class="bg-slate-50 p-4 rounded-full mb-3">
                                        <i data-lucide="users" class="w-8 h-8 opacity-50"></i>
                                    </div>
                                    <p class="font-bold text-slate-600">No enrollees yet</p>
                                    <p class="text-sm">New registrations will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t border-slate-100 dark:border-slate-800">
            {{$enrollees->links() }}
        </div>
    </div>

    {{-- SWEETALERT LOGIC --}}
    @if(session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Action Successful',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#1e3a8a',
                    timer: 4000,
                    timerProgressBar: true
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Action Failed',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#1e3a8a'
                });
            @endif
        });
    </script>
    @endif

    @if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'warning',
            title: 'Validation Error',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonColor: '#1e3a8a'
        });
    });
</script>
@endif

</x-layouts.app>