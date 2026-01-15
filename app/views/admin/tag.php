<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tags - Admin MaBagnole</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/admin/tag.css">

</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

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



            <a href="ArticleAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">article</span>
                Articles
            </a>

            <a href="themeAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Thèmes
            </a>

            <a href="tagsAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
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
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">
                Gestion des Tags
            </h2>

            <div class="flex items-center gap-4">

                <button onclick="openModal()" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined text-[20px]">playlist_add</span>
                    <span class="hidden sm:inline">Ajout Multiple</span>
                </button>

            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
            <div class="max-w-7xl mx-auto space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition-all">
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Tags</p>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1"><?= count($tags) ?></h3>
                        </div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
                            <span class="material-symbols-outlined">label</span>
                        </div>
                    </div>




                </div>

                <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="tags" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">ID</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nom du Tag</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Articles Liés</th>
                                    <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">

                                <?php foreach ($tags as $tag) : ?>
                                    <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                        <td class="p-5 text-slate-500">#<?= $tag->getidTag() ?></td>

                                        <td class="p-5">
                                            <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-slate-700 dark:text-gray-300 font-medium">
                                                <?= htmlspecialchars($tag->getNomTag()) ?>
                                            </span>
                                        </td>

                                        <td class="p-5">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-slate-400 text-sm">article</span>
                                                <span class="text-slate-600 dark:text-slate-300">8 articles</span>
                                            </div>
                                        </td>

                                        <td class="p-5 text-right flex items-center justify-end gap-1">
                                            <button onclick="openEditTagModal(this)"
                                                data-id="<?= $tag->getidTag() ?>"
                                                data-nom="<?= htmlspecialchars($tag->getNomTag()) ?>"
                                                class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors"
                                                title="Modifier">
                                                <span class="material-symbols-outlined text-[20px]">edit</span>
                                            </button>

                                            <form action="deleteTag" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?');">
                                                <input type="hidden" name="id" value="<?= $tag->getidTag() ?>">
                                                <input type="hidden" value="deleteTag" name="action">
                                                <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-danger hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Supprimer">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                        <span class="text-sm text-slate-500">Affichage 1-10 sur 128</span>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-sm hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">Précédent</button>
                            <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-sm hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="tagsModal" class="modal hidden-modal fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

        <div class="modal-content relative bg-white dark:bg-surface w-full max-w-lg rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white" id="modal-title">
                    Ajouter des Tags
                </h3>
                <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-500">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="addTags" method="POST">
                <input type="hidden" name="action" value="addTags">
                <div class="space-y-4">
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Séparez les tags par des virgules (ex: #Mercedes, #Luxe, #Vitesse)
                    </p>
                    <div>
                        <textarea name="tags" rows="5" required class="block w-full rounded-xl border-0 py-3 bg-gray-50 dark:bg-dark text-slate-900 dark:text-white shadow-sm ring-1 ring-inset ring-gray-200 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" placeholder="#Tag1, #Tag2..."></textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-slate-500 hover:text-slate-700 dark:text-gray-400 dark:hover:text-white font-medium">Annuler</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-xl text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Ajouter tout</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editTagModal" class="modal hidden-modal fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeEditTagModal()"></div>

        <div class="modal-content relative bg-white dark:bg-surface w-full max-w-md rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 p-6">

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">edit</span>
                    Modifier le Tag
                </h3>
                <button onclick="closeEditTagModal()" class="text-slate-400 hover:text-slate-500">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="updateTag" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="updateTag">
                <input type="hidden" name="id" id="edit_tag_id">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-gray-400 mb-1">Nom du Tag</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-3 text-slate-400">label</span>
                        <input type="text" name="nom" id="edit_tag_nom" required
                            class="w-full bg-gray-50 dark:bg-dark border-gray-200 dark:border-gray-700 rounded-xl text-slate-900 dark:text-white focus:border-primary focus:ring-primary pl-10 px-4 py-3"
                            placeholder="Ex: BMW">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <button type="button" onclick="closeEditTagModal()" class="px-4 py-2 text-slate-500 hover:text-slate-700 dark:text-gray-400 dark:hover:text-white font-medium">Annuler</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-xl text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
 
    <script src="/MaBagnoleV1/public/assets/js/admin/tag.js"></script>
</body>

</html>