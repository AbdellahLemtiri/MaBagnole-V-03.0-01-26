<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Blog & Actualités</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0..1,0" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        // Hna dert mapping l l-alwan jdad 3la smiyat l-9dam bach l-HTML maykhasrch
                        primary: "#4F46E5", // Kan: #6467f2
                        "primary-hover": "#4338CA", // Kan: #5053c9
                        "background-light": "#F8FAFC", // Kan: #f6f6f8
                        "background-dark": "#0F172A", // Kan: #0F1115
                        "surface-dark": "#1E293B", // Kan: #181B21 (Hada howa card-dark)
                        "text-secondary": "#64748B", // Kan: #9CA3AF (Hada howa text-muted)
                        danger: "#ef4444",
                    },
                    fontFamily: {
                        display: ["Plus Jakarta Sans", "sans-serif"], // Beddelt l-font
                    },
                    boxShadow: {
                        glow: "0 0 20px rgba(79, 70, 229, 0.15)", // Beddelt l-loun dyl glow
                    },
                    zIndex: {
                        60: "60",
                    },
                    // Zedt animations li kano f l-code jdid
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
                    }
                },
            },
        };
    </script>

    <style>
        
        .card-hover-effect {
            transition: all 0.3s ease;
        }

        .card-hover-effect:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px -10px rgba(79, 70, 229, 0.2);
    
            border-color: rgba(79, 70, 229, 0.3);
        }
 
        .img-zoom-container {
            overflow: hidden;
        }

        .img-zoom-container .img-zoom {
            transition: transform 0.5s ease;
        }

        .group:hover .img-zoom {
            transform: scale(1.05);
        }
 
        .heart-btn:active {
            transform: scale(0.8);
        }

        .material-symbols-rounded.filled {
            font-variation-settings: "FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24;
            color: #ef4444;
        }

        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
 
        ::-webkit-scrollbar {
            width: 8px;
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
 
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: #CBD5E1;
            border-radius: 20px;
        }

        .dark .custom-scroll::-webkit-scrollbar-thumb {
            background-color: #374151;
        }
 
        input[type=range] {
            background: transparent;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #4F46E5;
            cursor: pointer;
            margin-top: -8px;
            box-shadow: 0 2px 6px rgba(79, 70, 229, 0.4);
            transition: transform 0.1s;
        }

        input[type=range]::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            background: #E2E8F0;
            border-radius: 2px;
        }

        .dark input[type=range]::-webkit-slider-runnable-track {
            background: #334155;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display min-h-screen flex flex-col antialiased selection:bg-primary selection:text-white">
    <header
        class="fixed w-full top-0 z-50 bg-white/80 dark:bg-surface-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-white/5 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="index.php?action=carList" class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-primary-hover text-white flex items-center justify-center shadow-lg group-hover:shadow-primary/50 transition-all duration-300">
                        <span class="material-symbols-rounded text-2xl">directions_car</span>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">Ma Bagnole</h2>
                </a>

                <div class="hidden lg:flex items-center gap-8">
                    <a href="index.php?action=carList"
                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                        Véhicules
                    </a>
                    <a href="index.php?action=reservationUser"
                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                        Mes Réservations
                    </a>
                    <a href="index.php?action=blog"
                        class="text-sm font-bold text-primary">
                        Blog
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()"
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-100 dark:bg-surface-dark text-gray-600 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors border border-transparent dark:border-white/5">
                    <span class="material-symbols-rounded dark:hidden">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block">light_mode</span>
                </button>

                <div class="flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-gray-700">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold leading-none dark:text-gray-200">
                            <?= $_SESSION['nom'] ?? 'Client' ?>
                        </p>
                        <a href="logout.php" class="text-xs text-danger font-medium hover:underline">
                            Déconnexion
                        </a>
                    </div>
                    <button
                        class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-transparent hover:border-primary transition-all">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nom'] ?? 'U' ?>&background=random"
                            alt="Profile" class="w-full h-full object-cover" />
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main
        class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-24 lg:py-32">
        <section class="mb-12 space-y-8">
            <div
                class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-gray-200 dark:border-white/5 pb-8">
                <div class="space-y-4">
                    <div
                        class="flex items-center gap-2 text-primary text-sm font-bold uppercase tracking-wider mb-1">
                        <span class="material-symbols-rounded text-[18px]">rss_feed</span>
                        <span>Le Blog Auto</span>
                    </div>
                    <h2
                        class="text-3xl md:text-5xl font-black tracking-tight leading-tight">
                        Dernières
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-400">Actualités</span>
                    </h2>
                </div>

                <button
                    onclick="openModal()"
                    class="bg-primary hover:bg-primary-hover text-white px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2 transition-all shadow-glow hover:-translate-y-1">
                    <span class="material-symbols-rounded text-[20px]">add_circle</span>
                    <span>Rédiger un article</span>
                </button>
            </div>

            <div
                class="flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center bg-white dark:bg-surface-dark p-4 rounded-2xl border border-gray-200 dark:border-white/5 shadow-sm">
                <div class="relative w-full lg:w-96">
                    <span
                        class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 material-symbols-rounded">search</span>
                    <input
                        type="text"
                        placeholder="Rechercher un article..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-gray-50 dark:bg-background-dark border-gray-200 dark:border-gray-700 text-sm focus:border-primary focus:ring-primary dark:text-white" />
                </div>

                <div class="flex flex-wrap gap-2" id="filter-container">
                    <button
                        class="filter-btn active px-4 py-2 rounded-lg bg-primary text-white text-xs font-bold transition-all"
                        data-filter="all">
                        Tous
                    </button>
                    <?php
                    foreach ($tags as $tag): ?>
                        <button
                            class="filter-btn px-4 py-2 rounded-lg bg-gray-100 dark:bg-background-dark hover:bg-gray-200 text-gray-600 dark:text-gray-300 text-xs font-bold transition-all"
                            data-filter="<?= $tag->getNomTag() ?>">
                            <?= $tag->getNomTag() ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <form method="GET" action="index.php"
                    class="flex items-center gap-3 w-full lg:w-auto">
                    <input type="hidden" name="action" value="ArticleTheme">
                    <input type="hidden" name="page" value="1">
                    <input type="hidden" name="idTheme" value="<?= $id ?>">

                    <div class="flex items-center gap-2 bg-gray-50 dark:bg-background-dark rounded-lg px-3 py-2 border border-gray-200 dark:border-gray-700">
                        <span class="text-xs font-bold text-gray-500 uppercase">Afficher</span>
                        <select
                            name="limit"
                            onchange="this.form.submit()"
                            class="bg-transparent border-none p-0 text-sm font-bold text-slate-900 dark:text-white focus:ring-0 cursor-pointer px-2">
                            <option class="dark:bg-background-dark" value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                            <option class="dark:bg-background-dark" value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                            <option class="dark:bg-background-dark" value="15" <?= $limit == 15 ? 'selected' : '' ?>>15</option>
                        </select>
                    </div>
                </form>
            </div>
        </section>

        <section id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 mb-16">

            <?php if (empty($articles)): ?>
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Aucun article trouvé pour ce thème.</p>
                </div>
            <?php else: ?>

                <?php foreach ($articles as $article): ?>
                    <?php

                    $tagsArticles = $tag->getTagsByArticle($article->getIdArticle());

                    $tagNames = [];
                    foreach ($tagsArticles as $tagArt) {
                        $tagNames[] = $tagArt->getNomTag();
                    }

                    $tagsString = implode(' ', $tagNames);
                    ?>
                    <article data-tags="<?= $tagsString ?>"
                        class="article-card group bg-white dark:bg-surface-dark rounded-xl overflow-hidden border border-gray-200 dark:border-white/5 card-hover-effect flex flex-col h-full cursor-pointer relative shadow-sm dark:shadow-none" ">
                        <div class=" relative aspect-[16/10] w-full img-zoom-container">
                        <div class="absolute inset-0 bg-cover bg-center img-zoom object-cover"
                            style="background-image: url('../../<?= !empty($article->getImageArticle())  ?>');">
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>

                        <span class="absolute top-4 left-4 bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide relative z-20">
                            <?= htmlspecialchars($article->getTheme()->getNomTheme()) ?>
                        </span>

                        <button class="heart-btn absolute top-3 right-3 z-20 p-2 rounded-full bg-black/40 hover:bg-black/60 backdrop-blur-sm transition-all text-white border border-white/10 group/heart">
                            <span class="material-symbols-rounded text-[20px]  transition-colors">favorite</span>
                        </button>
                        </div>

                        <div class="p-5 flex flex-col flex-grow relative z-20 ">
                            <div class="flex items-center gap-2 mb-3 pointer-events-none">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">
                                    News </span>
                                <span class="text-gray-400 text-xs">•</span>
                                <span class="text-text-secondary text-xs">
                                    <?= date('d M Y', strtotime($article->getDateCreation())) ?>
                                </span>
                            </div>

                            <h3 class="text-xl font-bold leading-tight mb-3 text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                                <?= htmlspecialchars($article->getTitre()) ?>
                            </h3>
                            <a href="index.php?action=lireDetaileArticle&idArticle=<?= $article->getIdArticle() ?>">
                                <p class="text-text-secondary text-sm line-clamp-3 mb-4 flex-grow">
                                    <?= htmlspecialchars(substr($article->getContenu(), 0, 80)) . '...en voir plus' ?>
                                </p>
                            </a>

                            <div class="mt-auto pt-4 border-t border-gray-100 dark:border-white/5 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center text-[10px] font-bold text-primary">
                                        <?= strtoupper(substr($article->getAuthor()->getName(), 0, 1)) ?>
                                    </div>
                                    <span class="text-xs font-medium text-gray-600 dark:text-white/80">
                                        <?= htmlspecialchars($article->getAuthor()->getName() . ' ' . $article->getAuthor()->getLastName()) ?>
                                    </span>
                                </div>

                                <a href="index.php?action=lireDetaileArticle&idArticle=<?= $article->getIdArticle() ?>"
                                    class="text-xs font-bold text-primary flex items-center gap-0.5 group-hover:translate-x-1 transition-transform">
                                    Lire <span class="material-symbols-rounded text-[16px]">arrow_forward</span>
                                </a>
                            </div>
                            <div class="hidden">
                                <?php
                                $tagsArticles =  $tag->getTagsByArticle($article->getIdArticle());
                                foreach ($tagsArticles as $tagArt) :
                                ?>
                                    <div class="" data-tag="<?= $tagArt->getNomTag() ?>"><?= $tagArt->getNomTag() ?></div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        </div>
                    </article>
                <?php endforeach; ?>

            <?php endif; ?>

        </section>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-12 mb-12 border-t border-gray-200 dark:border-white/10 pt-8">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Affichage de <span class="font-bold text-slate-900 dark:text-white"><?= $offset + 1 ?></span>
                à <span class="font-bold text-slate-900 dark:text-white"><?= min($offset + $limit, $totalArticles) ?></span>
                sur <?= $totalArticles ?> articles
            </span>

            <div class="inline-flex items-center bg-white dark:bg-surface-dark rounded-lg p-1 border border-gray-200 dark:border-white/10 shadow-sm">

                <?php if ($page > 1): ?>
                    <a class="px-3 py-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-white/5 transition-colors"
                         href="index.php?idTheme=<?= $id ?>&action=ArticleTheme&page=<?= $page - 1 ?>&limit=<?= $limit ?>">
                        <span class="material-symbols-rounded text-sm">chevron_left</span>
                    </a>
                <?php else: ?>
                    <span class="px-3 py-2 rounded-md text-gray-300 dark:text-gray-700 cursor-not-allowed">
                        <span class="material-symbols-rounded text-sm">chevron_left</span>
                    </span>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $page): ?>
                        <span class="px-3 py-2 rounded-md bg-primary text-white text-sm font-bold shadow-glow cursor-default">
                            <?= $i ?>
                        </span>
                    <?php else: ?>
                        <a class="px-3 py-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-white/5 text-sm transition-colors"
                            href="index.php?idTheme=<?= $id ?>&action=ArticleTheme&page=<?= $i ?>&limit=<?= $limit ?>">
                            <?= $i ?>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a class="px-3 py-2 rounded-md text-gray-500 hover:bg-gray-100 dark:hover:bg-white/5 transition-colors"
                        href="index.php?idTheme=<?= $id ?>&action=ArticleTheme&page=<?= $page + 1 ?>&limit=<?= $limit ?>">
                        <span class="material-symbols-rounded text-sm">chevron_right</span>
                    </a>
                <?php else: ?>
                    <span class="px-3 py-2 rounded-md text-gray-300 dark:text-gray-700 cursor-not-allowed">
                        <span class="material-symbols-rounded text-sm">chevron_right</span>
                    </span>
                <?php endif; ?>

            </div>
        </div>
    </main>

    <footer
        class="bg-white dark:bg-surface-dark border-t border-gray-200 dark:border-gray-800 py-10 mt-auto transition-colors">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-gray-500 dark:text-text-secondary">
                © 2026 Ma Bagnole. Fait avec passion.
            </p>
        </div>
    </footer>

    <div
        id="articleModal"
        class="modal hidden fixed inset-0 z-60 flex items-center justify-center px-4 py-6">
        <div
            class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity"
            onclick="closeModal()"></div>

        <div
            class="modal-content relative w-full max-w-4xl bg-white dark:bg-surface-dark rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh] animate-in fade-in zoom-in duration-300">
            <div
                class="flex items-center justify-between px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-white dark:bg-surface-dark">
                <h2
                    class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-rounded text-primary">edit_document</span>
                    Éditeur d'Article
                </h2>
                <button
                    onclick="closeModal()"
                    class="text-slate-400 hover:text-danger transition-colors">
                    <span class="material-symbols-rounded text-2xl">close</span>
                </button>
            </div>

            <div
                class="flex-1 overflow-y-auto custom-scroll p-6 md:p-8 bg-gray-50 dark:bg-background-dark">
                <form
                    action="index.php"
                    method="POST"

                    class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <input type="hidden" value="saveArticle" name="action" />
                    <input type="hidden" value="<?= $id ?>" name="id" id="modal_id" />
                    <div class="lg:col-span-2 space-y-5">
                        <div class="space-y-2">
                            <label
                                class="block text-sm font-bold text-slate-700 dark:text-gray-300">Titre</label>
                            <input
                                type="text"
                                name="titre"
                                placeholder="Ex: Essai de la nouvelle Tesla..."
                                class="w-full bg-white dark:bg-surface-dark border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 dark:text-white focus:border-primary focus:ring-primary transition-colors" />
                        </div>

                        <div class="space-y-2">
                            <label
                                class="block text-sm font-bold text-slate-700 dark:text-gray-300">Contenu</label>
                            <textarea
                                name="contenu"
                                rows="12"
                                placeholder="Rédigez votre article ici..."
                                class="w-full bg-white dark:bg-surface-dark border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 dark:text-white focus:border-primary focus:ring-primary transition-colors custom-scroll"></textarea>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div
                            class="bg-white dark:bg-surface-dark p-4 rounded-xl border border-gray-200 dark:border-gray-700">
                            <label
                                class="block text-sm font-bold text-slate-700 dark:text-gray-300 mb-3">Média (Image/Vidéo)</label>
                            <div
                                class="aspect-video rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 flex flex-col items-center justify-center text-slate-400 hover:border-primary hover:text-primary transition-colors cursor-pointer relative bg-gray-50 dark:bg-background-dark/50">
                                <input
                                    type="file"
                                    name="image"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                                <span class="material-symbols-rounded text-3xl mb-1">add_photo_alternate</span>
                                <span class="text-xs font-medium">Glisser ou cliquer</span>
                            </div>
                        </div>

                        <div
                            class="bg-white dark:bg-surface-dark p-4 rounded-xl border border-gray-200 dark:border-gray-700 space-y-4">
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase mb-2">Thémes</label>
                                <select
                                    name="theme_id"
                                    class="w-full bg-gray-50 dark:bg-background-dark border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 text-sm dark:text-white focus:border-primary focus:ring-primary">
                                    <option value="" selected disabled>choisir . . .</option>

                                    <?php foreach ($themes as $theme) : ?>
                                        <option value="<?= $theme->getIdTheme() ?>"><?= $theme->getNomTheme() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase mb-2">Tags</label>
                                <div class="flex flex-wrap gap-2">


                                    <?php foreach ($tags as $tag): ?>
                                        <label class="cursor-pointer group">
                                            <input
                                                type="checkbox"
                                                name="tags[]"
                                                value="<?= $tag->getidTag() ?>"
                                                class="peer hidden" />
                                            <span
                                                class="px-2 py-1 rounded text-xs border border-gray-200 dark:border-gray-600 text-gray-500 dark:text-gray-400 peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary transition-all select-none"><?= $tag->getNomTag() ?></span>
                                        </label>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full py-3 bg-primary hover:bg-primary-hover text-white rounded-xl font-bold shadow-lg shadow-primary/30 transition-all transform active:scale-95">
                            Publier l'article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 1. GESTION DU THÈME
        const html = document.documentElement;
        if (
            localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            html.classList.add("dark");
        } else {
            html.classList.remove("dark");
        }

        function toggleTheme() {
            if (html.classList.contains("dark")) {
                html.classList.remove("dark");
                localStorage.theme = "light";
            } else {
                html.classList.add("dark");
                localStorage.theme = "dark";
            }
        }


        const modal = document.getElementById("articleModal");

        function openModal() {
            modal.classList.remove("hidden");

            document.body.style.overflow = "hidden";
        }

        function closeModal() {
            modal.classList.add("hidden");
            document.body.style.overflow = "auto";
        }

        document.addEventListener("keydown", function(event) {
            if (event.key === "Escape" && !modal.classList.contains("hidden")) {
                closeModal();
            }
        });

        const filterBtns = document.querySelectorAll(".filter-btn");
        const articles = document.querySelectorAll(".article-card");

        filterBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                // --- Partie dyal Style des boutons (b9at kif ma hiya) ---
                filterBtns.forEach((b) => {
                    b.classList.remove("bg-primary", "text-white");
                    b.classList.add("bg-gray-100", "dark:bg-background-dark", "text-gray-600", "dark:text-gray-300");
                });

                btn.classList.remove("bg-gray-100", "dark:bg-background-dark", "text-gray-600", "dark:text-gray-300");
                btn.classList.add("bg-primary", "text-white");
                // -------------------------------------------------------

                // --- Partie Filtrage (Mbedla) ---
                const filterValue = btn.getAttribute("data-filter");

                articles.forEach((article) => {
                    // Njibo les tags dyal l-article mn attribute jdid
                    const articleTags = article.getAttribute("data-tags");

                    // Logic:
                    // 1. Ila kan filter "all" -> Bayen
                    // 2. Ila kan articleTags fih dak l-mot (includes) -> Bayen
                    if (filterValue === "all" || (articleTags && articleTags.includes(filterValue))) {
                        article.classList.remove("hidden");

                        // Animation sghira bach yban zwin (optionnel)
                        article.classList.add("animate-fade-in");
                    } else {
                        article.classList.add("hidden");
                    }
                });
            });
        });

        // 4. LOGIQUE COEUR
        document.querySelectorAll(".heart-btn").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                btn.querySelector("span").classList.toggle("filled");
            });
        });
    </script>
</body>

</html>