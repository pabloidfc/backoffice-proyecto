const ocultarAlmacenesPropias = ()=> {
    almacenesPropiasContenedor.classList.add("d-none")
    almacenesPropiasSelect.selectedIndex = 0
}

const mostrarAlmacenesPropias = ()=> {
    almacenesPropiasContenedor.classList.remove("d-none")
}

const ocultarInputsTipoUsuario = ()=> {
    const inputSelected = document.querySelector("input[name='tipo']:checked")
    if (inputSelected) inputSelected.checked = false
    
    tipoContenedor.classList.add("d-none")
}

const mostrarInputsTipoUsuario = ()=> {
    tipoContenedor.classList.remove("d-none")
}

addEventListener("DOMContentLoaded", ()=> {
    const permisosFuncionario = document.querySelector("#permisoFuncionario")
    const permisosTransportista = document.querySelector("#permisoTransportista")
    const tipoContenedor = document.querySelector("#tipoContenedor")
    const almacenesPropiasSelect = document.querySelector("#almacenesPropiasSelect")
    const almacenesPropiasContenedor = document.querySelector("#almacenesPropiasContenedor")

    permisosFuncionario.addEventListener("click", mostrarInputsTipoUsuario)
    permisosTransportista.addEventListener("click", ocultarInputsTipoUsuario)
})