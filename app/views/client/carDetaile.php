<?php



$idUser = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Range Rover Evoque - MaBagnole</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet" />
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/carDetaile.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Outfit"', 'sans-serif']
                    },
                    colors: {

                        primary: {
                            DEFAULT: "#2563EB",
                            hover: "#1D4ED8"
                        },
                        dark: "#0F1115",
                        surface: "#181B21",
                        card: "#1F2329",
                        danger: "#ef4444",
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(99, 102, 241, 0.15)'
                    }
                }
            }
        };
    </script>
   
</head>

<body class="bg-gray-50 dark:bg-dark text-slate-800 dark:text-gray-200 font-sans antialiased selection:bg-primary selection:text-white">

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
                        <p class="text-sm font-bold dark:text-white leading-none"><?= $_SESSION['userName']  ?></p>
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <nav class="flex mb-8 text-sm text-slate-500 font-medium">
            <a href="carList" class="hover:text-primary transition-colors">Véhicules</a>
            <span class="mx-3 text-gray-300 dark:text-gray-700">/</span>
            <span class="text-slate-900 dark:text-white"><?= $voiture->getMarqueV() ?? " " . " " . $voiture->getModeleV() ?? " " ?></span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">

                <div class="group relative bg-white dark:bg-card rounded-[2rem] p-2 shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden">
                    <div class="absolute top-6 right-6 z-10 bg-white/90 dark:bg-black/50 backdrop-blur px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 border border-gray-100 dark:border-gray-700">

                    </div>
                    <img src="<?= $voiture->getImageUrlV() ?? " " ?>" class="w-full h-[450px] object-cover rounded-[1.5rem] group-hover:scale-[1.02] transition-transform duration-500" alt="Car Detail">
                </div>

                <div class="grid grid-cols-4 gap-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDQGKSuBLFX-qAn_mYBgiWgTFNJkHlTYY7ug&s" class="w-full h-24 object-cover rounded-2xl  cursor-pointer opacity-60 hover:opacity-100 transition-all hover:border-gray-300 dark:hover:border-gray-600">
                    <img src="data:image/jpeg;base64,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" class="w-full h-24 object-cover rounded-2xl border border-transparent hover:border-gray-300 dark:hover:border-gray-600 cursor-pointer opacity-60 hover:opacity-100 transition-all  hover:border-gray-300 dark:hover:border-gray-600">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMKPMcqqzk-wWIKv8LQbzSSM5P79cvb3haRw&s" class="w-full h-24 object-cover rounded-2xl border border-transparent hover:border-gray-300 dark:hover:border-gray-600 cursor-pointer opacity-60 hover:opacity-100 transition-all">
                    <div class="w-full h-24 rounded-2xl bg-gray-100 dark:bg-surface border border-transparent hover:border-gray-300 dark:hover:border-gray-600 flex items-center justify-center text-slate-400 cursor-pointer transition-all">
                        <span class="material-symbols-rounded">grid_view</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-card rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-800/60">
                    <h2 class="text-xl font-bold mb-6 flex items-center gap-2 text-slate-900 dark:text-white">
                        Caractéristiques
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="flex flex-col items-center p-5 bg-gray-50 dark:bg-surface rounded-2xl text-center border border-transparent hover:border-primary/20 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-3">
                                <span class="material-symbols-rounded">local_gas_station</span>
                            </div>
                            <span class="text-xs text-slate-500 uppercase font-bold mb-1">Carburant</span>
                            <span class="font-bold text-slate-900 dark:text-white"><?= htmlspecialchars($voiture->getCarburantV()) ?? " " ?></span>
                        </div>
                        <div class="flex flex-col items-center p-5 bg-gray-50 dark:bg-surface rounded-2xl text-center border border-transparent hover:border-primary/20 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-3">
                                <span class="material-symbols-rounded">settings</span>
                            </div>
                            <span class="text-xs text-slate-500 uppercase font-bold mb-1">Boîte</span>
                            <span class="font-bold text-slate-900 dark:text-white"><?= htmlspecialchars($voiture->getBoiteV()) ?? " " ?></span>
                        </div>
                        <div class="flex flex-col items-center p-5 bg-gray-50 dark:bg-surface rounded-2xl text-center border border-transparent hover:border-primary/20 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-3">
                                <span class="material-symbols-rounded">warehouse</span>
                            </div>
                            <span class="text-xs text-slate-500 uppercase font-bold mb-1">marque</span>
                            <span class="font-bold text-slate-900 dark:text-white"><?= htmlspecialchars($voiture->getMarqueV()) ??  " " ?></span>
                        </div>
                        <div class="flex flex-col items-center p-5 bg-gray-50 dark:bg-surface rounded-2xl text-center border border-transparent hover:border-primary/20 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-3">
                                <span class="material-symbols-rounded">airline_seat_recline_normal</span>
                            </div>
                            <span class="text-xs text-slate-500 uppercase font-bold mb-1">Places</span>
                            <span class="font-bold text-slate-900 dark:text-white"><?= $voiture->getPlacesV() ?? " " ?></span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-card rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-800/60">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Avis Clients</h2>
                        <div class="flex items-center gap-1 text-yellow-500 font-bold bg-yellow-500/10 px-3 py-1 rounded-full border border-yellow-500/20">
                            <span class="material-symbols-rounded filled text-[20px]">star</span>
                        </div>
                    </div>
                    <?php if (!empty($comments)): ?>
                        <?php $currentUserId = $_SESSION['userId']; ?>
                        <div class="space-y-6">

                            <?php foreach ($comments as $comment):
                                $user = $comment->getUser();
                                $note = $comment->getNote();
                                $avisId = $comment->getIdAvis();

                                $safeComment = addslashes(htmlspecialchars($comment->getCommentaire()));
                            ?>
                                <div class="border-b border-gray-100 dark:border-gray-700 pb-6 last:border-0 last:pb-0 relative">

                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-primary text-white flex items-center justify-center font-bold shadow-md uppercase">
                                            <?= substr($user->getName(), 0, 1) ?>
                                        </div>

                                        <div>
                                            <p class="font-bold text-sm text-slate-900 dark:text-white">
                                                <?= htmlspecialchars($user->getName() . " " . $user->getLastName()) ?>
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                <?= method_exists($comment, 'getDatePublication') ? $comment->getDatePublication() : '' ?>
                                            </p>
                                        </div>

                                        <div class="ml-auto flex items-center gap-2">
                                            <div class="flex text-yellow-400 mr-2">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <span class="material-symbols-rounded text-[18px] <?= $i <= $note ? 'filled' : 'text-gray-300' ?>">star</span>
                                                <?php endfor; ?>
                                            </div>

                                            <?php if ($currentUserId == $comment->getIdClient()): ?>
                                                <div class="relative">
                                                    <button onclick="toggleDropdown(<?= $avisId ?>)" class="p-1 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100 transition">
                                                        <span class="material-symbols-rounded text-[24px]">more_vert</span>
                                                    </button>

                                                    <div id="dropdown-<?= $avisId ?>" class="hidden absolute right-0 top-8 w-40 bg-white dark:bg-slate-800 shadow-xl rounded-lg border border-gray-100 dark:border-gray-700 z-40 overflow-hidden">

                                                        <button onclick="openEditModal(<?= $avisId ?>, <?= $note ?>, '<?= $safeComment ?>')"
                                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 flex items-center gap-2">
                                                            <span class="material-symbols-rounded text-[16px]">edit</span> Modifier
                                                        </button>

                                                        <form action="deleteAvis" method="POST" onsubmit="return confirm('Supprimer cet avis ?');">
                                                            <input type="hidden" name="idAvis" value="<?= $avisId ?>">
                                                            <input type="hidden" name="action" value="deleteAvis">
                                                            <input type="hidden" name="idVoiture" value="<?= $voiture->getIdV() ?>">
                                                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 flex items-center gap-2">
                                                                <span class="material-symbols-rounded text-[16px]">delete</span> Supprimer
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <p class="text-slate-600 dark:text-slate-400 text-sm italic">
                                        <?= nl2br(htmlspecialchars($comment->getCommentaire())); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>

                        </div>

                </div>

                <div id="editAvisModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
                    <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-2xl p-6 transform transition-all scale-95">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Modifier votre avis</h3>
                            <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-rounded text-2xl">close</span>
                            </button>
                        </div>

                        <form action="updateAvis" method="POST">
                            <input type="hidden" name="action" value="updateAvis">
                            <input type="hidden" name="idVoiture" value="<?= $comment->getIdVoiture() ?>">
                            <input type="hidden" name="idAvis" id="edit_idAvis">
                            <input type="hidden" name="note" id="edit_noteValue">
                            <div class="flex flex-col items-center mb-6">
                                <p class="text-sm text-gray-500 mb-2">Votre note</p>
                                <div class="flex gap-2">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <button type="button" onclick="setEditRating(<?= $i ?>)" class="text-gray-300 hover:text-yellow-400 transition-colors">
                                            <span class="material-symbols-rounded text-4xl" id="edit-star-<?= $i ?>">star</span>
                                        </button>
                                    <?php endfor; ?>
                                </div>
                                <p id="edit_ratingText" class="text-sm font-medium text-yellow-500 mt-2 h-5"></p>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Commentaire</label>
                                <textarea name="commentaire" id="edit_commentaire" rows="4"
                                    class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 outline-none transition-all resize-none"
                                    required></textarea>
                            </div>

                            <div class="flex gap-3">
                                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">Annuler</button>
                                <button type="submit" class="flex-1 px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 shadow-lg shadow-blue-500/30">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <script>
                function toggleDropdown(id) {

                    document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                        if (el.id !== 'dropdown-' + id) el.classList.add('hidden');
                    });

                    const menu = document.getElementById('dropdown-' + id);
                    menu.classList.toggle('hidden');
                }

                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.relative')) {
                        document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
                    }
                });


                function openEditModal(id, note, commentaire) {

                    document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));

                    document.getElementById('edit_idAvis').value = id;
                    document.getElementById('edit_noteValue').value = note;
                    document.getElementById('edit_commentaire').value = commentaire;

                    setEditRating(note);

                    document.getElementById('editAvisModal').classList.remove('hidden');
                }

                function closeEditModal() {
                    document.getElementById('editAvisModal').classList.add('hidden');
                }

                function setEditRating(note) {
                    document.getElementById('edit_noteValue').value = note;
                    const labels = ["", "Mauvais", "Moyen", "Bien", "Très bien", "Excellent"];
                    document.getElementById('edit_ratingText').textContent = labels[note] || "";

                    for (let i = 1; i <= 5; i++) {
                        const star = document.getElementById('edit-star-' + i);
                        if (i <= note) {
                            star.classList.remove('text-gray-300');
                            star.classList.add('text-yellow-400', 'filled');
                        } else {
                            star.classList.remove('text-yellow-400', 'filled');
                            star.classList.add('text-gray-300');
                        }
                    }
                }
            </script>


            </div>

            <div class="lg:col-span-1">
                <div class=" top-28 bg-white dark:bg-card rounded-[2rem] p-6 shadow-2xl shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-gray-700/50">

                    <div class="mb-6 pb-6 border-b border-gray-100 dark:border-gray-800">
                        <p class="text-sm font-semibold text-slate-400 mb-1">Prix par jour</p>
                        <div class="flex items-end gap-1">
                            <span class="text-4xl font-black text-slate-900 dark:text-white tracking-tight"><?= $voiture->getPrixJourV() ?></span>
                            <span class="text-xl font-bold text-primary mb-1">DH</span>
                        </div>
                    </div>

                    <form id="bookingForm" action="paimentReservation" method="post" class="space-y-5">
                        <input type="hidden" id="basePrice" value="<?= $voiture->getPrixJourV() ?>">
                        <input type="hidden" name="action" value="paimentReservation">
                        <input type="hidden" value="<?= $voiture->getIdV() ?>" name="idVoiture">
                        <input type="hidden" value="<?= $idUser ?>" name="idUser">
                        <input type="hidden" id="Prixtotal" name="Prixtotal">

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1.5 ml-1">Début</label>
                                <input name="dateStart" type="date" id="dateStart" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-surface text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1.5 ml-1">Fin</label>
                                <input name="dateEnd" type="date" id="dateEnd" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-surface text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all" required>
                            </div>
                        </div>

                        <div class="space-y-3 pt-2">
                            <label class="block text-xs font-bold uppercase text-slate-500 ml-1">Options Extra</label>

                            <label class="flex items-center justify-between p-3 rounded-xl border border-gray-200 dark:border-gray-700 cursor-pointer hover:border-primary dark:hover:border-primary bg-white dark:bg-surface transition-all group">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" name="options" class="option-check rounded text-primary focus:ring-primary w-5 h-5 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600" data-price="50">
                                    <span class="text-sm font-medium dark:text-gray-300 group-hover:text-primary transition-colors">GPS</span>
                                </div>
                                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded">+50 DH</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl border border-gray-200 dark:border-gray-700 cursor-pointer hover:border-primary dark:hover:border-primary bg-white dark:bg-surface transition-all group">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" name="options" class="option-check rounded text-primary focus:ring-primary w-5 h-5 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600" data-price="30">
                                    <span class="text-sm font-medium dark:text-gray-300 group-hover:text-primary transition-colors">Siège Enfant</span>
                                </div>
                                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded">+30 DH</span>
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">lieu</label>
                            <textarea name="lieu" id="" rows="2" class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-sm focus:ring-primary focus:border-primary" required></textarea>
                        </div>
                        <div class="bg-gray-50 dark:bg-surface rounded-2xl p-5 mt-6 border border-gray-100 dark:border-gray-800">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-slate-500 font-medium">Durée</span>
                                <span class="font-bold text-slate-900 dark:text-white" id="durationDisplay">0 Jours</span>
                            </div>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-200 dark:border-gray-700">
                                <span class="font-bold text-slate-900 dark:text-white">Total Estimé</span>
                                <span class="text-2xl font-black text-primary" id="totalPrice">0 DH</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-indigo-600 hover:from-indigo-600 hover:to-primary text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform hover:-translate-y-1 active:scale-95">
                            Confirmer la Réservation
                        </button>
                    </form>

                    <p class="text-center text-[10px] text-slate-400 mt-4 flex items-center justify-center gap-1 opacity-70">
                        <span class="material-symbols-rounded text-[12px]">lock</span> Paiement sécurisé sur place
                    </p>
                </div>
            </div>
        </div>

    </div>
    <script src="/MaBagnoleV1/public/assets/js/client/carDetaile.js"></script>

</body>

</html>