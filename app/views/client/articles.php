<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Blog & Actualités</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/articles.css">

</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 font-display min-h-screen flex flex-col antialiased selection:bg-primary selection:text-white transition-colors duration-300">

    <div class="fixed inset-0 pointer-events-none bg-grid-pattern z-0"></div>

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
                    <a href="themeClient" class="px-5 py-2 rounded-full text-sm font-bold bg-white dark:bg-white/10 text-primary shadow-sm">Blog</a>
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
                        <p class="text-sm font-bold dark:text-white leading-none"><?= $_SESSION['userName']  ?></p>
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

    <main class="flex-grow w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-32 z-10 relative">

        <section class="mb-14 relative">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 border-b border-gray-200 dark:border-white/5">
                <div class="space-y-3 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Le Blog Auto
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black tracking-tight text-slate-900 dark:text-white leading-[1.1]">
                        Découvrez les dernières <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-400">Nouveautés.</span>
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 text-lg max-w-lg leading-relaxed">
                        L'actualité automobile, les essais, et les conseils de passionnés pour passionnés.
                    </p>
                </div>


            </div>

            <div class="mt-8 p-1.5 bg-white dark:bg-[#1E293B] rounded-2xl border border-gray-200/60 dark:border-white/5 shadow-xl shadow-gray-200/40 dark:shadow-none flex flex-col lg:flex-row gap-3 items-center backdrop-blur-xl  z-20 sticky  z-50">

                <div class="relative w-full lg:w-80 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-rounded text-gray-400 group-focus-within:text-primary transition-colors">search</span>
                    </div>
                    <input type="text" id="searchInput" placeholder="Rechercher par titre..."
                        class="block w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-[#0F172A] border-transparent text-slate-900 dark:text-white placeholder-gray-400 text-sm font-medium rounded-xl focus:border-primary/50 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-primary/10 transition-all duration-300" />
                </div>
 
                <div class="flex-1 w-full overflow-x-auto custom-scroll py-1" id="filter-container">
                    <div class="flex gap-1.5 px-1">
                        <button class="filter-btn active whitespace-nowrap px-4 py-2 rounded-lg bg-primary text-white text-xs font-bold shadow-md shadow-primary/25 transition-all transform hover:scale-105 active:scale-95" data-filter="all">
                            Tous
                        </button>

                        <?php foreach ($tags as $tag): ?>
                            <button class="filter-btn whitespace-nowrap px-4 py-2 rounded-lg bg-gray-50 dark:bg-white/5 text-slate-600 dark:text-slate-300 border border-transparent hover:border-gray-200 dark:hover:border-white/10 text-xs font-bold transition-all hover:bg-white dark:hover:bg-white/10 hover:shadow-sm active:scale-95" data-filter="<?= $tag->getNomTag() ?>">
                                <?= $tag->getNomTag() ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button onclick="openModal()" class=" sticky group relative px-6 py-3 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold text-sm shadow-xl shadow-slate-900/20 hover:shadow-slate-900/40 dark:shadow-white/10 transition-all hover:-translate-y-1 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-purple-600 opacity-0 group-hover:opacity-10 dark:group-hover:opacity-20 transition-opacity"></div>
                    <div class="flex items-center gap-2 relative z-10">
                        <span class="material-symbols-rounded">edit_square</span>
                        <span>Rédiger un article</span>
                    </div>
                </button>
                <form method="GET" action="ArticleTheme" class="hidden lg:flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-white/10 pr-2">
                    <input type="hidden" name="page" value="1">
                    <input type="hidden" name="idTheme" value="<?= $id ?>">

                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Afficher</span>

                    <div class="relative">
                        <select name="limit" onchange="this.form.submit()" class="appearance-none bg-gray-50 dark:bg-[#0F172A] border-none py-1.5 pl-3 pr-8 rounded-lg text-xs font-bold text-slate-700 dark:text-white cursor-pointer focus:ring-2 focus:ring-primary/20 transition-all hover:bg-gray-100 dark:hover:bg-white/5">
                            <option class="bg-white dark:bg-slate-800" value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                            <option class="bg-white dark:bg-slate-800" value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                            <option class="bg-white dark:bg-slate-800" value="15" <?= $limit == 15 ? 'selected' : '' ?>>15</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-500">
                            <span class="material-symbols-rounded text-sm">expand_more</span>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-20">
            <?php if (empty($articles)): ?>
                <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 flex items-center justify-center mb-4">
                        <span class="material-symbols-rounded text-4xl text-gray-400">sentiment_dissatisfied</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Aucun résultat</h3>
                    <p class="text-slate-500 max-w-sm">Il n'y a pas encore d'articles pour ce thème ou ces filtres.</p>
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

                    <article data-title="<?= htmlspecialchars(strtolower($article->getTitre())) ?>" data-tags="<?= $tagsString ?>" class="article-card group bg-white dark:bg-surface-dark rounded-3xl p-3 border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-card hover:-translate-y-1 transition-all duration-300 flex flex-col h-full animate-fade-up">

                        <div class="relative aspect-[4/3] w-full card-image-wrapper mb-4">
                            <div class="absolute inset-0 bg-cover bg-center card-image" style="background-image: url('../../<?= !empty($article->getImageArticle()) ? $article->getImageArticle() : 'assets/placeholder.jpg' ?>');"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="absolute top-3 left-3 flex gap-2 z-10">
                                <span class="bg-white/90 dark:bg-black/60 backdrop-blur-sm px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider text-slate-900 dark:text-white shadow-sm border border-white/20">
                                    <?= htmlspecialchars($article->getTheme()->getNomTheme()) ?>
                                </span>
                            </div>

                            <button class="heart-btn absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 dark:bg-black/50 backdrop-blur-md flex items-center justify-center text-slate-400 hover:text-danger hover:scale-110 transition-all z-20 shadow-sm opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 duration-300">
                                <span class="material-symbols-rounded text-[18px]">favorite</span>
                            </button>
                        </div>

                        <div class="flex flex-col flex-grow px-2 pb-2">
                            <div class="flex items-center gap-2 mb-3 text-xs font-medium text-slate-400">
                                <span class="text-primary"><?= date('d M', strtotime($article->getDateCreation())) ?></span>
                                <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                                <span>3 min de lecture</span>
                            </div>

                            <h3 class="text-lg font-bold leading-tight text-slate-900 dark:text-white mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                                <?= htmlspecialchars($article->getTitre()) ?>
                            </h3>

                            <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 mb-4 leading-relaxed flex-grow">
                                <?= htmlspecialchars(substr($article->getContenu(), 0, 100)) ?>...
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-white/5 mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-primary to-purple-500 p-[1px]">
                                        <div class="w-full h-full rounded-full bg-white dark:bg-surface-dark flex items-center justify-center text-[10px] font-bold text-primary">
                                            <?= strtoupper(substr($article->getAuthor()->getName(), 0, 1)) ?>
                                        </div>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-700 dark:text-slate-200">
                                        <?= htmlspecialchars($article->getAuthor()->getName()) ?>
                                    </span>
                                </div>

                                <a href="lireDetaileArticle&idArticle=<?= $article->getIdArticle() ?>" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 dark:border-white/10 text-slate-400 hover:bg-primary hover:border-primary hover:text-white transition-all group-hover:scale-110">
                                    <span class="material-symbols-rounded text-[18px]">arrow_outward</span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 py-8 border-t border-gray-200 dark:border-white/5">
            <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">
                Affichage de <span class="text-slate-900 dark:text-white"><?= $offset + 1 ?></span> - <span class="text-slate-900 dark:text-white"><?= min($offset + $limit, $totalArticles) ?></span> sur <?= $totalArticles ?>
            </span>

            <div class="flex items-center gap-2">
                <?php if ($page > 1): ?>
                    <a href="idTheme=<?= $id ?>&action=ArticleTheme&page=<?= $page - 1 ?>&limit=<?= $limit ?>" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/10 text-slate-500 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                        <span class="material-symbols-rounded text-lg">chevron_left</span>
                    </a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $page): ?>
                        <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-primary text-white font-bold shadow-lg shadow-primary/30 text-sm">
                            <?= $i ?>
                        </span>
                    <?php else: ?>
                        <a href="ArticleTheme?idTheme=<?= $id ?>&page=<?= $i ?>&limit=<?= $limit ?>" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/10 text-slate-500 hover:text-primary hover:border-primary transition-colors text-sm font-semibold">
                            <?= $i ?>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="ArticleTheme?idTheme=<?= $id ?>&page=<?= $page + 1 ?>&limit=<?= $limit ?>" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/10 text-slate-500 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                        <span class="material-symbols-rounded text-lg">chevron_right</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 dark:bg-surface-dark dark:border-white/5 py-8 mt-auto relative z-10">
        <div class="max-w-[1440px] mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-primary to-primary-hover flex items-center justify-center text-white text-xs">MB</div>
                <span class="text-sm font-bold text-slate-900 dark:text-white">Ma Bagnole</span>
            </div>
            <p class="text-xs font-medium text-slate-500 dark:text-slate-400">© 2026 Ma Bagnole. Designed with passion.</p>
        </div>
    </footer>

    <div id="articleModal" class="modal hidden fixed inset-0 z-[60] flex items-center justify-center px-4 py-6">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        <div class="relative w-full max-w-4xl bg-white dark:bg-[#1E293B] rounded-3xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh] animate-fade-up ring-1 ring-white/10">
            <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100 dark:border-white/5">
                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">Nouvel Article</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Partagez votre passion avec la communauté</p>
                </div>
                <button onclick="closeModal()" class="w-8 h-8 rounded-full bg-gray-100 dark:bg-white/5 flex items-center justify-center text-slate-500 hover:bg-danger/10 hover:text-danger transition-colors">
                    <span class="material-symbols-rounded text-lg">close</span>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto custom-scroll p-8 bg-gray-50/50 dark:bg-[#0F172A]/50">
                <form action="saveArticle" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <input type="hidden" value="saveArticle" name="action" />
                    <input type="hidden" value="<?= $id ?>" name="id" id="modal_id" />

                    <div class="lg:col-span-2 space-y-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase text-slate-500 dark:text-slate-400 ml-1">Titre de l'article</label>
                            <input type="text" name="titre" placeholder="Ex: Essai complet de la Tesla Model 3..."
                                class="w-full bg-white dark:bg-surface-dark border-transparent focus:border-primary ring-1 ring-gray-200 dark:ring-white/10 rounded-xl px-5 py-4 text-slate-900 dark:text-white placeholder-slate-400 font-bold text-lg focus:ring-2 focus:ring-primary/50 transition-all shadow-sm" />
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase text-slate-500 dark:text-slate-400 ml-1">Contenu</label>
                            <textarea name="contenu" rows="12" placeholder="Écrivez votre contenu ici..."
                                class="w-full bg-white dark:bg-surface-dark border-transparent focus:border-primary ring-1 ring-gray-200 dark:ring-white/10 rounded-xl px-5 py-4 text-slate-900 dark:text-white placeholder-slate-400 text-sm focus:ring-2 focus:ring-primary/50 transition-all shadow-sm custom-scroll leading-relaxed resize-none"></textarea>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white dark:bg-surface-dark p-1 rounded-2xl ring-1 ring-gray-200 dark:ring-white/10 shadow-sm">
                            <div class="aspect-video rounded-xl border-2 border-dashed border-gray-200 dark:border-gray-700 flex flex-col items-center justify-center text-slate-400 hover:border-primary hover:text-primary hover:bg-primary/5 transition-all cursor-pointer relative group">
                                <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                                <div class="w-12 h-12 rounded-full bg-gray-100 dark:bg-white/5 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-rounded text-2xl">add_photo_alternate</span>
                                </div>
                                <span class="text-xs font-bold">Ajouter une couverture</span>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-surface-dark p-5 rounded-2xl ring-1 ring-gray-200 dark:ring-white/10 shadow-sm space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Catégorie</label>
                                <select name="theme_id" class="w-full bg-gray-50 dark:bg-background-dark border-none ring-1 ring-gray-200 dark:ring-white/10 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-900 dark:text-white focus:ring-2 focus:ring-primary cursor-pointer">
                                    <option value="" selected disabled>Sélectionner un thème...</option>
                                    <?php foreach ($themes as $theme) : ?>
                                        <option value="<?= $theme->getIdTheme() ?>"><?= $theme->getNomTheme() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-3">Tags associés</label>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach ($tags as $tag): ?>
                                        <label class="cursor-pointer group relative">
                                            <input type="checkbox" name="tags[]" value="<?= $tag->getidTag() ?>" class="peer hidden" />
                                            <span class="inline-block px-3 py-1.5 rounded-lg text-[11px] font-bold border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-transparent peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary transition-all select-none hover:border-gray-300 dark:hover:border-gray-500">
                                                <?= $tag->getNomTag() ?>
                                            </span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-primary hover:bg-primary-hover text-white rounded-xl font-bold shadow-lg shadow-primary/25 transition-all transform active:scale-95 flex items-center justify-center gap-2">
                            <span>Publier l'article</span>
                            <span class="material-symbols-rounded text-sm">send</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/MaBagnoleV1/public/assets/js/client/articles.js"></script>

</body>

</html>