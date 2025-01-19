-- Tabela Itens
CREATE TABLE itens (
    idItem INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codItem INT(20) NOT NULL,
    tipoItem VARCHAR(40),
    descricaoItem VARCHAR(240)
);

-- Tabela Usuario
CREATE TABLE usuario (
    id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeUsuario VARCHAR(40),
    setor VARCHAR(40)
);

-- Tabela AjusteEstoque
CREATE TABLE ajusteEstoque (
    idSolicitacao INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    qtdContagem INT(20),
    dtAbertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    lote VARCHAR(30),
    usuario_id INT(20), -- Chave estrangeira precisa ser definida
    itens_idItem INT(20), -- Chave estrangeira precisa ser definida
    CONSTRAINT fk_ajuste_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    CONSTRAINT fk_ajuste_item FOREIGN KEY (itens_idItem) REFERENCES itens(idItem)
);

-- Tabela Verificacao
CREATE TABLE verificacao (
    idVerificacao INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(140),
    situacao VARCHAR(20),
    dtFechamento DATETIME DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT(20), -- Chave estrangeira precisa ser definida
    CONSTRAINT fk_verificacao_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

-- Tabela OpProblema
CREATE TABLE OpProblema (
    idProblema INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dtAbertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    nrOp INT(20),
    motivo VARCHAR(40),
    descricao VARCHAR(340),
    usuario_id INT(20), -- Chave estrangeira precisa ser definida
    CONSTRAINT fk_opproblema_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

-- Tabela reAberturaOP
CREATE TABLE reAberturaOP (
    idReabertura INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nrOp INT(20),
    motivo VARCHAR(40),
    descricao VARCHAR(340),
    usuario_id INT(20), -- Chave estrangeira precisa ser definida
    CONSTRAINT fk_reabertura_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);
