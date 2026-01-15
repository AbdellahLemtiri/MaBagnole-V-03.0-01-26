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
    <link rel="stylesheet" href="/MaBagnoleV1/public/assets/css/client/detaileArticle.css">

</head>

<body class="bg-background-light dark:bg-background-dark text-text-main dark:text-gray-100 font-display min-h-screen flex flex-col antialiased transition-colors duration-300 selection:bg-primary/30">

    <header class="fixed w-full top-0 z-50 bg-white/70 dark:bg-background-dark/70 backdrop-blur-xl border-b border-gray-200 dark:border-gray-800 transition-all">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-12 py-3 flex items-center justify-between">
            <a href="carList" class="flex items-center ">
                <div class="w-16 h-16 rounded-full bg-primary/60 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">

                    <img src="public/assets/images/logo/logoMaBangole.png"
                        alt="MaBagnole Logo"
                        class="w-full h-full object-cover drop-shadow-sm relative z-10">
                </div>
            </a>

            <div class="hidden md:block opacity-50">
                <span class="text-lg font-black tracking-tighter italic">Ma<span class="text-primary">Bagnole</span></span>
            </div>
        </div>
    </header>

    <main class="flex-grow w-full max-w-[900px] mx-auto px-6 py-8 mt-20 md:mt-24">
     <div>
            <div class="flex gap-2 text-sm text-text-muted dark:text-gray-400 mb-2 font-medium">
                <a href="ArticleTheme?idTheme=<?= $article->getIdTheme()  ?>" class="hover:text-primary">Articles</a> / <span>détaile articles </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-black dark:text-white">Mes <span class="text-primary">Réservations</span></h1>
        </div>   
        <article class="animate-fade-in">

            <div class="flex flex-wrap items-center gap-4 mb-6">
                <?php if ($article->getTheme()): ?>
                    <span class="bg-blue-50 dark:bg-blue-900/20 text-primary border border-primary/20 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2 shadow-sm shadow-blue-500/10">
                        <i class="<?= $article->getTheme()->geticoneTheme() ?>"></i>
                        <?= htmlspecialchars($article->getTheme()->getNomTheme()) ?>
                    </span>
                <?php endif; ?>

                <span class="text-text-muted text-sm font-medium flex items-center gap-2">
                    <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-600"></span>
                    <?= date('d M Y', strtotime($article->getDateCreation())) ?>
                </span>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight leading-[1.1] mb-8 text-slate-900 dark:text-white">
                <?= htmlspecialchars($article->getTitre()) ?>
            </h1>

            <div class="flex items-center justify-between border-y border-gray-100 dark:border-gray-800 py-6 mb-10">
                <div class="flex items-center gap-4">
                    <div class="relative group cursor-pointer">
                        <div class="absolute inset-0 bg-primary/20 rounded-full blur-md opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($article->getAuthor()->getName()) ?>&background=random" class="relative w-12 h-12 rounded-full border-2 border-white dark:border-gray-900 shadow-md">
                    </div>
                    <div>
                        <p class="text-base font-bold dark:text-white leading-tight">
                            <?= htmlspecialchars($article->getAuthor()->getName() . ' ' . $article->getAuthor()->getLastName()) ?>
                        </p>
                        <p class="text-xs font-semibold text-primary uppercase tracking-wide mt-0.5">Auteur certifié</p>
                    </div>
                </div>

                <form action="toggleFavorite" method="POST">
                    <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                    <button type="submit" class="group flex items-center gap-2.5 px-5 py-2.5 rounded-full bg-gray-50 dark:bg-gray-800/50 hover:bg-red-50 dark:hover:bg-red-900/20 border border-transparent hover:border-red-200 dark:hover:border-red-900 transition-all duration-300">
                        <span class="material-symbols-rounded text-gray-400 group-hover:text-red-500 transition-colors group-active:scale-90">favorite</span>
                        <span class="text-sm font-bold text-gray-600 dark:text-gray-300 group-hover:text-red-600 hidden sm:inline-block">Ajouter aux favoris</span>
                    </button>
                </form>
            </div>

            <?php
            $imgSrc = $article->getImageArticle();
            if (!preg_match("~^(?:f|ht)tps?://~i", $imgSrc)) {
                $imgSrc = "uploads/" . $imgSrc;
            }
            ?>
            <div class="w-full relative rounded-3xl overflow-hidden mb-12 shadow-2xl shadow-gray-200 dark:shadow-black/50 group">
                <div class="h-[300px] md:h-[450px] w-full bg-gray-200 dark:bg-gray-800">
                    <img src="<?= htmlspecialchars($imgSrc) ?>"
                        alt="<?= htmlspecialchars($article->getTitre()) ?>"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
            </div>

            <div class="prose prose-lg md:prose-xl dark:prose-invert max-w-none 
                        prose-headings:font-bold prose-headings:tracking-tight 
                        prose-p:text-gray-600 dark:prose-p:text-gray-300 prose-p:leading-8
                        prose-a:text-primary hover:prose-a:text-primary-dark prose-a:no-underline prose-a:border-b-2 prose-a:border-primary/30
                        prose-img:rounded-2xl prose-img:shadow-lg">
                <?= nl2br($article->getContenu()) ?>
            </div>

        </article>

        <section id="comments" class="border-t border-gray-200 dark:border-gray-800 pt-16 mt-20 animate-slide-up">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold dark:text-white flex items-center gap-2">
                    Commentaires
                    <span class="bg-gray-100 dark:bg-gray-800 text-primary text-sm px-3 py-1 rounded-full"><?= count($comments) ?></span>
                </h3>
            </div>

            <?php if ($_SESSION['userId']): ?>
                <div class="bg-white dark:bg-card-dark p-1 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm mb-12 focus-within:ring-2 focus-within:ring-primary/20 transition-all">
                    <form action="addCommentArticles" method="POST" class="flex flex-col sm:flex-row gap-0 sm:gap-2">
                        <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                        <textarea name="content" rows="1" placeholder="Écrivez un commentaire..." required
                            class="w-full bg-transparent border-0 rounded-xl px-5 py-4 text-base focus:ring-0 dark:text-white resize-none min-h-[60px]"></textarea>

                        <button type="submit" class="m-2 bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-primary/20 transition-all transform active:scale-95 flex items-center justify-center gap-2 whitespace-nowrap">
                            Publier <span class="material-symbols-rounded text-lg">send</span>
                        </button>
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
                    <div class="text-center py-10 bg-gray-50 dark:bg-gray-900/50 rounded-2xl border border-dashed border-gray-200 dark:border-gray-800">
                        <span class="material-symbols-rounded text-4xl text-gray-300 mb-2">forum</span>
                        <p class="text-gray-500 font-medium">Aucun commentaire pour le moment. Soyez le premier !</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($comments as $comment): ?>
                        <?php
                        $currentUserId = $_SESSION['userId'];
                        $commentAuthorId = $comment->getAuthor()->getIdUser();
                        $commentId = $comment->getIdComment();
                        $isMyComment = ($currentUserId != 0 && $currentUserId == $commentAuthorId);
                        ?>

                        <div class="flex gap-4 group animate-fade-in" id="comment-block-<?= $commentId ?>">
                            <div class="flex-shrink-0">
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($comment->getAuthor()->getName()) ?>"
                                    class="w-10 h-10 rounded-full ring-2 ring-gray-100 dark:ring-gray-800 object-cover">
                            </div>

                            <div class="flex-grow">
                                <div class="bg-gray-50 dark:bg-card-dark/50 rounded-2xl rounded-tl-none p-5 border border-gray-100 dark:border-gray-800">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-bold <?= $isMyComment ? 'text-primary' : 'text-slate-900 dark:text-white' ?>">
                                                <?= htmlspecialchars($comment->getAuthor()->getName() . ' ' . $comment->getAuthor()->getLastName()) ?>
                                            </span>
                                            <?php if ($isMyComment): ?>
                                                <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Moi</span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="text-xs text-gray-400 font-medium">
                                            <?= date('d M, H:i', strtotime($comment->getDateCommentaire())) ?>
                                        </span>
                                    </div>

                                    <div id="comment-view-<?= $commentId ?>" class="block">
                                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed whitespace-pre-line">
                                            <?= htmlspecialchars($comment->getContenu()) ?>
                                        </p>
                                    </div>

                                    <?php if ($isMyComment): ?>
                                        <form action="editCommentArticles" method="POST" id="comment-edit-<?= $commentId ?>" class="hidden mt-3">
                                            <input type="hidden" name="comment_id" value="<?= $commentId ?>">
                                            <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                                            <textarea name="content" rows="3" class="w-full bg-white dark:bg-gray-900 border border-primary/30 rounded-lg text-sm p-3 focus:ring-1 focus:ring-primary dark:text-white mb-2 shadow-inner"><?= htmlspecialchars($comment->getContenu()) ?></textarea>
                                            <div class="flex gap-2 justify-end">
                                                <button type="button" onclick="toggleEditMode(<?= $commentId ?>)" class="text-xs px-3 py-1.5 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 font-medium">Annuler</button>
                                                <button type="submit" class="bg-primary text-white text-xs px-4 py-1.5 rounded-lg font-bold hover:bg-primary-dark transition-colors shadow-lg shadow-primary/20">Sauvegarder</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>

                                <?php if ($isMyComment): ?>
                                    <div class="flex gap-4 mt-2 ml-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <button onclick="toggleEditMode(<?= $commentId ?>)" class="text-xs text-gray-400 hover:text-primary font-medium flex items-center gap-1">
                                            Modifier
                                        </button>
                                        <form action="deleteCommentArticle" method="POST" onsubmit="return confirm('Supprimer ?');" class="inline">
                                            <input type="hidden" name="comment_id" value="<?= $commentId ?>">
                                            <input type="hidden" name="article_id" value="<?= $article->getIdArticle() ?>">
                                            <button type="submit" class="text-xs text-gray-400 hover:text-red-500 font-medium flex items-center gap-1">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>



    </main>

    <footer class="bg-white dark:bg-card-dark border-t border-gray-100 dark:border-gray-800 py-8 mt-auto">
        <div class="max-w-[1440px] mx-auto px-6 text-center">
            <p class="text-sm text-text-muted font-medium">© 2026 MaBagnole. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="/MaBagnoleV1/public/assets/js/client/detaileArticle.js"></script>

</body>

</html>