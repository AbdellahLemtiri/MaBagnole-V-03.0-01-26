<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Thèmes - Admin MaBagnole</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet" />

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
                            DEFAULT: "#2563EB", // Bleu Roi
                            hover: "#1D4ED8",
                            light: "#EFF6FF",
                        },
                        secondary: "#64748B",
                        success: "#10B981",
                        warning: "#F59E0B",
                        danger: "#EF4444",
                        dark: "#0F172A", // Fond très sombre (Slate 900)
                        surface: "#1E293B", // Fond des cartes (Slate 800)
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
            background: rgba(30, 41, 59, 0.9);
            /* Adapté au Blue Theme */
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-panel {
            background: white;
            border: 1px solid #e2e8f0;
        }

        .dark .glass-panel {
            background: #1E293B;
            /* Surface Color */
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Animations */
        .modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal-content {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal.hidden-modal {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .modal.hidden-modal .modal-content {
            transform: scale(0.95) translateY(10px);
        }

        /* Custom Scrollbar */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: #334155;
            border-radius: 20px;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

    <aside class="w-72 bg-white dark:bg-surface border-r border-gray-200 dark:border-gray-700 hidden md:flex flex-col z-20 shadow-xl shadow-gray-200/50 dark:shadow-none">
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

            <a href="index.php?action=reservation" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">dashboard</span>
                Tableau de bord
            </a>
            <a href="index.php?action=carAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">garage</span>
                Cars
            </a>
            <a href="index.php?action=categories" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">category</span>
                Catégories
            </a>

            <a href="index.php?action=usersAdmin"  class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined">group</span>
                Clients
            </a>



            <a href="index.php?action=ArticleAdmin"  class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
                <span class="material-symbols-outlined" >article</span>
                Articles
            </a>

            <a href="index.php?action=themeAdmin"  class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all" >
                <span class="material-symbols-outlined">category</span>
                Thèmes
            </a>

            <a href="index.php?action=tagsAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
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
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
        <header class="h-20 bg-white/80 dark:bg-surface/80 glass-effect border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Gestion des Thèmes</h2>

            <div class="flex items-center gap-4">
                <div class="relative hidden md:block">
                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400 text-[20px]">search</span>
                    <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-dark text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 dark:text-white w-64 transition-all">
                </div>
                <button onclick="document.getElementById('themeModal').classList.remove('hidden-modal')" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    <span class="hidden sm:inline">Nouveau Thème</span>
                </button>
                <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-600 shadow-sm">
                    <img src="https://i.pravatar.cc/150?u=admin" alt="Admin" class="w-full h-full object-cover" />
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <?php if (!empty($themes)): ?>
                        <?php foreach ($themes as $theme): ?>
                            <div class="glass-panel p-6 rounded-2xl group hover:border-primary/50 transition-all relative overflow-hidden bg-white dark:bg-surface">
                                <div class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-colors"></div>

                                <div class="flex justify-between items-start mb-4 relative z-10">
                                    <div class="size-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center border border-primary/20">
                                        <span class="material-symbols-outlined text-2xl"><?= !empty($theme->getIconeTheme()) ? htmlspecialchars($theme->getIconeTheme()) : 'category' ?></span>
                                    </div>
                                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button onclick="openEditModal(this)"
                                            data-id="<?= $theme->getIdTheme() ?>"
                                            data-nom="<?= htmlspecialchars($theme->getNomTheme()) ?>"
                                            data-description="<?= htmlspecialchars($theme->getDescription()) ?>"
                                            data-icon="<?= htmlspecialchars($theme->getIconeTheme()) ?>"
                                            class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors" title="Modifier">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>

                                        <form action="index.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce thème ?');" class="inline">
                                            <input type="hidden" name="action" value="deleteTheme">
                                            <input type="hidden" name="id" value="<?= $theme->getIdTheme() ?>">
                                            <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-danger hover:bg-red-500/10 transition-colors" title="Supprimer">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1 relative z-10">
                                    <?= htmlspecialchars($theme->getNomTheme()) ?>
                                </h3>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mb-4 line-clamp-2 h-10 relative z-10">
                                    <?= htmlspecialchars($theme->getDescription()) ?>
                                </p>

                                <div class="flex items-center gap-2 text-xs font-medium text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-dark/50 border border-gray-100 dark:border-gray-700 px-3 py-1.5 rounded-lg w-fit">
                                    <span class="material-symbols-outlined text-sm">article</span>
                                    <span>Articles liés</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full flex flex-col items-center justify-center p-10 text-slate-500">
                            <span class="material-symbols-outlined text-4xl mb-2">folder_off</span>
                            <p>Aucun thème trouvé.</p>
                        </div>
                    <?php endif; ?>

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

            <form action="index.php" method="POST" class="space-y-4">
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

            <form action="index.php" method="POST" class="space-y-4">
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

    <script>
        // Theme Logic
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

        // Edit Modal Logic
        function openEditModal(button) {
            const id = button.getAttribute('data-id');
            const nom = button.getAttribute('data-nom');
            const description = button.getAttribute('data-description');
            const icon = button.getAttribute('data-icon');

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nom').value = nom;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_icone').value = icon;

            document.getElementById('themeEditModal').classList.remove('hidden-modal');
        }

        // Close on Esc
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") {
                document.getElementById('themeModal').classList.add('hidden-modal');
                document.getElementById('themeEditModal').classList.add('hidden-modal');
            }
        });
    </script>
</body>

</html>