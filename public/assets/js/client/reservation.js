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
        "slide-up": "slideUp 0.4s ease-out forwards",
      },
      keyframes: {
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

const html = document.documentElement;

const ligthMode = document.getElementById("ligthMode");

if (
  localStorage.theme === "dark" ||
  (!("theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  html.classList.add("dark");
  html.classList.remove("light");
} else {
  html.classList.remove("dark");
  html.classList.add("light");
}

const modet = document.getElementById("modet");

function toggleTheme() {
  if (html.classList.contains("dark")) {
    html.classList.remove("dark");
    html.classList.add("light");
    localStorage.theme = "light";
    modet.classList.add("hidden");
  } else {
    html.classList.add("dark");
    html.classList.remove("light");
    localStorage.theme = "dark";
    modet.classList.remove("hidden");
  }
}

function openAvisModal(idReservation, idVoiture) {
  const modal = document.getElementById("avisModal");
  const inputId = document.getElementById("modalIdReservation");
  const inputIdVoiture = document.getElementById("modalIdVoiture");

  inputId.value = idReservation;
  inputIdVoiture.value = idVoiture;
  document.getElementById("avisForm").reset();
  setRating(0);

  modal.classList.remove("hidden");

  setTimeout(() => {
    modal.querySelector("#modalContent").classList.remove("scale-95");
    modal.querySelector("#modalContent").classList.add("scale-100");
  }, 10);
}

function closeAvisModal() {
  const modal = document.getElementById("avisModal");

  modal.querySelector("#modalContent").classList.remove("scale-100");
  modal.querySelector("#modalContent").classList.add("scale-95");

  setTimeout(() => {
    modal.classList.add("hidden");
  }, 200);
}

function setRating(note) {
  const stars = document.querySelectorAll(".star-btn span");
  const inputNote = document.getElementById("noteValue");
  const text = document.getElementById("ratingText");

  inputNote.value = note;

  const labels = [
    "",
    "Mauvais 😠",
    "Moyen 😐",
    "Bien 🙂",
    "Très bien 😀",
    "Excellent 🤩",
  ];
  text.textContent = labels[note] || "";

  stars.forEach((star, index) => {
    if (index < note) {
      star.classList.remove("text-gray-300");
      star.classList.add("text-yellow-400", "filled");
    } else {
      star.classList.remove("text-yellow-400", "filled");
      star.classList.add("text-gray-300");
    }
  });
}
$(document).ready(function () {
  $("#reservation").DataTable({
   
    lengthMenu: [
      [5, 10, 25, 50, -1],        
      [5, 10, 25, 50, "Tous"],   
    ],
    pageLength: 5, // Default start

 
    language: {
      processing: "Traitement en cours...",
      search: "Rechercher&nbsp;:",
    
      lengthMenu: "Afficher _MENU_ éléments", 
      info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
      infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
      infoFiltered: "(filtré de _MAX_ éléments au total)",
      infoPostFix: "",
      loadingRecords: "Chargement en cours...",
      zeroRecords: "Aucun élément à afficher",
      emptyTable: "Aucune donnée disponible dans le tableau",
      paginate: {
        first: "Premier",
        previous: "Précédent",
        next: "Suivant",
        last: "Dernier",
      },
      aria: {
        sortAscending: ": activer pour trier la colonne par ordre croissant",
        sortDescending: ": activer pour trier la colonne par ordre décroissant",
      },
    },
 
    responsive: true,
    autoWidth: false,
    order: [[0, "desc"]],
  });
});
