tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#2563EB",
          hover: "#1D4ED8",
        },
        "primary-hover": "#4338CA",
        "background-light": "#F8FAFC",
        "background-dark": "#0F172A",
        "surface-light": "#FFFFFF",
        "surface-dark": "#1E293B",
        "text-secondary": "#94A3B8",
        danger: "#ef4444",
      },
      fontFamily: {
        display: ["Plus Jakarta Sans", "sans-serif"],
      },
      boxShadow: {
        soft: "0 4px 20px -2px rgba(0, 0, 0, 0.05)",
        glow: "0 0 20px rgba(79, 70, 229, 0.3)",
        card: "0 10px 40px -10px rgba(0,0,0,0.08)",
      },
      animation: {
        float: "float 6s ease-in-out infinite",
        "fade-up": "fadeUp 0.5s ease-out forwards",
      },
      keyframes: {
        float: {
          "0%, 100%": {
            transform: "translateY(0)",
          },
          "50%": {
            transform: "translateY(-10px)",
          },
        },
        fadeUp: {
          "0%": {
            opacity: "0",
            transform: "translateY(20px)",
          },
          "100%": {
            opacity: "1",
            transform: "translateY(0)",
          },
        },
      },
    },
  },
};

// THEME MANAGEMENT
const html = document.documentElement;
if (
  localStorage.theme === "dark" ||
  (!("theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  html.classList.add("dark");
} else {
  html.classList.remove("dark");
}

function toggleTheme() {
  if (html.classList.contains("dark")) {
    html.classList.remove("dark");
    localStorage.theme = "light";
  } else {
    html.classList.add("dark");
    localStorage.theme = "dark";
  }
}

// MODAL LOGIC
const modal = document.getElementById("articleModal");

function openModal() {
  modal.classList.remove("hidden");
  document.body.style.overflow = "hidden";
}

function closeModal() {
  modal.classList.add("hidden");
  document.body.style.overflow = "auto";
}
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape" && !modal.classList.contains("hidden"))
    closeModal();
});

// FILTER LOGIC
const filterBtns = document.querySelectorAll(".filter-btn");
const articles = document.querySelectorAll(".article-card");

filterBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    // Reset styles
    filterBtns.forEach((b) => {
      b.classList.remove(
        "bg-primary",
        "text-white",
        "shadow-lg",
        "shadow-primary/25"
      );
      b.classList.add(
        "bg-gray-100",
        "dark:bg-white/5",
        "text-slate-600",
        "dark:text-slate-300"
      );
    });

    // Active style
    btn.classList.remove(
      "bg-gray-100",
      "dark:bg-white/5",
      "text-slate-600",
      "dark:text-slate-300"
    );
    btn.classList.add(
      "bg-primary",
      "text-white",
      "shadow-lg",
      "shadow-primary/25"
    );

    const filterValue = btn.getAttribute("data-filter");

    articles.forEach((article) => {
      const articleTags = article.getAttribute("data-tags");
      if (
        filterValue === "all" ||
        (articleTags && articleTags.includes(filterValue))
      ) {
        article.classList.remove("hidden");
        article.classList.add("animate-fade-up");
      } else {
        article.classList.add("hidden");
        article.classList.remove("animate-fade-up");
      }
    });
  });
});
  
document.querySelectorAll(".heart-btn").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    btn.querySelector("span").classList.toggle("filled");
  });
});
 document.addEventListener('DOMContentLoaded', function() {
    
    const hhh = document.getElementById('hhh');
    const searchInput = document.getElementById('searchInput');
    const articles = document.querySelectorAll('.article-card');
    const noResultsMsg = document.getElementById('noResults');
 
    if(searchInput) {
        searchInput.addEventListener('input', function(e) {
        
            const searchTerm = e.target.value.toLowerCase().trim();
            let visibleCount = 0;

          
            if(hhh) hhh.textContent = searchTerm; 
 articles
            articles.forEach(article => {
           
                const title = article.getAttribute('data-title'); 
                
                if (title && title.includes(searchTerm)) {
                    article.classList.remove('hidden'); // Afficher
                    visibleCount++;
                } else {
                    article.classList.add('hidden'); // Masquer
                }
            });

        
            if (noResultsMsg) {
                if (visibleCount === 0) {
                    noResultsMsg.classList.remove('hidden');
                } else {
                    noResultsMsg.classList.add('hidden');
                }
            }
        });
    }
});