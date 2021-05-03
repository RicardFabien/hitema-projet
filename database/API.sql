DROP DATABASE IF EXISTS API;

CREATE DATABASE API;

CREATE TABLE App_user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    level VARCHAR(7) NOT NULL
);

CREATE TABLE bars (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login)
);

CREATE TABLE boites_de_nuit (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lieu varchar(255) NOT NULL,
  price float NOT NULL,
  date_creation date NOT NULL,
  description varchar(10000) NOT NULL,
  user VARCHAR(50) NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login)
);

CREATE TABLE Location_salle (
	location_Id INT auto_increment NOT NULL,
	User_Id INT NOT NULL,
	bar_Id INT,
  bn_Id INT,
  price FLOAT  NOT NULL,
	locationDebut DATETIME NOT NULL,
	locationFin DATETIME NOT NULL,
	CONSTRAINT Location_PK PRIMARY KEY (location_Id),
  CONSTRAINT Location_FK FOREIGN KEY (User_Id) REFERENCES App_user(id),
	CONSTRAINT Location_FK_1 FOREIGN KEY (bar_Id) REFERENCES bars(id),
  CONSTRAINT Location_FK_2 FOREIGN KEY (bn_Id) REFERENCES boites_de_nuit(id)
);

CREATE TABLE comments_bars (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  Bars_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (Bars_id) REFERENCES API.bars(id),
  date_creation date NOT NULL
);

CREATE TABLE comments_boites_de_nuit (
  comment_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  comment_description varchar(2500) NOT NULL,
  reviews INT NOT NULL,
  user VARCHAR(50) NOT NULL,
  boites_de_nuit_id INT NOT NULL,
  FOREIGN KEY (user) REFERENCES API.app_user(login),
  FOREIGN KEY (boites_de_nuit_id) REFERENCES API.boites_de_nuit(id),
  date_creation date NOT NULL
);


-- hachage du mot de passe : algorithme argon2
INSERT INTO App_user
VALUE ( NULL, 'admin', '$argon2i$v=19$m=16,t=2,p=1$bWVGVkRJNVljczVLbjJUcQ$kpHdZUT8h+851aKEVnmWGw','admin' );

INSERT INTO bars
VALUE(NULL,"Le bar","Paris",10,CURRENT_DATE(),"Un bar tout ce qu'il y a de plus normal");
