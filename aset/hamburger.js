const toggle = document.getElementById("menuToggle");
const menu = document.getElementById("navMenu");
const overlay = document.getElementById("overlay");

if (toggle && menu) {
    toggle.addEventListener("click", () => {
        menu.classList.toggle("active");
        toggle.classList.toggle("active");
        
        if(overlay) overlay.classList.toggle("active");

        // Kunci body agar tidak bisa discroll saat menu terbuka
        if(menu.classList.contains("active")) {
            document.body.style.overflow = "hidden"; 
        } else {
            document.body.style.overflow = ""; 
        }
    });

    if(overlay) {
        overlay.addEventListener("click", () => {
            menu.classList.remove("active");
            toggle.classList.remove("active");
            overlay.classList.remove("active");
            
            // Buka kunci scroll
            document.body.style.overflow = ""; 
        });
    }
}