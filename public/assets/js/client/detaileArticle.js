function toggleEditMode(id) {
  const viewDiv = document.getElementById("comment-view-" + id);
  const editForm = document.getElementById("comment-edit-" + id);
  if (viewDiv && editForm) {
    viewDiv.classList.toggle("hidden");
    editForm.classList.toggle("hidden");
  }
}

// Dark Mode check
if (
  localStorage.theme === "dark" ||
  (!("theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.documentElement.classList.add("dark");
} else {
  document.documentElement.classList.remove("dark");
}
 
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2563EB",        
                        "primary-dark": "#1D4ED8",
                        "primary-light": "#93C5FD",
                        "background-light": "#F8FAFC",
                        "background-dark": "#020617", 
                        "card-dark": "#0F172A",
                        "text-main": "#0F172A",
                        "text-muted": "#64748B", 
                        danger: "#ef4444",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                },
            },
        }
    function toggleEditMode(commentId) {
    const viewBlock = document.getElementById(`comment-view-${commentId}`);
    const editForm = document.getElementById(`comment-edit-${commentId}`);
     
    if (editForm.classList.contains('hidden')) {
        viewBlock.classList.add('hidden');
        editForm.classList.remove('hidden');
    } else {
        viewBlock.classList.remove('hidden');
        editForm.classList.add('hidden');
    }
}