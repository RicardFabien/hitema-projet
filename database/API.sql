DROP DATABASE IF EXISTS API;

CREATE DATABASE API;

CREATE TABLE API.user(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    level VARCHAR(7) NOT NULL
);

CREATE TABLE API.game(
  id tinyint(3) UNSIGNED NOT NULL,
  name varchar(50) NOT NULL,
  console varchar(100) NOT NULL,
  price float NOT NULL
); 

-- hachage du mot de passe : algorithme argon2
INSERT INTO API.user
VALUE ( NULL, 'admin', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw','admin' );