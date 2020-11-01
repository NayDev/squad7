-- drop schema sosmedicamentos;
CREATE schema sosmedicamentos;


USE sosmedicamentos;


-- TABLE 01 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`administrador` (
  `username` varchar(20) PRIMARY KEY,
  `email` varchar(100),
  `senha` varchar(50),
  `nome` varchar(100),
  `imagem` varchar(250),
  `adm_desde` datetime DEFAULT NOW()
) ENGINE = InnoDB;


INSERT INTO
  administrador (username, email, senha, nome, imagem)
VALUES
  (
    'rmendonca',
    'rm@itau.com',
    'counterstrike',
    'Raquel Mendonca',
    'https://media-exp1.licdn.com/dms/image/C4D03AQGz5SFX9ThkqQ/profile-displayphoto-shrink_800_800/0?e=1609977600&v=beta&t=Qc8aG2ezJjL4TIvf4eXerGJ9B7zdCxdkST5n0K_ZL9g'
  ),
  (
    'wroger',
    'wr@itau.com',
    'counterstrike',
    'Willi Roger',
    'https://avatars2.githubusercontent.com/u/72757812?s=460&u=5775bf8bdf433b8b5bd6793e42d03421be5afc39&v=4'
  ),
  (
    'esantos',
    'es@itau.com',
    'counterstrike',
    'Eliana Santos',
    'https://media-exp1.licdn.com/dms/image/C4D03AQHCb04NssbZnw/profile-displayphoto-shrink_800_800/0?e=1609977600&v=beta&t=SxJuFvSY8gN6c14Q4sseiwoR_arYDMguHqLuiB50EqI'
  ),
  (
    'mtakushi',
    'mt@itau.com',
    'counterstrike',
    'Mitsu Takushi',
    'https://avatars1.githubusercontent.com/u/60308013?s=460&u=59e974bd02867f9b2cbbb6e77862fb3bafaf495a&v=4'
  ),
  (
    'csantana',
    'cs@itau.com',
    'counterstrike',
    'Cris Santana',
    'https://avatars3.githubusercontent.com/u/65695476?s=460&u=2cdd26015528cc8ad84527bf59dfa402c334a1d0&v=4'
  ),
  (
    'nlopes',
    'nl@itau.com',
    'counterstrike',
    'Nay Lopes',
    'https://avatars0.githubusercontent.com/u/50646395?s=460&u=f946b1260f2cfce4c8837f49f0ebe8b35c769cea&v=4'
  );


-- TABLE 02 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`ubs` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(100),
  `descricao` varchar(500),
  `dias_atendimento` varchar(100),
  `horario_atendimento` varchar(100),
  `telefone` varchar(20),
  `endereco` varchar(100),
  `distrito` varchar(100),
  `zona` varchar(100),
  `cidade` varchar(100),
  `uf` varchar(2),
  `cep` varchar(20),
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
  ubs (
    nome,
    endereco,
    distrito,
    cep,
    telefone,
    descricao,
    cidade,
    uf,
    cadastrado_por_id
  )
VALUES
  (
    'CIDADE NOVA SÃO MIGUEL',
    'AV. MOACIR DANTAS ITAPICURU, 1008 ',
    'SÃO MIGUEL PAULISTA',
    '08042-290',
    '2051-3560',
    'ESF Exclusiva',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'JARDIM DAS CAMÉLIAS',
    'AV. TRÊVO DE SANTA MARIA, 79 ',
    'SÃO MIGUEL PAULISTA',
    '08050-570',
    '2051-8788',
    'Relaxamento',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'JARDIM LAPENNA',
    'R. SERRA DA JURUOCA, 36',
    'SÃO MIGUEL PAULISTA',
    '08071-180',
    '2058-3722',
    'ESF Exclusiva - Práticas Corporais da Medicina Tradicional Chinesa',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'PAULO FELDMAN - NITRO OPERÁRIA',
    'R. CUMARU, 14',
    'SÃO MIGUEL PAULISTA',
    '08010-380',
    '2956-6923',
    'ESF Exclusiva - Alongamento, Hidroginástica, Dança, Práticas Corporais da Medicina Tradicional Chinesa, Pólo Aquático e Relaxamento',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'SÍTIO DA CASA PINTADA',
    'AV. MARIA SANTANA, 101',
    'SÃO MIGUEL PAULISTA',
    '08040-450',
    '2053-0800',
    'Práticas Corporais da Medicina Tradicional Chinesa, Alongamento, Relaxamento, Dança',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'UNIÃO VILA NOVA I',
    'R. GRAZIELE BALDAK GOMES, 36',
    'SÃO MIGUEL PAULISTA',
    '08070-000',
    '2956-3837',
    'ESF Exclusiva - Práticas Corporais da Medicina Tradicional Chinesa',
    'Sao Paulo',
    'SP',
    'mtakushi'
  ),
  (
    'UNIÃO VILA NOVA II - ADÃO MANOEL DA SILVA',
    'R. ADÃO MANOEL DA SILVA, 16 C ',
    'SÃO MIGUEL PAULISTA',
    '08072-180',
    '2297-4782',
    'ESF Exclusiva - Alongamento',
    'Sao Paulo',
    'SP',
    'mtakushi'
  );


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
  ('Diclofenaco', 'Anti-inflamatorio', 'mtakushi'),
  ('Paracetamol', 'Analgesico', 'nlopes'),
  ('Rivotril', 'Tarja preta', 'csantana'),
  ('Dipirona', 'Analgesico', 'mtakushi'),
  ('Gardenal', 'Tarja preta', 'csantana'),
  ('Ritalina', 'Tarja preta', 'nlopes');


-- TABLE 04 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`denuncia` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(100),
  `telefone` int,
  `ubs_id` int,
  `medicamento_id` int NOT NULL,
  `comentario` varchar (1000),
  `data_ocorrencia` date,
  `data_denuncia` datetime DEFAULT NOW()
) ENGINE = InnoDB;


ALTER TABLE
  `sosmedicamentos`.`denuncia`
ADD
  CONSTRAINT ubs_ex_den FOREIGN KEY(`ubs_id`) REFERENCES `sosmedicamentos`.`ubs`(id) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT med_ex_den FOREIGN KEY(`medicamento_id`) REFERENCES `sosmedicamentos`.`medicamento`(id) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO
  denuncia (
    email,
    ubs_id,
    medicamento_id,
    comentario,
    data_ocorrencia
  )
VALUES
  (
    'anon1@fu.com',
    '5',
    '6',
    'ingratos e corruptos',
    '2020-04-01'
  ),
  (
    'anon2@fu.com',
    '7',
    '2',
    'o farmacautico deve vender o medicamento em outro lugar',
    '2020-04-01'
  ),
  (
    'anon3@fu.com',
    '4',
    '4',
    'esse governo eh corrupto',
    '2020-04-01'
  ),
  (
    'anon4@idgaf.com',
    '1',
    '2',
    'nao posso ficar sem medicamento',
    '2020-05-30'
  ),
  (
    'anon5@idgaf.com',
    '1',
    '6',
    'nunca tem remedio',
    '2020-05-30'
  ),
  (
    'anon6@idgaf.com',
    '2',
    '1',
    'nao gostei',
    '2020-05-30'
  ),
  (
    'anon7@lmao.com',
    '3',
    '3',
    'eu pago meus impostos',
    '2020-08-14'
  );


-- TABLE 05 ----------------------------------------------------------------------------
CREATE TABLE `sosmedicamentos`.`fale_conosco` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `data` datetime DEFAULT NOW()
) ENGINE = InnoDB;


INSERT INTO
  `fale_conosco` (nome, msg)
VALUES
  ('Nayara Suelen Fernandes Lopes', 'Testando 1'),
  (
    'Mitsu Takushi',
    'Só testando este meio de comunicacao!'
  ),
  ('Nayara Suelen Fernandes Lopes', 'Testando 2'),
  ('Cris', 'Olá');