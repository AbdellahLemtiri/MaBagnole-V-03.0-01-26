<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mes Réservations - MaBagnole</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/reservation.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-main dark:text-white min-h-screen flex flex-col transition-colors duration-300">

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
                    <a href="carList" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors">Véhicules</a>
                    <a href="reservationUser" class="px-5 py-2 rounded-full text-sm font-bold bg-white dark:bg-white/10 text-primary shadow-sm">Réservations</a>
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
                        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['userName']   ?>&background=4F46E5&color=fff&bold=true"
                            alt="Profile" class="w-10 h-10 rounded-full border-2 border-white dark:border-surface-dark shadow-md" />
                        <div class="absolute inset-0 rounded-full border border-black/10 dark:border-white/10"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-[1440px] mx-auto w-full px-6 lg:px-12 pt-32 pb-12">

        <div class="flex justify-between items-end mb-10">
            <div>
                <div class="flex gap-2 text-sm text-text-muted dark:text-gray-400 mb-2 font-medium">
                    <a href="carList" class="hover:text-primary">Accueil</a> / <span>Historique</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-black dark:text-white">Mes <span class="text-primary">Réservations</span></h1>
            </div>

            <div class="bg-primary/10 text-primary px-4 py-2 rounded-xl font-bold text-sm">
                <?= count($mesReservations) ?> Réservations
            </div>
        </div>

        <?php if (empty($mesReservations)): ?>
            <div class="flex flex-col items-center justify-center py-20 text-center bg-white dark:bg-card-dark rounded-3xl border border-dashed border-gray-200 dark:border-gray-700 animate-slide-up">
                <div class="w-20 h-20 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-rounded text-4xl text-gray-400">no_crash</span>
                </div>
                <h3 class="text-xl font-bold mb-2 dark:text-white">Aucune réservation trouvée</h3>
                <p class="text-text-muted dark:text-gray-400 mb-6">Vous n'avez pas encore réservé de véhicule chez nous.</p>

            </div>
        <?php else: ?>
            <div class="bg-white dark:bg-card-dark rounded-3xl shadow-lg shadow-gray-100/50 dark:shadow-none border border-gray-100 dark:border-gray-800 overflow-hidden animate-slide-up">
                <div class="overflow-x-auto">
                    <table id="reservation" class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700 cursor-pointer">
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider">Véhicule</th>
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider">Dates & Durée</th>
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider">Lieu</th>
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider">Total</th>
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider">État</th>
                                <th class="p-6 text-xs font-bold text-text-muted uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">

                            <?php foreach ($mesReservations as $res): ?>
                                <?php

                                $voiture = $res->getVoiture();
                                ?>
                                <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">

                                    <td class="p-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 overflow-hidden">
                                                <img src="<?= htmlspecialchars($voiture->getImageUrlV()) ?>" class="w-full h-full object-cover" alt="Car">
                                            </div>

                                            <div>
                                                <p class="font-bold text-text-main dark:text-white text-sm">
                                                    <?= htmlspecialchars($voiture->getMarqueV() . ' ' . $voiture->getModeleV()) ?>
                                                </p>
                                                <span class="text-xs text-text-muted">
                                                    ID: #<?= $res->getIdReservation() . '/' . 'IdVoiture: #' . $res->getIdVoiture() ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex items-center gap-2 text-sm font-medium dark:text-gray-200">
                                                <span class="material-symbols-rounded text-base text-primary">calendar_today</span>
                                                <?= date('d M', strtotime($res->getDateDebut())) ?> - <?= date('d M Y', strtotime($res->getDateFin())) ?>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <div class="flex items-center gap-2 text-sm text-text-muted dark:text-gray-400">
                                            <span class="material-symbols-rounded text-base">location_on</span>
                                            <?= htmlspecialchars($res->getLieuChange()) ?>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <span class="font-bold text-primary text-base">
                                            <?= number_format($res->getTotalPrix() ?? 0, 2) ?> DH
                                        </span>
                                    </td>

                                    <td class="p-6">
                                        <?php
                                        $status = strtolower($res->getStatus());
                                        $badgeClass = '';
                                        $icon = '';

                                        if ($status === 'en cours') {
                                            $badgeClass = 'bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400';
                                            $icon = 'hourglass_top';
                                        } elseif ($status === 'terminee' || $status === 'terminée') {
                                            $badgeClass = 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400';
                                            $icon = 'check_circle';
                                        } else {
                                            $badgeClass = 'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400';
                                            $icon = 'cancel';
                                        }
                                        ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold <?= $badgeClass ?>">
                                            <span class="material-symbols-rounded text-[16px]"><?= $icon ?></span>
                                            <?= ucfirst($res->getStatus()) ?>
                                        </span>
                                    </td>

                                    <td class="p-6 text-right">
                                        <?php if ($status === 'terminee' || $status === 'terminée'):
                                            $idRes = $res->getIdReservation();
                                            $idVoit = $res->getIdVoiture();
                                        ?>
                                            <button
                                                onclick="openAvisModal(<?= $idRes ?>,<?= $idVoit ?>)"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-text-main dark:bg-white text-white dark:text-text-main rounded-xl text-xs font-bold hover:opacity-90 transition-all">
                                                <span class="material-symbols-rounded text-[16px]">star</span> Laisser un avis
                                            </button>
                                        <?php elseif ($status === 'en cours'): ?>

                                            <form action="cancelReservation" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                                <input type="hidden" name="id_reservation" value="<?= $res->getIdReservation() ?>">
                                                <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 px-3 py-2 rounded-lg transition-colors flex items-center gap-1 ml-auto">
                                                    <span class="material-symbols-rounded text-base">cancel</span>
                                                    Annuler
                                                </button>
                                            </form>

                                        <?php else: ?>
                                            <span class="text-gray-300 dark:text-gray-700 text-2xl">...</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

    </main>
    <div id="avisModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">

        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-2xl p-6 transform transition-all scale-95" id="modalContent">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                    Évaluer votre expérience
                </h3>
                <button onclick="closeAvisModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <span class="material-symbols-rounded text-2xl">close</span>
                </button>
            </div>

            <form id="avisForm" action="addAvis" method="POST" onsubmit="submitAvis(event)">
                <input type="hidden" name="idReservation" id="modalIdReservation">
                <input type="hidden" name="idVoiture" id="modalIdVoiture">
                <input type="hidden" name="note" id="noteValue" value="0">
                <input type="hidden" name="idUser" id="" value="<?= $_SESSION['userId']  ?>">

                <div class="flex flex-col items-center mb-6">
                    <p class="text-sm text-gray-500 mb-2">Notez le véhicule</p>
                    <div class="flex gap-2" id="starsContainer">
                        <button type="button" onclick="setRating(1)" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors">
                            <span class="material-symbols-rounded text-4xl">star</span>
                        </button>
                        <button type="button" onclick="setRating(2)" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors">
                            <span class="material-symbols-rounded text-4xl">star</span>
                        </button>
                        <button type="button" onclick="setRating(3)" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors">
                            <span class="material-symbols-rounded text-4xl">star</span>
                        </button>
                        <button type="button" onclick="setRating(4)" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors">
                            <span class="material-symbols-rounded text-4xl">star</span>
                        </button>
                        <button type="button" onclick="setRating(5)" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors">
                            <span class="material-symbols-rounded text-4xl">star</span>
                        </button>
                    </div>
                    <p id="ratingText" class="text-sm font-medium text-yellow-500 mt-2 h-5"></p>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Commentaire
                    </label>
                    <textarea
                        name="commentaire"
                        rows="4"
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 outline-none transition-all resize-none"
                        placeholder="Partagez votre avis sur ce véhicule..."
                        required></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeAvisModal()" class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all">
                        Publier l'avis
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="/MaBagnoleV1/public/assets/js/client/reservation.js"></script>
    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-10 mt-auto transition-colors">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted">Ma Bagnole by lemtiri . Fait avec passion pour le code 12/2025 .</p>
            <!-- 31-12-2025 -->
        </div>
    </footer>
</body>

</html>