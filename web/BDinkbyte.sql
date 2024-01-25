
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

CREATE TABLE Leidos (
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

-- DATOS FALSOS
-- Usuario1
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) 
VALUES ('Juan Pérez', 'juanperez92', 'juanperez@email.com', 'hashed_pass_1', '1992-03-15', 'juanperez.jpg', 'Amante de la música y la tecnología.', 1, 1);

-- Usuario2
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) 
VALUES ('María García', 'mariagarcia88', 'mariagarcia@email.com', 'hashed_pass_2', '1988-07-22', 'mariagarcia.jpg', 'Apasionada por los viajes y la cocina.', 1, 1);
-- Usuario3
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo)
VALUES ('Carlos López', 'carloslopez95', 'carlos@mail.com', 'hashed_pass_3', '1995-01-01', 'carloslopez.jpg', 'Me encanta la lectura y el deporte.', 1, 1);
-- Usuario4
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo)
VALUES ('Ana Martínez', 'anamartinez91', 'anamartinez@indoniesia.com', 'hashed_pass_4', '1991-12-12', 'anamartinez.jpg', 'Me gusta la música y la lectura.', 1, 1);

--arreglar ruta imagen y poner carpetas de imagenes

--Libros 
INSERT INTO Pendientes (id_libro, id_user) 
VALUES (2, 1),(1, 2),(3, 3),(10, 1),(12, 4),(8, 2);

INSERT INTO Completados (id_libro, id_user)
VALUES (3, 1),(2, 2),(1, 3),(4, 1),(5, 4),(6, 2);

INSERT INTO Terminados (id_libro, id_user)
VALUES (4, 1),(3, 2),(2, 3),(1, 1),(6, 4),(7, 2);

INSERT INTO Seguidos (id_libro, id_user)
VALUES (1, 1),(2, 2),(3, 3),(4, 1),(105, 4),(275, 2);
