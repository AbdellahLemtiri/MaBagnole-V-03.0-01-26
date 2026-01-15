 
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

      
    const modal = document.getElementById('categoryModal');
    const form = document.getElementById('categoryForm');
    const formAction = document.getElementById('formAction');
    const title = document.getElementById('modalTitle');

    const inpId = document.getElementById('catId');
    const inpLibelle = document.getElementById('catLibelle');
    const inpDesc = document.getElementById('catDesc');
    const inpIcon = document.getElementById('catIcon');

    function openModal(mode, btn = null) {
      modal.classList.remove('hidden');

      if (mode === 'edit') {
        title.innerText = 'Modifier la Catégorie';
        formAction.value = 'update_categorie';


        inpId.value = btn.getAttribute('data-id');
        inpLibelle.value = btn.getAttribute('data-libelle');
        inpDesc.value = btn.getAttribute('data-description');
        inpIcon.value = btn.getAttribute('data-icon');
      } else if(mode === 'add') {

        title.innerText = 'Nouvelle Catégorie';
        formAction.value = 'add_categorie';
        form.reset();
      }
    }

    function closeModal() {
      modal.classList.add('hidden');
    }

    window.onclick = function(e) {
      if (e.target == modal) closeModal();
    }
  
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

    

   $(document).ready(function() {
   
    $('#categories').DataTable({
         
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ éléments",
            info:           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            infoEmpty:      "Affichage de l'élément 0 à 0 sur 0 élément",
            infoFiltered:   "(filtré de _MAX_ éléments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun élément à afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Précédent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        },
     
        responsive: true,
        autoWidth: false,
        pageLength: 10, 
        order: [[0, 'desc']]  
    });
});
 
 