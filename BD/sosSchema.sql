-- drop schema sosmedicamentos;
CREATE schema sosmedicamentos;


USE sosmedicamentos;


-- TABLE 01 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`administrador` (
  `username` varchar(20) PRIMARY KEY,
  `email` varchar(100),
  `senha` varchar(50),
  `nome` varchar(100),
  `sobrenome` varchar(100),
  `adm_desde` datetime DEFAULT NOW()
) ENGINE = InnoDB;


INSERT INTO
  administrador (username, email, senha, nome, sobrenome)
VALUES
  (
    'mtakushi',
    'mh@itau.com',
    'counterstrike1',
    'Mitsu',
    'Hashioka'
  ),
  (
    'criscris',
    'cc@itau.com',
    'counterstrike2',
    'Cris',
    'Meusobrenome'
  ),
  (
    'wroger',
    'wr@itau.com',
    'counterstrike3',
    'Willi',
    'Roger'
  );


-- TABLE 02 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`ubs` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(100),
  `descricao` varchar(500),
  `dias_atendimento` varchar(100),
  `horario_atendimento` varchar(100),
  `endereco` varchar(100),
  `bairro` varchar(100),
  `zona` varchar(100),
  `cidade` varchar(100),
  `uf` varchar(2),
  `cep` int,
  `latitude` float,
  `longitude` float,
  `cadastrado_por_id` varchar(20),
  `data_cadastro` datetime DEFAULT NOW()
) ENGINE = InnoDB;


ALTER TABLE
  `sosmedicamentos`.`ubs`
ADD
  CONSTRAINT user_ex_ubs FOREIGN KEY(`cadastrado_por_id`) REFERENCES `sosmedicamentos`.`administrador`(username) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO
  ubs (nome, cidade, uf, cadastrado_por_id)
VALUES
  ('Sao Bento', 'Sao Paulo', 'SP', 'mtakushi'),
  ('Maria Aparecida', 'Sao Paulo', 'SP', 'criscris'),
  ('Santa Maria', 'Sao Paulo', 'SP', 'wroger');


-- TABLE 03 ---------------------------------------------------------------------------- 
CREATE TABLE `sosmedicamentos`.`medicamento` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(200),
  `classificacao` varchar(100),
  `cadastrado_por_id` varchar(20),
  `data_cadastro` datetime DEFAULT NOW()
) ENGINE = InnoDB;


ALTER TABLE
  `sosmedicamentos`.`medicamento`
ADD
  CONSTRAINT user_ex_med FOREIGN KEY(`cadastrado_por_id`) REFERENCES `sosmedicamentos`.`administrador`(username) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO
  medicamento (nome, classificacao, cadastrado_por_id)
VALUES
  ('Dipirona', 'Analgesico', 'mtakushi'),
  ('Gardenal', 'Tarja preta', 'criscris'),
  ('Ritalina', 'Tarja preta', 'wroger');


-- TABLE 04 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`denuncia` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(100),
  `telefone` int,
  `ubs_id` int,
  `comentario` varchar (1000),
  `data_ocorrencia` date,
  `data_denuncia` datetime DEFAULT NOW()
) ENGINE = InnoDB;


ALTER TABLE
  `sosmedicamentos`.`denuncia`
ADD
  CONSTRAINT ubs_ex_den FOREIGN KEY(`ubs_id`) REFERENCES `sosmedicamentos`.`ubs`(id) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO
  denuncia (email, ubs_id, comentario, data_ocorrencia)
VALUES
  ('anon1@fu.com', '2', 'ingratos', '2020-04-01'),
  (
    'anon2@idgaf.com',
    '2',
    'nao gostei',
    '2020-05-30'
  ),
  (
    'anon3@lmao.com',
    '3',
    'eu pago meus impostos',
    '2020-08-14'
  );


-- TABLE 05 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`medicamento_denunciado` (
  `denuncia_id` int NOT NULL,
  `medicamento_id` int NOT NULL,
  `ubs_id` int NOT NULL,
  `data_denuncia` datetime DEFAULT NOW(),
  PRIMARY KEY(denuncia_id, medicamento_id)
) ENGINE = InnoDB;


ALTER TABLE
  `sosmedicamentos`.`medicamento_denunciado`
ADD
  CONSTRAINT den_ex_medden FOREIGN KEY(`denuncia_id`) REFERENCES `sosmedicamentos`.`denuncia`(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT med_ex_medden FOREIGN KEY(`medicamento_id`) REFERENCES `sosmedicamentos`.`medicamento`(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT ubs_ex_medden FOREIGN KEY(`ubs_id`) REFERENCES `sosmedicamentos`.`ubs`(id) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO
  medicamento_denunciado (denuncia_id, medicamento_id, ubs_id)
VALUES
  ('1', '1', '3'),
  ('1', '2', '3'),
  ('1', '3', '3'),
  ('2', '1', '1'),
  ('2', '3', '1'),
  ('3', '2', '1');