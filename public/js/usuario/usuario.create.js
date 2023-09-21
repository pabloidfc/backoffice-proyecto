addEventListener("DOMContentLoaded", ()=> {
    const inputsRadioPermisos = document.querySelectorAll("[name='permisos']")
    const inputsRadioTipo = document.querySelectorAll("[name='tipo']")
    const radioTipoContenedor = document.querySelector("#radio-tipo-contenedor")
    const almacenEmpresaInputContenedor = document.querySelector("#almacen-empresa-contenedor")
    const inputEmpresa = document.querySelector("#empresa-perteneciente")

    const toggleOpcionTipo = () => {
        const [inputFuncionario] = inputsRadioPermisos
        if (!inputFuncionario.checked) {
            radioTipoContenedor.classList.add("d-none")
            almacenEmpresaInputContenedor.classList.add("d-none")
        } else {
            radioTipoContenedor.classList.remove("d-none")
            almacenEmpresaInputContenedor.classList.remove("d-none")
        }
    }

    const toggleInputAlmacen = () => {
        const [, inputDeTerceros] = inputsRadioTipo

        if (!inputDeTerceros.checked) {
            inputEmpresa.classList.add("d-none")
        } else {
            inputEmpresa.classList.remove("d-none")
        }
    }
    
    inputsRadioPermisos.forEach(input => {
        input.addEventListener("change", toggleOpcionTipo)
    })
    inputsRadioTipo.forEach(input => {
        input.addEventListener("click", toggleInputAlmacen);
    })
})