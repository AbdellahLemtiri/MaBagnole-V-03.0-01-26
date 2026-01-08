<?php

// $reservations = Reservation::getAllReservations(); 
$reservations = [
  (object)[
    'id' => 1024,
    'client_nom' => 'Amine Tounsi',
    'client_email' => 'amine@gmail.com',
    'voiture_image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=300&q=80',
    'voiture_nom' => 'Chevrolet Camaro',
    'date_debut' => '2024-06-01',
    'date_fin' => '2024-06-05',
    'total' => 2500.00,
    'status' => 'en attente'
  ],
  (object)[
    'id' => 1023,
    'client_nom' => 'Sarah Benali',
    'client_email' => 'sarah.b@hotmail.com',
    'voiture_image' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&w=300&q=80',
    'voiture_nom' => 'Tesla Model 3',
    'date_debut' => '2024-05-20',
    'date_fin' => '2024-05-22',
    'total' => 1800.00,
    'status' => 'confirmee'
  ],
  (object)[
    'id' => 1020,
    'client_nom' => 'Omar Kabbaj',
    'client_email' => 'o.kabbaj@company.ma',
    'voiture_image' => 'https://images.unsplash.com/photo-1605559424843-9e4c2287f38d?auto=format&fit=crop&w=300&q=80',
    'voiture_nom' => 'Mercedes G-Class',
    'date_debut' => '2024-04-10',
    'date_fin' => '2024-04-15',
    'total' => 12000.00,
    'status' => 'terminee'
  ]
];
?>

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
            sans: ['"Plus Jakarta Sans"', "sans-serif"]
          },
          colors: {
            primary: {
              DEFAULT: "#4F46E5",
              hover: "#4338CA",
              light: "#EEF2FF"
            }, // Indigo Theme
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
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .dark .glass-effect {
      background: rgba(15, 23, 42, 0.9);
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
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
     
      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
        <span class="material-symbols-outlined filled">dashboard</span>
        Tableau de bord
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined filled">directions_car</span>
      Cars
      </a>
      <a href="index.php?action=categories" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">category</span>
        Catégories
      </a>
      </a>

      <a href="index.php?action=usersAdmin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">group</span>
        Clients

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

                <?php if (empty($reservations)): ?>
                  <tr>
                    <td colspan="6" class="p-10 text-center text-slate-500">Aucune réservation trouvée.</td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($reservations as $res): ?>
                    <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">

                      <td class="p-5">
                        <div class="flex items-center gap-3">
                          <div class="w-12 h-10 rounded-lg bg-gray-100 overflow-hidden">
                            <img src="<?= $res->voiture_image ?>" class="w-full h-full object-cover" alt="Car">
                          </div>
                          <div>
                            <p class="font-bold text-slate-900 dark:text-white"><?= $res->voiture_nom ?></p>
                            <p class="text-xs text-slate-500">ID: #<?= $res->id ?></p>
                          </div>
                        </div>
                      </td>

                      <td class="p-5">
                        <div>
                          <p class="font-medium text-slate-900 dark:text-white"><?= $res->client_nom ?></p>
                          <p class="text-xs text-slate-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[10px]">mail</span>
                            <?= $res->client_email ?>
                          </p>
                        </div>
                      </td>

                      <td class="p-5">
                        <div class="flex flex-col text-xs font-medium">
                          <span class="text-slate-900 dark:text-gray-300"><?= date('d M', strtotime($res->date_debut)) ?> <span class="text-slate-400">➔</span> <?= date('d M Y', strtotime($res->date_fin)) ?></span>

                          <?php
                          $start = new DateTime($res->date_debut);
                          $end = new DateTime($res->date_fin);
                          $days = $end->diff($start)->days;
                          ?>
                          <span class="text-slate-400 mt-0.5"><?= $days ?> Jours</span>
                        </div>
                      </td>

                      <td class="p-5 font-bold text-slate-900 dark:text-white">
                        <?= number_format($res->total, 2) ?> DH
                      </td>

                      <td class="p-5">
                        <?php
                        $status = strtolower($res->status);
                        $badgeClass = '';
                        $icon = '';
                        $text = '';

                        if ($status == 'en attente') {
                          $badgeClass = 'bg-orange-100 text-orange-700 dark:bg-orange-500/10 dark:text-orange-400 border border-orange-200 dark:border-orange-500/20';
                          $icon = 'hourglass_top';
                          $text = 'En attente';
                        } elseif ($status == 'confirmee' || $status == 'en cours') {
                          $badgeClass = 'bg-blue-100 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20';
                          $icon = 'verified';
                          $text = 'Confirmée';
                        } elseif ($status == 'terminee') {
                          $badgeClass = 'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400 border border-green-200 dark:border-green-500/20';
                          $icon = 'check_circle';
                          $text = 'Terminée';
                        } else {
                          $badgeClass = 'bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400 border border-red-200 dark:border-red-500/20';
                          $icon = 'cancel';
                          $text = 'Annulée';
                        }
                        ?>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold <?= $badgeClass ?>">
                          <span class="material-symbols-outlined text-[14px]"><?= $icon ?></span>
                          <?= $text ?>
                        </span>
                      </td>

                      <td class="p-5 text-right">
                        <div class="flex items-center justify-end gap-2">
                          <?php if ($status == 'en attente'): ?>
                            <button title="Valider" class="p-2 rounded-lg text-green-600 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                              <span class="material-symbols-outlined text-[20px]">check</span>
                            </button>
                            <button title="Refuser" class="p-2 rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                              <span class="material-symbols-outlined text-[20px]">close</span>
                            </button>
                          <?php else: ?>
                            <button title="Détails" class="p-2 rounded-lg text-slate-400 hover:text-primary-DEFAULT hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                              <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                          <?php endif; ?>

                          <button class="p-2 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">more_vert</span>
                          </button>
                        </div>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
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