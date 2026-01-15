<!DOCTYPE html>
<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Clients - Admin MaBagnole</title>

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
      <a href="index.php?action=usersAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
        <span class="material-symbols-outlined">group</span>
        Clients
      </a>



      <a href="index.php?action=ArticleAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">article</span>
        Articles
      </a>

      <a href="index.php?action=themeAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
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
    <header
      class="h-20 bg-white/80 dark:bg-surface/80 glass-effect border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-8 z-10 sticky top-0">
      <h2 class="text-xl font-bold text-slate-800 dark:text-white">
        Gestion des Clients
      </h2>

      <div class="flex items-center gap-4">
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
                Total Clients
              </p>
              <h3
                class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
               <?= count($clients) ?>
              </h3>
            </div>
            <div
              class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
              <span class="material-symbols-outlined">group</span>
            </div>
          </div>

    

          <div
            class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition-all">
            <div>
              <p
                class="text-sm font-medium text-slate-500 dark:text-slate-400">
                Clients Actifs
              </p>
              <h3
                class="text-3xl font-bold text-slate-800 dark:text-white mt-1">
              <?= $countActif ?>
              </h3>
            </div>
            <div
              class="p-3 bg-purple-50 dark:bg-purple-900/20 text-purple-600 rounded-xl">
              <span class="material-symbols-outlined">verified_user</span>
            </div>
          </div>
        </div>

        <div
          class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-white dark:bg-surface p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
          <div class="relative w-full sm:w-96">
            <span
              class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400">search</span>
            <input
              type="text"
              placeholder="Rechercher par nom, email..."
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-sm focus:ring-primary focus:border-primary transition-all" />
          </div>

        </div>

        <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Client</th>
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Contact</th>
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide">Statut</th>
                  <th class="p-5 text-xs font-semibold text-slate-500 uppercase tracking-wide text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">

                <?php
                if (empty($clients)): ?>
                  <tr>
                    <td colspan="4" class="p-5 text-center text-slate-500">Aucun client trouvé.</td>
                  </tr>
                <?php else: ?>

                  <?php foreach ($clients as $client):

                  ?>
                    <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                      <td class="p-5">
                        <div class="flex items-center gap-3">
                          <div class="h-10 w-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                            <?= strtoupper(substr($client->getName(), 0, 1) . substr($client->getLastName(), 0, 1)) ?>
                          </div>
                          <div>
                            <p class="font-bold text-slate-900 dark:text-white">
                              <?= htmlspecialchars($client->getName() . ' ' . $client->getLastName()) ?>
                            </p>
                            <p class="text-xs text-slate-500">
                              ID: #<?= $client->getIdUser() ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="p-5">
                        <div class="flex flex-col text-slate-600 dark:text-slate-300">
                          <span class="text-xs flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">mail</span>
                            <?= htmlspecialchars($client->getEmail()) ?>
                          </span>
                          <span class="text-xs flex items-center gap-1 mt-1">
                            <span class="material-symbols-outlined text-[14px]">call</span>
                            <?= htmlspecialchars($client->getPhone()) ?>
                          </span>
                        </div>
                      </td>
                      <td class="p-5">
                        <?php if ($client->getStatus() == '1'): ?>
                          <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                            Actif
                          </span>
                        <?php else: ?>
                          <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                            Bloqué
                          </span>
                        <?php endif; ?>
                      </td>
                      <td class="p-5 text-right flex items-center justify-end gap-1">


                        <?php if ($client->getStatus() == '1'): ?>
                          <form action="index.php" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment bloquer ce client ?');">
                            <input type="hidden" name="action" value="block_user">
                            <input type="hidden" name="id" value="<?= $client->getIdUser() ?>">

                            <button type="submit" class="text-slate-400 hover:text-danger transition-colors p-2 rounded-lg hover:bg-red-50 dark:hover:bg-gray-800" title="Bloquer">
                              <span class="material-symbols-outlined text-[20px]">block</span>
                            </button>
                          </form>

                        <?php else: ?>
                          <form action="index.php" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous réactiver ce client ?');">
                            <input type="hidden" name="action" value="activate_user">
                            <input type="hidden" name="id" value="<?= $client->getIdUser() ?>">

                            <button type="submit" class="text-slate-400 hover:text-success transition-colors p-2 rounded-lg hover:bg-green-50 dark:hover:bg-gray-800" title="Activer">
                              <span class="material-symbols-outlined text-[20px]">check_circle</span>
                            </button>
                          </form>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="p-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
            <span class="text-sm text-slate-500">Total Clients: </span>
          </div>
        </div>
      </div>
    </div>
  </main>



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
    if (
      localStorage.theme === "dark" ||
      (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      document.documentElement.classList.add("dark");
    }
  </script>
</body>

</html>