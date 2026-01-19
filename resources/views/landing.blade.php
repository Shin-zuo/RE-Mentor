<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>RE-MENTOR.PH | Master the Real Estate Board Exam</title>

    <link rel="icon" href="{{ asset('storage/logo/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-900 bg-slate-50 selection:bg-accent selection:text-accent-foreground">

    <nav class="sticky top-0 z-50 w-full glass-card border-b border-slate-200/50 bg-white/80 backdrop-blur-md">
        <div class="container mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-2.5">
                <div class="bg-primary p-2 rounded-xl shadow-lg shadow-primary/20">
                    <i data-lucide="graduation-cap" class="text-white h-6 w-6"></i>
                </div>
                <div class="font-serif font-bold text-2xl text-primary tracking-tight">RE-MENTOR</div>
            </div>
            
            <div class="hidden md:flex gap-10 items-center text-sm font-semibold text-slate-600">
                <a href="#how-it-works" class="hover:text-primary transition-colors">How it Works</a>
                <a href="#features" class="hover:text-primary transition-colors">Features</a>
                <a href="#pricing" class="hover:text-primary transition-colors">Pricing</a>
                <a href="{{ route('register') }}" class="bg-primary text-white px-6 py-2.5 rounded-full hover:bg-primary-95 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">Join Now</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="relative bg-primary overflow-hidden min-h-[85vh] flex items-center pt-20 pb-32">
            <div class="absolute inset-0 z-0">
                <img 
                    src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=1920&auto=format&fit=crop" 
                    alt="Studying for exam" 
                    class="w-full h-full object-cover opacity-20 mix-blend-luminosity"
                />
                <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/95 to-primary/80"></div>
            </div>
            
            <div class="container mx-auto px-6 relative z-20">
                <div class="max-w-4xl">
                    <div class="inline-flex items-center gap-2 bg-white/10 text-accent font-bold px-4 py-2 rounded-full mb-8 border border-white/10 backdrop-blur-sm animate-fade-in-up">
                        <i data-lucide="sparkles" class="h-4 w-4"></i>
                        <span class="text-xs uppercase tracking-widest">Enrollment Open for 2026 Boards</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-8 leading-[1.1] drop-shadow-sm">
                        Pass Your Real Estate Board Exam <br>
                        <span class="text-accent italic relative">
                            Guaranteed.
                            <svg class="absolute w-full h-3 -bottom-1 left-0 text-accent opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                            </svg>
                        </span>
                    </h1>
                    
                    <p class="text-xl text-white/80 mb-12 font-light max-w-2xl leading-relaxed">
                        The only AI-powered review platform designed specifically for the PRC Real Estate Licensure Exam. Get organized review materials delivered via Google Classroom.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-5 items-start">
                        <a href="#pricing" class="group inline-flex items-center justify-center rounded-full text-lg font-bold transition-all bg-accent text-accent-foreground hover:bg-white hover:scale-105 h-16 px-10 shadow-xl shadow-accent/20">
                            Enroll Today
                            <i data-lucide="arrow-right" class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        
                        <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col justify-center h-16">
                            <div class="flex gap-1 text-accent mb-1">
                                <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                            </div>
                            <p class="text-white text-sm font-medium">Trusted by 500+ Top Notchers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="bg-white border-b border-slate-100">
            <div class="container mx-auto px-6 py-10">
                <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-[0.2em] mb-8">Focused on PRC Standards</p>
                <div class="flex flex-wrap justify-center gap-8 md:gap-20 opacity-40 grayscale hover:grayscale-0 transition-all duration-500">
                    <span class="font-serif font-black text-2xl text-slate-800">BS REM</span>
                    <span class="font-serif font-black text-2xl text-slate-800">RESAM</span>
                    <span class="font-serif font-black text-2xl text-slate-800">REBAP</span>
                    <span class="font-serif font-black text-2xl text-slate-800">PHILRES</span>
                </div>
            </div>
        </div>

        <section id="how-it-works" class="py-24 bg-slate-50 relative overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col lg:flex-row gap-20 items-center">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-serif font-bold text-primary mb-8">Simple 3-Step Review Process</h2>
                        <div class="space-y-10">
                            <div class="flex gap-6 group">
                                <div class="flex-shrink-0 h-14 w-14 bg-white border-2 border-primary text-primary rounded-2xl flex items-center justify-center font-bold text-xl shadow-sm group-hover:bg-primary group-hover:text-white transition-colors duration-300">1</div>
                                <div>
                                    <h4 class="font-bold text-xl text-slate-900 mb-2">Instant Enrollment</h4>
                                    <p class="text-slate-600 leading-relaxed">Choose your plan and pay securely. You'll get an automated invitation to our premium Google Classroom immediately.</p>
                                </div>
                            </div>
                            <div class="flex gap-6 group">
                                <div class="flex-shrink-0 h-14 w-14 bg-white border-2 border-primary text-primary rounded-2xl flex items-center justify-center font-bold text-xl shadow-sm group-hover:bg-primary group-hover:text-white transition-colors duration-300">2</div>
                                <div>
                                    <h4 class="font-bold text-xl text-slate-900 mb-2">Organized Learning Modules</h4>
                                    <p class="text-slate-600 leading-relaxed">Access BS REM curriculum-aligned lessons, categorized and easy to track inside your familiar Classroom environment.</p>
                                </div>
                            </div>
                            <div class="flex gap-6 group">
                                <div class="flex-shrink-0 h-14 w-14 bg-white border-2 border-primary text-primary rounded-2xl flex items-center justify-center font-bold text-xl shadow-sm group-hover:bg-primary group-hover:text-white transition-colors duration-300">3</div>
                                <div>
                                    <h4 class="font-bold text-xl text-slate-900 mb-2">Timed Board Exam Simulations</h4>
                                    <p class="text-slate-600 leading-relaxed">Take review exams that mimic the pressure of the PRC board. Get instant feedback and AI-generated explanations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:w-1/2 relative">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-accent to-primary rounded-[2rem] opacity-20 rotate-3 blur-lg"></div>
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800&auto=format&fit=crop" 
                             class="relative rounded-[1.5rem] shadow-2xl border-8 border-white transform hover:-rotate-1 transition-transform duration-500" 
                             alt="App interface">
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="py-24 bg-white relative">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-4xl font-serif font-bold text-primary mb-6">Why Review With RE-MENTOR?</h2>
                    <p class="text-slate-600 text-lg">We combine traditional review methods with cutting-edge technology to ensure you retain information faster and smarter.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="brain-circuit" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">AI-Powered Explanations</h3>
                        <p class="text-slate-600 leading-relaxed">Don't just know the answer, understand the 'why'. Our AI explains complex property laws in simple terms instantly.</p>
                    </div>

                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="bar-chart-3" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Performance Analytics</h3>
                        <p class="text-slate-600 leading-relaxed">Identify your weak spots. Our dashboard tracks your progress in different subjects like Appraisal, Ethics, and Law.</p>
                    </div>

                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="smartphone" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Mobile Optimized</h3>
                        <p class="text-slate-600 leading-relaxed">Review on the go. Whether you are on the train or at a coffee shop, your review materials are accessible on any device.</p>
                    </div>

                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="file-check" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">PRC-Aligned Mock Exams</h3>
                        <p class="text-slate-600 leading-relaxed">Our question bank is constantly updated to reflect the latest trends and difficulty levels of the actual board exam.</p>
                    </div>

                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Community Support</h3>
                        <p class="text-slate-600 leading-relaxed">Join discussion boards with fellow reviewees. Share tips, ask questions, and motivate each other to pass.</p>
                    </div>

                    <div class="group p-8 rounded-3xl border border-slate-100 bg-white hover:border-primary/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary/5 rounded-2xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Structured Learning Path</h3>
                        <p class="text-slate-600 leading-relaxed">No more scattered files. Access a complete, organized syllabus directly inside your exclusive Google Classroom.</p>
                    </div>
                </div>
            </div>
        </section>

       <section id="pricing" class="py-24 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-4xl font-serif font-bold text-primary mb-6">Investment in Your Career</h2>
                    <p class="text-slate-500 max-w-xl mx-auto text-lg">Affordable, high-quality review. No hidden fees. Just one semestral payment for full board exam preparation.</p>
                </div>
                
                <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8 items-stretch">
                    
                    <div class="flex flex-col p-10 rounded-3xl border border-slate-200 bg-white hover:shadow-xl hover:border-primary/30 transition-all duration-300">
                        <h3 class="text-2xl font-bold mb-2 text-slate-900">Basic Access</h3>
                        <div class="text-5xl font-black mb-8 text-slate-900">FREE <span class="text-lg text-slate-400 font-normal tracking-normal">/ 15 Days</span></div>
                        <ul class="space-y-4 mb-10 flex-1"> <li class="flex items-center gap-3 text-slate-700"><i data-lucide="check" class="h-5 w-5 text-green-500 flex-shrink-0"></i> Sample Quiz Sets</li>
                            <li class="flex items-center gap-3 text-slate-700"><i data-lucide="check" class="h-5 w-5 text-green-500 flex-shrink-0"></i> Limited Classroom View</li>
                            <li class="flex items-center gap-3 text-slate-400"><i data-lucide="x" class="h-5 w-5 flex-shrink-0"></i> No AI Tutor Explanations</li>
                            <li class="flex items-center gap-3 text-slate-400"><i data-lucide="x" class="h-5 w-5 flex-shrink-0"></i> No Final Pre-Board Exam</li>
                        </ul>
                        <a href="{{ route('register') }}" class="w-full py-4 rounded-xl font-bold border-2 border-primary text-center text-primary hover:bg-primary hover:text-white transition-colors">Start Free Trial</a>
                    </div>

                    <div class="relative flex flex-col p-10 rounded-3xl bg-primary text-white shadow-2xl shadow-primary/30">
                        <div class="absolute -top-5 inset-x-0 flex justify-center">
                            <span class="bg-accent text-accent-foreground px-6 py-2 rounded-full text-xs font-black uppercase tracking-wider shadow-md">Most Popular</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Full PRC Review</h3>
                        <div class="text-5xl font-black mb-8">₱4,000</div>
                        <ul class="space-y-4 mb-10 flex-1"> <li class="flex items-center gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 text-accent flex-shrink-0"></i> Full Google Classroom Access</li>
                            <li class="flex items-center gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 text-accent flex-shrink-0"></i> Unlimited AI-Powered Explanations</li>
                            <li class="flex items-center gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 text-accent flex-shrink-0"></i> Timed Pre-Board Simulations</li>
                            <li class="flex items-center gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 text-accent flex-shrink-0"></i> Comprehensive Exam Modules</li>
                        </ul>
                        <a href="{{ route('register') }}"
                           class="w-full py-4 rounded-xl font-bold bg-accent text-accent-foreground hover:bg-white hover:scale-[1.02] transition-all shadow-lg text-center block">
                           Get Full Access Now
                        </a>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-primary relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-accent/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>

            <div class="container mx-auto px-6 relative z-10 text-center">
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-6">Ready to Top the Board Exam?</h2>
                <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">Don't leave your PRC results to chance. Join the hundreds of students currently reviewing with the mentor that never sleeps.</p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="bg-accent text-accent-foreground px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:scale-105 shadow-xl shadow-black/10 transition-all duration-300 flex items-center justify-center">
                        Create Free Account
                        <i data-lucide="chevron-right" class="ml-2 w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
        <div class="container mx-auto px-6 text-center">
            <div class="font-serif font-bold text-2xl text-white mb-6">RE-MENTOR</div>
            <p class="text-sm mb-6">© 2026 Real Estate Mentor. Not affiliated with the Professional Regulation Commission (PRC).</p>
            <div class="flex justify-center gap-6 text-sm font-medium">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Contact Support</a>
            </div>
        </div>
    </footer>

    <script>
      lucide.createIcons();
    </script>
</body>
</html>