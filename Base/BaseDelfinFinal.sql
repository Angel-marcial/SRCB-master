CREATE DATABASE bdelfin;

DROP DATABASE bdelfin;

CREATE TABLE Turno (
    ID_Turno INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Turno VARCHAR(255) NOT NULL
);

INSERT INTO turno (Nombre_turno) VALUES ("S/D");

CREATE TABLE Sala (
    ID_Sala INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Sala VARCHAR(255) NOT NULL
);

INSERT INTO sala(Nombre_Sala) VALUES ("S/D");

CREATE TABLE Area (
    ID_Area INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Area VARCHAR(255) NOT NULL
);

INSERT INTO Area(Nombre_Area) VALUES("S/D");

CREATE TABLE Fecha (
    ID_Fecha INT AUTO_INCREMENT PRIMARY KEY,
    Fecha_Completa VARCHAR(255),
    Dia VARCHAR(255)
);

INSERT INTO Fecha (Fecha_Completa,Dia) VALUES
("S/D","S/D");

CREATE TABLE Pais (
    ID_Pais INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Pais VARCHAR(255) NOT NULL
);

INSERT INTO Pais(Nombre_Pais) VALUES("S/D");

CREATE TABLE Ponente (
    ID_Ponente VARCHAR(255) PRIMARY KEY,
    ID_Equipo INT,
    Nombre_Ponente VARCHAR(255)
);

CREATE TABLE Administrador (
    ID_Admin INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Admin VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL
);

INSERT INTO Administrador (Nombre_Admin,correo) 
VALUES ("Mauro","Mauro@gmail.com");

CREATE TABLE Sesion (
    correo VARCHAR(255),
    contrasenia VARCHAR(255) NOT NULL,
    tipo VARCHAR(15) NOT NULL,
    PRIMARY KEY(correo)
);

INSERT INTO Sesion(correo,contrasenia,tipo) 
VALUES("Mauro@gmail.com","pass0","admin");

CREATE TABLE Trabajo (
    ID_Trabajo VARCHAR(255) PRIMARY KEY,
    ID_Fecha INT,
    ID_Turno INT,
    Linea VARCHAR(255),
    Titulo VARCHAR(255),
    Compartido VARCHAR(255),
    FOREIGN KEY (ID_Fecha) REFERENCES Fecha(ID_Fecha),
    FOREIGN KEY (ID_Turno) REFERENCES Turno(ID_Turno)
);


CREATE TABLE Moderador (
    ID_Moderador VARCHAR(255) PRIMARY KEY,
    ID_Sala INT,
    Nombre_SalaAlternativa VARCHAR(255),
    ID_Pais INT,
    ID_Area INT,
    Correo_Electronico VARCHAR(255),
    Correo_Electronico_Alternativo VARCHAR(255),
    Nombre_Moderador VARCHAR(255),
    Sexo VARCHAR(255),
    Celular VARCHAR(255),
    FOREIGN KEY (ID_Sala) REFERENCES Sala(ID_Sala),
    FOREIGN KEY (ID_Pais) REFERENCES Pais(ID_Pais),
    FOREIGN KEY (ID_Area) REFERENCES Area(ID_Area)
);

CREATE TABLE Institucion (
    ID_Institucion VARCHAR(255) PRIMARY KEY,
    Nombre_Institucion VARCHAR(255),
    ID_Pais VARCHAR(255),
    FOREIGN KEY (ID_Pais) REFERENCES Pais(ID_Pais)
);

CREATE TABLE Investigador (
    ID_Investigador VARCHAR(255) PRIMARY KEY,
    ID_Institucion VARCHAR(255),
    Nombre_Investigador VARCHAR(255),
    FOREIGN KEY (ID_Institucion) REFERENCES Institucion(ID_Institucion)
);

CREATE TABLE Equipo_Ponente (
    ID_Equipo VARCHAR(255) PRIMARY KEY,
    ID_Ponente VARCHAR(255),
    ID_Institucion VARCHAR(255),
    ID_Investigador VARCHAR(255),
    ID_Trabajo VARCHAR(255),
    Numero_Ponentes INT,
    FOREIGN KEY (ID_Ponente) REFERENCES Ponente(ID_Ponente),
    FOREIGN KEY (ID_Institucion) REFERENCES Institucion(ID_Institucion),
    FOREIGN KEY (ID_Investigador) REFERENCES Investigador(ID_Investigador),
    FOREIGN KEY (ID_Trabajo) REFERENCES Trabajo(ID_Trabajo)
);

CREATE TABLE Alumno (
    ID_Alumno VARCHAR(255) PRIMARY KEY,
    ID_Trabajo VARCHAR(255),
    Nombre VARCHAR(255),
    LinkQR VARCHAR(255),
    Confirmacion_Asistencia BOOLEAN,
    FOREIGN KEY (ID_Trabajo) REFERENCES Trabajo(ID_Trabajo)
);




