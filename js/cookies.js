let cookies = () => {
    //======================================================================
    // COOKIES
    //======================================================================

    //-----------------------------------------------------
    // Configuración
    //-----------------------------------------------------
    const urlsScriptsCookies = ['https://analytics.google.com', 'https://facebook.com'];

    function contenidoScriptsCookies() {
    
        ////////////  ¿Google Analítics? /////////////     
        ////////////  ¿Facebook Pixel? /////////////
        ////////////  ¿Admob? /////////////
        ////////////  etc  /////////////
    }

    //-----------------------------------------------------
    // Variables
    //-----------------------------------------------------
    const containerCookie = document.querySelector('#cookies_container');
    const seccionCookie = document.querySelector('section.cookies');
    const cookieSi = document.querySelector('.cookies__boton--si');
    const cookieNo = document.querySelector('.cookies__boton--no');
    const nuevosScripts = document.querySelector('#nuevosScripts');
    let mostrarDeNuevo = true;

    //-----------------------------------------------------
    // Funciones
    //-----------------------------------------------------

    /**
      * Método que oculta la sección de Cookie para siempre
      */
    function ocultarCookie() {
        // Borra la sección de cookies en el HTML
        if(mostrarDeNuevo == true) {
            seccionCookie.remove();
        } 
    }

    /**
      * Método que marca las cookies como aceptadas
      */
    function aceptarCookies() {
        // Oculta el HTML de cookies
        ocultarCookie(true);
        // Guarda que ha aceptado
        localStorage.setItem('cookie', true);
        // Tu codigo a ejecutar si aceptan las cookies
        ejecutarSiAcepta();
        //oculta el contenedor cookies fixed
        containerCookie.style.display = "none";
    }

    /**
      * Método que marca las cookies como denegadas
      */
//function denegarCookies(mostraeDeNuevo) {
        // Oculta el HTML de cookies
//ocultarCookie(mostrarDeNuevo);
        // Guarda que ha aceptado
//localStorage.setItem('cookie', false);
        //oculta el contenedor cookies fixed
//containerCookie.style.display = "none";
//}

    /**
      * Método que ejecuta tu código si aceptan las cookies
      */
    function ejecutarSiAcepta() {
        // Crea los <script>
        urlsScriptsCookies.forEach((url) => {
            const nuevoScript = document.createElement('script');
            nuevoScript.setAttribute('src', url);
            nuevosScripts.appendChild(nuevoScript);
        });
        // Lanza los códigos
        contenidoScriptsCookies();
    }

    /**
      * Método que inicia la lógica
      */
    function iniciar() {
        mostrarDeNuevo = true;
        // Comprueba si en el pasado el usuario ha marcado una opción
        if (localStorage.getItem('cookie') !== null) {
            if (localStorage.getItem('cookie') === 'true') {
                // Aceptó
                aceptarCookies();
            } else {
                // No aceptó
                // denegarCookies(false);
            }
        }
    }

    //-----------------------------------------------------
    // Eventos
    //-----------------------------------------------------
    cookieSi.addEventListener('click', aceptarCookies);
//cookieNo.addEventListener('click', denegarCookies);

    return {
        iniciar: iniciar
    }
}

// Activa el código. Comenta si quieres desactivarlo.
cookies().iniciar();			