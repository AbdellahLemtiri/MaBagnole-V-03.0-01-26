<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Thèmes - Admin MaBagnole</title>
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
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/admin/theme.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

    <aside class="w-72 bg-white dark:bg-surface border-r border-gray-200 dark:border-gray-700 hidden md:flex flex-col z-20 shadow-xl shadow-gray-200/50 dark:shadow-none">
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



            <a href="ArticleAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">article</span>
                Articles
            </a>

            <a href="themeAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
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
        <header class="h-20 bg-white/80 dark:bg-surface/80 glass-effect border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Gestion des Thèmes</h2>

            <div class="flex items-center gap-4">

                <button onclick="document.getElementById('themeModal').classList.remove('hidden-modal')" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    <span class="hidden sm:inline">Nouveau Thème</span>
                </button>

            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
            <div class="max-w-7xl mx-auto">

                <div class="bg-white dark:bg-surface rounded-2xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="themes" class="w-full text-left border-collapse">

                            <thead class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-800">
                                <tr>
                                    <th class="p-5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Icône</th>
                                    <th class="p-5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Nom du thème</th>
                                    <th class="p-5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Description</th>
                                    <th class="p-5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Info</th>
                                    <th class="p-5 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                <?php if (!empty($themes)): ?>
                                    <?php foreach ($themes as $theme): ?>
                                        <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">

                                            <td class="p-5 w-20">
                                                <div class="size-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center border border-primary/20 group-hover:scale-110 transition-transform">
                                                    <span class="material-symbols-outlined text-xl">
                                                        <?= !empty($theme->getIconeTheme()) ? htmlspecialchars($theme->getIconeTheme()) : 'category' ?>
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="p-5">
                                                <div class="font-bold text-slate-900 dark:text-white text-base">
                                                    <?= htmlspecialchars($theme->getNomTheme()) ?>
                                                </div>
                                            </td>

                                            <td class="p-5 max-w-xs">
                                                <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-1 truncate">
                                                    <?= htmlspecialchars($theme->getDescription()) ?>
                                                </p>
                                            </td>

                                            <td class="p-5">
                                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs font-medium text-slate-600 dark:text-slate-300">
                                                    <span class="material-symbols-outlined text-[16px]">article</span>
                                                    <span>Articles liés</span>
                                                </div>
                                            </td>

                                            <td class="p-5 text-right">
                                                <div class="flex items-center justify-end gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                                    <button onclick="openEditModal(this)"
                                                        data-id="<?= $theme->getIdTheme() ?>"
                                                        data-nom="<?= htmlspecialchars($theme->getNomTheme()) ?>"
                                                        data-description="<?= htmlspecialchars($theme->getDescription()) ?>"
                                                        data-icon="<?= htmlspecialchars($theme->getIconeTheme()) ?>"
                                                        class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors"
                                                        title="Modifier">
                                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                                    </button>

                                                    <form action="deleteTheme" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce thème ?');" class="inline-block">
                                                        <input type="hidden" name="action" value="deleteTheme">
                                                        <input type="hidden" name="id" value="<?= $theme->getIdTheme() ?>">
                                                        <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-red-500 hover:bg-red-500/10 transition-colors" title="Supprimer">
                                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="p-10 text-center text-slate-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <div class="size-16 rounded-full bg-gray-50 dark:bg-gray-800 flex items-center justify-center mb-3">
                                                    <span class="material-symbols-outlined text-3xl opacity-50">folder_off</span>
                                                </div>
                                                <p>Aucun thème trouvé.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="themeModal" class="modal hidden-modal fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="document.getElementById('themeModal').classList.add('hidden-modal')"></div>

        <div class="modal-content relative bg-white dark:bg-surface w-full max-w-md rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6 transform transition-transform scale-100">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">add_circle</span>
                Nouveau Thème
            </h3>

            <form action="addTheme" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="addTheme">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Nom du Thème</label>
                    <input type="text" name="nom" required class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary px-4 py-3" placeholder="Ex: Vintage">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" required class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary px-4 py-3" rows="3" placeholder="Description courte..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Icône (Material Symbol)</label>
                    <div class="relative">
                        <input type="text" name="icone" class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary pl-10 px-4 py-3" placeholder="Ex: directions_car">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400">mood</span>
                    </div>
                    <p class="text-[10px] text-slate-400 mt-1">Utilisez les noms des icônes de Google Fonts.</p>
                </div>

                <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="button" onclick="document.getElementById('themeModal').classList.add('hidden-modal')" class="px-4 py-2 text-slate-500 hover:text-slate-700 dark:text-gray-400 dark:hover:text-white font-medium">Annuler</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-xl text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

    <div id="themeEditModal" class="modal hidden-modal fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="document.getElementById('themeEditModal').classList.add('hidden-modal')"></div>

        <div class="modal-content relative bg-white dark:bg-surface w-full max-w-md rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6 transform transition-transform scale-100">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">edit</span>
                Modifier le Thème
            </h3>

            <form action="updateTheme" method="POST" class="space-y-4">
                <input type="hidden" name="id" id="edit_id">
                <input type="hidden" name="action" value="updateTheme">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Nom du Thème</label>
                    <input type="text" name="nom" id="edit_nom" required class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="edit_description" required class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary px-4 py-3" rows="3"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-1">Icône (Material Symbol)</label>
                    <div class="relative">
                        <input type="text" name="icone" id="edit_icone" class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary pl-10 px-4 py-3">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400">mood</span>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="button" onclick="document.getElementById('themeEditModal').classList.add('hidden-modal')" class="px-4 py-2 text-slate-500 hover:text-slate-700 dark:text-gray-400 dark:hover:text-white font-medium">Annuler</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-xl text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
 
    <script src="/MaBagnoleV1/public/assets/js/admin/theme.js"></script>
</body>

</html>