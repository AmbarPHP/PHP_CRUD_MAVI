DROP DATABASE IF EXISTS crudajax;

CREATE DATABASE IF NOT EXISTS crudajax;

USE crudajax;

/*tabla cliente*/

CREATE TABLE
    cliente(
        id INT(4) PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        apellido_pat VARCHAR(100) UNIQUE NOT NULL,
        apellido_mat VARCHAR(100) UNIQUE NOT NULL,
        domicilio VARCHAR(100) UNIQUE NOT NULL,
    ) ENGINE = InnoDB;

/*insersión de datos*/

INSERT INTO
    `cliente` (`id`, `nombre`, `email`)
VALUES (
        1,
        'Laura Luna',
        'luna@luna.com'
    ), (
        2,
        'Roberto Rodriguez',
        'roberto@rod.com'
    ), (
        3,
        'Maria Marbel',
        'maria@mar.com'
    );