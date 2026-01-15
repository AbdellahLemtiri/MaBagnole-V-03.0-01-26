<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - <?= htmlspecialchars($article->getTitre()) ?></title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
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
                        "card-dark": "#1E293B",
                        "text-main": "#0F172A",
                        "text-muted": "#64748B"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    }
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-main dark:text-gray-100 font-display min-h-screen flex flex-col antialiased transition-colors duration-300">

    <header class="fixed w-full top-0 z-50 bg-white/80 dark:bg-card-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-4 flex items-center justify-between">
            <a href="index.php?action=carList" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-primary-dark text-white flex items-center justify-center shadow-lg">
                    <span class="material-symbols-rounded text-2xl">arrow_back</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight dark:text-white group-hover:text-primary transition-colors">Retour</h2>
            </a>
        </div>
    </header>

    <main class="flex-grow w-full max-w-[1000px] mx-auto px-6 py-8 mt-24">

        <article class="animate-fade-in">

            <div class="flex items-center gap-3 mb-4">
                <?php if ($article->getTheme()): ?>
                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-1">
                        <i class="<?= $article->getTheme()->geticoneTheme() ?>"></i>
                        <?= htmlspecialchars($article->getTheme()->getNomTheme()) ?>
                    </span>
                <?php endif; ?>

                <span class="text-text-muted text-sm ml-auto">
                    Publié le <?= date('d/m/Y', strtotime($article->getDateCreation())) ?>
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight mb-6 dark:text-white">
                <?= htmlspecialchars($article->getTitre()) ?>
            </h1>

            <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-800 pb-8 mb-8">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($article->getAuthor()->getName()) ?>" class="w-12 h-12 rounded-full border-2 border-white dark:border-gray-700 shadow-md">
                    <div>
                        <p class="text-base font-bold dark:text-white">
                            <?= htmlspecialchars($article->getAuthor()->getName() . ' ' . $article->getAuthor()->getLastName()) ?>
                        </p>
                        <p class="text-xs text-text-muted">Auteur</p>
                    </div>
                </div>

                <form action="index.php?action=toggleFavorite" method="POST">
                    <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                    <button type="submit" class="group flex items-center gap-2 px-4 py-2 rounded-full border border-gray-200 dark:border-gray-700 hover:border-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all">
                        <span class="material-symbols-rounded text-gray-400 group-hover:text-red-500 transition-colors">favorite</span>
                        <span class="text-sm font-bold text-gray-600 dark:text-gray-300 group-hover:text-red-600">Favoris</span>
                    </button>
                </form>
            </div>

            <div class="w-full aspect-video rounded-3xl overflow-hidden mb-10 shadow-2xl relative">
                <?php
                $imgSrc = $article->getImageArticle();
                if (!preg_match("~^(?:f|ht)tps?://~i", $imgSrc)) {
                    $imgSrc = "uploads/" . $imgSrc;
                }
                ?>
                <img src="<?= htmlspecialchars($imgSrc) ?>"
                    alt="<?= htmlspecialchars($article->getTitre()) ?>"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
            </div>

            <div class="prose prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                <?= nl2br($article->getContenu()) ?>
            </div>

        </article>

     <section id="comments" class="border-t border-gray-200 dark:border-gray-800 pt-16 mt-16 animate-slide-up">

    <div class="flex items-center gap-3 mb-8">
        <h3 class="text-2xl font-bold dark:text-white">Commentaires</h3>
        <span class="bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 text-sm font-bold px-2.5 py-0.5 rounded-lg">
            <?= count($comments) ?>
        </span>
    </div>

    <?php if (1): ?>
    <div class="bg-white dark:bg-card-dark p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm mb-10">
        <form action="index.php?action=addComment" method="POST" class="flex gap-4">
            <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
            
            <div class="flex-shrink-0 hidden sm:block">
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user_name'] ?? 'User' ?>" class="w-10 h-10 rounded-full">
            </div>
            
            <div class="flex-grow space-y-3">
                <textarea name="content" rows="3" placeholder="Partagez votre avis..." required 
                    class="w-full bg-gray-50 dark:bg-background-dark border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 text-sm focus:border-primary focus:ring-primary dark:text-white transition-all resize-none"></textarea>
                
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-primary/30 transition-all transform active:scale-95">
                        Publier
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php else: ?>
        <div class="bg-gray-50 dark:bg-gray-800/50 p-6 rounded-2xl text-center mb-10 border border-gray-200 dark:border-gray-700">
            <p class="text-gray-600 dark:text-gray-300">Connectez-vous pour rejoindre la discussion.</p>
            <a href="index.php?action=login" class="inline-block mt-3 text-primary font-bold hover:underline">Se connecter</a>
        </div>
    <?php endif; ?>

    <div class="space-y-8">
        <?php if (empty($comments)): ?>
            <p class="text-gray-500 text-center italic">Soyez le premier à commenter !</p>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <?php
                $currentUserId = $_SESSION['user_id'] ?? 23;
                $commentAuthorId = $comment->getAuthor()->getIdUser();
                $commentId = $comment->getIdComment();
                $isMyComment = ($currentUserId != 0 && $currentUserId == $commentAuthorId);
                ?>

                <div class="flex gap-4 group" id="comment-block-<?= $commentId ?>">
                    <div class="flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($comment->getAuthor()->getName()) ?>" 
                             class="w-10 h-10 rounded-full ring-2 ring-gray-100 dark:ring-gray-700">
                    </div>

                    <div class="flex-grow">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-bold <?= $isMyComment ? 'text-primary' : 'dark:text-white' ?>">
                                <?= htmlspecialchars($comment->getAuthor()->getName() . ' ' . $comment->getAuthor()->getLastName()) ?>
                                <?= $isMyComment ? '(Moi)' : '' ?>
                            </span>

                            <div class="flex items-center gap-3">
                                <span class="text-xs text-text-muted">
                                    <?= date('d/m/Y H:i', strtotime($comment->getDateCommentaire())) ?>
                                </span>

                                <?php if ($isMyComment): ?>
                                    <div class="flex items-center gap-2">
                                        <button onclick="toggleEditMode(<?= $commentId ?>)" 
                                                class="text-gray-400 hover:text-blue-500 transition-colors p-1" title="Modifier">
                                            <span class="material-symbols-rounded text-[18px]">edit</span>
                                        </button>

                                        <form action="index.php?action=deleteComment" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');" class="inline">
                                            <input type="hidden" name="comment_id" value="<?= $commentId ?>">
                                            <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                                            <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-1" title="Supprimer">
                                                <span class="material-symbols-rounded text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div id="comment-view-<?= $commentId ?>" class="block">
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed whitespace-pre-line">
                                <?= htmlspecialchars($comment->getContenu()) ?>
                            </p>
                        </div>

                        <?php if ($isMyComment): ?>
                            <form action="index.php?action=editComment" method="POST" id="comment-edit-<?= $commentId ?>" class="hidden mt-2">
                                <input type="hidden" name="comment_id" value="<?= $commentId ?>">
                                <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">

                                <textarea name="content" rows="3" 
                                    class="w-full bg-white dark:bg-card-dark border border-primary rounded-lg text-sm p-3 focus:ring-1 focus:ring-primary dark:text-white mb-2 shadow-sm"
                                ><?= htmlspecialchars($comment->getContenu()) ?></textarea>

                                <div class="flex gap-2 justify-end">
                                    <button type="button" onclick="toggleEditMode(<?= $commentId ?>)" 
                                            class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs px-3 py-1.5 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                        Annuler
                                    </button>
                                    <button type="submit" 
                                            class="bg-primary text-white text-xs px-3 py-1.5 rounded-lg font-medium hover:bg-primary-dark transition-colors">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<script>
    function toggleEditMode(id) {
        const viewDiv = document.getElementById('comment-view-' + id);
        const editForm = document.getElementById('comment-edit-' + id);
        
        if (viewDiv && editForm) {
            viewDiv.classList.toggle('hidden');
            editForm.classList.toggle('hidden');
        }
    }
</script>
        <div id="editAvisModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
            <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-2xl p-6 transform transition-all scale-95">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Modifier votre avis</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                        <span class="material-symbols-rounded text-2xl">close</span>
                    </button>
                </div>

                <form id="editAvisForm" action="index.php?action=updateAvis" method="POST">
                    <input type="hidden" name="idAvis" id="edit_idAvis">
                    <input type="hidden" name="note" id="edit_noteValue">

                    <div class="flex flex-col items-center mb-6">
                        <p class="text-sm text-gray-500 mb-2">Votre nouvelle note</p>
                        <div class="flex gap-2" id="editStarsContainer">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <button type="button" onclick="setEditRating(<?= $i ?>)" class="star-btn-edit text-gray-300 hover:text-yellow-400 transition-colors">
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
        <script>
            function toggleEditMode(commentId) {
                const viewDiv = document.getElementById(`comment-view-${commentId}`);
                const editForm = document.getElementById(`comment-edit-${commentId}`);

                if (!viewDiv || !editForm) return;

                if (viewDiv.classList.contains('hidden')) {

                    viewDiv.classList.remove('hidden');
                    editForm.classList.add('hidden');
                } else {

                    viewDiv.classList.add('hidden');
                    editForm.classList.remove('hidden');
                }
            }


            function openEditModal(idAvis, note, commentaire) {

                document.getElementById('edit_idAvis').value = idAvis;
                document.getElementById('edit_noteValue').value = note;
                document.getElementById('edit_commentaire').value = commentaire;

                setEditRating(note);


                const modal = document.getElementById('editAvisModal');
                modal.classList.remove('hidden');
            }


            function closeEditModal() {
                document.getElementById('editAvisModal').classList.add('hidden');
            }

            function setEditRating(note) {
                const inputNote = document.getElementById('edit_noteValue');
                const text = document.getElementById('edit_ratingText');
                const labels = ["", "Mauvais 😠", "Moyen 😐", "Bien 🙂", "Très bien 😀", "Excellent 🤩"];

                inputNote.value = note;
                text.textContent = labels[note] || "";


                for (let i = 1; i <= 5; i++) {
                    const starSpan = document.getElementById('edit-star-' + i);
                    if (i <= note) {
                        starSpan.classList.remove('text-gray-300');
                        starSpan.classList.add('text-yellow-400', 'filled');
                    } else {
                        starSpan.classList.remove('text-yellow-400', 'filled');
                        starSpan.classList.add('text-gray-300');
                    }
                }
            }
        </script>

    </main>

    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-10 mt-auto">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted">© 2026 Ma Bagnole.</p>
        </div>
    </footer>

    <script>
        // ... Ton script dark mode reste le même ...
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
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>

</html>