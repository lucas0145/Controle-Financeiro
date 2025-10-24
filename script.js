ano = document.getElementById("slcAno")
mes = document.getElementById("slcMes")

function enviar() {

    localStorage.setItem("ano", ano.value)
    localStorage.setItem("mes", mes.value)
    window.location = "PHP/enviar.php?" + ano.value + "%" + mes.value
}

function openModal(idModal){

    modal = document.getElementById(idModal)
    modal.showModal()
}

document.addEventListener("DOMContentLoaded", () => {

    console.log(localStorage.getItem("ano") + "--" + localStorage.getItem("mes"))

    if (localStorage.getItem("ano") != undefined && localStorage.getItem("mes") != undefined) {
        
        ano.value = localStorage.getItem("ano")
        mes.value = localStorage.getItem("mes")
    }
})