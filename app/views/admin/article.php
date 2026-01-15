<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Articles - Admin MaBagnole</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/admin/articles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body
    class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

    <aside class="w-72 bg-white dark:bg-surface border-r border-gray-200 dark:border-gray-800 hidden md:flex flex-col z-20 shadow-xl shadow-gray-200/50 dark:shadow-none">
        <a href="reservation" class="flex items-center m-3 ">
            <div class="w-16 h-16 rounded-full bg-primary/60 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">

                <img src="public/assets/images/logo/logoMaBangole.png"
                    alt="MaBagnole Logo"
                    class="w-full h-full object-cover drop-shadow-sm relative z-10">
            </div>
        </a>
        <p class="text-[12px] p-2 font-semibold text-slate-400 uppercase tracking-wider">Admin Panel</p>



        <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-2">Gestion</p>

            <a href="reservation" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">dashboard</span>
                Tableau de bord
            </a>
            <a href="carAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">garage</span>
                Cars
            </a>
            <a href="categories" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Catégories
            </a>

            <a href="usersAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">group</span>
                Clients
            </a>



            <a href="ArticleAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
                <span class="material-symbols-outlined">article</span>
                Articles
            </a>

            <a href="themeAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Thèmes
            </a>

            <a href="tagsAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined filled">label</span>
                Tags
            </a>


        </nav>

        <div class="p-4 border-t border-gray-100 dark:border-gray-700">
            <button onclick="toggleTheme()" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all font-medium">
                <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                <span class="material-symbols-outlined hidden dark:block text-yellow-400">light_mode</span>
                <span class="dark:text-gray-300">Mode Sombre</span>
            </button>
        </div>
        <div class="p-4 border-t border-gray-100 dark:border-gray-700">
            <a href="logout" class=" text-[11px] text-danger font-semibold hover:opacity-80">Se déconnecter</a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
        <header
            class="h-20 bg-white/80 dark:bg-surface/80 glass-effect border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">
                Gestion des Articles
            </h2>

            <div class="flex items-center gap-4">



            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
            <div class="max-w-7xl mx-auto space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition-all">
                        <div>
                            <p
                                class="text-sm font-medium text-slate-500 dark:text-slate-400">
                                Total Articles
                            </p>
                            <h3
                                class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
                                <?= count($articles) ?>
                            </h3>
                        </div>
                        <div
                            class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
                            <span class="material-symbols-outlined">article</span>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition-all">
                        <div>
                            <p
                                class="text-sm font-medium text-slate-500 dark:text-slate-400">
                                Publiés
                            </p>
                            <h3
                                class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
                                <?= $counArticlepublished ?>
                            </h3>
                        </div>
                        <div
                            class="p-3 bg-green-50 dark:bg-green-900/20 text-green-600 rounded-xl">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition-all">
                        <div>
                            <p
                                class="text-sm font-medium text-slate-500 dark:text-slate-400">
                                En Attente
                            </p>
                            <h3
                                class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
                                <?= $CountArticlesPending ?>
                            </h3>
                        </div>
                        <div
                            class="p-3 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 rounded-xl">
                            <span class="material-symbols-outlined">hourglass_top</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="articlesTable" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Article</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Auteur</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Thème</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Statut</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-white/5">

                                <?php if (empty($articles)): ?>
                                    <tr>
                                        <td colspan="5" class="p-8 text-center text-slate-500 dark:text-gray-400">
                                            Aucun article trouvé.
                                        </td>
                                    </tr>
                                <?php else: ?>

                                    <?php foreach ($articles as $article):

                                        $statusClass = '';
                                        $statusLabel = '';
                                        $isPending = false;

                                        switch ($article->getStatus()) {
                                            case 'published':
                                                $statusClass = 'bg-success/10 text-success border-success/20';
                                                $statusLabel = 'Publié';
                                                break;
                                            case 'pending':
                                                $statusClass = 'bg-warning/10 text-warning border-warning/20';
                                                $statusLabel = 'En attente';
                                                $isPending = true;
                                                break;
                                            case 'refused':
                                                $statusClass = 'bg-danger/10 text-danger border-danger/20';
                                                $statusLabel = 'Refusé';
                                                break;
                                            default:
                                                $statusClass = 'bg-gray-100 text-gray-500 border-gray-200';
                                                $statusLabel = 'Brouillon';
                                                break;
                                        }
                                    ?>

                                        <tr class="table-row-hover transition-colors <?= $isPending ? 'bg-warning/5 dark:bg-warning/5' : '' ?>">

                                            <td class="p-5">
                                                <div class="flex items-center gap-4">
                                                    <img src="<?= !empty($article->getImageArticle()) ? htmlspecialchars($article->getImageArticle()) : 'assets/img/default-car.jpg' ?>"
                                                        class="w-16 h-12 object-cover rounded-lg shadow-sm" alt="Cover">
                                                    <div>
                                                        <h4 class="font-bold text-slate-900 dark:text-white text-sm line-clamp-1">
                                                            <?= htmlspecialchars($article->getTitre()) ?>
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            <?= date('d M Y', strtotime($article->getDateCreation())) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="p-5 text-sm text-slate-600 dark:text-gray-300">
                                                <div class="flex items-center gap-2">
                                                    <div class="size-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-[10px] font-bold">
                                                        <?= strtoupper(substr($article->getName(), 0, 1)) ?>
                                                    </div>
                                                    <?= htmlspecialchars($article->getName() . ' ' . $article->getLastName()) ?>
                                                </div>
                                            </td>

                                            <td class="p-5">
                                                <span class="px-2 py-1 rounded-md bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-300 text-xs font-semibold">
                                                    <?= htmlspecialchars($article->getNomTheme()) ?>
                                                </span>
                                            </td>

                                            <td class="p-5">
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold border <?= $statusClass ?>">
                                                    <span class="size-1.5 rounded-full <?= $isPending ? 'bg-warning animate-pulse' : ($article->getStatus() == 'published' ? 'bg-success' : 'bg-gray-400') ?>"></span>
                                                    <?= $statusLabel ?>
                                                </span>
                                            </td>

                                            <td class="p-5">
                                                <div class="flex items-center justify-end gap-2">

                                                    <?php if ($isPending): ?>
                                                        <form action="approveArticle" method="POST" class="inline">
                                                            <input type="hidden" name="id" value="<?= $article->getIdArticle() ?>">
                                                            <input type="hidden" name="action" value="approveArticle">
                                                            <button type="submit" class="p-2 rounded-lg text-success bg-success/10 hover:bg-success hover:text-white transition-all shadow-sm" title="Approuver">
                                                                <span class="material-symbols-outlined text-[20px]">check</span>
                                                            </button>
                                                        </form>

                                                        <form action="rejectArticle" method="POST" class="inline" onsubmit="return confirm('Voulez-vous rejeter cet article ?');">
                                                            <input type="hidden" name="id" value="<?= $article->getIdArticle() ?>">
                                                            <input type="hidden" name="action" value="rejectArticle">
                                                            <button type="submit" class="p-2 rounded-lg text-danger bg-danger/10 hover:bg-danger hover:text-white transition-all shadow-sm" title="Rejeter">
                                                                <span class="material-symbols-outlined text-[20px]">close</span>
                                                            </button>
                                                        </form>
                                                    <?php else:

                                                        $id = $article->getIdArticle();
                                                        $theme = $article->getNomTheme();
                                                        $contenu = $article->getContenu();
                                                        $titre = $article->getTitre();
                                                    ?>


                                                        <form action="deleteArticle" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                                            <input type="hidden" name="id" value="<?= $article->getIdArticle() ?>">
                                                            <input type="hidden" name="action" value="deleteArticle">
                                                            <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-danger hover:bg-danger/10 transition-colors" title="Supprimer">
                                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                        <span class="text-sm text-slate-500">Affichage 1-5 sur 42</span>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-sm hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">Précédent</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-sm hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/MaBagnoleV1/public/assets/js/admin/articles.js"></script>
    <script src="/MaBagnoleV1/views/admin/includes/alerts.js"></script>
</body>

</html>