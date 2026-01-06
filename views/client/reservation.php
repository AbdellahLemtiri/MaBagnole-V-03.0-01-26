<?php
use App\Models\Reservation;

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
    exit;
}


$reservationModel = new Reservation();
$mesReservations = $reservationModel->getReservationsByUser($_SESSION['userId']);
?>

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
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4F46E5",
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
                        'slide-up': 'slideUp 0.4s ease-out forwards'
                    },
                    keyframes: {
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                },
            },
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 4px; }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-main dark:text-white min-h-screen flex flex-col transition-colors duration-300">

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
                    <a class="text-sm font-medium text-text-muted dark:text-gray-400 hover:text-primary transition-colors" href="index.php?action=carList">Véhicules</a>
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

    <main class="flex-1 max-w-[1440px] mx-auto w-full px-6 lg:px-12 pt-32 pb-12">
        
        <div class="flex justify-between items-end mb-10">
            <div>
                <div class="flex gap-2 text-sm text-text-muted dark:text-gray-400 mb-2 font-medium">
                    <a href="index.php" class="hover:text-primary">Accueil</a> / <span>Historique</span>
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
                <a href="index.php" class="px-6 py-3 bg-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/30 hover:bg-primary-dark transition-all">
                    Louer un véhicule maintenant
                </a>
            </div>
        <?php else: ?>

            <div class="bg-white dark:bg-card-dark rounded-3xl shadow-lg shadow-gray-100/50 dark:shadow-none border border-gray-100 dark:border-gray-800 overflow-hidden animate-slide-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
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
                                <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                                    
                                    <td class="p-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 overflow-hidden">
                                                <img src="<?= htmlspecialchars($res['image']) ?>" class="w-full h-full object-cover" alt="Car">
                                            </div>
                                            <div>
                                                <p class="font-bold text-text-main dark:text-white text-sm">
                                                    <?= htmlspecialchars($res['marque'] . ' ' . $res['modele']) ?>
                                                </p>
                                                <span class="text-xs text-text-muted">ID: #<?= $res['idReservation'] ?></span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex items-center gap-2 text-sm font-medium dark:text-gray-200">
                                                <span class="material-symbols-rounded text-base text-primary">calendar_today</span>
                                                <?= date('d M', strtotime($res['dateDebut'])) ?> - <?= date('d M Y', strtotime($res['dateFin'])) ?>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <div class="flex items-center gap-2 text-sm text-text-muted dark:text-gray-400">
                                            <span class="material-symbols-rounded text-base">location_on</span>
                                            <?= htmlspecialchars($res['lieuChange']) ?>
                                        </div>
                                    </td>

                                    <td class="p-6">
                                        <span class="font-bold text-primary text-base">
                                            <?= number_format($res['totalPrix'], 2) ?> DH
                                        </span>
                                    </td>

                                    <td class="p-6">
                                        <?php 
                                            // Logic couleurs badges
                                            $status = strtolower($res['status']);
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
                                            <?= ucfirst($res['status']) ?>
                                        </span>
                                    </td>

                                    <td class="p-6 text-right">
                                        <?php if($status === 'terminee' || $status === 'terminée'): ?>
                                            <a href="laisser_avis.php?id=<?= $res['idVoiture'] ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-text-main dark:bg-white text-white dark:text-text-main rounded-xl text-xs font-bold hover:opacity-90 transition-all">
                                                <span class="material-symbols-rounded text-[16px]">star</span>
                                                Noter
                                            </a>
                                        <?php elseif($status === 'en cours'): ?>
                                            <button onclick="alert('Fonctionnalité d\'annulation à implémenter')" class="text-xs font-bold text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 px-3 py-2 rounded-lg transition-colors">
                                                Annuler
                                            </button>
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

    <script>
        const html = document.documentElement;
        
        // Check Local Storage
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            html.classList.remove('light');
        } else {
            html.classList.remove('dark');
            html.classList.add('light');
        }

        function toggleTheme() {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                html.classList.add('light');
                localStorage.theme = 'light';
            } else {
                html.classList.add('dark');
                html.classList.remove('light');
                localStorage.theme = 'dark';
            }
        }
    </script>
</body>
</html>