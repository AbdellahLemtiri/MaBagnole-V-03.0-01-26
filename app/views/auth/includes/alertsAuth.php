<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Configuration dyal Toast (Notification sghira lfou9)
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>

<?php
// 1. GESTION DES TABS
$activeTab = 'login';  

if (isset($_GET['tab'])) {
    $activeTab = $_GET['tab'];
}

// 2. LOGIC ERROR -> REGISTER TAB
if (isset($_GET['error'])) {
    $err = $_GET['error'];
    $signupErrors = [
        'invalid_name', 'invalid_lastname', 'invalid_phone', 
        'invalid_email', 'invalid_password', 'password_mismatch', 
        'email_exists', 'server_error'
    ];
    if (in_array($err, $signupErrors)) {
        $activeTab = 'register';
    }
}

// 3. SUCCESS MESSAGES
if (isset($_GET['success'])) {
    $msgCode = $_GET['success'];
    $text = "Opération réussie.";

    switch ($msgCode) {
        case 'account_created':
            $text = "Compte créé avec succès ! Connectez-vous maintenant.";
            break;
        case 'logout':
            $text = "Déconnexion réussie. À bientôt !";
            break;
    }

    echo "<script>
        Toast.fire({
            icon: 'success',
            title: '$text'
        });
    </script>";
}

// 4. ERROR MESSAGES
if (isset($_GET['error'])) {
    $errCode = $_GET['error'];
    $titre = "Oups !";
    $text = "Une erreur est survenue.";
    $footer = ""; 

    switch ($errCode) {
        case 'wrong_password':
            $titre = "Mot de passe incorrect";
            $text = "Le mot de passe que vous avez entré est faux.";
            break;
            
        case 'user_not_found':
            $titre = "Compte introuvable";
            $text = "Aucun compte n'existe avec cet email.";
            $footer = '<a href="?tab=register" style="color:#135bec; font-weight:bold;">Créer un compte ?</a>';
            break;
            
        case 'account_blocked':
            $titre = "Accès refusé";
            $text = "Votre compte a été suspendu par l'administrateur.";
            break;

        case 'empty_fields':
            $titre = "Champs vides";
            $text = "Merci de remplir tous les champs obligatoires.";
            break;

        case 'invalid_email':
            $titre = "Email invalide";
            $text = "Le format de l'adresse email n'est pas correct.";
            break;
            
        // ... (Baqi les cases dyalk huma hadouk) ...
            
        default:
            $titre = "Erreur";
            $text = "Une erreur inattendue s'est produite.";
            break;
    }

    echo "<script>
        Swal.fire({
            icon: 'error',
            title: '$titre',
            text: '$text',
            footer: '$footer',
            confirmButtonText: 'Réessayer',
            confirmButtonColor: '#d33',
            background: '#1A2230',
            color: '#fff',
            backdrop: `rgba(0,0,0,0.6)`
        });
    </script>";
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Active l-onglet li khassou yban (PHP 3tah lina déjà)
        if (typeof switchTab === "function") {
            switchTab('<?php echo $activeTab; ?>');
        }
 
        if (window.history.replaceState) {
            const url = new URL(window.location.href);
             
            url.searchParams.delete('error');
            url.searchParams.delete('success');
            url.searchParams.delete('tab');  
       
            window.history.replaceState(null, null, url.pathname);
        }
    });
</script>