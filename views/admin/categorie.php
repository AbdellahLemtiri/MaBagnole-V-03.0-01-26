<!DOCTYPE html>
<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Catégories - Admin MaBagnole</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet" />

  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif']
          },
          colors: {
            primary: {
              DEFAULT: "#2563EB",
              hover: "#1D4ED8",
              light: "#EFF6FF"
            },
            secondary: "#64748B",
            success: "#10B981",
            warning: "#F59E0B",
            danger: "#EF4444",
            dark: "#0F172A",
            surface: "#1E293B"
          }
        }
      }
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

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden selection:bg-primary selection:text-white transition-colors duration-300">

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

      <a href="index.php?action=carAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">dashboard</span>
        Tableau de bord
      </a>
      <a href="" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
        <span class="material-symbols-outlined filled">category</span>
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
      <h2 class="text-xl font-bold text-slate-800 dark:text-white">Gestion des Catégories</h2>
      <div class="flex items-center gap-4">
        <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-600 shadow-sm">
          <img src="https://i.pravatar.cc/150?u=admin" alt="Admin" class="w-full h-full object-cover">
        </div>
      </div>
    </header>

    <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
      <div class="max-w-5xl mx-auto space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Catégories</p>
              <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1"></h3>
            </div>
            <div class="p-3 bg-purple-50 dark:bg-purple-900/20 text-purple-600 rounded-xl">
              <span class="material-symbols-outlined">category</span>
            </div>
          </div>

          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Catégorie Populaire</p>
              <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">SUV / 4x4</h3>
            </div>
            <div class="p-3 bg-orange-50 dark:bg-orange-900/20 text-orange-600 rounded-xl">
              <span class="material-symbols-outlined">trending_up</span>
            </div>
          </div>

          <button onclick="openModal('add')" class="bg-primary hover:bg-blue-700 text-white p-6 rounded-2xl shadow-lg shadow-blue-500/30 transition-all transform hover:scale-[1.02] flex flex-col items-center justify-center gap-2 border border-blue-500 cursor-pointer">
            <span class="material-symbols-outlined text-[32px]">add_circle</span>
            <span class="font-bold text-lg">Nouvelle Catégorie</span>
          </button>
        </div>

        <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
          <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
            <h3 class="font-bold text-lg text-slate-800 dark:text-white">Liste des Catégories</h3>
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-2 text-gray-400 text-[20px]">search</span>
              <input type="text" placeholder="Rechercher..." class="pl-9 pr-4 py-1.5 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-sm focus:ring-primary w-48">
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Nom de la Catégorie</th>
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Description</th>
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">

                <?php if (empty($categories)): ?>
                  <tr>
                    <td colspan="3" class="p-5 text-center text-gray-500">Aucune catégorie trouvée.</td>
                  </tr>
                <?php else: ?>
                  <?php


                  foreach ($categories as $cat): ?>
                    <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                      <td class="p-5">
                        <div class="flex items-center gap-3">
                          <?php
                          $colors = ['bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-red-100 text-red-600', 'bg-purple-100 text-purple-600'];
                          $colorClass = $colors[$cat->getIdC() % 4];
                          ?>
                          <div class="h-10 w-10 rounded-lg <?= $colorClass ?> dark:bg-opacity-20 flex items-center justify-center">
                            <span class="material-symbols-outlined"><?= $cat->getIcone() ?></span>
                          </div>
                          <span class="font-bold text-slate-900 dark:text-white text-base">
                            <?= htmlspecialchars($cat->getTitre()) ?>
                          </span>
                        </div>
                      </td>

                      <td class="p-5 text-slate-600 dark:text-slate-300 max-w-xs truncate">
                        <?= htmlspecialchars($cat->getDescription() ?? 'Aucune description') ?>
                      </td>

                      <td class="p-5 text-center">
                        <button
                          onclick="openModal('edit', this)"
                          data-id="<?= $cat->getIdC() ?>"
                          data-libelle="<?= htmlspecialchars($cat->getTitre()) ?>"
                          data-description="<?= htmlspecialchars($cat->getDescription() ?? '') ?>"
                          data-icon="<?= htmlspecialchars($cat->getIcone() ?? 'category') ?>"
                          class="p-2 text-slate-400 hover:text-primary hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors cursor-pointer">
                          <span class="material-symbols-outlined text-[20px]">edit</span>
                        </button>

                        <form action="index.php" method="POST" class="inline-block ml-1" onsubmit="return confirm('Supprimer cette catégorie ?');">
                          <input type="hidden" name="action" value="delete_categorie">
                          <input type="hidden" name="id" value="<?= $cat->getIdC() ?>">
                          <button type="submit" class="p-2 text-slate-400 hover:text-danger hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <div id="categoryModal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-gray-900/50 backdrop-blur-sm">
    <div class="bg-white dark:bg-surface rounded-2xl shadow-xl w-full max-w-md p-6 transform transition-all">
      <div class="flex justify-between items-center mb-5">
        <h3 id="modalTitle" class="text-xl font-bold text-gray-900 dark:text-white">Nouvelle Catégorie</h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>

      <form action="index.php" method="POST" id="categoryForm">
        <input type="hidden" name="action" id="formAction" value="add_categorie">
        <input type="hidden" name="id" id="catId">

        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom de la catégorie</label>
            <input type="text" name="titre" id="catLibelle" required class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-sm focus:ring-primary focus:border-primary">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
            <textarea name="description" id="catDesc" rows="3" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-sm focus:ring-primary focus:border-primary"></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Icône (Google Icon Name)</label>
            <input type="text" name="icone" id="catIcon" placeholder="ex: local_taxi" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-sm">
            <p class="text-xs text-gray-500 mt-1">Trouvez les icônes sur <a href="https://fonts.google.com/icons" target="_blank" class="text-blue-500 underline">Google Fonts</a></p>
          </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
          <button type="button" onclick="closeModal()" class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 text-sm font-medium">Annuler</button>
          <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary hover:bg-blue-700 text-white text-sm font-medium shadow-sm">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById('categoryModal');
    const form = document.getElementById('categoryForm');
    const formAction = document.getElementById('formAction');
    const title = document.getElementById('modalTitle');

    const inpId = document.getElementById('catId');
    const inpLibelle = document.getElementById('catLibelle');
    const inpDesc = document.getElementById('catDesc');
    const inpIcon = document.getElementById('catIcon');

    function openModal(mode, btn = null) {
      modal.classList.remove('hidden');

      if (mode === 'edit') {
        title.innerText = 'Modifier la Catégorie';
        formAction.value = 'update_categorie';


        inpId.value = btn.getAttribute('data-id');
        inpLibelle.value = btn.getAttribute('data-libelle');
        inpDesc.value = btn.getAttribute('data-description');
        inpIcon.value = btn.getAttribute('data-icon');
      } else {

        title.innerText = 'Nouvelle Catégorie';
        formAction.value = 'add_categorie';
        form.reset();
      }
    }

    function closeModal() {
      modal.classList.add('hidden');
    }

    window.onclick = function(e) {
      if (e.target == modal) closeModal();
    }
  
    function toggleTheme() {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    }

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    }
  </script>



</body>

</html>