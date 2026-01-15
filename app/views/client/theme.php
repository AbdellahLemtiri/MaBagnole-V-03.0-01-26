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
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/theme.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
   
   
</head>

<body style="width: 100%;" class="relative flex min-h-screen w-full flex-col bg-background-light dark:bg-background-dark overflow-x-hidden text-text-main dark:text-white font-display transition-colors duration-300">

    <header class="fixed w-full top-0 z-50 bg-white/70 dark:bg-[#0F172A]/70 backdrop-blur-xl border-b border-gray-200/50 dark:border-white/5 transition-all duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 h-20 flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="carList" class="flex items-center ">
                    <div class="w-16 h-16 rounded-full bg-primary/60 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">

                        <img src="public/assets/images/logo/logoMaBangole.png"
                            alt="MaBagnole Logo"
                            class="w-full h-full object-cover drop-shadow-sm relative z-10">
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1 bg-gray-100/50 dark:bg-white/5 p-1 rounded-full border border-gray-200/50 dark:border-white/5">
                    <a href="carList" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Véhicules</a>
                    <a href="reservationUser" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Réservations</a>
                    <a href="blog" class="px-5 py-2 rounded-full text-sm font-bold bg-white dark:bg-white/10 text-primary shadow-sm">Blog</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:bg-gray-100 dark:hover:bg-white/5 transition-all">
                    <span class="material-symbols-rounded dark:hidden text-xl">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block text-xl text-yellow-400">light_mode</span>
                </button>

                <div class="h-6 w-px bg-gray-200 dark:bg-white/10 mx-1"></div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold dark:text-white leading-none"><?= $_SESSION['userName']   ?></p>
                        <a href="logout" class="text-[11px] text-danger font-semibold hover:opacity-80">Se déconnecter</a>
                    </div>
                    <div class="relative group cursor-pointer">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['userName']   ?>&background=4F46E5&color=fff&bold=true"
                            alt="Profile" class="w-10 h-10 rounded-full border-2 border-white dark:border-surface-dark shadow-md" />
                        <div class="absolute inset-0 rounded-full border border-black/10 dark:border-white/10"></div>
                    </div>
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
                        <div class="snap-start shrink-0 h-full">
                            <a href="ArticleTheme?idTheme=<?= $theme->getIdTheme() ?>" class="group relative w-[280px] sm:w-[320px] h-[360px] flex flex-col p-8 rounded-3xl bg-white dark:bg-[#1E293B] border border-gray-100 dark:border-gray-700/50 hover:border-primary/30 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-500 hover:-translate-y-2 text-left">

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


                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>

 
<div class="w-full max-w-[1280px] px-4 sm:px-6 lg:px-8 py-12 animate-enter" style="animation-delay: 0.3s;">
    <div class="flex items-end justify-between mb-8 px-2">
        <div class="flex flex-col gap-2">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white tracking-tight">
                Articles Récents
            </h2>
            <div class="h-1 w-20 bg-primary rounded-full"></div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php foreach ($articles as $article): ?>
            <?php 
                // Préparation des données pour éviter le spaghetti code en bas
                $author = is_object($article->getAuthor()) ? $article->getAuthor() : null;
                $theme = is_object($article->getTheme()) ? $article->getTheme() : null;
                
               
                $initials = 'AN'; 
                if ($author) {
                    $firstLetter = substr($author->getName(), 0, 1);
                    $lastLetter = substr($author->getLastName(), 0, 1);
                    $initials = strtoupper($firstLetter . $lastLetter);
                }

                // Image logic
                $hasImage = $author && method_exists($author, 'getProfilePicture') && !empty($author->getProfilePicture());
            ?>

            <article class="group flex flex-col h-full bg-white dark:bg-[#1a1b1e] rounded-3xl border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 hover:-translate-y-2">
                
                <div class="relative h-64 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                         style='background-image: url("<?php echo method_exists($article, 'getImageArticle') ? $article->getImageArticle() : 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070'; ?>");'>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                    </div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 rounded-full bg-white/90 dark:bg-black/60 backdrop-blur-md text-xs font-bold text-gray-900 dark:text-white border border-white/20 shadow-sm uppercase tracking-wider">
                            <?php echo $theme ? $theme->getNomTheme() : 'Général'; ?>
                        </span>
                    </div>
                </div>

                <div class="flex flex-col flex-1 p-6 md:p-8">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-3 text-xs font-medium text-gray-400 uppercase tracking-wide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <?php echo method_exists($article, 'getDateCreation') ? date('d M Y', strtotime($article->getDateCreation())) : ''; ?>
                        </div>

                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors leading-tight line-clamp-2">
                            <?php echo $article->getName(); ?>
                        </h3>
                        
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">
                            <?php 
                                if (method_exists($article, 'getContenu')) {
                                    $content = strip_tags($article->getContenu()); // Enlever les tags HTML
                                    echo strlen($content) > 120 ? substr($content, 0, 120) . '...' : $content;
                                }
                            ?>
                        </p>
                    </div>

                    <div class="flex items-center gap-4 pt-6 border-t border-gray-100 dark:border-gray-800 mt-auto">
                        
                        <div class="relative flex-shrink-0 size-10 md:size-12 rounded-full ring-2 ring-white dark:ring-gray-800 shadow-md overflow-hidden">
                            <?php if ($hasImage): ?>
                                <img src="<?php echo $author->getProfilePicture(); ?>" 
                                     alt="Author" 
                                     class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-bold text-sm md:text-base tracking-widest">
                                    <?php echo $initials; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-white text-sm font-bold">
                                <?php echo $author ? $author->getName() . ' ' . $author->getLastName() : 'Auteur Inconnu'; ?>
                            </span>
                            <span class="text-primary text-xs font-semibold">
                                Auteur vérifié
                            </span>
                        </div>
                        
                        
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

    </div>
</div>

      
    </main>
    <script src="/MaBagnoleV1/public/assets/js/client/theme.js"></script>

    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-10 mt-auto transition-colors">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted">Ma Bagnole by lemtiri . Fait avec passion pour le code 12/2025 .</p>
            <!-- 31-12-2025 -->
        </div>
    </footer>

</body>

</html>