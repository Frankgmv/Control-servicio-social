-- create database control_servicio_social;
-- use control_servicio_social;

CREATE TABLE SUPER_ADMINS(
	IDENTIDAD VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    OCUPACION VARCHAR(30) NOT NULL,
    CLAVE_ESTUDIANTES VARCHAR(30) NOT NULL,
    CLAVE_DIRECTIVOS VARCHAR(30) NOT NULL,
    CLAVE_ADMINS VARCHAR(30) NOT NULL,
    CONTRA VARCHAR(100) NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (IDENTIDAD)
);

CREATE TABLE ADMINS(
	IDENTIDAD VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    OCUPACION VARCHAR(30) NOT NULL,
    DONDE_LABORA VARCHAR(30) NOT NULL,
    CONTRA VARCHAR(100) NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (IDENTIDAD)
);

CREATE TABLE DIRECTIVOS (
	IDENTIDAD VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    OCUPACION VARCHAR(30) NOT NULL,
    DONDE_LABORA VARCHAR(30) NOT NULL,
    CONTRA VARCHAR(100) NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (IDENTIDAD)

);

CREATE TABLE ESTUDIANTES (
	IDENTIDAD VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    GRADO VARCHAR(5) NOT NULL,
    NOMBRE_TECNICA VARCHAR(30) NOT NULL,
    CONTRA VARCHAR(100) NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (IDENTIDAD)
);

CREATE TABLE TAREAS (
    ID_TAREA VARCHAR(15) NOT NULL,
    ID_CREADOR VARCHAR(15) NOT NULL,
    NOMBRE_TAREA VARCHAR(30) NOT NULL,
    DESCRIPCION TEXT(300) NOT NULL,
    FECHA_CREACION DATE NOT NULL,
    FECHA_LIMITE DATE NOT NULL,
    NUMERO_HORAS INT NOT NULL,
    OBJETIVO VARCHAR(100) NOT NULL,
    PARA_QUE_GRADO VARCHAR(15) NOT NULL,
    ESTADO_TAREA VARCHAR(15) NOT NULL
);

CREATE TABLE POSTULADOS (
    ID_POSTULACION INT AUTO_INCREMENT,
    ID_POSTULADO VARCHAR(15) NOT NULL,
    ID_CREADOR_TAREA VARCHAR(15) NOT NULL,
    FECHA_POSTULACION DATE NOT NULL,
    ESTADO_POSTULACION VARCHAR(15) NOT NULL,
    PRIMARY KEY (ID_POSTULACION),
    FOREIGN KEY (ID_POSTULADO) REFERENCES ESTUDIANTES(IDENTIDAD),
    FOREIGN KEY (ID_CREADOR_TAREA) REFERENCES DIRECTIVOS(IDENTIDAD)
);

CREATE TABLE HORAS (
    ID_DATO INT AUTO_INCREMENT,
    ID_ESTUDIANTE VARCHAR(15) NOT NULL,
    ID_TAREA VARCHAR(15) NOT NULL,
    NOMBRE_TAREA VARCHAR(100) NOT NULL,
    FECHA_CREACION DATE,
    PRIMARY KEY (ID_DATO),
    FOREIGN KEY (ID_TAREA) REFERENCES TAREAS(ID_TAREA),
    FOREIGN KEY (ID_ESTUDIANTE) REFERENCES ESTUDIANTES(IDENTIDAD)
);

CREATE TABLE RETIRADOS (
    ID_RETIRO VARCHAR(15) AUTO_INCREMENT,
    ID_RETIRADO VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    FECHA_RETIRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    GRADO_CURSADO VARCHAR(5) NOT NULL,
    NOMBRE_TECNICA VARCHAR(30) NOT NULL,
    TOTA_HORAS INT NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (ID_RETIRO),
    FOREIGN KEY (ID_RETIRADO) REFERENCES ESTUDIANTES(IDENTIDAD)
);

CREATE TABLE EGRESADOS (
    ID_EGRESO VARCHAR(15) AUTO_INCREMENT,
    ID_EGRESADO VARCHAR(15) NOT NULL,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    EDAD INT NOT NULL,
    FECHA_REGISTRO DATE NOT NULL,
    FECHA_RETIRO DATE NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO VARCHAR(70) NOT NULL,
    ROL VARCHAR(15) NOT NULL,
    GRADO_CURSADO VARCHAR(5) NOT NULL,
    NOMBRE_TECNICA VARCHAR(30) NOT NULL,
    TOTA_HORAS INT NOT NULL,
    TYC VARCHAR(7) NOT NULL,
    PRIMARY KEY (ID_EGRESO),
    FOREIGN KEY (ID_EGRESADO) REFERENCES ESTUDIANTES(IDENTIDAD)
);

-- PLANEAS LOS PARAMETROS PARA ADMINISTRADOR Y DIRECTIVO

CREATE TABLE MODIFICACIONES(
    ID_MODIFICACION VARCHAR(15) NOT NULL PRIMARY KEY,
    ID_MODIFICADOR VARCHAR(15) NOT NULL,
    FECHA_MODIFICACION DATE NOT NULL,
    TIPO_MODIFICACION VARCHAR(70) NOT NULL
    -- PRIMARY KEY (ID_MODIFICACION),
    -- FOREIGN KEY(ID_MODIFICADOR) REFERENCES DIRECTIVOS(IDENTIDAD)
);

INSERT INTO SUPER_ADMINS (IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, OCUPACION, CLAVE_ESTUDIANTES, CLAVE_DIRECTIVOS, CLAVE_ADMINS, CONTRA, TYC)
VALUES ('1011', 'Giovany', 'Velásquez',18, '2004-03-04', '3042030333', 'giovanyvelasquez@gmail.com', 'super-admin', 'revisar', 'est1','dir1','adm1', 'felizComoSiempre', 'acepto');

SHOW TABLES;
DROP TABLE clientes;

SELECT *  FROM SUPER_ADMINS;
 