 
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

        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }



        const startIn = document.getElementById('dateStart');
        const endIn = document.getElementById('dateEnd');
        const durationDisp = document.getElementById('durationDisplay');
        const totalDisp = document.getElementById('totalPrice');
        const basePrice = parseInt(document.getElementById('basePrice').value);
        const optionsCheckboxes = document.querySelectorAll('.option-check');
        const Prixtotal = document.getElementById('Prixtotal');

        function calculateTotal() {

            const start = startIn.value ? new Date(startIn.value) : null;
            const end = endIn.value ? new Date(endIn.value) : null;

            let days = 0;
            let total = 0;

            if (start && end && end > start) {
                const diffTime = end - start;
                days = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            }

            durationDisp.innerText = days + (days === 1 ? " Jour" : " Jours");

            if (days > 0) {
                let calculatedTotal = days * basePrice;
                optionsCheckboxes.forEach(box => {
                    if (box.checked) {

                        calculatedTotal += parseInt(box.dataset.price);
                    }
                });

                total = calculatedTotal;
                Prixtotal.value = total;
            }

            totalDisp.innerText = total + " DH";

        }


        startIn.addEventListener('change', calculateTotal);
        endIn.addEventListener('change', calculateTotal);
        optionsCheckboxes.forEach(box => {
            box.addEventListener('change', calculateTotal);
        });


        document.addEventListener('DOMContentLoaded', function() {
            const dateStart = document.getElementById('dateStart');
            const dateEnd = document.getElementById('dateEnd');


            dateStart.addEventListener('change', function() {
                if (dateStart.value) {

                    dateEnd.min = dateStart.value;

                    if (dateEnd.value && dateEnd.value < dateStart.value) {
                        dateEnd.value = "";
                        alert("La date de fin ne peut pas être antérieure à la date de début.");
                    }
                }
            });


            dateEnd.addEventListener('change', function() {
                if (dateStart.value && dateEnd.value < dateStart.value) {
                    alert("Erreur: La date de fin est invalide.");
                    dateEnd.value = "";
                }
            });
        });
     