DROP DATABASE IF EXISTS La_Rustique_Db;

CREATE DATABASE La_Rustique_Db;

USE La_Rustique_Db;

CREATE TABLE accounts (
  AccountNr INT NOT NULL AUTO_INCREMENT,
  ANaam VARCHAR(20),
  AWachtwoord VARCHAR(60),
  AAdmin VARCHAR(3),
  PRIMARY KEY (AccountNr)
);

/*Gebruikers accounts*/
  INSERT INTO accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Michiel', 'sU#6bzaP3$e6', 'YES');

  INSERT INTO accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Thomas', 'xRcyS3RM!aSW', 'YES');

  INSERT INTO accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Emma', 'Hp8M*EmN9q%L', 'NO');

  INSERT INTO accounts (ANaam, AWachtwoord, AAdmin)
  VALUES ('Zouhair', '053iNzIg^%Y2', 'NO');
/*Eind gebruikers accounts*/

CREATE TABLE plaatsen (
  PlaatsNr INT NOT NULL AUTO_INCREMENT,
  PlaatsFormaat VARCHAR(10),
  PRIMARY KEY (PlaatsNr)
);

/*100 plaatsen, 50 kleine en 50 grote*/
  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');
  
  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('KLEIN');

  INSERT INTO plaatsen (PlaatsFormaat)
  VALUES ('GROOT');

/*Eind plaatsen*/

CREATE TABLE klanten (
  KlantNr INT NOT NULL AUTO_INCREMENT,
  KNaam VARCHAR(50),
  KTel VARCHAR(25),
  KEmail VARCHAR(50),
  PRIMARY KEY (KlantNr)
);

/*Voorbeeld klanten*/
  INSERT INTO klanten (KNaam, KTel, KEmail)
  VALUES ('Freddy Tootsierol', '+31650356575', 'Freddysemail@dot.com');

  INSERT INTO klanten (KNaam, KTel, KEmail)
  VALUES ('Jebadiah Kerman', '+31685897554', 'Kerbalspace@email.com');
/*Eind voorbeeld klanten*/

CREATE TABLE reservaties (
  ReservatieNr INT NOT NULL AUTO_INCREMENT,
  PlaatsNr INT, 
  KlantNr INT, 
  AankomstDatum DATE NOT NULL,
  VertrekDatum DATE NOT NULL,
  AantalNachten INT,
  PRIMARY KEY (ReservatieNr),
  FOREIGN KEY (PlaatsNr) REFERENCES plaatsen(PlaatsNr),
  FOREIGN KEY (KlantNr) REFERENCES klanten(KlantNr)
);

/*Voorbeeld reservaties*/
  INSERT INTO reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (4, 1, '2020-11-13', '2020-12-05', 22);

  INSERT INTO reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (3, 1, '2020-11-14', '2020-11-24', 9);

  INSERT INTO reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
  VALUES (27, 2, '2020-11-10', '2020-11-30', 19);
/*Eind voorbeeld reservaties*/

CREATE TABLE categorieen (
  CategorieNr INT NOT NULL AUTO_INCREMENT,
  CategorieNaam VARCHAR(60),
  Prijs FLOAT,
  PRIMARY KEY (CategorieNr)
);

/*Alle categorieen (oftewel alle nodige tarieven)*/
  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Volwassene', 5.00 );

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Kinderen tot 4 jaar', 0.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Kinderen van 4 tot 12 jaar', 4.00 );

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Hond', 2.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Elektriciteit', 2.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Bezoekers', 2.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Douchemuntjes', 0.50);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Wassen', 6.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Drogen', 4.00 );

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Caravan/Camper (Klein)', 2.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Caravan/Camper (Groot)', 4.00 );

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Tent (Klein)', 3.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Tent (Groot)', 5.00);

  INSERT INTO categorieen (CategorieNaam, Prijs)
  VALUES ('Auto', 3.00);
/*Eind alle Categorieen*/

CREATE TABLE reservatie_regels (
  ReservatieNr INT,
  CategorieNr INT,
  Aantal INT,
  PRIMARY KEY (ReservatieNr, CategorieNr),
  FOREIGN KEY (ReservatieNr) REFERENCES reservaties(ReservatieNr) ON DELETE CASCADE,
  FOREIGN KEY (CategorieNr) REFERENCES categorieen(CategorieNr)  
);

/*Voorbeeld reservatie regels*/
  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 1, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 4, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 7, 8);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 12, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (1, 14, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 1, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 4, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 7, 10);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 8, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 9, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 13, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (2, 14, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 1, 2);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 3, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 5, 1);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 6, 4);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 7, 20);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 8, 2);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 9, 2);

  INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal)
  VALUES (3, 11, 1);
/*Eind voorbeeld reservatie regels*/
