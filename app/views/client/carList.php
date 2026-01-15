<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuxeDrive - Premium Vehicle Listing</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
     <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/carList.css">

    
</head>

<body style="width: 100%;" class="bg-background-light dark:bg-background-dark font-display text-text-main dark:text-white min-h-screen flex flex-col transition-colors duration-300">
    <?php include 'includes/alertsCar.php' ?>
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-3"></div>

    <header class="fixed w-full top-0 z-50 bg-white/70 dark:bg-[#0F172A]/70 backdrop-blur-xl border-b border-gray-200/50 dark:border-white/5 transition-all duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 h-20 flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="carList" class="flex items-center ">
                    <div class="w-16 h-16 rounded-full bg-primary/60 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">

                        <img src="public/assets/images/logo/logoMaBangole.png"
                            alt="MaBagnole Logo"
                            class="w-full h-full object-cover drop-shadow-sm relative z-10">
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1 bg-gray-100/50 dark:bg-white/5 p-1 rounded-full border border-gray-200/50 dark:border-white/5">
                    <a href="carList" class="px-5 py-2 rounded-full text-sm font-bold bg-white dark:bg-white/10 text-primary shadow-sm">Véhicules</a>
                    <a href="reservationUser" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Réservations</a>
                    <a href="themeClient" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Blog</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:bg-gray-100 dark:hover:bg-white/5 transition-all">
                    <span class="material-symbols-rounded dark:hidden text-xl">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block text-xl text-yellow-400">light_mode</span>
                </button>

                <div class="h-6 w-px bg-gray-200 dark:bg-white/10 mx-1"></div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold dark:text-white leading-none"><?= $_SESSION['userName']   ?></p>
                        <a href="logout" class="text-[11px] text-danger font-semibold hover:opacity-80">Se déconnecter</a>
                    </div>
                    <div class="relative group cursor-pointer">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['userName']  ?>&background=4F46E5&color=fff&bold=true"
                            alt="Profile" class="w-10 h-10 rounded-full border-2 border-white dark:border-surface-dark shadow-md" />
                        <div class="absolute inset-0 rounded-full border border-black/10 dark:border-white/10"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-[1440px] mx-auto w-full px-6 lg:px-12 pt-28 pb-12">

        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10">
            <div>
                <div class="flex gap-2 text-sm text-text-muted dark:text-gray-400 mb-2 font-medium">
                </div>
                <h1 class="text-4xl md:text-5xl font-black mb-2 dark:text-white">Notre Flotte <span class="text-primary">Premium</span></h1>
                <p class="text-text-muted dark:text-gray-400 text-lg">Découvrez le luxe et la performance.</p>
            </div>

            <div class="flex items-center gap-3 bg-white dark:bg-card-dark p-1 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <span class="pl-3 text-sm font-medium text-text-muted">Trier:</span>
                <select id="sortSelect" class="border-none bg-transparent text-sm font-bold text-gray-800 dark:text-white focus:ring-0 cursor-pointer py-2 pr-8">
                    <option class="dark:bg-background-dark" value="relevance">Pertinence</option>
                    <option class="dark:bg-background-dark" value="price_asc">Prix: Croissant</option>
                    <option class="dark:bg-background-dark" value="price_desc">Prix: Décroissant</option>
                    <option class="dark:bg-background-dark" value="rating">Mieux Notés</option>
                </select>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <aside class="w-full lg:w-72 shrink-0 bg-white dark:bg-card-dark rounded-3xl p-6 shadow-lg shadow-gray-100/50 dark:shadow-none border border-gray-100 dark:border-gray-800 sticky top-28 transition-colors duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold flex items-center gap-2">
                        <span class="material-symbols-rounded text-primary">tune</span> Filtres
                    </h3>
                    <button onclick="resetFilters()" class="text-xs font-bold text-primary hover:text-primary-dark hover:underline">Réinitialiser</button>
                </div>

                <div class="mb-8">
                    <h4 class="text-xs font-bold text-text-muted uppercase tracking-wider mb-4">Catégorie</h4>
                    <div class="space-y-3" id="categoryFilters">
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="text-xs font-bold text-text-muted uppercase tracking-wider mb-4">Prix Journalier (Max)</h4>
                    <input type="range" id="priceRange" min="200" max="20000" step="50" value="20000" class="w-full mb-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-text-muted">200 DH</span>
                        <span class="text-sm font-bold text-primary bg-primary/10 px-3 py-1 rounded-lg" id="priceValue">2000 DH</span>
                    </div>
                </div>
            </aside>

            <div class="flex-1 w-full">
                <div id="activeFilters" class="flex gap-2 mb-6 flex-wrap min-h-[32px]"></div>

                <div id="vehiclesGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                </div>

                <div id="emptyState" class="hidden flex-col items-center justify-center py-20 text-center">
                    <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                        <span class="material-symbols-rounded text-4xl text-gray-400">no_crash</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Aucun véhicule trouvé</h3>
                    <p class="text-text-muted">Essayez de modifier vos filtres de recherche.</p>
                    <button onclick="resetFilters()" class="mt-4 px-6 py-2 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/30 hover:bg-primary-dark transition-all">
                        Effacer les filtres
                    </button>
                </div>
                <div class="flex items-center justify-center gap-2 mt-12" id="pagination">
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-10 mt-auto transition-colors">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted">Ma Bagnole by lemtiri . Fait avec passion pour le code 12/2025 .</p>
            <!-- 31-12-2025 -->
        </div>
    </footer>

    <script src="/MaBagnoleV1/public/assets/js/client/carList.js"></script>

</body>

</html>