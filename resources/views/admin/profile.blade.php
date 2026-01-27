<x-layouts.app title="Profile Settings">

    <div class="max-w-4xl mx-auto space-y-8">
        
        <div>
            <h2 class="text-2xl font-serif font-bold text-slate-900 dark:text-white">Account Settings</h2>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Manage your profile information and account security.</p>
        </div>

        @if (session('success'))
            <div class="p-4 rounded-xl bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 flex items-center gap-3">
                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
                <span class="text-sm font-medium text-green-700 dark:text-green-300">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
                <div class="flex items-center gap-3 mb-2">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 dark:text-red-400"></i>
                    <span class="text-sm font-bold text-red-700 dark:text-red-300">There were some problems with your input.</span>
                </div>
                <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400 ml-8">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="flex flex-col md:flex-row gap-8">
                    
                    <div x-data="photoPreview()" class="flex flex-col items-center gap-4">
                        
                        <div class="relative group cursor-pointer" @click="document.getElementById('photoInput').click()">
                            
                            <div class="h-28 w-28 rounded-full overflow-hidden border-4 border-slate-50 dark:border-slate-800 shadow-lg relative">
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="h-full w-full object-cover">
                                </template>

                                <template x-if="!photoPreview && '{{ auth()->user()->avatar }}'">
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="h-full w-full object-cover">
                                </template>

                                <template x-if="!photoPreview && !'{{ auth()->user()->avatar }}'">
                                    <div class="h-full w-full bg-blue-600 flex items-center justify-center text-white font-serif font-bold text-3xl">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                </template>
                                
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i data-lucide="camera" class="text-white w-8 h-8"></i>
                                </div>
                            </div>

                            <div class="absolute bottom-1 right-1 bg-white dark:bg-slate-700 p-2 rounded-full shadow-md text-slate-500 dark:text-slate-300">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </div>
                        </div>

                        <input type="file" 
                               id="photoInput" 
                               name="avatar"
                               class="hidden" 
                               accept="image/*"
                               @change="updatePreview($event)">

                        <div class="text-center">
                            <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Allowed *.jpeg, *.jpg, *.png, *.gif</p>
                            <p class="text-xs text-slate-400">Max 2MB</p>
                        </div>
                    </div>

                    <div class="flex-1 space-y-6 w-full">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Profile Information</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Update your account's profile information and email address.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i data-lucide="user" class="h-5 w-5 text-slate-400"></i>
                                    </div>
                                    <input type="text" 
                                           name="name"
                                           value="{{ auth()->user()->name }}" 
                                           class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i data-lucide="mail" class="h-5 w-5 text-slate-400"></i>
                                    </div>
                                    <input type="email" 
                                           name="email"
                                           value="{{ auth()->user()->email }}" 
                                           class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl transition-colors shadow-lg shadow-blue-600/20 flex items-center gap-2">
                                <i data-lucide="save" class="w-4 h-4"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm">
            <div class="flex items-start gap-6">
                <div class="hidden sm:flex h-14 w-14 rounded-2xl bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 items-center justify-center shrink-0">
                    <i data-lucide="lock" class="w-7 h-7"></i>
                </div>

                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Update Password</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Ensure your account is using a long, random password to stay secure.</p>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6 max-w-2xl">
                        @csrf
                        @method('put')
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Current Password</label>
                            <input type="password" 
                                   name="current_password"
                                   class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm"
                                   placeholder="••••••••">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">New Password</label>
                                <input type="password" 
                                       name="password"
                                       class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm"
                                       placeholder="••••••••">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Confirm Password</label>
                                <input type="password" 
                                       name="password_confirmation"
                                       class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm"
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white text-sm font-medium rounded-xl transition-colors shadow-lg shadow-slate-900/10 flex items-center gap-2">
                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('photoPreview', () => ({
                photoPreview: null,
                updatePreview(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.photoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }));
        });
    </script>
    @endpush

</x-layouts.app>