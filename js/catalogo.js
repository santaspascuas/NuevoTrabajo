window.addEventListener('DOMContentLoaded', () => {

    const darkModeToggle = document.getElementById('darkModeToggle');
    const modal = document.getElementById('movieModal');


    function openModal(id) {
        let modal = document.getElementById("movieModal-" + id)
        modal.style.display = 'block';
    }
    function closeModal(id) {
        let modal = document.getElementById("movieModal-" + id)
        modal.style.display = 'none';
    }

    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        const icon = darkModeToggle.querySelector('i');
        if (document.body.classList.contains('dark-mode')) {
            icon.setAttribute('data-lucide', 'sun');
        } else {
            icon.setAttribute('data-lucide', 'moon');
        }
        lucide.createIcons();
    }

    const tarjetas = document.querySelectorAll(".movie-card")
    tarjetas.forEach(t => t.addEventListener("click", movieCardClick))
    
    const botonesCierre = document.querySelectorAll('.close');

    darkModeToggle.addEventListener('click', toggleDarkMode);
    botonesCierre.forEach(b => b.addEventListener("click", (e) => closeModalClick(e)))
    
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    function movieCardClick(e){
        openModal(e.currentTarget.id)
    }

    function closeModalClick(e){
        let id = e.currentTarget.id
        id = id.replace("closeModal-", "")
        closeModal(id)
    }


    lucide.createIcons();

})