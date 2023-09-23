addEventListener("DOMContentLoaded", ()=> {
    const inputCheckbox = document.querySelector("#tiene-ubicacion")
    const opcionesUbicacionContenedor = document.querySelector("#ubicacion-contenedor")

    const mostrarOpcionesUbicacion = () => {
        if (!inputCheckbox.checked) {
            opcionesUbicacionContenedor.classList.add("d-none")
        } else {
            opcionesUbicacionContenedor.classList.remove("d-none")
        }
    }

    inputCheckbox.addEventListener("change", mostrarOpcionesUbicacion)
})