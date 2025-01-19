function buscarDescricao() {
    const codigo = document.getElementById('codigo').value.trim(); // Obtém o valor do campo código

    if (codigo !== '') {
        fetch(`Conexao.php?codigo=${codigo}`) // Envia o código via query string
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta do servidor');
                }
                return response.json();
            })
            .then(data => {
                // Atualiza o campo de descrição com o valor retornado ou uma mensagem de erro
                if (data.descricao) {
                    document.getElementById('descricao').value = data.descricao;
                } else {
                    document.getElementById('descricao').value = 'Descrição não encontrada.';
                }
            })
            .catch(error => {
                console.error('Erro ao buscar descrição:', error);
                document.getElementById('descricao').value = 'Erro ao buscar descrição.';
            });
    } else {
        document.getElementById('descricao').value = ''; // Limpa o campo caso o código esteja vazio
    }
}

function verificarLote() {
    const verificaLote = document.getElementById("verificaLote").value;
    const lotes = document.getElementById("lotes");

    // Se a impressora for EPSON, exibe as opções de cores
    if (verificaLote == "S") {
        lotes.style.display = "block";
    } else {
        // Se for outra impressora, oculta as opções de cores e marca "Preto" automaticamente
        lotes.style.display = "none";
    }
}
