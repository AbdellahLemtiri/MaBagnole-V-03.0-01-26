<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Articles - Admin MaBagnole</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', "sans-serif"]
                    },
                    colors: {
                        primary: {
                            DEFAULT: "#2563EB",
                            hover: "#1D4ED8",
                            light: "#EFF6FF",
                        },
                        secondary: "#64748B",
                        success: "#10B981",
                        warning: "#F59E0B",
                        danger: "#EF4444",
                        dark: "#0F172A",
                        surface: "#1E293B",
                    },
                },
            },
        };
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .dark .glass-effect {
            background: rgba(15, 23, 42, 0.95);
        }
    </style>
</head>

<body
    class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

    <aside class="w-72 bg-white dark:bg-surface border-r border-gray-200 dark:border-gray-800 hidden md:flex flex-col z-20 shadow-xl shadow-gray-200/50 dark:shadow-none">
        <div class="p-6 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                <span class="material-symbols-outlined text-[24px]">directions_car</span>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900 dark:text-white leading-tight">MaBagnole</h1>
                <p class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider">Admin Panel</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-2">Gestion</p>

            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">dashboard</span>
                Tableau de bord
            </a>

            <a href="index.php?action=categories" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Catégories
            </a>

            <a href="index.php?action=usersAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">group</span>
                Clients
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">reviews</span>
                Avis & Notes
            </a>

            <a href="article.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
                <span class="material-symbols-outlined">article</span>
                Articles
            </a>

            <a href="themes.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Thèmes
            </a>

            <a href="tags.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined filled">label</span>
                Tags
            </a>

            <a href="comments.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">comment</span>
                Commentaires
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100 dark:border-gray-700">
            <button onclick="toggleTheme()" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all font-medium">
                <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                <span class="material-symbols-outlined hidden dark:block text-yellow-400">light_mode</span>
                <span class="dark:text-gray-300">Mode Sombre</span>
            </button>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
        <header
            class="h-20 bg-white/80 dark:bg-surface/80 glass-effect border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">
                Gestion des Articles
            </h2>

            <div class="flex items-center gap-4">
                <div class="relative hidden md:block">
                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400 text-[20px]">search</span>
                    <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 dark:text-white w-64 transition-all">
                </div>
                <button
                    onclick="openModal()"
                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    <span class="hidden sm:inline">Nouvel Article</span>
                </button>
                <div
                    class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-600 shadow-sm">
                    <img
                        src="https://i.pravatar.cc/150?u=admin"
                        alt="Admin"
                        class="w-full h-full object-cover" />
                </div>
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
                                42
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
                                35
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
                                7
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
                        <table class="w-full text-left border-collapse">
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
                                            default: // brouillon
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
                                                        <form action="index.php" method="POST" class="inline">
                                                            <input type="hidden" name="id" value="<?= $article->getIdArticle() ?>">
                                                            <input type="hidden" name="action" value="approveArticle">
                                                            <button type="submit" class="p-2 rounded-lg text-success bg-success/10 hover:bg-success hover:text-white transition-all shadow-sm" title="Approuver">
                                                                <span class="material-symbols-outlined text-[20px]">check</span>
                                                            </button>
                                                        </form>

                                                        <form action="index.php" method="POST" class="inline" onsubmit="return confirm('Voulez-vous rejeter cet article ?');">
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

                                                        <button onclick="openEditModal(<?= $id, $titre, $contenu ?> )" class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors" title="Modifier">
                                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                                        </button>
                                                        <form action="index.php" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
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

    <div id="articleModal" class="modal hidden fixed inset-0 z-50 flex items-center justify-center px-4 py-6">
        <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        <div class="modal-content relative w-full max-w-4xl bg-white dark:bg-surface dark:border dark:border-gray-700 rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100 dark:border-gray-700 bg-white dark:bg-surface">
                <h2 class="text-xl font-bold dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">edit_document</span>
                    Éditeur d'Article
                </h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-danger transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto custom-scroll p-6 md:p-8 bg-gray-50 dark:bg-dark">
                <form action="index.php?actionn=saveArticle" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <input type="hidden" name="id" id="modal_id">
                    <input type="hidden" name="action" value="saveArticle">

                    <div class="lg:col-span-2 space-y-5">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300">Titre</label>
                            <input type="text" name="titre" id="modal_titre" placeholder="Titre de l'article"
                                class="w-full bg-white dark:bg-surface border-gray-200 dark:border-gray-700 focus:border-primary focus:ring-primary rounded-xl px-4 py-3 dark:text-white transition-colors">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300">Contenu</label>
                            <textarea name="contenu" id="modal_contenu" rows="12" placeholder="Rédigez l'article..."
                                class="w-full bg-white dark:bg-surface border-gray-200 dark:border-gray-700 focus:border-primary focus:ring-primary rounded-xl px-4 py-3 dark:text-white transition-colors"></textarea>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white dark:bg-surface p-4 rounded-xl border border-gray-200 dark:border-gray-700">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-3">Image de couverture</label>
                            <div class="aspect-video rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 flex flex-col items-center justify-center text-slate-400 hover:border-primary hover:text-primary transition-colors cursor-pointer relative">
                                <input type="file" name="image" id="modal_image" class="absolute inset-0 opacity-0 cursor-pointer">
                                <span class="material-symbols-outlined text-3xl">image</span>
                                <span class="text-xs mt-1">Upload</span>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-surface p-4 rounded-xl border border-gray-200 dark:border-gray-700 space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Statut</label>
                                <select name="statut" id="modal_statut" class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 text-sm dark:text-white focus:border-primary focus:ring-primary">
                                    <option value="publie">✅ Publié</option>
                                    <option value="brouillon">📝 Brouillon</option>
                                    <option value="attente">⏳ En attente</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Catégorie</label>
                                <select name="theme_id" id="modal_theme" class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 text-sm dark:text-white focus:border-primary focus:ring-primary">
                                    <option value="1">Mécanique</option>
                                    <option value="2">Essais</option>
                                    <option value="3">Lifestyle</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tags</label>
                                <div class="flex flex-wrap gap-2">
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="tags[]" value="1" class="peer hidden">
                                        <span class="px-2 py-1 rounded text-xs border border-gray-200 dark:border-gray-700 dark:text-gray-400 peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary transition-all">#BMW</span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="tags[]" value="2" class="peer hidden">
                                        <span class="px-2 py-1 rounded text-xs border border-gray-200 dark:border-gray-700 dark:text-gray-400 peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary transition-all">#Sport</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 bg-primary hover:bg-primary-hover text-white rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">
                            Sauvegarder
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("theme", "dark");
            }
        }
        if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.documentElement.classList.add("dark");
        }


        const modal = document.getElementById('articleModal');

        function openModal() {
            document.getElementById('modal_id').value = '';
            modal.classList.remove('hidden');
        }

        function openEditModal(id, titre, contenu, themeId, image, status, tags) {
            document.getElementById('modal_id').value = id;
            document.getElementById('modal_titre').value = titre;
            document.getElementById('modal_contenu').value = contenu;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>