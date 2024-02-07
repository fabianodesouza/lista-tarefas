
// Modo dark

const check = document.getElementById('check');

function toggleDarkMode() {

    document.body.classList.toggle('dark')
}

//carregando modo light ou dark
function loadTheme() {

    const darkMode = localStorage.getItem("dark")

    if(darkMode) {

        toggleDarkMode()
    }
}

loadTheme()

check.addEventListener('change', () => {

    toggleDarkMode()

    //salvando ou removendo modo dark
    localStorage.removeItem("dark")

    if(document.body.classList.contains("dark")) {

        localStorage.setItem("dark", 1)
    }

})

