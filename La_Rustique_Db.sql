DROP DATABASE IF EXISTS La_Rustique_Db;

CREATE DATABASE La_Rustique_Db;

USE La_Rustique_Db;

CREATE TABLE Accounts (
  AccountNr INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ANaam VARCHAR(20),
  AWachtwoord VARCHAR(60),
  AAdmin VARCHAR(3)
);

/*Gebruikers accounts*/
  INSERT INTO Accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Michiel', 'sU#6bzaP3$e6', 'YES');

  INSERT INTO Accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Thomas', 'xRcyS3RM!aSW', 'YES');

  INSERT INTO Accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Emma', 'Hp8M*EmN9q%L', 'NO');

  INSERT INTO Accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Zouhair', '053iNzIg^%Y2', 'NO');
/*Eind gebruikers accounts*/

CREATE TABLE Plaatsen (
  PlaatsNr INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PlaatsFormaat VARCHAR(10)
);

/*100 plaatsen, 50 kleine en 50 grote*/
  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO Plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

/*Eind Plaatsen*/

CREATE TABLE Klanten (
  KlantNr INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  KNaam VARCHAR(50),
  KTel VARCHAR(25),
  KEmail VARCHAR(50)
);

INSERT INTO Klanten (KNaam, KTel, KEmail)
VALUES ('Freddy Tootsierol', '06506535384', 'Freddysemail@dot.com');

INSERT INTO Klanten (KNaam, KTel, KEmail)
VALUES ('Jebadiah Kerman', '+31 858 975 54', 'Kerbalspace@email.com');

CREATE TABLE Reservaties (
  ReservatieNr INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PlaatsNr INT FOREIGN KEY REFERENCES Plaatsen(PlaatsNr),
  KlantNr INT FOREIGN KEY REFERENCES Klanten(KlantNr),
  AankomstDatum DATE NOT NULL,
  VertrekDatum DATE NOT NULL,
  AantalNachten INT
);

/*Voorbeeld reservaties*/
  INSERT INTO Reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (1, 1, '2021-04-13', '2021-04-23', 9);

  INSERT INTO Reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (67, 1, '2021-06-01', '2021-06-15', 13);

  INSERT INTO Reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (67, 2, '2021-04-10', '2021-04-22', 11);
/*Eind voorbeeld reservaties*/

CREATE TABLE Categorieen (
  CategorieNr INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CategorieNaam VARCHAR(60),
  Prijs FLOAT
);

/*Alle categorieen (oftewel alle nodige tarieven)*/
  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Volwassene', 5.00 );

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Kinderen tot 4 jaar', 0.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Kinderen van 4 tot 12 jaar', 4.00 );

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Hond', 2.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Elektriciteit', 2.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Bezoekers', 2.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Douchemuntjes', 0.50);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Wassen', 6.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Drogen', 4.00 );

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Caravan/Camper (Klein)', 2.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Caravan/Camper (Groot)', 4.00 );

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Tent (Klein)', 3.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Tent (Groot)', 5.00);

  INSERT INTO Categorieen (CategorieNaam, Prijs)
  VALUES ('Auto', 3.00);
/*Eind alle Categorieen*/

CREATE TABLE Reservatie_Regels (
  ReservatieNr INT FOREIGN KEY REFERENCES Reservaties(ReservatieNr),
  CategorieNr INT FOREIGN KEY REFERENCES Categorieen(CategorieNr),
  Aantal INT 
);

/*Voorbeeld reservatie regels*/
  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 1, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 4, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 7, 8);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 12, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 14, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 1, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 4, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 7, 10);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 8, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 9, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 13, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 14, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 1, 2);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 3, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 5, 1);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 6, 4);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 7, 20);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 8, 2);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 9, 2);

  INSERT INTO Reservatie_Regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 11, 1);
/*Eind voorbeeld reservatie regels*/