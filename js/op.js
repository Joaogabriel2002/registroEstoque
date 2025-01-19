
function verificaMotivo() {
    const VerificaMotivo = document.getElementById("motivo").value;
    const detalhes = document.getElementById("detalhes");
    const funcao = document.getElementById("funcao");

    if (VerificaMotivo === "ErroSistema" || VerificaMotivo === "Outro") {
        detalhes.style.display = "block"; 
        funcao.style.display="none";

    }else if (VerificaMotivo === "FaltaInsumo") {
        detalhes.style.display="none";
        funcao.style.display="block";
        //alert("Flamengo!");
    }
}

