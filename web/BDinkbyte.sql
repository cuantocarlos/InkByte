
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
    validez INT,
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
	visitas INT,
	visitasSemana INT,
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



CREATE TABLE Terminados(-- Que el autor lo ha acabado
    id_libro INT,
    id_user INT,
    PRIMARY KEY (id_libro, id_user),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Usuario(id_user) ON DELETE CASCADE
);

-- DATOS FALSOS
-- Usuario1
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo)
VALUES ('Alfredo García','operadornuclear',"garcia@endesa.es",'hashed_pass_1','1980-01-01','1.jpeg','Me gusta divulgar ciencia y el deporte.',1,1);
-- Usuario2
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) 
VALUES ('María García', 'mariagarcia88', 'mariagarcia@email.com', 'hashed_pass_2', '1988-07-22', '2.jpg', 'Apasionada por los viajes y la cocina.', 1, 1);
-- Usuario3
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo)
VALUES ('Carlos López', 'carloslopez95', 'carlos@mail.com', 'hashed_pass_3', '1995-01-01', '3.jpg', 'Me encanta la lectura y el deporte.', 1, 1);
-- Usuario4
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo)
VALUES ('Ana Martínez', 'anamartinez91', 'anamartinez@indoniesia.com', 'hashed_pass_4', '1991-12-12', '4.jpg', 'Me gusta la música y la lectura.', 1, 1);
-- Usuario5
INSERT INTO Usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) 
VALUES ('Juan Pérez', 'juanperez92', 'juanperez@email.com', 'hashed_pass_5', '1992-03-15', '5.jpg', 'Amante de la música y la tecnología.', 1, 1);
-- arreglar ruta imagen y poner carpetas de imagenes

-- Libros
-- Generar datos realistas para la tabla de libros
INSERT INTO Libro (id_user, titulo, sinopsis, imagen_portada, capitulos, num_resenas, valoracion, visitas, visitasSemana, estado, m_18, m_16, m_12)
VALUES
    (1, 'Geoestrategia de la bombilla: Energía nuclear para un cielo limpio', 'La humanidad se enfrenta a la titánica tarea de conseguir un sistema energético que cubra sus necesidades, que sea sostenible, respetuoso con el medio ambiente y la salud de las personas, y que al mismo tiempo sea asequible para tener un alcance universal. No existen soluciones mágicas en ingeniería, sino soluciones de compromiso en las que se analizan las ventajas e inconvenientes de cada una y se busca un equilibrio.', 'bombilla.jpg', 0, 0, 5, 80, 60, 1, 0, 0, 0),
    (2, 'El guardián entre el centeno', 'La historia sigue a Holden Caulfield, un adolescente en Nueva York, tras ser expulsado de la escuela y sus aventuras.', 'centeno.jpg', 25, 150, 4.5, 20, 500, 1, 0, 0, 0),
    (3, 'Cien años de soledad', 'La historia de la familia Buendía y sus generaciones, situada en el ficticio pueblo de Macondo.', 'soledad.jpg', 20, 200, 4.8, 5000, 800, 1, 1, 1, 1),
    (3, 'Orgullo y prejuicio', 'La historia sigue los romances de las hermanas Bennet, especialmente el de Elizabeth Bennet y el Sr. Darcy.', 'orgullo.jpg', 30, 180, 4.7, 4500, 700, 1, 1, 1, 1),
    (4, '1984', 'La novela distópica de George Orwell que sigue la vida de Winston Smith, quien vive en una sociedad totalitaria.', '1984.jpg', 35, 220, 4.6, 4000, 600, 1, 1, 1, 1),
    (5, 'Matar un ruiseñor', 'La historia de Scout Finch, una niña en Alabama, y su padre, el abogado Atticus Finch, quien defiende a un hombre negro acusado de violar a una mujer blanca.', 'ruiseñor.jpg', 28, 190, 4.9, 6000, 900, 1, 1, 1, 1);

-- Listas Libros
INSERT INTO Pendientes (id_libro, id_user) 
VALUES (3, 1),(2, 2),(3, 3),(4, 4),(5, 5);

INSERT INTO Leidos (id_libro, id_user)
VALUES (3, 1),(2, 2),(1, 3),(4, 1);

INSERT INTO Terminados (id_libro, id_user) 
VALUES (4, 1),(3, 2),(2, 3),(1, 1);

INSERT INTO Seguidos (id_libro, id_user)
VALUES (1, 1),(2, 2),(3, 3),(4, 1);

-- GeneroLibro
INSERT INTO GeneroLibro (id_libro, terror, romance, fantasia, cficcion, historia, arte, thriller, poesia, drama, biografia, misterio, policiaca)
VALUES
    (1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (3, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    (5, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
    (6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);

-- Capitulos
INSERT INTO Capitulos (id_libro, num_cap, titulo, archivo)
VALUES
    (2, 1, 'Capítulo 1: Llegada a Nueva York', 'cap1_2.pdf'),
    (2, 2, 'Capítulo 2: En busca de aventuras', 'cap2_2.pdf'),
    (2, 3, 'Capítulo 3: Encuentro en el parque', 'cap3_2.pdf'),
    (3, 1, 'Capítulo 1: Los orígenes de Macondo', 'cap1_3.pdf'),
    (3, 2, 'Capítulo 2: El matrimonio de los Buendía', 'cap2_3.pdf'),
    (3, 3, 'Capítulo 3: La llegada de los gitanos', 'cap3_3.pdf'),
    (4, 1, 'Capítulo 1: La fiesta en Netherfield', 'cap1_4.pdf'),
    (4, 2, 'Capítulo 2: Los encuentros de Elizabeth y Darcy', 'cap2_4.pdf'),
    (4, 3, 'Capítulo 3: La propuesta de Darcy', 'cap3_4.pdf'),
    (5, 1, 'Capítulo 1: El mundo bajo vigilancia', 'cap1_5.pdf'),
    (5, 2, 'Capítulo 2: El Gran Hermano', 'cap2_5.pdf'),
    (5, 3, 'Capítulo 3: Rebelión y traición', 'cap3_5.pdf'),
    (6, 1, 'Capítulo 1: Los niños de Maycomb', 'cap1_6.pdf'),
    (6, 2, 'Capítulo 2: La defensa de Tom Robinson', 'cap2_6.pdf'),
    (6, 3, 'Capítulo 3: El veredicto', 'cap3_6.pdf');

-- Resena
INSERT INTO Resena (id_user, id_libro, contenido, valoracion)
VALUES
    (1, 1, 'Interesante enfoque sobre la energía nuclear y su impacto en la sociedad actual.', 4),
    (2, 2, 'Un clásico que nunca pasa de moda, personajes bien construidos y una historia envolvente.', 5),
    (3, 3, 'Maravillosa saga familiar que mezcla realidad y fantasía de manera brillante.', 5),
    (4, 4, 'Una historia de amor y orgullo en una sociedad marcada por las convenciones sociales.', 4),
    (5, 5, 'Inquietante visión del futuro que nos hace reflexionar sobre nuestra realidad actual.', 4),
    (1, 3, 'Una obra maestra que redefine la narrativa latinoamericana, imprescindible.', 5);
