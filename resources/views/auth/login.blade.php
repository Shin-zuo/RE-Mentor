<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | RE-MENTOR</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-900 bg-slate-50 min-h-screen flex flex-col relative overflow-hidden">

    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-3xl -z-10 translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/10 rounded-full blur-3xl -z-10 -translate-x-1/2 translate-y-1/2"></div>

    <nav class="absolute top-0 w-full p-6 flex justify-between items-center z-10">
        <a href="{{ route('landing') }}" class="flex items-center gap-2 group">
            <div class="bg-primary p-1.5 rounded-lg group-hover:bg-primary-95 transition-colors">
                <i data-lucide="graduation-cap" class="text-white h-5 w-5"></i>
            </div>
            <span class="font-serif font-bold text-xl text-primary tracking-tight">RE-MENTOR</span>
        </a>
    </nav>

    <main class="flex-1 flex items-center justify-center p-4">
        
        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden relative">
            
            <div class="h-2 w-full bg-gradient-to-r from-primary to-blue-600"></div>

            <div class="p-8 md:p-10">
                <div class="text-center mb-10">
                    <h1 class="font-serif text-3xl font-bold text-slate-900 mb-2">Welcome Back</h1>
                    <p class="text-slate-500 text-sm">Sign in to access the admin dashboard</p>
                </div>

                <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-5" x-data="{ showPassword: false }">
                    @csrf

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="h-5 w-5 text-slate-400 group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input type="email" name="email" required 
                                   class="block w-full pl-10 pr-3 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all placeholder:text-slate-300 font-medium" 
                                   placeholder="admin@re-mentor.ph">
                        </div>
                        @error('email')
            <p class="text-xs text-red-500 font-bold mt-1">{{ $message }}</p>
        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Password</label>
                            <a href="#" class="text-xs font-medium text-primary hover:text-accent transition-colors">Forgot password?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="h-5 w-5 text-slate-400 group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'" name="password" required 
                                   class="block w-full pl-10 pr-10 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all placeholder:text-slate-300 font-medium" 
                                   placeholder="••••••••">
                            
                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 cursor-pointer">
                                <i x-show="!showPassword" data-lucide="eye" class="h-5 w-5"></i>
                                <i x-show="showPassword" data-lucide="eye-off" class="h-5 w-5" style="display: none;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-bold shadow-lg shadow-primary/30 hover:bg-primary-95 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                            Sign In
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="absolute bottom-6 text-xs text-slate-400 font-medium">
            &copy; 2026 RE-MENTOR Admin Portal
        </div>

    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>