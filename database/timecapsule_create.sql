CREATE DATABASE capsule;

CREATE USER 'usrcapsule'@'localhost' IDENTIFIED BY 'capsuleusr';
GRANT ALL PRIVILEGES ON capsule. * TO 'usrcapsule'@'localhost';
FLUSH PRIVILEGES;

USE capsule;

/*
CREATE TABLE IF NOT EXISTS user (
seq_user INT(6) AUTO_INCREMENT PRIMARY KEY
,nam_user VARCHAR(50) NOT NULL DEFAULT ''
,pwd_user VARCHAR(30) DEFAULT ''
,eml_user VARCHAR(50) NOT NULL DEFAULT ''
);
*/

CREATE TABLE IF NOT EXISTS message (
seq_message INT(6) AUTO_INCREMENT PRIMARY KEY
,nam_to_message VARCHAR(50) NOT NULL DEFAULT ''
,nam_from_message VARCHAR(50) NOT NULL DEFAULT ''
,eml_message VARCHAR(50) NOT NULL DEFAULT ''
,dat_message DATE NOT NULL DEFAULT '0000-00-00'
,tel_message VARCHAR (15) DEFAULT ''
,txt_message TEXT NOT NULL DEFAULT ''
,dat_insert TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
,ind_enviado CHAR(1) NOT NULL DEFAULT 'N'
);

/*
,seq_user INT(6) NOT NULL

ALTER TABLE message ADD FOREIGN KEY (seq_user) REFERENCES user(seq_user);
*/
