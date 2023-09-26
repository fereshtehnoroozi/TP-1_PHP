DROP TABLE IF EXISTS person;
CREATE TABLE person (
id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
nom varchar(255) NOT NULL,
prenom varchar(255) NOT NULL,
annee smallint UNSIGNED NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO person (id, nom, prenom, annee) VALUES
(1, 'Ali', 'Orwell', 1948),
(2, 'Margaret', ' Mitchell', 1936),
(3, 'Moby', 'Melville', 1851),
(4, 'Alexandre', 'Dumas', 1844),
(5, 'Andre', 'Marquez', 1967),
(6, 'Alice', 'Murakami', 2002);