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
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4F46E5",
                        /* Indigo Premium */
                        "primary-dark": "#4338CA",
                        "background-light": "#F8FAFC",
                        "background-dark": "#0F172A",
                        "card-light": "#ffffff",
                        "card-dark": "#1E293B",
                        "text-main": "#0F172A",
                        "text-muted": "#64748B"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(10px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        }
                    }
                },
            },
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }

        /* Range Slider Styling */
        input[type=range] {
            -webkit-appearance: none;
            background: transparent;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #4F46E5;
            cursor: pointer;
            margin-top: -8px;
            box-shadow: 0 2px 6px rgba(79, 70, 229, 0.4);
            transition: transform 0.1s;
        }

        input[type=range]::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            background: #E2E8F0;
            border-radius: 2px;
        }

        .dark input[type=range]::-webkit-slider-runnable-track {
            background: #334155;
        }

        /* Smooth Loading */
        .vehicle-card {
            animation: slideUp 0.4s ease-out forwards;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-main dark:text-white min-h-screen flex flex-col transition-colors duration-300">

    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-3"></div>

    <header class="fixed w-full top-0 z-50 bg-white/80 dark:bg-card-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a href="index.php?action=carList" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-purple-600 text-white flex items-center justify-center shadow-lg group-hover:shadow-primary/50 transition-all duration-300">
                        <span class="material-symbols-rounded text-2xl">directions_car</span>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">Ma Bagnole</h2>
                </a>
                <div class="hidden lg:flex items-center gap-8">
                    <a href="#" class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors" href="index.php">Véhicules</a>
                    <a class="text-sm font-bold text-primary" href="index.php?action=reservationUser">Mes Réservations</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                    <span class="material-symbols-rounded dark:hidden">dark_mode</span>
                    <span class="material-symbols-rounded hidden dark:block">light_mode</span>
                </button>

                <div class="flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-gray-700">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold leading-none"><?= $_SESSION['nom'] ?? 'Client' ?></p>
                        <a href="logout.php" class="text-xs text-red-500 font-medium hover:underline">Déconnexion</a>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden border-2 border-transparent hover:border-primary transition-all">
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nom'] ?? 'U' ?>&background=random" alt="Profile" class="w-full h-full object-cover">
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-[1440px] mx-auto w-full px-6 lg:px-12 pt-28 pb-12">

        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10">
            <div>
                <div class="flex gap-2 text-sm text-text-muted dark:text-gray-400 mb-2 font-medium">
                    <a href="#" class="hover:text-primary">Accueil</a> / <span>Flotte</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black mb-2 dark:text-white">Notre Flotte <span class="text-primary">Premium</span></h1>
                <p class="text-text-muted dark:text-gray-400 text-lg">Découvrez le luxe et la performance.</p>
            </div>

            <div class="flex items-center gap-3 bg-white dark:bg-card-dark p-1 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <span class="pl-3 text-sm font-medium text-text-muted">Trier:</span>
                <select id="sortSelect" class="border-none bg-transparent text-sm font-bold text-gray-800 dark:text-white focus:ring-0 cursor-pointer py-2 pr-8">
                    <option value="relevance">Pertinence</option>
                    <option value="price_asc">Prix: Croissant</option>
                    <option value="price_desc">Prix: Décroissant</option>
                    <option value="rating">Mieux Notés</option>
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
            <p class="text-sm text-text-muted">© 2024 LuxeDrive. Fait avec passion pour le code.</p>
        </div>
    </footer>

    <script>
        let state = {
            vehicles: [],
            allVehicles: [],
            filters: {
                categories: [],
                maxPrice: 3000,
                search: ""
            },
            sort: "relevance",
            currentPage: 1,
            itemsPerPage: 6
        };


        const gridEl = document.getElementById('vehiclesGrid');
        const emptyStateEl = document.getElementById('emptyState');
        const categoryFiltersEl = document.getElementById('categoryFilters');
        const priceRangeEl = document.getElementById('priceRange');
        const priceValueEl = document.getElementById('priceValue');
        const searchInput = document.getElementById('searchInput');
        const sortSelect = document.getElementById('sortSelect');
        const activeFiltersEl = document.getElementById('activeFilters');
        const paginationEl = document.getElementById('pagination');

        async function init() {
            checkTheme();


            gridEl.innerHTML = '<div class="col-span-full text-center py-20"><span class="material-symbols-rounded animate-spin text-4xl text-primary">progress_activity</span><p class="mt-2 text-text-muted">Chargement de la flotte...</p></div>';


            try {

                const response = await fetch('http://localhost/MaBagnoleV1/public/api/get_voitures.php');
                const result = await response.json();

                if (result.data) {

                    state.allVehicles = result.data.map(car => ({
                        id: car.id,
                        make: car.marque,
                        model: car.modele,
                        category: car.category || "Autre",
                        price: parseFloat(car.prix),

                        rating: (Math.random() * (5.0 - 4.2) + 4.2).toFixed(1),
                        fuel: car.carburant,
                        trans: car.boite,
                        seats: car.places,
                        image: car.image || 'https://via.placeholder.com/400x300?text=No+Image'
                    }));

                    state.vehicles = [...state.allVehicles];

                    renderCategoryFilters();
                    applyFilters();
                    setupEventListeners();
                } else {
                    console.error("Format de données incorrect");
                }
            } catch (error) {
                console.error("Erreur API:", error);
                gridEl.innerHTML = '<div class="col-span-full text-center text-red-500 font-bold">Erreur de connexion au serveur...</div>';
            }
        }

        function setupEventListeners() {

            if (priceRangeEl) {
                priceRangeEl.addEventListener('input', (e) => {
                    state.filters.maxPrice = parseInt(e.target.value);
                    if (priceValueEl) {
                        priceValueEl.textContent = `${state.filters.maxPrice} DH`;
                    }
                    state.currentPage = 1;
                    applyFilters();
                });
            }


            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    state.filters.search = e.target.value.toLowerCase();
                    state.currentPage = 1;
                    applyFilters();
                });
            }

            if (sortSelect) {
                sortSelect.addEventListener('change', (e) => {
                    state.sort = e.target.value;
                    applyFilters();
                });
            }
        }



        function renderCategoryFilters() {
            const categories = [...new Set(state.allVehicles.map(v => v.category))];
            const counts = categories.reduce((acc, cat) => {
                acc[cat] = state.allVehicles.filter(v => v.category === cat).length;
                return acc;
            }, {});

            categoryFiltersEl.innerHTML = categories.map(cat => `
            <label class="flex items-center gap-3 cursor-pointer group hover:bg-gray-50 dark:hover:bg-gray-800 p-2 rounded-lg transition-colors">
                <input type="checkbox" value="${cat}" onchange="toggleCategory('${cat}')" 
                    class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary/30 cursor-pointer">
                <span class="text-sm font-medium text-text-main dark:text-gray-200 capitalize">${cat}</span>
                <span class="text-xs text-text-muted ml-auto bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded-full">${counts[cat]}</span>
            </label>
        `).join('');
        }

        function toggleCategory(cat) {
            if (state.filters.categories.includes(cat)) {
                state.filters.categories = state.filters.categories.filter(c => c !== cat);
            } else {
                state.filters.categories.push(cat);
            }
            state.currentPage = 1;
            applyFilters();
        }

        function applyFilters() {
            let filtered = state.allVehicles.filter(v => {
                const matchCat = state.filters.categories.length === 0 || state.filters.categories.includes(v.category);
                const matchPrice = v.price <= state.filters.maxPrice;
                const matchSearch = v.make.toLowerCase().includes(state.filters.search) || v.model.toLowerCase().includes(state.filters.search);
                return matchCat && matchPrice && matchSearch;
            });

            // Sorting
            if (state.sort === 'price_asc') filtered.sort((a, b) => a.price - b.price);
            else if (state.sort === 'price_desc') filtered.sort((a, b) => b.price - a.price);
            else if (state.sort === 'rating') filtered.sort((a, b) => b.rating - a.rating);

            state.vehicles = filtered;
            renderGrid();
            renderActiveFilters();
            renderPagination();
        }

        window.resetFilters = function() {
            state.filters.categories = [];
            state.filters.maxPrice = 3000;
            state.filters.search = "";

            document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
            priceRangeEl.value = 3000;
            priceValueEl.textContent = "3000 DH";
            searchInput.value = "";

            applyFilters();
        };

        // --- 5. RENDER GRID (UI) ---
        function renderGrid() {
            gridEl.innerHTML = '';

            if (state.vehicles.length === 0) {
                gridEl.classList.add('hidden');
                emptyStateEl.classList.remove('hidden');
                emptyStateEl.style.display = 'flex'; // Fix display issue
                return;
            }

            gridEl.classList.remove('hidden');
            emptyStateEl.classList.add('hidden');
            emptyStateEl.style.display = 'none';

            const start = (state.currentPage - 1) * state.itemsPerPage;
            const end = start + state.itemsPerPage;
            const paginatedItems = state.vehicles.slice(start, end);

            paginatedItems.forEach((v, index) => {
                const delay = index * 100;

                const card = document.createElement('article');
                card.className = `vehicle-card group bg-white dark:bg-card-dark rounded-3xl border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 flex flex-col`;
                card.style.animationDelay = `${delay}ms`;

                card.innerHTML = `
                <div class="relative h-52 overflow-hidden bg-gray-100 dark:bg-gray-800">
                    <img src="${v.image}" alt="${v.model}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" onerror="this.src='https://placehold.co/600x400?text=Voiture'">
                    
            
                          <button onclick="likeCar()" class="absolute top-4 right-4 p-2 rounded-full bg-white/90 dark:bg-black/60 backdrop-blur hover:scale-110 transition-transform text-gray-400 hover:text-red-500">
                    <span class="material-symbols-rounded text-xl filled">favorite</span>
                </button>
                    <span class="absolute top-4 left-4 bg-black/50 backdrop-blur text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-white/10">
                        ${v.category}
                    </span>
                    
                    <div class="absolute bottom-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-rounded text-sm text-yellow-500 filled">star</span>
                        <span class="text-xs font-bold">${v.rating}</span>
                    </div>
                </div>

                <div class="p-5 flex flex-col flex-1">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">${v.make} <span class="font-normal text-text-muted text-lg">${v.model}</span></h3>
                        <div class="flex items-center gap-4 mt-3 text-xs text-text-muted dark:text-gray-400">
                            <span class="flex items-center gap-1 capitalize"><span class="material-symbols-rounded text-base">local_gas_station</span> ${v.fuel}</span>
                            <span class="flex items-center gap-1 capitalize"><span class="material-symbols-rounded text-base">settings</span> ${v.trans}</span>
                            <span class="flex items-center gap-1"><span class="material-symbols-rounded text-base">group</span> ${v.seats}</span>
                        </div>
                    </div>
                    
                    <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-text-muted uppercase font-bold">Prix / Jour</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-xl font-black text-primary">${v.price}</span>
                                <span class="text-xs text-text-muted">DH</span>
                            </div>
                        </div>
                           <form action="index.php" method="POST" class="inline-block ml-2">
        <input type="hidden" name="action" value="CarDetaile">
        <input type="hidden" name="id" value="${v.id}">
        <button type="submit" class="bg-text-main dark:bg-white text-white dark:text-text-main hover:bg-primary dark:hover:bg-gray-200 px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Detaile ...
        </button>
    </form>
                    </div>
                </div>
            `;
                gridEl.appendChild(card);
            });
        }

        function renderActiveFilters() {
            let html = '';
            state.filters.categories.forEach(cat => {
                html += `
                <div class="flex items-center gap-2 bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 px-3 py-1 rounded-full shadow-sm animate-fade-in">
                    <span class="text-xs font-bold text-text-main dark:text-white">${cat}</span>
                    <button onclick="toggleCategory('${cat}')" class="text-gray-400 hover:text-red-500 flex items-center">
                        <span class="material-symbols-rounded text-base">close</span>
                    </button>
                </div>
            `;
            });
            activeFiltersEl.innerHTML = html;
        }

        function renderPagination() {
            const totalPages = Math.ceil(state.vehicles.length / state.itemsPerPage);
            if (totalPages <= 1) {
                paginationEl.innerHTML = '';
                return;
            }

            let html = `
            <button onclick="changePage(${state.currentPage - 1})" ${state.currentPage === 1 ? 'disabled' : ''} class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50 transition-colors">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
        `;

            for (let i = 1; i <= totalPages; i++) {
                html += `
                <button onclick="changePage(${i})" class="w-10 h-10 flex items-center justify-center rounded-full font-bold transition-all ${state.currentPage === i ? 'bg-primary text-white shadow-lg shadow-primary/30 scale-110' : 'bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800'}">
                    ${i}
                </button>
            `;
            }

            html += `
            <button onclick="changePage(${state.currentPage + 1})" ${state.currentPage === totalPages ? 'disabled' : ''} class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50 transition-colors">
                <span class="material-symbols-rounded">chevron_right</span>
            </button>
        `;
            paginationEl.innerHTML = html;
        }

        window.changePage = function(page) {
            state.currentPage = page;
            renderGrid();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // --- 6. UTILS ---
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        function checkTheme() {
            if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        window.bookCar = function(carName) {
            showToast(`🚗 Réservation initiée pour : <b>${carName}</b>`, 'success');
        }

        function showToast(message, type) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `bg-white dark:bg-card-dark border-l-4 ${type === 'success' ? 'border-green-500' : 'border-red-500'} text-text-main dark:text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 transform translate-x-full transition-all duration-300 min-w-[300px]`;
            toast.innerHTML = `
            <span class="material-symbols-rounded ${type === 'success' ? 'text-green-500' : 'text-red-500'}">check_circle</span>
            <p class="text-sm font-medium">${message}</p>
        `;

            container.appendChild(toast);
            requestAnimationFrame(() => toast.classList.remove('translate-x-full'));

            setTimeout(() => {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

    function likeCar(){
        
    }
        init();
    </script>
</body>

</html>