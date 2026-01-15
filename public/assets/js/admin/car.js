 
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
  
    $(document).ready(function() {
   
    $('#cars').DataTable({
         
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
             
               <?php foreach ($categories as $cat): ?>
                  <option value="<?= $cat->getIdC() ?>"><?= htmlspecialchars($cat->getTitre()) ?></option>
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
