<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Blog Auto Moderne</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4F46E5",
                        "primary-dark": "#4338CA",
                        "background-light": "#F8FAFC",
                        "background-dark": "#0F172A",
                        "card-light": "#ffffff",
                        "card-dark": "#1E293B",
                        "text-main": "#0F172A",
                        "text-muted": "#64748B"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(10px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        }
                    },
                    backgroundImage: {
                        'story-gradient': 'linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%)',
                    }
                },
            },
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
            /* For horizontal scroll */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }

        /* Hide scrollbar for stories but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Smooth Loading */
        .animate-enter {
            animation: slideUp 0.4s ease-out forwards;
        }

        /* Cache la barre de scroll mais garde la fonctionnalité */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body style="width: 100%;" class="relative flex min-h-screen w-full flex-col bg-background-light dark:bg-background-dark overflow-x-hidden text-text-main dark:text-white font-display transition-colors duration-300">

    <header class="fixed w-full top-0 z-50 bg-white/80 dark:bg-card-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="index.php?action=carList" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-primary-dark text-white flex items-center justify-center shadow-lg group-hover:shadow-primary/50 transition-all duration-300">
                        <span class="material-symbols-rounded text-2xl">directions_car</span>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">Ma Bagnole</h2>
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href="index.php?action=carList" class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors" >Véhicules</a>
                    <a class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors" href="index.php?action=reservationUser">Mes Réservations</a>
                    <a class="text-sm font-bold text-primary" href="index.php?action=ArticleUser">Blog</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors ring-1 ring-gray-200 dark:ring-gray-700">
                    <span class="material-symbols-rounded dark:hidden">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block">light_mode</span>
                </button>

                <div class="flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-gray-700">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold leading-none dark:text-gray-200"><?= $_SESSION['nom'] ?? 'Client' ?></p>
                        <a href="logout.php" class="text-xs text-red-500 font-medium hover:underline">Déconnexion</a>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-transparent hover:border-primary transition-all">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nom'] ?? 'U' ?>&background=random" alt="Profile" class="w-full h-full object-cover">
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center w-full pb-20 mt-20">

        <div class="w-full max-w-[1280px] px-4 sm:px-6 lg:px-8 py-8 animate-enter">
            <div class="relative w-full rounded-2xl overflow-hidden min-h-[500px] flex items-end p-8 md:p-12 lg:p-16 group shadow-2xl shadow-primary/10">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" style='background-image: url("https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=2070&auto=format&fit=crop");'>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-background-dark/60 to-transparent"></div>
                <div class="relative z-10 max-w-2xl flex flex-col gap-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/20 border border-primary/30 backdrop-blur-sm w-fit">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">À la une</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight">
                        Vivez le Futur de la Conduite
                    </h1>
                    <p class="text-lg text-gray-300 font-medium max-w-xl">
                        Plongez au cœur de l'excellence automobile. Des hypercars électriques aux classiques restaurés.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        
                    </div>
                </div>
            </div>
        </div>



     <section class="py-12 relative group/section">
    
    <div class="w-full max-w-[1300px] mx-auto px-6 lg:px-8">
        
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight mb-2">
                    Explorer par <span class="text-primary">Thème</span>
                </h2>
                <p class="text-slate-500 dark:text-slate-400 font-medium">Trouvez la voiture qui correspond à votre style de vie.</p>
            </div>

            <div class="hidden md:flex gap-3">
                <button onclick="scrollThemes('left')" class="w-12 h-12 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-all active:scale-95 text-slate-600 dark:text-slate-300">
                    <span class="material-symbols-rounded">arrow_back</span>
                </button>
                <button onclick="scrollThemes('right')" class="w-12 h-12 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-all active:scale-95 text-slate-600 dark:text-slate-300">
                    <span class="material-symbols-rounded">arrow_forward</span>
                </button>
            </div>
        </div>

        <div id="themesContainer" class="flex gap-6 overflow-x-auto pb-10 snap-x snap-mandatory scroll-smooth no-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <?php foreach ($themes as $theme) : ?>
                <form action="index.php" method="POST" class="snap-start shrink-0 h-full">
                    <input type="hidden" name="idTheme" value="<?= $theme->getIdTheme() ?>">
                    <input type="hidden" name="action" value="ArticleTheme">
                    
                    <button type="submit" class="group relative w-[280px] sm:w-[320px] h-[360px] flex flex-col p-8 rounded-3xl bg-white dark:bg-[#1E293B] border border-gray-100 dark:border-gray-700/50 hover:border-primary/30 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-500 hover:-translate-y-2 text-left">
                        
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center text-primary mb-8 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-inner">
                            <span class="material-symbols-rounded text-3xl group-hover:text-primary-dark transition-colors">
                                <?= $theme->geticoneTheme() ?>
                            </span>
                        </div>
<div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 transition-all duration-300">
                            <span class="material-symbols-rounded text-primary text-3xl">arrow_forward</span>
                        </div>
                        <div class="mt-auto">
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                                <?= htmlspecialchars($theme->getNomTheme()) ?>
                            </h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 font-medium line-clamp-2 leading-relaxed">
                                <?= htmlspecialchars($theme->getDescription()) ?>
                            </p>
                        </div>

                        
                    </button>
                </form>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<script>
    function scrollThemes(direction) {
        const container = document.getElementById('themesContainer');
        const scrollAmount = 500; // La largeur de la carte + le gap
        
        if (direction === 'left') {
            container.scrollLeft -= scrollAmount;
        } 
        else {
            container.scrollLeft += scrollAmount;
        }
    }
</script>

<style>
    /* Cache la scrollbar native mais garde le scroll fonctionnel */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
        <div class="w-full max-w-[1280px] px-4 sm:px-6 lg:px-8 py-10 animate-enter" style="animation-delay: 0.3s;">
            <h2 class="text-2xl md:text-3xl font-bold text-text-main dark:text-white tracking-tight mb-8 px-2">Articles Récents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="group flex flex-col h-full rounded-2xl bg-card-light dark:bg-card-dark border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10">
                    <div class="relative h-60 overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style='background-image: url("https://images.unsplash.com/photo-1593055498218-bb5b6f3c1b18?q=80&w=1974&auto=format&fit=crop");'>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md text-xs font-bold text-white border border-white/10 uppercase tracking-wide">
                                Essais
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col flex-1 p-6">
                        <h3 class="text-xl font-bold text-text-main dark:text-white mb-3 group-hover:text-primary transition-colors leading-tight">
                            La Révolution Hyper-EV 2024
                        </h3>
                        <p class="text-text-muted text-sm leading-relaxed mb-6 flex-1">
                            Nous testons les derniers bolides électriques qui redéfinissent les standards de performance mondiaux.
                        </p>
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                            <div class="size-8 rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCQ2cXu5XCor0RPaquynSeFREuACKKaSJW7Mu9vA66U6DAler-_QAdseVAWE6ALF85RHbtymReXyU_HVlS1u7nxh-KWDxaYhzWMspYh6qRmaTSUERKp9ZTo54LLSqC_Gy5Q_RKZEjf2-noeTVpVGjx1uDOccNA3Q06XwtilWVLZtGE3OY3nVnnNGXsQPJ683lN02cvMm8zCP6FmYOKn3x_9bBRWEvqvVzZu4roZYHQNzN3Wdd9F4dQXbWJPqZPm2MYWguyXYPf7DD40");'></div>
                            <div class="flex flex-col">
                                <span class="text-text-main dark:text-white text-xs font-bold">Alex Driver</span>
                                <span class="text-text-muted text-[10px] font-medium uppercase">5 min lecture</span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="group flex flex-col h-full rounded-2xl bg-card-light dark:bg-card-dark border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10">
                    <div class="relative h-60 overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style='background-image: url("https://images.unsplash.com/photo-1503376763036-066120622c74?q=80&w=2070&auto=format&fit=crop");'>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md text-xs font-bold text-white border border-white/10 uppercase tracking-wide">
                                Culture
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col flex-1 p-6">
                        <h3 class="text-xl font-bold text-text-main dark:text-white mb-3 group-hover:text-primary transition-colors leading-tight">
                            Restauration de la 911 : Une Odyssée
                        </h3>
                        <p class="text-text-muted text-sm leading-relaxed mb-6 flex-1">
                            Un regard approfondi sur ce qu'il faut pour ramener une légende vintage à sa gloire d'antan.
                        </p>
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                            <div class="size-8 rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBhYsHL4GWFm1DpfA6ToFNLCdNwkdi0nV6EmliuriEseCKTHHvJb9jwXeVfwxqesnqCa2Oew81IWUsSabcQpKmnHHhL4iyJKHQ1xW1jAIU803gq5Fqkehgtck00ce2Pi48TUw1el-4OuBkoGLwcPlCfK3E4Mfok3DpE36J-ikc_5ye2pz0ZqEn4w6AsZlQAKYbj02R9W3UIx83zBlkg9wdw9VON8U0_MMbkMSxnhwYXcmVPuNtvYgR4EruMZmqJhVWSFoSy9N2duXnP");'></div>
                            <div class="flex flex-col">
                                <span class="text-text-main dark:text-white text-xs font-bold">Sarah Shift</span>
                                <span class="text-text-muted text-[10px] font-medium uppercase">8 min lecture</span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="group flex flex-col h-full rounded-2xl bg-card-light dark:bg-card-dark border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-xl hover:shadow-primary/10">
                    <div class="relative h-60 overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style='background-image: url("https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=2070&auto=format&fit=crop");'>
                        </div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md text-xs font-bold text-white border border-white/10 uppercase tracking-wide">
                                Guide
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col flex-1 p-6">
                        <h3 class="text-xl font-bold text-text-main dark:text-white mb-3 group-hover:text-primary transition-colors leading-tight">
                            Les Essentiels pour le Circuit
                        </h3>
                        <p class="text-text-muted text-sm leading-relaxed mb-6 flex-1">
                            Tout ce que vous devez savoir avant d'emmener votre voiture quotidienne sur le circuit local.
                        </p>
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                            <div class="size-8 rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB2MChoEclm3zVsyqRU2V7bf0ZQ2ZKARYxvD6-Mo4jJ9M0IM8wWTkktu7pHMDsTVoRXt1HBRqsBTfJzvEBGGjNCnU0u1SsuPoXSYB32FOGuQhCQUtQVCEz6itzCEb19n8w2G9qL5TaTVzz8TNVIJ7ncC-BomKJY8RczmySa5lkiQM1i9qXqPt-HVVEjPaRbUagpzR1lAld6qbSW3Z7eJ7jqGAXPpu0ozdNgnZ5U9mDsBLNBeabnbcGz4AbnnPcAmYQACNG5qGgrCDoJ");'></div>
                            <div class="flex flex-col">
                                <span class="text-text-main dark:text-white text-xs font-bold">Mike Torque</span>
                                <span class="text-text-muted text-[10px] font-medium uppercase">4 min lecture</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="w-full max-w-[1280px] px-4 sm:px-6 lg:px-8 py-10 animate-enter" style="animation-delay: 0.4s;">
            <div class="relative rounded-2xl overflow-hidden p-8 md:p-12 border border-primary/20 bg-card-dark">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-background-dark"></div>
                <div class="absolute right-0 top-0 bottom-0 w-1/2 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-primary/10 via-transparent to-transparent opacity-50"></div>

                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="max-w-xl">
                        <h3 class="text-2xl font-bold text-white mb-2">Rejoignez le cercle privé</h3>
                        <p class="text-gray-300">Recevez les dernières nouvelles automobiles, essais et culture chaque semaine.</p>
                    </div>
                    <div class="w-full md:w-auto flex-1 max-w-md">
                        <form class="flex flex-col sm:flex-row gap-3">
                            <input class="flex-1 bg-background-dark/80 border border-gray-700 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none placeholder:text-gray-500" placeholder="Votre email" type="email" />
                            <button class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-6 rounded-xl transition-colors shadow-lg shadow-primary/25 whitespace-nowrap" type="button">
                                S'abonner
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-10 mt-auto transition-colors">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted">© 2026 Ma Bagnole by lemtiri. Fait avec passion pour le code.</p>
        </div>
    </footer>

    <script>
       
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>

</html>