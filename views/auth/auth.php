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
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
      rel="stylesheet"
    />

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            fontFamily: { sans: ['"Plus Jakarta Sans"', "sans-serif"] },
            colors: {
              primary: { DEFAULT: "#135bec", hover: "#0e45b5" },
              dark: "#101622",
              surface: "#1A2230",
            },
            animation: {
              "fade-in": "fadeIn 0.5s ease-out forwards",
              float: "float 6s ease-in-out infinite",
            },
            keyframes: {
              fadeIn: {
                "0%": { opacity: "0", transform: "translateY(10px)" },
                "100%": { opacity: "1", transform: "translateY(0)" },
              },
              float: {
                "0%, 100%": { transform: "translateY(0)" },
                "50%": { transform: "translateY(-10px)" },
              },
            },
          },
        },
      };
    </script>
    <style>
      /* Glassmorphism Effect */
      .glass {
        background: rgba(26, 34, 48, 0.7);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      /* Custom Scrollbar */
      ::-webkit-scrollbar {
        width: 6px;
      }
      ::-webkit-scrollbar-track {
        background: #101622;
      }
      ::-webkit-scrollbar-thumb {
        background: #135bec;
        border-radius: 10px;
      }
    </style>
  </head>

  <body
    class="bg-[#101622] text-white font-sans antialiased min-h-screen w-full relative flex items-center justify-center py-12 px-4"
  >
    <div class="fixed inset-0 z-0">
      <img
        src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80"
        class="w-full h-full object-cover opacity-40"
        alt="Background"
      />
      <div
        class="absolute inset-0 bg-gradient-to-t from-[#101622] via-[#101622]/80 to-transparent"
      ></div>
    </div>

    <div class="relative z-10 w-full max-w-[460px]">
      <div class="flex justify-center mb-8 animate-float">
        <a
          href="index.html"
          class="flex items-center gap-3 bg-white/5 backdrop-blur-md border border-white/10 px-6 py-3 rounded-full shadow-2xl hover:bg-white/10 transition-all"
        >
          <div
            class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center shadow-lg shadow-blue-500/50"
          >
            <span class="material-symbols-outlined text-[18px]"
              >directions_car</span
            >
          </div>
          <span class="font-bold text-xl tracking-tight text-white"
            >MaBagnole</span
          >
        </a>
      </div>

      <div class="glass rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
        <div class="flex border-b border-white/10 p-2 gap-2">
          <button
            onclick="switchTab('login')"
            id="tab-login"
            class="flex-1 py-3 rounded-xl text-sm font-bold text-white bg-primary/20 border border-primary/30 transition-all"
          >
            Connexion
          </button>
          <button
            onclick="switchTab('register')"
            id="tab-register"
            class="flex-1 py-3 rounded-xl text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 transition-all"
          >
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

            <form
              action="index.php?action=login"
              method="POST"
              class="space-y-5"
            >
              <input type="hidden" name="action" value="login" />
              <div class="space-y-1.5">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1"
                  >Email</label
                >
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >mail</span
                  >
                  <input
                    type="email"
                    name="email"
                    required
                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="exemple@mail.com"
                  />
                </div>
              </div>

              <div class="space-y-1.5">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1 flex justify-between"
                >
                  Mot de passe
                  <a
                    href="#"
                    class="text-primary hover:text-blue-400 text-[11px] normal-case"
                    >Oublié ?</a
                  >
                </label>
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >lock</span
                  >
                  <input
                    type="password"
                    name="password"
                    id="login-pass"
                    required
                    class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="••••••••"
                  />
                  <button
                    type="button"
                    onclick="togglePassword('login-pass', this)"
                    class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors"
                  >
                    <span class="material-symbols-outlined text-[20px]"
                      >visibility</span
                    >
                  </button>
                </div>
              </div>

              <button
                type="submit"
                class="w-full py-3.5 bg-primary hover:bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 flex justify-center items-center gap-2 mt-2"
              >
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

            <form
              action="index.php?action=signup"
              method="POST"
              class="space-y-4"
            >
         
              <input type="hidden" name="action" value="signup" />
              <div class="grid grid-cols-2 gap-3">
                <div class="space-y-1">
                  <label
                    class="text-xs font-semibold text-gray-400 uppercase ml-1"
                    >Prénom</label
                  >
                  <input
                    type="text"
                    name="prenom"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-sm text-white placeholder-gray-600"
                    placeholder="votre prenom"
                  />
                </div>
               


                <div class="space-y-1">
                  <label
                    class="text-xs font-semibold text-gray-400 uppercase ml-1"
                    >Nom</label
                  >
                  <input
                    type="text"
                    name="nom"
                    required
                    class="w-full px-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-sm text-white placeholder-gray-600"
                    placeholder="votre nom"
                  />
                </div>
              </div>

              <div class="space-y-1">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1"
                  >phone</label
                >
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >phone</span
                  >
                  <input
                    type="phone"
                    name="phone"
                    required
                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="+212|06|07|05 ...."
                  />
                </div>
              </div>
              <div class="space-y-1">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1"
                  >Email</label
                >
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >mail</span
                  >
                  <input
                    type="email"
                    name="email"
                    required
                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="exemple@mail.com"
                  />
                </div>
              </div>
              <div class="space-y-1">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1"
                  >Mot de passe</label
                >
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >lock</span
                  >
                  <input
                    type="password"
                    name="password_cnf"
                    id="reg-pass"
                    required
                    class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="Au moins 8 caractères"
                  />
                  <button
                    type="button"
                    onclick="togglePassword('reg-pass', this)"
                    class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors"
                  >
                    <span class="material-symbols-outlined text-[20px]"
                      >visibility</span
                    >
                  </button>
                </div>
              </div>

              <div class="space-y-1">
                <label
                  class="text-xs font-semibold text-gray-400 uppercase ml-1"
                  >Confirmer</label
                >
                <div class="relative group">
                  <span
                    class="material-symbols-outlined absolute left-4 top-3.5 text-gray-500 group-focus-within:text-primary transition-colors"
                    >lock_reset</span
                  >
                  <input
                    type="password"
                    name="password"
                    id="confirm"
                    required
                    class="w-full pl-11 pr-10 py-3 rounded-xl bg-[#101622]/50 border border-white/10 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none font-medium text-white placeholder-gray-600"
                    placeholder="Répéter le mot de passe"
                  />
                  <button
                    type="button"
                    onclick="togglePassword('confirm', this)"
                    class="absolute right-3 top-3.5 text-gray-500 hover:text-white transition-colors"
                  >
                    <span class="material-symbols-outlined text-[20px]"
                      >visibility</span
                    >
                  </button>
                </div>
                <p
                  id="pass-error"
                  class="hidden text-xs text-red-500 ml-1 mt-1 font-medium"
                >
                  Les mots de passe ne correspondent pas.
                </p>
              </div>

              <script>
                const inputPass = document.getElementById("reg-pass");
                const inputConf = document.getElementById("confirm");
                const errorMsg = document.getElementById("pass-error");

                function validatePassword() {
                  const val1 = inputPass.value;
                  const val2 = inputConf.value;

                  if (val2 === "") {
                    resetStyles();
                    return;
                  }

                  if (val1 !== val2) {
                    inputConf.classList.add(
                      "border-red-500",
                      "focus:ring-red-500"
                    );
                    inputConf.classList.remove(
                      "border-white/10",
                      "focus:ring-primary"
                    );
                    errorMsg.classList.remove("hidden");
                  } else {
                    inputConf.classList.remove(
                      "border-red-500",
                      "focus:ring-red-500"
                    );
                    inputConf.classList.add(
                      "border-green-500",
                      "focus:ring-green-500"
                    );
                    errorMsg.classList.add("hidden");
                  }
                }

                function resetStyles() {
                  inputConf.classList.remove(
                    "border-red-500",
                    "focus:ring-red-500",
                    "border-green-500",
                    "focus:ring-green-500"
                  );
                  inputConf.classList.add(
                    "border-white/10",
                    "focus:ring-primary"
                  );
                  errorMsg.classList.add("hidden");
                }

                inputConf.addEventListener("input", validatePassword);
                inputPass.addEventListener("input", validatePassword);
              </script>
              <button
                type="submit"
                class="w-full py-3.5 bg-primary hover:bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 mt-2"
              >
                S'inscrire
              </button>
            </form>

            <p class="text-center text-xs text-gray-500 mt-4 leading-relaxed">
              En cliquant sur s'inscrire, vous acceptez nos
              <a
                href="#"
                class="text-primary hover:text-white transition-colors underline"
                >Conditions</a
              >.
            </p>
          </div>
        </div>
      </div>

      <p class="text-center text-white/40 text-xs mt-8 pb-4">
        © 2026 MaBagnole by lemtiri. Tous droits réservés.
      </p>
    </div>

    <script>
      function switchTab(tab) {
        const loginForm = document.getElementById("form-login");
        const registerForm = document.getElementById("form-register");
        const loginTab = document.getElementById("tab-login");
        const registerTab = document.getElementById("tab-register");

        if (tab === "login") {
          loginForm.classList.remove("hidden");
          registerForm.classList.add("hidden");

          loginTab.classList.add(
            "text-white",
            "bg-primary/20",
            "border-primary/30"
          );
          loginTab.classList.remove(
            "text-gray-400",
            "hover:bg-white/5",
            "border-transparent"
          );

          registerTab.classList.remove(
            "text-white",
            "bg-primary/20",
            "border-primary/30"
          );
          registerTab.classList.add(
            "text-gray-400",
            "hover:bg-white/5",
            "border-transparent"
          );
        } else {
          loginForm.classList.add("hidden");
          registerForm.classList.remove("hidden");

          registerTab.classList.add(
            "text-white",
            "bg-primary/20",
            "border-primary/30"
          );
          registerTab.classList.remove(
            "text-gray-400",
            "hover:bg-white/5",
            "border-transparent"
          );

          loginTab.classList.remove(
            "text-white",
            "bg-primary/20",
            "border-primary/30"
          );
          loginTab.classList.add(
            "text-gray-400",
            "hover:bg-white/5",
            "border-transparent"
          );
        }
      }

      // 2. Logic de Show/Hide Password
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
    </script>
  </body>
</html>
