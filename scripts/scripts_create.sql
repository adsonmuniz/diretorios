CREATE TABLE folder
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_parent INT NULL,
    name VARCHAR(64) NOT NULL
);

ALTER TABLE folder ADD CONSTRAINT unique_folder_in_directory UNIQUE (id_parent, name);