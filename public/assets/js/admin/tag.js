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

const modal = document.getElementById("tagsModal");

function openModal() {
  modal.classList.remove("hidden-modal");
}

function closeModal() {
  modal.classList.add("hidden-modal");
}

// Logic for EDIT Modal
const editModal = document.getElementById("editTagModal");

function openEditTagModal(button) {
  const id = button.getAttribute("data-id");
  const nom = button.getAttribute("data-nom");

  document.getElementById("edit_tag_id").value = id;
  document.getElementById("edit_tag_nom").value = nom;

  editModal.classList.remove("hidden-modal");
}

function closeEditTagModal() {
  editModal.classList.add("hidden-modal");
}

// Close Modals on ESC
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    closeModal();
    closeEditTagModal();
  }
});
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', "sans-serif"],
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

$(document).ready(function () {
  $("#tags").DataTable({
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
    pageLength: 10,
    order: [[0, "desc"]],
  });
});
