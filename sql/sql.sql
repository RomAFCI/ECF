DROP TABLE IF EXISTS admin;

CREATE TABLE
    admin (
        idAdmin int AUTO_INCREMENT NOT NULL,
        nomAdmin VARCHAR(256),
        passwordAdmin VARCHAR(256),
        PRIMARY KEY (idAdmin)
    ) ENGINE = InnoDB;

DROP TABLE IF EXISTS aboutMe;

CREATE TABLE
    aboutMe (
        idAboutMe int AUTO_INCREMENT NOT NULL,
        text TEXT,
        PRIMARY KEY (idAboutMe)
    ) ENGINE = InnoDB;

DROP TABLE IF EXISTS gallery;

CREATE TABLE
    gallery (
        idGallery int AUTO_INCREMENT NOT NULL,
        imagePath VARCHAR(500),
        altText VARCHAR(256),
        PRIMARY KEY (idGallery)
    ) ENGINE = InnoDB;

DROP TABLE IF EXISTS contact;

CREATE TABLE
    contact (
        idContact int AUTO_INCREMENT NOT NULL,
        nomContact VARCHAR(256),
        prenomContact VARCHAR(256),
        emailContact VARCHAR(256),
        commentaireContact VARCHAR(256),
        PRIMARY KEY (idContact)
    ) ENGINE = InnoDB;