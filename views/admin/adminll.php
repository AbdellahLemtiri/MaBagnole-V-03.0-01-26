<!DOCTYPE html>
<html class="dark" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Thèmes</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { "primary": "#5048e5", "background-dark": "#121121", "surface-dark": "#1e1c30", "border-dark": "#383663" },
                    fontFamily: { "display": ["Plus Jakarta Sans", "sans-serif"] },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-panel { background: rgba(30, 28, 48, 0.6); backdrop-filter: blur(12px); border: 1px solid rgba(56, 54, 99, 0.5); }
        .modal.hidden-modal { opacity: 0; visibility: hidden; pointer-events: none; }
        .modal { transition: all 0.2s ease; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-background-dark text-slate-800 dark:text-gray-200 h-screen flex overflow-hidden">

    <aside class="w-64 bg-white dark:bg-[#131221] border-r border-gray-200 dark:border-border-dark flex-col z-20 hidden md:flex">
        <div class="h-20 flex items-center px-6 gap-3 border-b border-gray-100 dark:border-white/5">
            <div class="size-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-lg"><span class="material-symbols-outlined">directions_car</span></div>
            <h1 class="text-xl font-bold dark:text-white">AdminPanel</h1>
        </div>
        <nav class="flex-1 py-6 px-3 space-y-1">
            <a href="admin_articles.html" class="flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-white/5 transition-all"><span class="material-symbols-outlined">article</span> Articles</a>
            <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-xl bg-primary/10 text-primary font-bold"><span class="material-symbols-outlined filled">category</span> Thèmes</a>
            <a href="admin_tags.html" class="flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-white/5 transition-all"><span class="material-symbols-outlined">label</span> Tags</a>
            <a href="admin_comments.html" class="flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-white/5 transition-all"><span class="material-symbols-outlined">comment</span> Commentaires</a>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-20 bg-white/80 dark:bg-[#131221]/80 backdrop-blur-md border-b border-gray-200 dark:border-border-dark flex items-center justify-between px-8 z-10">
            <h2 class="text-xl font-bold dark:text-white">Gestion des Thèmes</h2>
            <button onclick="document.getElementById('themeModal').classList.remove('hidden-modal')" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg font-bold flex items-center gap-2 shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined">add</span> Nouveau Thème
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="glass-panel p-6 rounded-2xl group hover:border-primary/50 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="size-12 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl">build</span>
                        </div>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined">edit</span></button>
                            <button class="text-gray-400 hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1">Mécanique</h3>
                    <p class="text-sm text-gray-400 mb-4">Tutoriels et guides d'entretien.</p>
                    <div class="flex items-center gap-2 text-xs font-medium text-gray-500 bg-white/5 px-3 py-1.5 rounded-lg w-fit">
                        <span class="material-symbols-outlined text-sm">article</span> 12 Articles
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-2xl group hover:border-primary/50 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="size-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl">speed</span>
                        </div>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined">edit</span></button>
                            <button class="text-gray-400 hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1">Essais & Reviews</h3>
                    <p class="text-sm text-gray-400 mb-4">Tests des derniers modèles.</p>
                    <div class="flex items-center gap-2 text-xs font-medium text-gray-500 bg-white/5 px-3 py-1.5 rounded-lg w-fit">
                        <span class="material-symbols-outlined text-sm">article</span> 24 Articles
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-2xl group hover:border-primary/50 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="size-12 rounded-xl bg-green-500/20 text-green-400 flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl">eco</span>
                        </div>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined">edit</span></button>
                            <button class="text-gray-400 hover:text-red-500"><span class="material-symbols-outlined">delete</span></button>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1">Électrique</h3>
                    <p class="text-sm text-gray-400 mb-4">Actualités des véhicules verts.</p>
                    <div class="flex items-center gap-2 text-xs font-medium text-gray-500 bg-white/5 px-3 py-1.5 rounded-lg w-fit">
                        <span class="material-symbols-outlined text-sm">article</span> 8 Articles
                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="themeModal" class="modal hidden-modal fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden-modal')"></div>
        <div class="relative bg-[#1e1c30] w-full max-w-md rounded-2xl shadow-2xl border border-white/10 p-6 transform transition-transform scale-100">
            <h3 class="text-xl font-bold text-white mb-4">Ajouter un Thème</h3>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Nom du Thème</label>
                    <input type="text" class="w-full bg-[#121121] border-white/10 rounded-xl text-white focus:border-primary focus:ring-primary" placeholder="Ex: Vintage">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Description</label>
                    <textarea class="w-full bg-[#121121] border-white/10 rounded-xl text-white focus:border-primary focus:ring-primary" rows="3"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Icône (Material Symbol)</label>
                    <input type="text" class="w-full bg-[#121121] border-white/10 rounded-xl text-white focus:border-primary focus:ring-primary" placeholder="Ex: directions_car">
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="document.getElementById('themeModal').classList.add('hidden-modal')" class="px-4 py-2 text-gray-400 hover:text-white">Annuler</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-xl text-white font-bold hover:bg-primary/90">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>