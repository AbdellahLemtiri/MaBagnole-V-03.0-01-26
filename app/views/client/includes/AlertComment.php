<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
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

    
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg');

 
    if (msg === 'success') {
        Toast.fire({
            icon: 'success',
            title: 'Réservé avec succès !'
        });
    }
    
    if (msg === 'error') {
        Toast.fire({
            icon: 'error',
            title: 'Erreur lors de la réservation !'
        });
    } 
    if (msg) {
        const newUrl = window.location.pathname + window.location.search.replace(/[\?&]msg=[^&]+/, '').replace(/^&/, '?');
        window.history.replaceState({}, document.title, newUrl);
    }
</script>