  
function verificarLote() {
    const verificaLote = document.getElementById("verificaLote").value;
    const lotes = document.getElementById("lotes");

    // Se a resposta é Sim ou não
    if (verificaLote == "S") {
        lotes.style.display = "block";
    } else {
        lotes.style.display = "none";
    }
}
    function buscarDescricao() {
        const codigo = document.getElementById('codigo').value.trim();

        if (codigo !== '') {
            // Faz a requisição ao PHP para buscar a descrição e o ID
            fetch(`../php/itens.php?codigo=${codigo}`)
                .then(response => response.json())
                .then(data => {
                    if (data.descricaoItem) {
                        document.getElementById('descricao').value = data.descricaoItem; // Atualiza a descrição
                        document.getElementById('idItem').value = data.id; // Atualiza o ID
                    } else {
                        document.getElementById('descricao').value = data.descricaoItem;
                        document.getElementById('idItem').value = ''; // Limpa o ID se não encontrar
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar item:', error);
                    document.getElementById('descricao').value = 'Erro ao buscar descrição.';
                    document.getElementById('idItem').value = ''; // Limpa o campo ID
                });
        } else {
            document.getElementById('descricao').value = '';
            document.getElementById('idItem').value = '';
        }
    }

