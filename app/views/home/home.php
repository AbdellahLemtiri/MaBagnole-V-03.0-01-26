<!DOCTYPE html>
<html class="dark" lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>MaBagnole - Location de Prestige</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet" />
    
<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#2563EB", // Bleu Electrique (Nase3)
                    "primary-hover": "#1D4ED8", // Darker Blue
                    "dark-bg": "#020617", // Slate 950 (Deep Dark)
                },
                fontFamily: {
                    "display": ["Plus Jakarta Sans", "sans-serif"]
                },
                animation: {
                    'fade-in': 'fadeIn 1s ease-out forwards',
                    'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    'spin-slow': 'spin 3s linear infinite',
                },
                keyframes: {
                    fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                    slideUp: { 
                        '0%': { transform: 'translateY(30px)', opacity: '0' }, 
                        '100%': { transform: 'translateY(0)', opacity: '1' } 
                    }
                }
            },
        },
    }
</script>

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; transition: background-color 0.3s; }
    
    /* --- GLASSMORPHISM DYNAMIC (UPDATED) --- */
    
    /* Dark Mode Glass */
    .glass-nav {
        background: rgba(2, 6, 23, 0.5); /* K7el chwiya 9ase7 */
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(59, 130, 246, 0.2); /* Border Zre9 khfif */
        box-shadow: 0 4px 30px rgba(37, 99, 235, 0.1); /* Glow zre9 */
        transition: all 0.5s ease;
    }
    
    /* Light Mode Glass Override */
    html:not(.dark) .glass-nav {
        background: rgba(255, 255, 255, 0.7); 
        border: 1px solid rgba(37, 99, 235, 0.15); /* Border zre9 fate7 */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    html:not(.dark) .glass-nav .nav-text { color: #0f172a; } 
    html:not(.dark) .glass-nav .nav-icon { color: #0f172a; }

    /* Cards */
    .glass-card {
        background: rgba(15, 23, 42, 0.4);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(59, 130, 246, 0.15); /* Border Zre9 */
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
    }

  
    .text-gradient {
        background: linear-gradient(135deg, #FFFFFF 0%, #3B82F6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0.4)); /* Glow effect */
    }

    /* Scrollbar Customization (Bach tkoun consistent) */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #020617; }
    ::-webkit-scrollbar-thumb { 
        background: #2563EB; 
        border-radius: 10px; 
    }

    /* Delays */
    .delay-100 { animation-delay: 150ms; }
    .delay-200 { animation-delay: 300ms; }
    .delay-300 { animation-delay: 450ms; }
    .delay-500 { animation-delay: 600ms; }
</style>
</head>

<body class="bg-dark-bg text-white overflow-x-hidden selection:bg-primary selection:text-white">

<div class="fixed inset-0 z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-dark-bg/90 via-dark-bg/40 to-dark-bg z-10"></div>
    <div class="absolute inset-0 bg-black/30 z-10"></div>
    
    <div class="absolute inset-0 opacity-[0.04] z-10 pointer-events-none" style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');"></div>

    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover scale-105">
        <source src="public/assets/videos/carHome.mp4" type="video/mp4">

        </video>
</div>

<div class="relative z-10 min-h-screen flex flex-col justify-between">
    
    <header class="fixed top-6 left-1/2 -translate-x-1/2 w-[92%] max-w-[1200px] z-50 glass-nav rounded-full px-5 py-3 flex items-center justify-between animate-fade-in shadow-2xl">
        
<a href="home" class="flex items-center ">
    <div class="w-16 h-16 rounded-full bg-primary/50 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">
        
        <img src="public/assets/images/logo/logoMaBangole.png" 
             alt="MaBagnole Logo" 
             class="w-full h-full object-cover drop-shadow-sm relative z-10">
    </div>
</a>

        <div class="flex items-center gap-4">
            
            <button id="theme-toggle" class="w-9 h-9 rounded-full bg-white/10 dark:bg-white/5 flex items-center justify-center nav-icon text-white hover:bg-white/20 transition-all focus:outline-none focus:ring-2 focus:ring-primary/50">
                <span class="material-symbols-rounded text-xl transition-transform duration-500" id="theme-icon-el">light_mode</span>
            </button>

            <div class="h-5 w-px bg-white/20 nav-icon"></div>

            <a href="auth?tab=login" class="hidden sm:block text-xs font-bold nav-text text-white/90 hover:text-primary transition-colors">
                Connexion
            </a>
            
            <a href="auth?tab=register" class="px-6 py-2.5 bg-white dark:bg-primary text-slate-900 dark:text-white hover:bg-slate-100 dark:hover:bg-primary-hover rounded-full text-xs font-bold transition-all shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:-translate-y-0.5">
                Inscription
            </a>
        </div>
    </header>

    <main class="flex-1 flex flex-col items-center justify-center px-6 pt-32 pb-12 text-center">
        <div class="max-w-4xl mx-auto flex flex-col items-center">
            
            <div class="mb-6 px-5 py-1.5 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-[10px] font-bold text-indigo-300 uppercase tracking-[0.2em] animate-slide-up opacity-0 shadow-sm ring-1 ring-white/5">
                Excellence & Prestige
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-5xl font-extrabold leading-tight tracking-tight mb-6 text-white animate-slide-up opacity-0 delay-100 drop-shadow-2xl">
                Conduisez l'exception <br/>
                <span class="text-gradient">Au Quotidien.</span>
            </h1>

            <p class="text-slate-300 text-sm md:text-lg max-w-lg leading-relaxed mb-10 animate-slide-up opacity-0 delay-200 font-medium drop-shadow-md">
                Une sélection exclusive de véhicules de luxe disponibles 24/7. 
                L'élégance n'attend pas.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 animate-slide-up opacity-0 delay-300 w-full sm:w-auto">
                <a href="auth?tab=login" class="group flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-primary hover:bg-primary-hover text-white text-sm font-bold transition-all shadow-[0_4px_30px_rgba(99,102,241,0.5)] hover:shadow-[0_6px_40px_rgba(99,102,241,0.7)] hover:-translate-y-1">
                    <span class="material-symbols-rounded text-lg">calendar_today</span>
                    Réserver maintenant
                </a>
                
                <a href="auth?tab=login" class="flex items-center justify-center gap-2 px-8 py-4 rounded-xl glass-card border border-white/10 text-white text-sm font-bold hover:bg-white/10 transition-all hover:-translate-y-1">
                    <span>Voir le catalogue</span>
                    <span class="material-symbols-rounded text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>

        </div>
    </main>

    <div class="w-full max-w-5xl mx-auto mb-10 px-4 animate-slide-up opacity-0 delay-500">
        <div class="glass-card rounded-2xl p-6 md:p-8 grid grid-cols-2 md:grid-cols-4 gap-8 items-center border border-white/5 bg-black/20">
            
            <div class="text-center md:text-left border-r border-white/10 last:border-0 md:pl-4">
                <p class="text-white text-3xl font-bold font-display">+26</p>
                <p class="text-indigo-200 text-[10px] font-bold uppercase tracking-wider mt-1">Véhicules</p>
            </div>

            <div class="text-center md:text-left border-r border-white/10 last:border-0 md:pl-4">
                <p class="text-white text-3xl font-bold font-display">24/7</p>
                <p class="text-indigo-200 text-[10px] font-bold uppercase tracking-wider mt-1">Assistance</p>
            </div>

            <div class="text-center md:text-left border-r border-white/10 last:border-0 md:pl-4">
                <p class="text-white text-3xl font-bold font-display">VIP</p>
                <p class="text-indigo-200 text-[10px] font-bold uppercase tracking-wider mt-1">Service</p>
            </div>

            <div class="text-center md:text-left md:pl-4">
                <p class="text-white text-3xl font-bold font-display">+22</p>
                <p class="text-indigo-200 text-[10px] font-bold uppercase tracking-wider mt-1">Clients</p>
            </div>

        </div>
    </div>

    <footer class="w-full py-6 text-center border-t border-white/5 bg-dark-bg/80 backdrop-blur-md relative z-10">
        <p class="text-sm text-text-muted">Ma Bagnole by lemtiri . Fait avec passion pour le code 12/2025  .</p>
                                               <!-- 31-12-2025 -->
    </footer>

</div>

<script>
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon-el');
    const htmlElement = document.documentElement;

    // 1. Check Local Storage on Load
    function applyTheme() {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
            themeIcon.textContent = 'light_mode'; 
        } else {
            htmlElement.classList.remove('dark');
            themeIcon.textContent = 'dark_mode'; 
        }
    }
    applyTheme();

    // 2. Click Event
    themeToggleBtn.addEventListener('click', () => {
        // Animation rotation
        themeIcon.style.transform = "rotate(180deg) scale(0.5)";
        themeIcon.style.opacity = "0";

        setTimeout(() => {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.theme = 'light';
                themeIcon.textContent = 'dark_mode';
            } else {
                htmlElement.classList.add('dark');
                localStorage.theme = 'dark';
                themeIcon.textContent = 'light_mode';
            }
            // Reset Animation
            themeIcon.style.transform = "rotate(0deg) scale(1)";
            themeIcon.style.opacity = "1";
        }, 200);
    });
</script>

</body>
</html>