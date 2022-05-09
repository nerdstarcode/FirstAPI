CREATE TABLE Usuario
(
    ID_User     integer         PRIMARY KEY      AUTO_INCREMENT,
    Nome        varchar(255)    NOT NULL,
    Senha       varchar(255)    NOT NULL,
    Email       varchar(100)    NOT NULL,
    Cpf         varchar(20)     NOT NULL,
    Nasc        date            NOT NULL,
    Tel         varchar(50),
    FotoPerfil  varchar(255),
    Ativo       boolean         NOT NULL
);
CREATE TABLE Endereco
(
    Cep         varchar(20)     NOT NULL        PRIMARY KEY,
    Rua         varchar(100)    NOT NULL,
    Bairro      varchar(100)    NOT NULL,
    Cidade      varchar(100)    NOT NULL,
    Uf          varchar(2)      NOT NULL
);
CREATE TABLE Usuario_Endereco
(
    Numero      varchar(100)    NOT NULL,
    Complemento varchar(100)    NOT NULL,
    EhPrincipal boolean,
    ID_User     integer,
    Cep         varchar(20),
    CONSTRAINT fk_UsuarioEndereco FOREIGN KEY (ID_User) REFERENCES Usuario (ID_User),
    CONSTRAINT fk_Usuario_EnderecoEndereco FOREIGN KEY (Cep) REFERENCES Endereco (Cep)
);
CREATE TABLE Redes_sociais
(
    ID	        integer         PRIMARY KEY     AUTO_INCREMENT,
    Nome_rede	varchar(150)    NOT NULL,
    Url_User	varchar(150)    NOT NULL,
    ID_User	    integer         NOT NULL,
    CONSTRAINT fk_UsuarioRedes FOREIGN KEY (ID_User) REFERENCES Usuario (ID_User)
);

-- Insert usuario
INSERT INTO Usuario 
    (ID_User, Nome, Nasc, Cpf, Email, Senha, Tel, FotoPerfil, Ativo)
VALUES
    (NULL, "Sthiven Melo", "1998/06/29", "15973694704", "sthivendev@gmail.com", "123654", "21 969555520", "", true);

