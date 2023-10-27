CREATE DATABASE bdelfin;

DROP DATABASE bdelfin;

CREATE TABLE Moderador (
    ID_Moderador VARCHAR(255) PRIMARY KEY,
    Modalidad VARCHAR(255),
    Nombre_Moderador VARCHAR(255) NOT NULL,
    Sexo VARCHAR(255) NOT NULL,
    Celular VARCHAR(255) NOT NULL,
    Correo VARCHAR(255) NOT NULL,
    Correo_alternativo VARCHAR(255)
);

CREATE TABLE Sala (
    ID_Sala INT AUTO_INCREMENT PRIMARY KEY,
    Sede VARCHAR(255) NOT NULL,
    Bloque VARCHAR(255) NOT NULL,
    Ubicacion VARCHAR(255) NOT NULL
);

CREATE TABLE Trabajo (
    ID_Trabajo VARCHAR(255) PRIMARY KEY,
    ID_Sala INT AUTO_INCREMENT,
    Fecha VARCHAR(255) NOT NULL,
    Linea VARCHAR(255) NOT NULL,
    Compartido VARCHAR(255) NOT NULL,
    Titulo VARCHAR(255) NOT NULL,
    FOREIGN KEY (ID_Sala) REFERENCES Sala(ID_Sala)
);

CREATE TABLE Area (
   ID_Area INT AUTO_INCREMENT PRIMARY KEY,
   ID_Trabajo VARCHAR(255),
   Nombre_Area TEXT NOT NULL,
   FOREIGN KEY (ID_Trabajo) REFERENCES Trabajo(ID_Trabajo)
);

CREATE TABLE Pais (
    ID_Pais INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Pais VARCHAR(255) NOT NULL
);

CREATE TABLE Investigador (
    ID_Investigador INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Investigador VARCHAR(255) NOT NULL
);

CREATE TABLE Administrador (
    ID_Admin INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Admin VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL
);

INSERT INTO Administrador(Nombre_Admin,correo) 
VALUES ("Mauro","Mauro@gmail.com");

CREATE TABLE Sesion (
    correo VARCHAR(255),
    contrasenia VARCHAR(255) NOT NULL,
    tipo VARCHAR(15) NOT NULL,
    PRIMARY KEY(correo)
);

INSERT INTO Sesion(correo,contrasenia,tipo) 
VALUES("Mauro@gmail.com","pass0","admin");


CREATE TABLE Institucion (
    ID_Institucion INT AUTO_INCREMENT PRIMARY KEY,
    ID_Pais INT,
    Nombre_Institucion VARCHAR(255) NOT NULL,
    FOREIGN KEY (ID_Pais) REFERENCES Pais(ID_Pais)
);

CREATE TABLE Ponente (
    ID_Ponente VARCHAR(255) PRIMARY KEY,
    ID_Trabajo VARCHAR(255),
    ID_Investigador INT,
    ID_Institucion INT,
    Nombre_Ponente VARCHAR(255) NOT NULL,
    Correo VARCHAR(255),
    FOREIGN KEY (ID_Trabajo) REFERENCES Trabajo(ID_Trabajo),
    FOREIGN KEY (ID_Investigador) REFERENCES Investigador(ID_Investigador),
    FOREIGN KEY (ID_Institucion) REFERENCES Institucion(ID_Institucion)
);
