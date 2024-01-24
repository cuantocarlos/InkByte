SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `inkbyte` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inkbyte`;

CREATE TABLE Usuario (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(60),
    nick VARCHAR(20),
    email VARCHAR(40),
    pass VARCHAR(16),
    f_nacimiento DATE,
    foto_perfil VARCHAR(100),
    descripcion VARCHAR(300),
    nivel TINYINT,
    activo TINYINT
);

CREATE TABLE PreferenciaGenerosUsuario (
    id_user INT  PRIMARY KEY,
    terror TINYINT,
    romance TINYINT,
    fantasia TINYINT,
    cficcion TINYINT,
    historia TINYINT,
    arte TINYINT,
    thriller TINYINT,
    poesia TINYINT,
    drama TINYINT,
    biografia TINYINT,
    misterio TINYINT,
    policiaca TINYINT,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);

CREATE TABLE Token (
    token VARCHAR(15),
    validez TINYINT,
    id_user INT PRIMARY KEY,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);

CREATE TABLE Libro (
	id_user INT,
	id_libro INT AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(50),
	sinopsis VARCHAR(300),
	imagen_portada VARCHAR(100),
	capitulos TINYINT,
	num_resenas TINYINT,
	valoracion DOUBLE,
	visitas TINYINT,
	visitasSemana TINYINT,
	estado TINYINT,
	m_18 TINYINT,
	m_16 TINYINT,
	m_12 TINYINT,
	FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);


CREATE TABLE GeneroLibro (
    id_libro INT PRIMARY KEY,
    terror TINYINT,
    romance TINYINT,
    fantasia TINYINT,
    cficcion TINYINT,
    historia TINYINT,
    arte TINYINT,
    thriller TINYINT,
    poesia TINYINT,
    drama TINYINT,
    biografia TINYINT,
    misterio TINYINT,
    policiaca TINYINT,
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE
);

CREATE TABLE Capitulos (
    id_libro INT,
    num_cap INT,
    titulo VARCHAR(50),
    archivo VARCHAR(100),
    PRIMARY KEY (id_libro, num_cap),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE
);

CREATE TABLE Resena (
    id_user INT,
    id_libro INT,
    contenido VARCHAR(400),
    valoracion TINYINT,
    PRIMARY KEY (id_user, id_libro),
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE
);

CREATE TABLE Seguidos (
    id_libro INT,
    id_user INT,
    PRIMARY KEY (id_libro, id_user),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);



CREATE TABLE Pendientes (
    id_libro INT,
    id_user INT,
    PRIMARY KEY (id_libro, id_user),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);

CREATE TABLE Completados (
    id_libro INT,
    id_user INT,
    PRIMARY KEY (id_libro, id_user),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);



CREATE TABLE Terminados(
    id_libro INT,
    id_user INT,
    PRIMARY KEY (id_libro, id_user),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);





