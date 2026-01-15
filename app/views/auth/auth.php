<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Authentification - MaBagnole</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
    rel="stylesheet" />

  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', "sans-serif"],
            display: ['"Plus Jakarta Sans"', "sans-serif"]
          },
          colors: {
            primary: {
              DEFAULT: "#2563EB",  
              hover: "#1D4ED8"  
            },
            dark: "#0B1120",  
            surface: "#1E293B",  
            "dark-bg": "#020617",  
          },
          animation: {
            "fade-in": "fadeIn 0.8s ease-out forwards",
            "slide-up": "slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards",
            "pulse-slow": "pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite",
            float: "float 6s ease-in-out infinite",
          },
          keyframes: {
            fadeIn: {
              "0%": {
                opacity: "0"
              },
              "100%": {
                opacity: "1"
              },
            },
            slideUp: {
              "0%": {
                transform: "translateY(30px)",
                opacity: "0"
              },
              "100%": {
                transform: "translateY(0)",
                opacity: "1"
              },
            },
            float: {
              "0%, 100%": {
                transform: "translateY(0)"
              },
              "50%": {
                transform: "translateY(-10px)"
              },
            },
          },
        },
      },
    };
  </script>

  <style>
 
    .glass {
      background: rgba(15, 23, 42, 0.6);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(59, 130, 246, 0.15);
 
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }
 
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #020617;
    }

    ::-webkit-scrollbar-thumb {
      background: #2563EB;
    
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);
     
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #3B82F6;
    }

    /* Text Gradient PUNCHY */
    .text-gradient {
      background: linear-gradient(135deg, #FFFFFF 0%, #3B82F6 100%);
      /* Byed -> Bleu Nase3 */
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.3));
      /* Kaybdeeeeewi */
    }
  </style>
</head>

<body
  class="bg-[#101622] text-white font-sans antialiased min-h-screen w-full relative flex items-center justify-center py-12 px-4">
  <?php include_once __DIR__ . '/includes/alertsAuth.php'; ?>
  <div class="fixed inset-0 z-0">
    <img
      src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80"
      class="w-full h-full object-cover opacity-40"
      alt="Background" />
    <div
      class="absolute inset-0 bg-gradient-to-t from-[#101622] via-[#101622]/80 to-transparent"></div>
  </div>

  <div class="relative z-10 w-full max-w-[460px]">
    <div class="flex justify-center mb-8 animate-float">
     <a href="home" class="flex items-center ">
    <div class="w-20 h-20 rounded-full bg-primary/60 border border-primary/20 flex items-center justify-center text-white shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-transform duration-300 group-hover:scale-110 overflow-hidden">
        
        <img src="public/assets/images/logo/logoMaBangole.png" 
             alt="MaBagnole Logo" 
             class="w-full h-full object-cover drop-shadow-sm relative z-10">
    </div>
</a>
    </div>

    <div class="glass rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
      <div class="flex border-b border-white/10 p-2 gap-2">
        <button
          onclick="switchTab('login')"
          id="tab-login"
          class="flex-1 py-3 rounded-xl text-sm font-bold text-white bg-primary/20 border border-primary/30 transition-all">
          Connexion
        </button>
        <button
          onclick="switchTab('register')"
          id="tab-register"
          class="flex-1 py-3 rounded-xl text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-all">
          Inscription
        </button>
      </div>

      <div class="p-6 sm:p-8">
        <div id="form-login" class="block">
          <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-white">Bon retour!</h2>
            <p class="text-sm text-gray-400 mt-1">
              Connectez-vous à votre compte
            </p>
          </div>

          <form id="loginForm" action="login" method="POST" class="space-y-5">
            <input type="hidden" name="action" value="login" />

            <div class="space-y-1.5">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Email</label>
              <div class="relative group">
                <span class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors" id="emailIcon">mail</span>
                <input
                  type="text"
                  id="emailInput"
                  name="email"
                  class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="exemple@mail.com" />
              </div>
              <p id="emailError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Format d'email invalide.</p>
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1 flex justify-between">
                Mot de passe
                <a href="#" class="text-primary hover:text-blue-400 text-[11px] normal-case">Oublié ?</a>
              </label>
              <div class="relative group">
                <span class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors" id="passIcon">lock</span>
                <input
                  type="password"
                  id="passwordInput"
                  name="password"
                  class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="••••••••" />
                <button type="button" onclick="togglePassword('passwordInput', this)" class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors">
                  <span class="material-symbols-outlined text-[20px]">visibility</span>
                </button>
              </div>
              <p id="passError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Le mot de passe ne peut pas être vide.</p>
            </div>

            <button type="submit" class="w-full py-3.5 bg-primary hover:bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 flex justify-center items-center gap-2 mt-2">
              Se connecter
              <span class="material-symbols-outlined text-[20px]">login</span>
            </button>
          </form>
        </div>

        <div id="form-register" class="hidden">
          <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-white">Créer un compte</h2>
            <p class="text-sm text-gray-400 mt-1">
              Rejoignez MaBagnole maintenant
            </p>
          </div>

          <form id="registerForm" action="signup" method="POST" class="space-y-4">
            <input type="hidden" name="action" value="signup" />

            <div class="grid grid-cols-2 gap-3">
              <div class="space-y-1">
                <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Prénom</label>
                <input type="text" id="prenomInput" name="prenom"
                  class="w-full px-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-sm text-white placeholder-gray-600"
                  placeholder="votre prenom" />
                <p id="prenomError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Minimum 2 caractères.</p>
              </div>
              <div class="space-y-1">
                <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Nom</label>
                <input type="text" id="nomInput" name="nom"
                  class="w-full px-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-sm text-white placeholder-gray-600"
                  placeholder="votre nom" />
                <p id="nomError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Minimum 2 caractères.</p>
              </div>
            </div>

            <div class="space-y-1">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Téléphone</label>
              <div class="relative group">
                <span id="phoneIcon" class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors">phone</span>
                <input type="text" id="phoneInput" name="phone"
                  class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="06XXXXXXXX ou +212..." />
              </div>
              <p id="phoneError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Numéro invalide (Format Marocain).</p>
            </div>

            <div class="space-y-1">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Email</label>
              <div class="relative group">
                <span id="emailIconReg" class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors">mail</span>
                <input type="text" id="emailInputReg" name="email"
                  class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="exemple@mail.com" />
              </div>
              <p id="emailErrorReg" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Format d'email invalide.</p>
            </div>

            <div class="space-y-1">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Mot de passe</label>
              <div class="relative group">
                <span id="passIconReg" class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors">lock</span>
                <input type="password" id="passInputReg" name="password_cnf"
                  class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="Au moins 8 caractères" />
                <button type="button" onclick="togglePassword('passInputReg', this)" class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors">
                  <span class="material-symbols-outlined text-[20px]">visibility</span>
                </button>
              </div>
              <p id="passErrorReg" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Min 8 caractères requis.</p>
            </div>

            <div class="space-y-1">
              <label class="text-xs font-semibold text-gray-400 uppercase ml-1">Confirmer</label>
              <div class="relative group">
                <span id="confIconReg" class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 transition-colors">lock_reset</span>
                <input type="password" id="confInputReg" name="password"
                  class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                  placeholder="Répéter le mot de passe" />
                <button type="button" onclick="togglePassword('confInputReg', this)" class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors">
                  <span class="material-symbols-outlined text-[20px]">visibility</span>
                </button>
              </div>
              <p id="matchError" class="hidden text-red-500 text-xs ml-1 font-medium mt-1">Les mots de passe ne correspondent pas.</p>
            </div>

            <button type="submit" class="w-full py-3.5 bg-primary hover:bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 mt-2">
              S'inscrire
            </button>
          </form>

          <p class="text-center text-xs text-gray-500 mt-4 leading-relaxed">
            En cliquant sur s'inscrire, vous acceptez nos
            <a
              href="#"
              class="text-primary hover:text-white transition-colors underline">Conditions</a>.
          </p>
        </div>
      </div>
    </div>

    <p class="text-center text-white/40 text-xs mt-8 pb-4">
      © 2026 MaBagnole by lemtiri. Tous droits réservés.
    </p>
  </div>

  <script>
    // A. FONCTION SWITCH TAB
    function switchTab(tab) {
      const loginForm = document.getElementById("form-login");
      const registerForm = document.getElementById("form-register");
      const loginTab = document.getElementById("tab-login");
      const registerTab = document.getElementById("tab-register");

      if (tab === "login") {
        loginForm.classList.remove("hidden");
        registerForm.classList.add("hidden");

        loginTab.classList.add("text-white", "bg-primary/20", "border-primary/30");
        loginTab.classList.remove("text-gray-400", "hover:bg-white/5", "border-transparent");

        registerTab.classList.remove("text-white", "bg-primary/20", "border-primary/30");
        registerTab.classList.add("text-gray-400", "hover:bg-white/5", "border-transparent");
      } else {
        loginForm.classList.add("hidden");
        registerForm.classList.remove("hidden");

        registerTab.classList.add("text-white", "bg-primary/20", "border-primary/30");
        registerTab.classList.remove("text-gray-400", "hover:bg-white/5", "border-transparent");

        loginTab.classList.remove("text-white", "bg-primary/20", "border-primary/30");
        loginTab.classList.add("text-gray-400", "hover:bg-white/5", "border-transparent");
      }
    }

    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const icon = btn.querySelector("span");
      if (input.type === "password") {
        input.type = "text";
        icon.innerText = "visibility_off";
      } else {
        input.type = "password";
        icon.innerText = "visibility";
      }
    }

    document.addEventListener("DOMContentLoaded", function() {

      const activeTabFromPHP = "<?php echo $activeTab; ?>";
      switchTab(activeTabFromPHP);
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('loginForm');
      const emailInput = document.getElementById('emailInput');
      const passInput = document.getElementById('passwordInput');

      const emailError = document.getElementById('emailError');
      const passError = document.getElementById('passError');
      const emailIcon = document.getElementById('emailIcon');
      const passIcon = document.getElementById('passIcon');

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


      function showError(input, errorMsg, icon) {
        input.classList.add('border-red-500', 'focus:ring-red-500');
        input.classList.remove('border-white/10', 'focus:ring-primary');
        if (icon) icon.classList.add('text-red-500');
        errorMsg.classList.remove('hidden');
      }

      function resetError(input, errorMsg, icon) {
        input.classList.remove('border-red-500', 'focus:ring-red-500');
        input.classList.add('border-white/10', 'focus:ring-primary');
        if (icon) icon.classList.remove('text-red-500');
        errorMsg.classList.add('hidden');
      }

      form.addEventListener('submit', function(e) {
        let isValid = true;


        if (!emailRegex.test(emailInput.value.trim())) {
          showError(emailInput, emailError, emailIcon);
          isValid = false;
        } else {
          resetError(emailInput, emailError, emailIcon);
        }

        if (passInput.value.trim() === "") {
          showError(passInput, passError, passIcon);
          passError.textContent = "Le mot de passe est obligatoire.";
          isValid = false;
        } else if (passInput.value.length < 6) {
          showError(passInput, passError, passIcon);
          passError.textContent = "Mot de passe trop court (min 6).";
          isValid = false;
        } else {
          resetError(passInput, passError, passIcon);
        }


        if (!isValid) {
          e.preventDefault();
        }

      });


      emailInput.addEventListener('input', () => resetError(emailInput, emailError, emailIcon));
      passInput.addEventListener('input', () => resetError(passInput, passError, passIcon));
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      const passInput = document.getElementById('passInputReg');
      const confInput = document.getElementById('confInputReg');
      const errorMsg = document.getElementById('matchError');
      const iconConf = document.getElementById('confIconReg');
      const registerForm = document.getElementById('registerForm');

      function checkPasswordsMatch() {
        const pass1 = passInput.value;
        const pass2 = confInput.value;

        if (pass2 === "") {
          resetStyle();
          return false;
        }

        if (pass1 !== pass2) {

          confInput.classList.add('border-red-500', 'focus:ring-red-500');
          confInput.classList.remove('border-white/10', 'focus:ring-primary', 'border-green-500', 'focus:ring-green-500');

          if (iconConf) iconConf.classList.add('text-red-500');
          errorMsg.classList.remove('hidden');
          return false;
        } else {
          confInput.classList.remove('border-red-500', 'focus:ring-red-500', 'border-white/10', 'focus:ring-primary');
          confInput.classList.add('border-green-500', 'focus:ring-green-500');

          if (iconConf) iconConf.classList.remove('text-red-500');
          errorMsg.classList.add('hidden');
          return true;
        }
      }


      function resetStyle() {
        confInput.classList.remove('border-red-500', 'focus:ring-red-500', 'border-green-500', 'focus:ring-green-500');
        confInput.classList.add('border-white/10', 'focus:ring-primary');
        if (iconConf) iconConf.classList.remove('text-red-500');
        errorMsg.classList.add('hidden');
      }

      confInput.addEventListener('input', checkPasswordsMatch);

      passInput.addEventListener('input', function() {
        if (confInput.value !== "") {
          checkPasswordsMatch();
        }
      });
      registerForm.addEventListener('submit', function(e) {

        if (!checkPasswordsMatch()) {
          e.preventDefault();

          confInput.focus();
        }
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const regForm = document.getElementById('registerForm');

      const prenom = document.getElementById('prenomInput');
      const nom = document.getElementById('nomInput');
      const phone = document.getElementById('phoneInput');
      const email = document.getElementById('emailInputReg');
      const pass = document.getElementById('passInputReg');
      const conf = document.getElementById('confInputReg');

      const prenomErr = document.getElementById('prenomError');
      const nomErr = document.getElementById('nomError');
      const phoneErr = document.getElementById('phoneError');
      const emailErr = document.getElementById('emailErrorReg');
      const passErr = document.getElementById('passErrorReg');
      const matchErr = document.getElementById('matchError');


      const phoneIcon = document.getElementById('phoneIcon');
      const emailIcon = document.getElementById('emailIconReg');
      const passIcon = document.getElementById('passIconReg');
      const confIcon = document.getElementById('confIconReg');


      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      const phoneRegex = /^(?:(?:(?:\+|00)212[\s]?(?:5|6|7))|0(?:5|6|7))(?:\d[\s-]?){8}$/;


      function showError(input, msgElement, icon) {
        input.classList.add('border-red-500', 'focus:ring-red-500');
        input.classList.remove('border-white/10', 'focus:ring-primary', 'border-green-500', 'focus:ring-green-500');
        msgElement.classList.remove('hidden');
        if (icon) icon.classList.add('text-red-500');
      }

      function resetError(input, msgElement, icon) {
        input.classList.remove('border-red-500', 'focus:ring-red-500');
        input.classList.add('border-white/10', 'focus:ring-primary');
        msgElement.classList.add('hidden');
        if (icon) icon.classList.remove('text-red-500');
      }

      function setSuccess(input) {
        input.classList.remove('border-white/10', 'focus:ring-primary', 'border-red-500', 'focus:ring-red-500');
        input.classList.add('border-green-500', 'focus:ring-green-500');
      }

      regForm.addEventListener('submit', function(e) {
        let isValid = true;


        if (prenom.value.trim().length < 2) {
          showError(prenom, prenomErr);
          isValid = false;
        } else {
          resetError(prenom, prenomErr);
        }


        if (nom.value.trim().length < 2) {
          showError(nom, nomErr);
          isValid = false;
        } else {
          resetError(nom, nomErr);
        }


        const cleanPhone = phone.value.replace(/\s/g, '');
        if (!phoneRegex.test(cleanPhone)) {
          showError(phone, phoneErr, phoneIcon);
          isValid = false;
        } else {
          resetError(phone, phoneErr, phoneIcon);
        }


        if (!emailRegex.test(email.value.trim())) {
          showError(email, emailErr, emailIcon);
          isValid = false;
        } else {
          resetError(email, emailErr, emailIcon);
        }


        if (pass.value.length < 8) {
          showError(pass, passErr, passIcon);
          isValid = false;
        } else {
          resetError(pass, passErr, passIcon);
        }


        if (pass.value !== conf.value || conf.value === '') {
          showError(conf, matchErr, confIcon);
          isValid = false;
        } else {

          resetError(conf, matchErr, confIcon);
          setSuccess(conf);
        }

        if (!isValid) {
          e.preventDefault();
        }
      });

      [prenom, nom, phone, email, pass, conf].forEach(input => {
        input.addEventListener('input', function() {

          if (this === conf) {

            if (this.value === pass.value && this.value.length >= 8) {
              resetError(this, matchErr, confIcon);
              setSuccess(this);
            } else {

              if (this.classList.contains('border-red-500')) {

                if (this.value === pass.value) resetError(this, matchErr, confIcon);
              }
            }
          } else {
            // Reset standard
            if (this.classList.contains('border-red-500')) {
              this.classList.remove('border-red-500', 'focus:ring-red-500');
              this.classList.add('border-white/10', 'focus:ring-primary');

              this.parentElement.nextElementSibling?.classList.add('hidden');
              this.parentElement.querySelector('.material-symbols-outlined')?.classList.remove('text-red-500');
            }
          }
        });
      });
    });
  </script>

   <?php include_once __DIR__ . '/includes/alertsAuth.php'; ?>
</body>

</html>