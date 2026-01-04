<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Dashboard Admin - MaBagnole</title>

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

      <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary font-semibold transition-all">
        <span class="material-symbols-outlined filled">dashboard</span>
        Tableau de bord
      </a>
      <a href="index.php?action=categories" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
        <span class="material-symbols-outlined">category</span>
        Catégories
      </a>
      <a href="index.php?Action=usersAdmin"  class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-primary transition-all font-medium">
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
      <h2 class="text-xl font-bold text-slate-800 dark:text-white">Aperçu Général</h2>

      <div class="flex items-center gap-4">
        <div class="relative hidden sm:block">
          <span class="material-symbols-outlined absolute left-3 top-2.5 text-gray-400">search</span>
          <input type="text" placeholder="Recherche rapide..." class="pl-10 pr-4 py-2 rounded-full border-none bg-gray-100 dark:bg-gray-800 text-sm focus:ring-2 focus:ring-primary w-64 transition-all">
        </div>
        <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-white dark:border-gray-600 shadow-sm">
          <img src="https://i.pravatar.cc/150?u=admin" alt="Admin" class="w-full h-full object-cover">
        </div>
      </div>
    </header>

    <div class="flex-1 overflow-y-auto p-6 md:p-8 scroll-smooth">
      <div class="max-w-7xl mx-auto space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Revenu Total</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-2">124k <span class="text-sm text-slate-400">DH</span></h3>
              </div>
              <div class="p-3 bg-green-50 dark:bg-green-900/20 text-green-600 rounded-xl">
                <span class="material-symbols-outlined">payments</span>
              </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-medium text-green-600">
              <span class="material-symbols-outlined text-[16px] mr-1">trending_up</span>
              +12% depuis le mois dernier
            </div>
          </div>

          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Réservations</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-2">45</h3>
              </div>
              <div class="p-3 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl">
                <span class="material-symbols-outlined">calendar_month</span>
              </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-medium text-blue-600">
              <span class="material-symbols-outlined text-[16px] mr-1">hourglass_top</span>
              5 en attente
            </div>
          </div>

          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Véhicules</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-2">28</h3>
              </div>
              <div class="p-3 bg-purple-50 dark:bg-purple-900/20 text-purple-600 rounded-xl">
                <span class="material-symbols-outlined">directions_car</span>
              </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-medium text-slate-500">
              2 en maintenance
            </div>
          </div>
          <div class="bg-white dark:bg-surface p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
              <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Avis Clients</p>
                <h3 class="text-3xl font-bold text-slate-800 dark:text-white mt-2">4.8</h3>
              </div>
              <div class="p-3 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 rounded-xl">
                <span class="material-symbols-outlined">star</span>
              </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-medium text-slate-500">
              Basé sur 120 avis
            </div>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-white dark:bg-surface p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
          <div class="flex gap-2">
            <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-slate-700 dark:text-white rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">Tous</button>
            <button class="px-4 py-2 bg-transparent text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg text-sm font-medium transition-colors">Disponibles</button>
            <button class="px-4 py-2 bg-transparent text-slate-500 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg text-sm font-medium transition-colors">Loués</button>
          </div>
          <div class="flex gap-3">
            <button onclick="openModal()" class="flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-blue-700 text-white rounded-lg text-sm font-bold shadow-lg shadow-blue-500/30 transition-all transform active:scale-95">
              <span class="material-symbols-outlined text-[20px]">add_circle</span>
              Ajouter Véhicules
            </button>
          </div>
        </div>

        <div class="bg-white dark:bg-surface rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Véhicule</th>
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Info (Boite/Carb)</th>
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Prix / Jour</th>
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Categorie</th>
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide">Statut</th>
                  <th class="p-4 text-xs font-semibold text-slate-500 uppercase tracking-wide text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                <?php if (empty($voitures)): ?>
                  <tr>
                    <td colspan="5" class="p-4 text-center text-slate-500">
                      Aucune voiture trouvée.
                    </td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($voitures as $v): ?>
                    <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">

                      <td class="p-4">
                        <div class="flex items-center gap-3">
                          <div class="h-12 w-16 rounded-lg bg-gray-100 dark:bg-gray-700 overflow-hidden">
                            <img src="<?= htmlspecialchars($v->getImageUrlV()) ?>" alt="Car" class="w-full h-full object-cover">
                          </div>
                          <div>
                            <p class="font-bold text-slate-900 dark:text-white">
                              <?= htmlspecialchars($v->getMarqueV()) ?> <?= htmlspecialchars($v->getModeleV()) ?>
                            </p>
                            <p class="text-xs text-slate-500">Mat: <?= htmlspecialchars($v->getMatriculeV()) ?></p>
                          </div>
                        </div>
                      </td>

                      <td class="p-4 text-slate-600 dark:text-slate-300">
                        <?= htmlspecialchars($v->getBoiteV()) ?> <span class="text-gray-300">|</span> <?= htmlspecialchars($v->getCarburantV()) ?>
                      </td>

                      <td class="p-4 font-bold text-slate-900 dark:text-white">
                        <?= number_format($v->getPrixJourV(), 2) ?> DH
                      </td>
                      <td class="p-4 font-bold text-slate-900 dark:text-white">
                        <?= htmlspecialchars($v->getCategoryName()) ?>
                      </td>
                      <td class="p-4">
                        <?php if ($v->getStatusV() === 1): ?>
                          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            Available
                          </span>
                        <?php else: ?>
                          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                            Louée
                          </span>
                        <?php endif; ?>
                      </td>

                      <td class="p-4 text-right">
                        <button
                          onclick="openEditModal(this)"
                          data-id="<?= $v->getIdV() ?>"
                          data-marque="<?= htmlspecialchars($v->getMarqueV()) ?>"
                          data-modele="<?= htmlspecialchars($v->getModeleV()) ?>"
                          data-matricule="<?= htmlspecialchars($v->getMatriculeV()) ?>"
                          data-prix="<?= $v->getPrixJourV() ?>"
                          data-boite="<?= $v->getBoiteV() ?>"
                          data-carburant="<?= $v->getCarburantV() ?>"
                          data-status="<?= $v->getStatusV() ?>"
                          data-image="<?= htmlspecialchars($v->getImageUrlV()) ?>"
                          data-categorie="<?= $v->getCategoryName() ?>"
                          data-idCategorie="<?= $v->getIdCV() ?>"
                          class="text-slate-400 hover:text-blue-600 transition-colors cursor-pointer">
                          <span class="material-symbols-outlined text-[20px]">edit</span>
                        </button>

                        <form action="index.php" method="POST" class="inline-block ml-2" onsubmit="return confirm('Voulez-vous vraiment supprimer cette voiture ?');">

                          <input type="hidden" name="action" value="delete_voiture">
                          <input type="hidden" name="id" value="<?= $v->getIdV() ?>">

                          <button type="submit" class="text-slate-400 hover:text-red-600 transition-colors cursor-pointer" title="Supprimer">
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

          <div class="p-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
            <span class="text-sm text-slate-500">Affichage de <?= count($voitures) ?> voitures</span>
            <div class="flex gap-2">
              <button class="p-2 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50"><span class="material-symbols-outlined text-[18px]">chevron_left</span></button>
              <button class="p-2 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800"><span class="material-symbols-outlined text-[18px]">chevron_right</span></button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <div id="bulkModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-surface text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-5xl border border-gray-100 dark:border-gray-700">

          <div class="bg-gray-50 dark:bg-gray-800/50 px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
              <span class="material-symbols-outlined text-primary">playlist_add</span>
              Ajout de Véhicules en Masse
            </h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
              <span class="material-symbols-outlined">close</span>
            </button>
          </div>

          <div class="px-6 py-6 max-h-[60vh] overflow-y-auto">
            <form id="bulkForm" action="index.php" method="POST">
              <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-gray-800/50 text-xs uppercase text-slate-500 font-semibold sticky top-0">
                  <tr>
                    <th class="px-3 py-3 rounded-l-lg">Modèle</th>
                    <th class="px-3 py-3">Marque</th>
                    <th class="px-3 py-3">Matricule</th>
                    <th class="px-3 py-3">Prix/Jour</th>
                    <th class="px-3 py-3">Catégorie</th>
                    <th class="px-3 py-3">carburant</th>
                    <th class="px-3 py-3">Place</th>
                    <th class="px-3 py-3">boite</th>
                    <th class="px-3 py-3">Image (URL)</th>

                    <th class="px-3 py-3 rounded-r-lg w-12">Action</th>
                  </tr>
                </thead>
                <tbody id="bulkContainer" class="divide-y divide-gray-100 dark:divide-gray-700">
                  <input type="hidden" name="action" value="addVoiture">
                </tbody>
              </table>

              <button type="button" onclick="addRow()" class="mt-4 w-full py-3 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl text-slate-500 hover:text-primary hover:border-primary hover:bg-primary/5 transition-all flex justify-center items-center gap-2 font-medium">
                <span class="material-symbols-outlined">add_circle</span>
                Ajouter une nouvelle ligne
              </button>
            </form>
          </div>

          <div class="bg-gray-50 dark:bg-gray-800/50 px-6 py-4 flex flex-row-reverse gap-3 border-t border-gray-100 dark:border-gray-700">
            <button type="submit" form="bulkForm" class="inline-flex w-full justify-center rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-blue-500/30 hover:bg-blue-700 sm:w-auto transition-all">
              Enregistrer Tout
            </button>
            <button type="button" onclick="closeModal()" class="inline-flex w-full justify-center rounded-xl bg-white dark:bg-gray-700 px-5 py-2.5 text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 sm:w-auto transition-all">
              Annuler
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="editModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-900/50 backdrop-blur-sm overflow-y-auto">

    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
      <div class="relative p-4 bg-white rounded-xl shadow-xl dark:bg-gray-800 sm:p-5">

        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Modifier la voiture
          </h3>
          <button type="button" onclick="closeEditModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>

        <form action="index.php" method="POST">
          <input type="hidden" name="action" value="update_voiture">
          <input required type="hidden" name="id" id="modal_id">
          <div class="grid gap-4 mb-4 sm:grid-cols-2">

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marque</label>
              <input required type="text" name="marque" id="modal_marque" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modèle</label>
              <input required type="text" name="modele" id="modal_modele" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricule</label>
              <input required type="text" name="matricule" id="modal_matricule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix / Jour</label>
              <input required type="number" step="0.01" name="prix" id="modal_prix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boite</label>
              <select required name="boite" id="modal_boit"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"  >
                <option  value="Manuelle">Manuelle</option>
                <option value="Automatique">Automatique</option>
              </select>
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carburant</label>
              <select name="carburant" id="modal_carb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="Diesel">Diesel</option>
                <option value="Essence">Essence</option>
                <option value="Hybride">Hybride</option>
                <option value="Electrique">Electrique</option>
              </select>
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
              <select name="categorie_id" id="modal_categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option id="catinp" value="" ></option>
                <?php foreach ($categories as $cat): ?>
                  <option value="<?= $cat['id_c'] ?>"> <?= htmlspecialchars($cat['libelle']) ?> </option>
                <?php endforeach; ?>

              </select>
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut</label>
              <select name="status" id="modal_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="1">Disponible</option>
                <option value="0">Louée</option>
              </select>
            </div>

            <div class="sm:col-span-2">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image URL</label>
              <input type="text" name="image" id="modal_image_input" oninput="document.getElementById('modal_image_preview').src = this.value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-2">
              <img src="" id="modal_image_preview" class="h-20 w-auto rounded border object-cover">
            </div>
          </div>

          <div class="flex items-center space-x-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
              Mettre à jour
            </button>
            <button type="button" onclick="closeEditModal()" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
              Annuler
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
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


    function openModal() {
      document.getElementById('bulkModal').classList.remove('hidden');
      if (document.getElementById('bulkContainer').children.length === 0) addRow();
    }

    function closeModal() {
      document.getElementById('bulkModal').classList.add('hidden');
    }

    function addRow() {
      const container = document.getElementById('bulkContainer');


      const tr = document.createElement('tr');
      tr.className = "bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50";


      tr.innerHTML = `
        <td class="px-3 py-3">
            <input type="text" name="modeles[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required placeholder="Ex: Clio 4">
        </td>
        <td class="px-3 py-3">
            <input type="text" name="marques[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required placeholder="Ex: Renault">
        </td>
        <td class="px-3 py-3">
            <input type="text" name="matricules[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required>
        </td>
        <td class="px-3 py-3">
            <input type="number" name="prix[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required step="0.01">
        </td>
        <td class="px-3 py-3">
             <select name="categories[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required>
                <option value="" selected disabled >Choisir...</option>
                 <option value="1">Essence</option>
                <?php
                $categories = [];
                foreach ($categories as $cat): ?>
                    <option value="<?= $cat['idCategorie'] ?>"><?= $cat['nomCategorie'] ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td class="px-3 py-3">
            <select name="carburants[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2">
                <option value="Diesel">Diesel</option>
                <option value="Essence">Essence</option>
                <option value="Electrique">Electrique</option>
                <option value="Hybride">Hybride</option>
            </select>
        </td>
       <td class="px-3 py-3">
            <input type="number" name="places[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" required >
        </td>
        <td class="px-3 py-3">
            <select name="boites[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2">
                <option value="Manuelle">Manuelle</option>
                <option value="Automatique">Automatique</option>
            </select>
        </td>
        <td class="px-3 py-3">
            <input type="url" name="images[]" class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg p-2" placeholder="https://exemple.com/photo.jpg">
        </td>
        <td class="px-3 py-3 text-center">
            <button type="button" onclick="this.closest('tr').remove()" class="text-red-500 hover:text-red-700">
                <span class="material-symbols-outlined">delete</span>
            </button>
        </td>
    `;
      container.appendChild(tr);
    }


    document.addEventListener('DOMContentLoaded', () => {
      addRow();
    });


    function openEditModal(button) {
      const modal = document.getElementById('editModal');


      const id = button.getAttribute('data-id');
      const marque = button.getAttribute('data-marque');
      const modele = button.getAttribute('data-modele');
      const matricule = button.getAttribute('data-matricule');
      const prix = button.getAttribute('data-prix');
      const boite = button.getAttribute('data-boite');
      const carburant = button.getAttribute('data-carburant');
      const status = button.getAttribute('data-status');
      const image = button.getAttribute('data-image');
      const categorie = button.getAttribute('data-categorie');
      const idCategorie = button.getAttribute('data-idCategorie');

      
      document.getElementById('modal_id').value = id;
      document.getElementById('modal_marque').value = marque;
      document.getElementById('modal_modele').value = modele;
      document.getElementById('modal_matricule').value = matricule;
      document.getElementById('modal_prix').value = prix;
      document.getElementById('modal_boit').value = boite;
      document.getElementById('modal_carb').value = carburant;
      document.getElementById('modal_status').value = status;
      document.getElementById('catinp').innerText = categorie;
      document.getElementById('catinp').value = idCategorie;
      
     
      document.getElementById('modal_image_input').value = image;
      document.getElementById('modal_image_preview').src = image;

    
      modal.classList.remove('hidden');
    }

    
    function closeEditModal() {
      const modal = document.getElementById('editModal');
      modal.classList.add('hidden');
    }

    window.onclick = function(event) {
      const modal = document.getElementById('editModal');
      if (event.target == modal) {
        closeEditModal();
      }
    }
  </script>
</body>

</html>