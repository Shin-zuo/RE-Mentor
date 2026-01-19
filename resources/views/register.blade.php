<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>Join RE-MENTOR | QR Payment</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], serif: ['Libre Baskerville', 'serif'] },
                    colors: {
                        primary: '#1e3a8a', 
                        'primary-95': '#172554',
                        accent: '#eab308', 
                        'accent-foreground': '#422006',
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .qr-scanner-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background: #ef4444;
            box-shadow: 0 0 4px #ef4444;
            animation: scan 2s linear infinite;
        }
        @keyframes scan {
            0% { top: 0; opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-900 bg-slate-50 min-h-screen flex flex-col">

    <nav class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="bg-primary p-1.5 rounded-lg">
                    <i data-lucide="graduation-cap" class="text-white h-5 w-5"></i>
                </div>
                <span class="font-serif font-bold text-xl text-primary">RE-MENTOR</span>
            </div>
            <a href="{{ route('landing') }}" class="text-sm font-medium text-slate-500 hover:text-primary">Cancel</a>
        </div>
    </nav>

    <main class="flex-1 flex items-center justify-center py-10 px-4 relative overflow-hidden" 
          x-data="registrationWizard()">
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -z-10 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary/10 rounded-full blur-3xl -z-10 -translate-x-1/2 translate-y-1/2"></div>

        <div class="w-full max-w-2xl">
            
            <div class="mb-8 max-w-lg mx-auto">
                <div class="flex items-center justify-between relative">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 -z-10 rounded-full"></div>
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-primary -z-10 rounded-full transition-all duration-500"
                         :style="'width: ' + progressWidth + '%'"></div>

                    <template x-for="(label, index) in ['Account', 'Payment', 'Scan QR', 'Done']">
                        <div class="flex flex-col items-center gap-2 bg-slate-50 px-2 z-10">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs border-2 transition-all duration-300"
                                 :class="(step > index + 1) ? 'bg-primary border-primary text-white' : (step === index + 1 ? 'border-primary text-primary bg-white' : 'border-slate-300 text-slate-300 bg-white')">
                                <span x-show="step <= index + 1" x-text="index + 1"></span>
                                <i x-show="step > index + 1" data-lucide="check" class="h-3 w-3"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider transition-colors" 
                                  :class="step >= index + 1 ? 'text-primary' : 'text-slate-300'" x-text="label"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden relative min-h-[550px]">
                
                <form action="#" onsubmit="event.preventDefault();" class="h-full relative">
                    
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="p-8 md:p-10">
                        <h2 class="font-serif text-2xl font-bold text-slate-900 mb-6">Create your account</h2>
                        
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="plan" value="free" x-model="plan" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-200 peer-checked:border-primary peer-checked:bg-slate-50 hover:border-primary/40 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="font-bold text-slate-700 peer-checked:text-primary mb-1">Free Trial</div>
                                    <div class="text-xs text-slate-500">15 Days</div>
                                </div>
                            </label>
                            
                            <label class="cursor-pointer group relative">
                                <input type="radio" name="plan" value="full" x-model="plan" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-200 peer-checked:border-accent peer-checked:bg-accent/5 hover:border-accent/40 transition-all text-center h-full flex flex-col justify-center">
                                    <div class="font-bold text-slate-700 peer-checked:text-slate-900 mb-1">Full Access</div>
                                    <div class="text-xs text-slate-500">₱4,000</div>
                                </div>
                                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-accent text-accent-foreground text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">BEST</div>
                            </label>
                        </div>

                        <div class="space-y-4">
                            <input type="text" x-model="formData.name" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-primary outline-none" placeholder="Full Name">
                            <input type="email" x-model="formData.email" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-primary outline-none" placeholder="Google Email Address">
                            <input type="text" inputmode="numeric" placeholder="Contact Number" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-primary outline-none" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11"/>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="button" @click="nextStep()" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-primary-95 transition-all flex items-center gap-2">
                                <span x-text="plan === 'free' ? 'Register Now' : 'Select Payment'"></span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="p-8 md:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <button type="button" @click="step = 1" class="p-2 hover:bg-slate-100 rounded-full transition-colors"><i data-lucide="arrow-left" class="w-5 h-5 text-slate-500"></i></button>
                            <h2 class="font-serif text-2xl font-bold text-slate-900">Choose Provider</h2>
                        </div>

                        <p class="text-slate-500 mb-6">Select how you want to pay the ₱4,000 fee.</p>

                        <div class="space-y-3 mb-8">
                            <label class="flex items-center justify-between p-4 rounded-xl border-2 cursor-pointer transition-all"
                                   :class="paymentMethod === 'gcash' ? 'border-blue-500 bg-blue-50' : 'border-slate-200 hover:border-slate-300'">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment" value="gcash" x-model="paymentMethod" class="w-4 h-4 text-blue-600">
                                    <span class="font-bold text-slate-700">GCash</span>
                                </div>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/52/GCash_logo.svg" class="h-6 w-auto object-contain">
                            </label>

                            <label class="flex items-center justify-between p-4 rounded-xl border-2 cursor-pointer transition-all"
                                   :class="paymentMethod === 'maya' ? 'border-green-500 bg-green-50' : 'border-slate-200 hover:border-slate-300'">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment" value="maya" x-model="paymentMethod" class="w-4 h-4 text-green-600">
                                    <span class="font-bold text-slate-700">Maya</span>
                                </div>
                                <span class="font-black text-green-600 italic tracking-tighter">maya</span>
                            </label>

                             <label class="flex items-center justify-between p-4 rounded-xl border-2 cursor-pointer transition-all"
                                    :class="paymentMethod === 'qrph' ? 'border-indigo-500 bg-indigo-50' : 'border-slate-200 hover:border-slate-300'">
                                 <div class="flex items-center gap-3">
                                     <input type="radio" name="payment" value="qrph" x-model="paymentMethod" class="w-4 h-4 text-indigo-600">
                                     <span class="font-bold text-slate-700">QR Ph</span>
                                 </div>
                                 <i data-lucide="qr-code" class="h-6 w-6 text-indigo-600"></i>
                             </label>
                        </div>

                        <button type="button" @click="nextStep()" class="w-full bg-slate-900 text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
                            <i data-lucide="qr-code" class="w-4 h-4"></i>
                            Generate QR Code
                        </button>
                    </div>

                    <div x-show="step === 3" x-cloak class="p-8 md:p-10 flex flex-col items-center justify-center h-full">
                        <h2 class="font-serif text-xl font-bold text-slate-900 mb-2">Scan to Pay</h2>
                        <div class="text-sm text-slate-500 mb-6 flex items-center gap-2">
                            Amount to pay: <span class="font-bold text-slate-900 bg-slate-100 px-2 py-0.5 rounded">₱4,000.00</span>
                        </div>

                        <div class="relative bg-white p-4 rounded-2xl border-2 border-slate-200 shadow-inner mb-6 group">
                            <img :src="`https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PAY-REMENTOR-${paymentMethod}-4000`" 
                                 class="w-48 h-48 mix-blend-multiply opacity-90" alt="QR Code">
                            
                            <div class="absolute inset-4 overflow-hidden rounded-lg pointer-events-none">
                                <div class="qr-scanner-line"></div>
                            </div>

                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="bg-white p-2 rounded-full shadow-md">
                                    <i x-show="paymentMethod === 'qrph'" data-lucide="qr-code" class="w-6 h-6 text-slate-900"></i>
                                    <span x-show="paymentMethod === 'gcash'" class="text-xs font-bold text-blue-600">GCASH</span>
                                    <span x-show="paymentMethod === 'maya'" class="text-xs font-bold text-green-600">MAYA</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center space-y-3">
                            <div class="flex items-center gap-2 text-primary font-medium animate-pulse">
                                <i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i>
                                <span>Waiting for confirmation...</span>
                            </div>
                            <p class="text-xs text-slate-400 text-center max-w-xs">
                                Please do not close this window. We will automatically detect your payment once completed.
                            </p>
                        </div>

                        <button @click="step = 2" class="mt-8 text-xs text-slate-400 hover:text-red-500 underline">
                            Cancel Transaction
                        </button>
                    </div>

                    <div x-show="step === 4" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="p-10 text-center flex flex-col items-center justify-center h-full min-h-[400px]">
                        
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6 shadow-green-200 shadow-lg">
                            <i data-lucide="check-check" class="w-10 h-10 text-green-600"></i>
                        </div>
                        
                        <h2 class="font-serif text-3xl font-bold text-slate-900 mb-2">Payment Received!</h2>
                        <p class="text-slate-500 max-w-sm mx-auto mb-8">
                            Thank you, <span x-text="formData.name" class="font-bold"></span>. <br>
                            We have verified your transaction.
                        </p>

                        <div class="bg-white p-6 rounded-2xl w-full max-w-sm border border-slate-200 shadow-lg mb-8 relative overflow-hidden group hover:border-primary/50 transition-colors">
                            <div class="absolute top-0 left-0 w-1.5 h-full bg-green-500"></div>
                            <div class="flex items-center gap-4 text-left">
                                <div class="bg-slate-100 p-3 rounded-lg group-hover:bg-primary/10 transition-colors">
                                    <i data-lucide="graduation-cap" class="text-primary h-6 w-6"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Review Access Granted</div>
                                    <div class="text-xs text-slate-500 mt-1">
                                        Invitation sent to <span x-text="formData.email" class="font-medium text-slate-700"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('landing') }}" class="bg-slate-900 text-white px-8 py-3 rounded-full font-bold hover:bg-primary hover:shadow-lg transition-all">
                            Go to Home
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();

        function registrationWizard() {
            return {
                step: 1,
                plan: 'full',
                paymentMethod: 'gcash',
                formData: { name: '', email: '' },
                
                get progressWidth() {
                    return ((this.step - 1) / 3) * 100;
                },

                nextStep() {
                    if (this.step === 1) {
                        // Skip to Success if Free Trial
                        if (this.plan === 'free') {
                            this.step = 4;
                        } else {
                            this.step = 2;
                        }
                    } else if (this.step === 2) {
                        // Move to QR Wall
                        this.step = 3;
                        
                        // SIMULATE POLLING
                        // In real life, you use setInterval to check /api/check-payment/{id}
                        setTimeout(() => {
                            // Pretend user scanned and paid
                            this.step = 4;
                            // Re-init icons for the new step
                            this.$nextTick(() => lucide.createIcons());
                        }, 5000); // Wait 5 seconds
                    }
                }
            }
        }
    </script>
</body>
</html>