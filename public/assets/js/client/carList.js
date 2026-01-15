let state = {
  vehicles: [],
  allVehicles: [],
  filters: {
    categories: [],
    maxPrice: 3000,
    search: "",
  },
  sort: "relevance",
  currentPage: 1,
  itemsPerPage: 6,
};

const gridEl = document.getElementById("vehiclesGrid");
const emptyStateEl = document.getElementById("emptyState");
const categoryFiltersEl = document.getElementById("categoryFilters");
const priceRangeEl = document.getElementById("priceRange");
const priceValueEl = document.getElementById("priceValue");
const searchInput = document.getElementById("searchInput");
const sortSelect = document.getElementById("sortSelect");
const activeFiltersEl = document.getElementById("activeFilters");
const paginationEl = document.getElementById("pagination");

async function init() {
  checkTheme();

  gridEl.innerHTML =
    '<div class="col-span-full text-center py-20"><span class="material-symbols-rounded animate-spin text-4xl text-primary">progress_activity</span><p class="mt-2 text-text-muted">Chargement de la flotte...</p></div>';

  try {
    const response = await fetch(
      "http://localhost/MaBagnoleV1/public/api/get_voitures.php"
    );
    const result = await response.json();

    if (result.data) {
      state.allVehicles = result.data.map((car) => ({
        id: car.id,
        make: car.marque,
        model: car.modele,
        category: car.category || "Autre",
        price: parseFloat(car.prix),

        rating: (Math.random() * (5.0 - 4.2) + 4.2).toFixed(1),
        fuel: car.carburant,
        trans: car.boite,
        seats: car.places,
        image: car.image || "https://via.placeholder.com/400x300?text=No+Image",
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
    gridEl.innerHTML =
      '<div class="col-span-full text-center text-red-500 font-bold">Erreur de connexion au serveur...</div>';
  }
}

function setupEventListeners() {
  if (priceRangeEl) {
    priceRangeEl.addEventListener("input", (e) => {
      state.filters.maxPrice = parseInt(e.target.value);
      if (priceValueEl) {
        priceValueEl.textContent = `${state.filters.maxPrice} DH`;
      }
      state.currentPage = 1;
      applyFilters();
    });
  }

  if (searchInput) {
    searchInput.addEventListener("input", (e) => {
      state.filters.search = e.target.value.toLowerCase();
      state.currentPage = 1;
      applyFilters();
    });
  }

  if (sortSelect) {
    sortSelect.addEventListener("change", (e) => {
      state.sort = e.target.value;
      applyFilters();
    });
  }
}

function renderCategoryFilters() {
  const categories = [...new Set(state.allVehicles.map((v) => v.category))];
  const counts = categories.reduce((acc, cat) => {
    acc[cat] = state.allVehicles.filter((v) => v.category === cat).length;
    return acc;
  }, {});

  categoryFiltersEl.innerHTML = categories
    .map(
      (cat) => `
            <label class="flex items-center gap-3 cursor-pointer group hover:bg-gray-50 dark:hover:bg-gray-800 p-2 rounded-lg transition-colors">
                <input type="checkbox" value="${cat}" onchange="toggleCategory('${cat}')" 
                    class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary/30 cursor-pointer">
                <span class="text-sm font-medium text-text-main dark:text-gray-200 capitalize">${cat}</span>
                <span class="text-xs text-text-muted ml-auto bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded-full">${counts[cat]}</span>
            </label>
        `
    )
    .join("");
}

function toggleCategory(cat) {
  if (state.filters.categories.includes(cat)) {
    state.filters.categories = state.filters.categories.filter(
      (c) => c !== cat
    );
  } else {
    state.filters.categories.push(cat);
  }
  state.currentPage = 1;
  applyFilters();
}

function applyFilters() {
  let filtered = state.allVehicles.filter((v) => {
    const matchCat =
      state.filters.categories.length === 0 ||
      state.filters.categories.includes(v.category);
    const matchPrice = v.price <= state.filters.maxPrice;
    const matchSearch =
      v.make.toLowerCase().includes(state.filters.search) ||
      v.model.toLowerCase().includes(state.filters.search);
    return matchCat && matchPrice && matchSearch;
  });

  // Sorting
  if (state.sort === "price_asc") filtered.sort((a, b) => a.price - b.price);
  else if (state.sort === "price_desc")
    filtered.sort((a, b) => b.price - a.price);
  else if (state.sort === "rating")
    filtered.sort((a, b) => b.rating - a.rating);

  state.vehicles = filtered;
  renderGrid();
  renderActiveFilters();
  renderPagination();
}

window.resetFilters = function () {
  state.filters.categories = [];
  state.filters.maxPrice = 3000;
  state.filters.search = "";

  document
    .querySelectorAll('input[type="checkbox"]')
    .forEach((cb) => (cb.checked = false));
  priceRangeEl.value = 3000;
  priceValueEl.textContent = "3000 DH";
  searchInput.value = "";

  applyFilters();
};

function renderGrid() {
  gridEl.innerHTML = "";

  if (state.vehicles.length === 0) {
    gridEl.classList.add("hidden");
    emptyStateEl.classList.remove("hidden");
    emptyStateEl.style.display = "flex";
    return;
  }

  gridEl.classList.remove("hidden");
  emptyStateEl.classList.add("hidden");
  emptyStateEl.style.display = "none";

  const start = (state.currentPage - 1) * state.itemsPerPage;
  const end = start + state.itemsPerPage;
  const paginatedItems = state.vehicles.slice(start, end);

  paginatedItems.forEach((v, index) => {
    const delay = index * 100;

    const card = document.createElement("article");
    card.className = `vehicle-card group bg-white dark:bg-card-dark rounded-3xl border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 flex flex-col`;
    card.style.animationDelay = `${delay}ms`;

    card.innerHTML = `
                <div class="relative h-52 overflow-hidden bg-gray-100 dark:bg-gray-800">
                    <img src="${v.image}" alt="${v.model}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" onerror="this.src='https://placehold.co/600x400?text=Voiture'">
                    
            
                          <button onclick="toggleFavorite(this, ${v.id})" class="absolute top-4 right-4 p-2 rounded-full bg-white/90 dark:bg-black/60 backdrop-blur hover:scale-110 transition-transform text-gray-400 hover:text-red-500">
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
                           <form action="CarDetaile" method="POST" class="inline-block ml-2">
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
  let html = "";
  state.filters.categories.forEach((cat) => {
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
    paginationEl.innerHTML = "";
    return;
  }

  let html = `
    <button onclick="changePage(${state.currentPage - 1})" ${
    state.currentPage === 1 ? "disabled" : ""
  } class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50 transition-colors">
        <span class="material-symbols-rounded">chevron_left</span>
    </button>`;

  for (let i = 1; i <= totalPages; i++) {
    const activeClass =
      "bg-primary text-white shadow-lg shadow-primary/30 scale-110 border-transparent";
    const inactiveClass =
      "bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800";

    html += `
        <button onclick="changePage(${i})" class="w-10 h-10 flex items-center justify-center rounded-full font-bold transition-all ${
      state.currentPage === i ? activeClass : inactiveClass
    }">
            ${i}
        </button>`;
  }

  html += `
    <button onclick="changePage(${state.currentPage + 1})" ${
    state.currentPage === totalPages ? "disabled" : ""
  } class="w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-card-dark border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50 transition-colors">
        <span class="material-symbols-rounded">chevron_right</span>
    </button>`;

  paginationEl.innerHTML = html;
}
 
window.changePage = function (page) {
  const totalPages = Math.ceil(state.vehicles.length / state.itemsPerPage);

  // Validation
  if (page < 1 || page > totalPages) return;

   
  state.currentPage = page;

 
  renderGrid();
 
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });

 
  renderPagination();
};

function toggleTheme() {
  const html = document.documentElement;
  if (html.classList.contains("dark")) {
    html.classList.remove("dark");
    localStorage.setItem("theme", "light");
  } else {
    html.classList.add("dark");
    localStorage.setItem("theme", "dark");
  }
}

function checkTheme() {
  if (
    localStorage.getItem("theme") === "dark" ||
    (!localStorage.getItem("theme") &&
      window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }
}

window.bookCar = function (carName) {
  showToast(`🚗 Réservation initiée pour : <b>${carName}</b>`, "success");
};

function showToast(message, type) {
  const container = document.getElementById("toast-container");
  const toast = document.createElement("div");
  toast.className = `bg-white dark:bg-card-dark border-l-4 ${
    type === "success" ? "border-green-500" : "border-red-500"
  } text-text-main dark:text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 transform translate-x-full transition-all duration-300 min-w-[300px]`;
  toast.innerHTML = `
            <span class="material-symbols-rounded ${
              type === "success" ? "text-green-500" : "text-red-500"
            }">check_circle</span>
            <p class="text-sm font-medium">${message}</p>
        `;

  container.appendChild(toast);
  requestAnimationFrame(() => toast.classList.remove("translate-x-full"));

  setTimeout(() => {
    toast.classList.add("translate-x-full", "opacity-0");
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

async function toggleFavorite(btn, idVoiture) {
  const icon = btn.querySelector(".material-symbols-rounded");

  btn.style.transform = "scale(0.9)";
  setTimeout(() => (btn.style.transform = "scale(1)"), 150);

  try {
    const payload = {
      idV: idVoiture,
    };

    const response = await fetch(
      "http://localhost/MaBagnoleV1/public/api/toggleFavoris.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(payload),
      }
    );

    const result = await response.json();

    if (result.status === "success") {
      if (result.action === "added") {
        icon.classList.remove("text-gray-400");
        icon.classList.add("text-red-500", "filled");
        console.log(idVoiture + "ajoutee");
      } else {
        icon.classList.remove("text-red-500", "filled");
        icon.classList.add("text-gray-400");
        console.log(idVoiture);
      }
    } else if (result.message === "Non connecté") {
      alert("Veuillez vous connecter pour ajouter aux favoris !");
      window.location.href = "/MaBagnoleV1/views/auth/login.php";
    } else {
      console.error("Erreur API:", result.message);
    }
  } catch (error) {
    console.error("Erreur technique:", error);
  }
}
init();

tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#2563EB", 
          hover: "#1D4ED8",  
        },
        "primary-dark": "#4338CA",
        "background-light": "#F8FAFC",
        "background-dark": "#0F172A",
        "card-light": "#ffffff",
        "card-dark": "#1E293B",
        "text-main": "#0F172A",
        "text-muted": "#64748B",
        danger: "#ef4444",
      },
      fontFamily: {
        display: ["Plus Jakarta Sans", "sans-serif"],
      },
      animation: {
        "fade-in": "fadeIn 0.5s ease-out",
        "slide-up": "slideUp 0.3s ease-out",
      },
      keyframes: {
        fadeIn: {
          "0%": {
            opacity: "0",
          },
          "100%": {
            opacity: "1",
          },
        },
        slideUp: {
          "0%": {
            transform: "translateY(10px)",
            opacity: "0",
          },
          "100%": {
            transform: "translateY(0)",
            opacity: "1",
          },
        },
      },
    },
  },
};
