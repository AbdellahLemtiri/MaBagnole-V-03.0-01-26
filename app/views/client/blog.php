
<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Blog & Communauté - MaBagnole</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Outfit"', 'sans-serif']
                    },
                    colors: {
                        primary: {
                            DEFAULT: "#6366F1",
                            hover: "#4F46E5",
                            light: "#EEF2FF"
                        },
                        dark: "#0F1115",
                        surface: "#181B21",
                        card: "#1F2329"
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(99, 102, 241, 0.15)'
                    }
                }
            }
        };
    </script>
    <style>
        body {
            transition: background-color 0.3s, color 0.3s;
        }

        .glass-panel {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 font-sans antialiased selection:bg-primary selection:text-white">

    <header class="fixed w-full top-0 z-50 bg-white/80 dark:bg-card-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a href=" carList" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-purple-600 text-white flex items-center justify-center shadow-lg group-hover:shadow-primary/50 transition-all duration-300">
                        <span class="material-symbols-rounded text-2xl"></span>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">Ma Bagnole</h2>
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href=" carList" class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors ">Véhicules</a>
                    <a class="text-sm font-bold text-primary " href="">Mes Réservations</a>
                    <a class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors " href=" themeClient">Blog</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                    <span class="material-symbols-rounded dark:hidden">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block">light_mode</span>
                </button>

                <div class="flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-gray-700">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold leading-none"><?= $_SESSION['userName'] ?></p>
                        <a href="logout.php" class="text-xs text-red-500 font-medium hover:underline">Déconnexion</a>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-transparent hover:border-primary transition-all">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['userName'] ?>&background=random" alt="Profile" class="w-full h-full object-cover">
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="relative bg-white dark:bg-card border-b border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-2xl">
                <nav class="flex mb-4 text-sm text-slate-500 font-medium">
                    <a href="index.php" class="hover:text-primary transition-colors">Accueil</a>
                    <span class="mx-3 text-gray-300 dark:text-gray-700">/</span>
                    <span class="text-slate-900 dark:text-white">Blog & Communauté</span>
                </nav>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">
                    Passion Auto <span class="text-primary">.</span>
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                    Découvrez les derniers articles, conseils mécaniques et expériences de notre communauté de passionnés.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white dark:bg-card rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-800">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-rounded text-primary">search</span> Recherche
                    </h3>
                    <form action="blog.php" method="GET">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Chercher un article..."
                                class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-surface text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary pl-10">
                            <span class="material-symbols-rounded absolute left-3 top-2.5 text-slate-400 text-[20px]">search</span>
                        </div>
                    </form>
                </div>

                <div class="bg-white dark:bg-card rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-800">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-4">Thèmes</h3>
                    <div class="space-y-2">
                        <a href="blog.php" class="flex items-center justify-between p-3 rounded-xl bg-primary/5 border border-primary/20 text-primary font-medium transition-all">
                            <span>Tous</span>
                            <span class="bg-white dark:bg-surface px-2 py-0.5 rounded-md text-xs font-bold shadow-sm">∞</span>
                        </a>

                        <?php foreach ($themes as $theme): ?>
                            <a href=" theme&idtheme=<?= $theme->getIdTheme() ?>" class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-surface border border-transparent hover:border-gray-200 dark:hover:border-gray-700 text-slate-600 dark:text-slate-300 transition-all group">
                                <span><?= htmlspecialchars($theme->getNomTheme()) ?></span>
                                <span class="material-symbols-rounded text-[18px] opacity-0 group-hover:opacity-100 transition-opacity">chevron_right</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-white dark:bg-card rounded-[2rem] p-6 shadow-sm border border-gray-100 dark:border-gray-800">
                    <h3 class="font-bold text-slate-900 dark:text-white mb-4">Tags Populaires</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($tags as $tag): ?>
                            <a href="blog.php?tag=<?= $tag['idTag'] ?>" class="text-xs font-bold px-3 py-1.5 rounded-lg bg-gray-100 dark:bg-surface text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-colors">
                                #<?= htmlspecialchars($tag['nomTag']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3">

                <?php if (empty($articles)): ?>
                    <div class="text-center py-20 bg-white dark:bg-card rounded-[2rem] border border-dashed border-gray-300 dark:border-gray-700">
                        <span class="material-symbols-rounded text-6xl text-gray-300 dark:text-gray-600 mb-4">article</span>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Aucun article trouvé</h3>
                        <p class="text-slate-500">Soyez le premier à publier dans cette catégorie !</p>
                    </div>
                <?php else: ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($articles as $art): ?>
                            <article class="group bg-white dark:bg-card rounded-[2rem] border border-gray-100 dark:border-gray-800 shadow-sm hover:shadow-glow hover:border-primary/30 transition-all duration-300 flex flex-col h-full overflow-hidden">

                                <div class="relative h-48 overflow-hidden">
                                    <img src="<?= htmlspecialchars($art->getImageArticle()) ?>" alt="<?= htmlspecialchars($art->getTitre()) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute top-4 left-4 bg-white/90 dark:bg-black/50 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-900 dark:text-white border border-gray-100 dark:border-gray-700 shadow-sm">
                                        <?= htmlspecialchars($art->getNomTheme()) ?>
                                    </div>
                                </div>

                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                        <span class="flex items-center gap-1">
                                            <span class="material-symbols-rounded text-[14px]">calendar_today</span>
                                            <?= date('d M Y', strtotime($art->getDateCreation())) ?>
                                        </span>
                                        <span>•</span>
                                        <span>5 min lecture</span>
                                    </div>

                                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-primary transition-colors">
                                        <a href="article_details.php?id=<?= $art->getIdArticle() ?>">
                                            <?= htmlspecialchars($art->getTitre()) ?>
                                        </a>
                                    </h2>

                                    <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-6 flex-grow">
                                        <?= htmlspecialchars(substr($art->getContenu(), 0, 100)) ?>...
                                    </p>

                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-800">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 text-white flex items-center justify-center text-xs font-bold">
                                                <?= strtoupper(substr($art->getName(), 0, 1)) ?>
                                            </div>
                                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">
                                                <?= htmlspecialchars($art->getLastName() . ' ' . $art->getName()) ?>
                                            </span>
                                        </div>

                                        <a href="article_details.php?id=<?= $art->getIdArticle() ?>" class="w-8 h-8 rounded-full bg-gray-50 dark:bg-surface hover:bg-primary hover:text-white text-slate-400 flex items-center justify-center transition-all">
                                            <span class="material-symbols-rounded text-[20px]">arrow_forward</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-10 flex justify-center gap-2">
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-slate-500 hover:bg-gray-50 dark:hover:bg-surface disabled:opacity-50">Précédent</button>
                        <button class="px-4 py-2 rounded-xl bg-primary text-white font-bold shadow-glow">1</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-slate-500 hover:bg-gray-50 dark:hover:bg-surface">2</button>
                        <button class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-slate-500 hover:bg-gray-50 dark:hover:bg-surface">Suivant</button>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
<div id="articleModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity duration-300 ease-out opacity-0" 
         onclick="toggleModal('articleModal')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            
            <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-card text-left shadow-xl transition-all duration-300 ease-out scale-95 opacity-0 sm:my-8 sm:w-full sm:max-w-lg border border-gray-100 dark:border-gray-700">
                
                <div class="bg-gray-50 dark:bg-surface px-4 py-3 sm:px-6 flex justify-between items-center border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-bold leading-6 text-slate-900 dark:text-white" id="modal-title">
                        Nouveau Article
                    </h3>
                    <button type="button" onclick="toggleModal('articleModal')" class="text-slate-400 hover:text-slate-500 transition-colors">
                        <span class="material-symbols-rounded">close</span>
                    </button>
                </div>

                <form action="actions/create_article.php" method="POST" enctype="multipart/form-data">
                   <div class="px-4 py-5 sm:p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Titre</label>
                            <input type="text" name="titre" required class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-surface text-slate-900 dark:text-white">
                        </div>
                        </div>

                   <div class="bg-gray-50 dark:bg-surface px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100 dark:border-gray-700 gap-2">
                        <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-primary px-3 py-2 text-sm font-semibold text-white hover:bg-primary/90 sm:w-auto">Publier</button>
                        <button type="button" onclick="toggleModal('articleModal')" class="mt-3 inline-flex w-full justify-center rounded-xl bg-white dark:bg-card px-3 py-2 text-sm font-semibold text-slate-900 dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto">Annuler</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    <script>
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        function toggleModal(modalID) {
        const modal = document.getElementById(modalID);
        
        if (!modal) return;

        // Kanjibo l backdrop (k7oliya) o l panel (lbox lbyed)
        // Note: Khass l HTML ikon mratab kif ma 3titk
        const backdrop = modal.querySelector('div:first-child'); 
        const panel = modal.querySelector('.transform'); 

        if (modal.classList.contains('hidden')) {
            // --- OPEN ---
            modal.classList.remove('hidden');
            
            // Kandiro wa7ed timeout sghir bach l browser ysta3b bli "display" tbedlat
            // 3ad ntl9o l animation
            setTimeout(() => {
                backdrop.classList.add('opacity-100');
                backdrop.classList.remove('opacity-0');
                
                panel.classList.add('scale-100', 'opacity-100');
                panel.classList.remove('scale-95', 'opacity-0');
            }, 10);
            
        } else {
            // --- CLOSE ---
            // N7iyydo classes d l'animation
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            
            panel.classList.remove('scale-100', 'opacity-100');
            panel.classList.add('scale-95', 'opacity-0');

            // Ntsnaw l animation tsali (300ms) 3ad nkhbiw l modal (hidden)
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    }

    // 3. Optionnel: Tsdd l Modal b 'ECHAP' (Escape key)
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            const modal = document.getElementById('articleModal');
            if (!modal.classList.contains('hidden')) {
                toggleModal('articleModal');
            }
        }
    });
    </script>
</body>

</html>