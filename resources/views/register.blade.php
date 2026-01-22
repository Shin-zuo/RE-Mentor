<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>Join RE-MENTOR | Register</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
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
            
            <div class="mb-8 max-w-xl mx-auto">
                <div class="flex items-center justify-between relative">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 -z-10 rounded-full"></div>
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-primary -z-10 rounded-full transition-all duration-500"
                         :style="'width: ' + progressWidth + '%'"></div>

                    <template x-for="(label, index) in ['Account', 'Payment', 'Review', 'Finish']">
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
                
                <form action="{{ route('register.store') }}" onsubmit="event.preventDefault();" class="h-full relative">
                    @csrf
                    
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
                            <input type="text" x-model="formData.phone" inputmode="numeric" placeholder="Contact Number" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-primary outline-none" maxlength="11"/>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="button" @click="nextStep()" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-primary-95 transition-all flex items-center gap-2">
                                <span x-text="plan === 'free' ? 'Review Details' : 'Proceed to Payment'"></span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="p-8 md:p-10 flex flex-col h-full">
                        <div class="flex items-center gap-3 mb-4">
                            <button type="button" @click="step = 1" class="p-2 hover:bg-slate-100 rounded-full transition-colors"><i data-lucide="arrow-left" class="w-5 h-5 text-slate-500"></i></button>
                            <h2 class="font-serif text-2xl font-bold text-slate-900">Scan to Pay</h2>
                        </div>

                        <div class="flex-1 flex flex-col items-center">
                            <div class="bg-blue-600 p-6 rounded-2xl shadow-xl w-full max-w-xs text-center text-white mb-6">
                                <div class="text-sm font-bold opacity-90 mb-4 tracking-wider uppercase">GCash Payment</div>
                                <div class="bg-white p-2 rounded-xl mb-4">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=09171234567" 
                                         class="w-full h-auto rounded-lg" alt="GCash QR">
                                </div>
                                <div class="flex justify-between items-center text-sm border-t border-blue-500 pt-3">
                                    <span class="opacity-80">Amount Due:</span>
                                    <span class="font-bold text-xl">₱4,000.00</span>
                                </div>
                            </div>

                            <div class="w-full max-w-xs space-y-4">
                                <div class="space-y-1">
                                    <label class="text-xs font-bold text-slate-500 uppercase ml-1">GCash Reference No.</label>
                                    <input type="text" x-model="formData.refNumber" 
                                           class="w-full px-4 py-3 rounded-lg border-2 border-slate-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-50 outline-none transition-all font-mono text-center text-lg placeholder:text-slate-300 placeholder:text-sm" 
                                           placeholder="e.g. 10023456789" maxlength="13">
                                </div>

                                <button type="button" @click="nextStep()" 
                                        :disabled="!formData.refNumber || formData.refNumber.length < 8"
                                        class="w-full bg-primary text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex justify-center items-center gap-2">
                                    Verify & Review <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div x-show="step === 3" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="p-8 md:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <button type="button" @click="step = (plan === 'free' ? 1 : 2)" class="p-2 hover:bg-slate-100 rounded-full transition-colors"><i data-lucide="arrow-left" class="w-5 h-5 text-slate-500"></i></button>
                            <h2 class="font-serif text-2xl font-bold text-slate-900">Review Registration</h2>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200">
                                <h3 class="text-xs font-bold text-slate-500 uppercase mb-3 tracking-wider">Plan Selected</h3>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="font-bold text-slate-900 text-lg" x-text="plan === 'free' ? 'Free Trial' : 'Full Access'"></div>
                                        <div class="text-sm text-slate-500" x-text="plan === 'free' ? '15 Days Access' : 'Valid for 2026 Season'"></div>
                                    </div>
                                    <div class="text-xl font-serif font-bold text-primary" x-text="plan === 'free' ? '₱0.00' : '₱4,000.00'"></div>
                                </div>
                            </div>

                            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
                                <p>@error('email') <span class="text-xs text-red-500 font-bold mb-4 block">{{ $message }} </span> @enderror</p>

                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Account Information</h3>
                                    <button @click="step = 1" class="text-xs font-bold text-primary hover:underline">Edit</button>
                                </div>
                                <div class="space-y-3 text-sm">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500"><i data-lucide="user" class="w-4 h-4"></i></div>
                                        <div>
                                            <div class="text-slate-500 text-xs">Full Name</div>
                                            <div class="font-medium text-slate-800" x-text="formData.name || '-'"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500"><i data-lucide="mail" class="w-4 h-4"></i></div>
                                        <div>
                                            <div class="text-slate-500 text-xs">Email Address</div>
                                            <div class="font-medium text-slate-800" x-text="formData.email || '-'"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500"><i data-lucide="phone" class="w-4 h-4"></i></div>
                                        <div>
                                            <div class="text-slate-500 text-xs">Phone Number</div>
                                            <div class="font-medium text-slate-800" x-text="formData.phone || '-'"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-show="plan === 'full'" class="bg-blue-50 rounded-2xl p-5 border border-blue-100">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-xs font-bold text-blue-800 uppercase tracking-wider">Payment Reference</h3>
                                    <button @click="step = 2" class="text-xs font-bold text-blue-600 hover:underline">Edit</button>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="receipt" class="w-5 h-5 text-blue-600"></i>
                                    <span class="font-mono font-bold text-lg text-blue-900" x-text="formData.refNumber"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="button" @click="nextStep()" class="w-full bg-primary text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                                Confirm & Submit Application
                            </button>
                            <p class="text-center text-xs text-slate-400 mt-4">By clicking confirm, you certify that the information provided is accurate.</p>
                        </div>
                    </div>

                    <div x-show="step === 4" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="p-10 text-center flex flex-col items-center justify-center h-full min-h-[400px]">
                        
                        <div x-show="plan === 'free'">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6 shadow-green-200 shadow-lg mx-auto">
                                <i data-lucide="check-check" class="w-10 h-10 text-green-600"></i>
                            </div>
                            <h2 class="font-serif text-3xl font-bold text-slate-900 mb-2">Registration Complete!</h2>
                            <p class="text-slate-500 mb-8">Your free trial has started. Check your email.</p>
                        </div>

                        <div x-show="plan === 'full'">
                            <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mb-6 shadow-amber-200 shadow-lg mx-auto animate-pulse-slow">
                                <i data-lucide="hourglass" class="w-10 h-10 text-amber-600"></i>
                            </div>
                            
                            <h2 class="font-serif text-3xl font-bold text-slate-900 mb-2">Submitted for Review</h2>
                            <p class="text-slate-500 max-w-sm mx-auto mb-8 text-lg">
                                We have received your application and payment reference.
                            </p>

                            <div class="bg-amber-50 p-6 rounded-2xl w-full max-w-sm border border-amber-200 mb-8 text-left flex gap-4">
                                <i data-lucide="info" class="w-6 h-6 text-amber-600 flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <h4 class="font-bold text-amber-900 text-sm mb-1">Validation in Progress</h4>
                                    <p class="text-xs text-amber-800 leading-relaxed">
                                        Please allow <strong>1 business day</strong> for us to verify your payment. Once confirmed, you will automatically receive the Google Classroom invite.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('landing') }}" class="text-slate-500 font-bold hover:text-primary transition-all">
                            Back to Home
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
            formData: { 
                name: '', 
                email: '', 
                phone: '',
                refNumber: '' 
            },
            
            get progressWidth() {
                return ((this.step - 1) / 3) * 100; 
            },

            nextStep() {
                // --- STEP 1: INITIAL VALIDATION ---
                if (this.step === 1) {
                    // We check if fields are empty BEFORE sending to server
                    if(!this.formData.name || !this.formData.email || !this.formData.phone) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Missing Details',
                            text: 'Please fill in all required fields to proceed.',
                            confirmButtonColor: '#1e3a8a'
                        });
                        return; // Stop here if invalid
                    }
                    // If valid, choose the next step based on Plan Type
                    this.step = (this.plan === 'free') ? 3 : 2;
                } 
                
                // --- STEP 2: PAYMENT (Full Access Only) ---
                else if (this.step === 2) {
                    this.step = 3;
                } 
                
                // --- STEP 3: SUBMIT TO SERVER ---
                else if (this.step === 3) {
                    const btn = document.activeElement;
                    const originalText = btn.innerText;

                    // 1. Show Loading State (Spinner)
                    btn.innerHTML = `<i data-lucide='loader-2' class='animate-spin w-5 h-5 inline'></i> Processing...`;
                    lucide.createIcons();
                    btn.disabled = true; // Prevent double-clicking

                    // 2. Prepare Data
                    let payload = {
                        name: this.formData.name,
                        email: this.formData.email,
                        phone: this.formData.phone,
                        plan_type: this.plan,
                        payment_reference: this.formData.refNumber
                    };

                    // 3. Send Request to Laravel
                    fetch("{{ route('register.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Security Token
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(async response => {
                        const data = await response.json();
                        
                        // 4. Handle SUCCESS
                        if (response.ok) {
                            this.step = 4; // Move to "Thank You" screen
                            this.$nextTick(() => lucide.createIcons());
                            
                            // Optional: Small popup toast
                            Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            }).fire({ icon: 'success', title: 'Registration Successful' });
                        } 
                        // 5. Handle ERROR (e.g., Email already taken)
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Registration Failed',
                                text: data.message || "Please check your inputs.",
                                confirmButtonColor: '#1e3a8a'
                            });
                            // Reset button
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }
                    })
                    .catch(error => {
                        // 6. Handle SYSTEM CRASH (Network error, etc.)
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'System Error',
                            text: 'Something went wrong. Please try again later.',
                            confirmButtonColor: '#1e3a8a'
                        });
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    });
                }
            }
        }
    }
</script>
</body>
</html>