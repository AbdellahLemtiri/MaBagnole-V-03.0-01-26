<!DOCTYPE html>
<html class="light" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Réservations - Admin MaBagnole</title>

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
    .hide-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .glass-effect {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
    }

    .dark .glass-effect {
      background: rgba(15, 23, 42, 0.95);
    }
  </style>
</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 antialiased h-screen flex overflow-hidden transition-colors duration-300">


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

      <a href="index.php?action=reservation" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
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

      <a href="index.php?action=usersAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">group</span>
        Clients
      </a>



      <a href="index.php?action=articleAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
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

    <header class="h-20 glass-effect flex items-center justify-between px-8 z-10 sticky top-0">
      <h2 class="text-xl font-bold text-slate-800 dark:text-white flex items-center gap-2">
        Gestion des Réservations
        <span class="px-2 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-xs text-gray-500 font-medium border border-gray-200 dark:border-gray-600">45 total</span>
      </h2>
      <div class="flex items-center gap-4">
        <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-600 shadow-sm">
          <img src="https://i.pravatar.cc/150?u=admin" alt="Admin" class="w-full h-full object-cover" />
        </div>
      </div>
    </header>

    <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">

      <div class="max-w-7xl mx-auto space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:translate-y-[-2px] transition-all duration-300">
            <div>
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">En attente</p>
              <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">12</h3>
            </div>
            <div class="p-3 bg-orange-50 dark:bg-orange-900/20 text-orange-600 rounded-xl">
              <span class="material-symbols-outlined">pending_actions</span>
            </div>
          </div>
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:translate-y-[-2px] transition-all duration-300">
            <div>
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Confirmées ce mois</p>
              <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">28</h3>
            </div>
            <div class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
              <span class="material-symbols-outlined">event_available</span>
            </div>
          </div>
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:translate-y-[-2px] transition-all duration-300">
            <div>
              <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Revenu Estimé</p>
              <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-1">45.2K <span class="text-sm font-normal text-slate-400">DH</span></h3>
            </div>
            <div class="p-3 bg-green-50 dark:bg-green-900/20 text-green-600 rounded-xl">
              <span class="material-symbols-outlined">payments</span>
            </div>
          </div>
        </div>


        <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide">Véhicule</th>
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide">Client</th>
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide">Période</th>
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide">Montant</th>
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide">Statut</th>
                  <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wide text-right">Actions</th>
                </tr>
              </thead>
             <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
    <?php foreach ($reservations as $res): ?>
        <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
            
            <td class="p-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-10 rounded-lg bg-gray-100 overflow-hidden">
                        <img src="<?= $res->getVoiture()->getImageUrlV() ?>" class="w-full h-full object-cover" alt="Car">
                    </div>
                    <div>
                        <p class="font-bold text-slate-900 dark:text-white">
                            <?= $res->getVoiture()->getMarqueV() ?> <?= $res->getVoiture()->getModeleV() ?>
                        </p>
                        <p class="text-xs text-slate-500">ID: #<?= $res->getIdReservation() ?></p>
                    </div>
                </div>
            </td>

            <td class="p-5">
                <div>
                    <p class="font-medium text-slate-900 dark:text-white">
                        <?= $res->getClient()->getLastName() ?> <?= $res->getClient()->getName() ?>
                    </p>
                    <p class="text-xs text-slate-500 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[10px]">mail</span>
                        <?= $res->getClient()->getEmail() ?>
                    </p>
                </div>
            </td>

            <td class="p-5">
                <div class="flex flex-col text-xs font-medium">
                    <span class="text-slate-900 dark:text-gray-300">
                        <?= date('d M', strtotime($res->getDateDebut())) ?>
                        <span class="text-slate-400">➔</span>
                        <?= date('d M Y', strtotime($res->getDateFin())) ?>
                    </span>
                    <?php
                    $start = new DateTime($res->getDateDebut());
                    $end = new DateTime($res->getDateFin());
                    $days = $end->diff($start)->days;
                    ?>
                    <span class="text-slate-400 mt-0.5"><?= $days ?> Jours</span>
                </div>
            </td>

            <td class="p-5 font-bold text-slate-900 dark:text-white">
                <?= number_format($res->getTotalPrix(), 2) ?> DH
            </td>

            <td class="p-5">
                <?php 
             
                $statusColor = match($res->getStatus()) {
                    'en cours' => 'bg-orange-100 text-orange-600 border-orange-200',
                    'terminee' => 'bg-green-100 text-green-600 border-green-200',
                    'annulee'  => 'bg-red-100 text-red-600 border-red-200',
                    default    => 'bg-gray-100 text-gray-600'
                };
                ?>
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold border <?= $statusColor ?>">
                    <?= ucfirst($res->getStatus()) ?>
                </span>
            </td>

            <td class="p-5">
                <?php if ($res->getStatus() === 'en cours'): ?>
                    <div class="flex items-center gap-2">
                        
                        <form action="index.php" method="POST">
                            <input type="hidden" name="action" value="updateStatusRservation">
                            <input type="hidden" name="id_reservation" value="<?= $res->getIdReservation() ?>">
                            <input type="hidden" name="new_status" value="terminee">
                            <button type="submit" class="p-2 rounded-lg text-green-600 hover:bg-green-50 transition-colors" title="Terminer">
                                <span class="material-symbols-outlined text-lg">check_circle</span>
                            </button>
                        </form>

                        <form action="index.php" method="POST">
                            <input type="hidden" name="action" value="updateStatusRservation">
                            <input type="hidden" name="id_reservation" value="<?= $res->getIdReservation() ?>">
                            <input type="hidden" name="new_status" value="annulee">
                            <button type="submit" class="p-2 rounded-lg text-red-500 hover:bg-red-50 transition-colors" title="Annuler" onclick="return confirm('Wach mt2kd baghi t-annuli had reservation?');">
                                <span class="material-symbols-outlined text-lg">cancel</span>
                            </button>
                        </form>
                        
                    </div>
                <?php else: ?>
                    <span class="text-xs text-gray-400 italic">Aucune action</span>
                <?php endif; ?>
            </td>

        </tr>
    <?php endforeach; ?>
</tbody>
            </table>
          </div>

          <div class="p-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
            <span class="text-xs text-slate-500">Affichage 1-10 de 45</span>
            <div class="flex gap-1">
              <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-xs font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Précédent</button>
              <button class="px-3 py-1 rounded-lg border border-gray-200 dark:border-gray-700 text-xs font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Suivant</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <script>
    // Theme Toggle Script
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
  </script>
</body>

</html>