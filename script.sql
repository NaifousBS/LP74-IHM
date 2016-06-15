

DROP TABLE IF EXISTS ICHIKAWA;

DROP TABLE IF EXISTS PESTEL;

DROP TABLE IF EXISTS DONNEES;

DROP TABLE IF EXISTS SWOT;

USE lp74_ihm;


# -----------------------------------------------------------------------------
#       TABLE : ICHIKAWA
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ICHIKAWA
 (
   ID_ICHIKAWA INT NOT NULL AUTO_INCREMENT 
   , PRIMARY KEY (ID_ICHIKAWA) 
 ) 
 comment = "";



# -----------------------------------------------------------------------------
#       TABLE : PESTEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PESTEL
 (
   ID_PESTEL INT NOT NULL AUTO_INCREMENT 
   , PRIMARY KEY (ID_PESTEL) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       TABLE : DONNEES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DONNEES
 (
   ID_DONNEES INT NOT NULL  AUTO_INCREMENT ,
   ID_ICHIKAWA INT NULL  ,
   ID_SWOT INT NULL  ,
   ID_PESTEL INT NULL  ,
   INTITULÉ VARCHAR(128) NOT NULL  ,
   CONTENU VARCHAR(255) NOT NULL  ,
   NOEUD SMALLINT NULL  ,
   NOEUDPARENT SMALLINT NULL  
   , PRIMARY KEY (ID_DONNEES) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DONNEES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DONNEES_ICHIKAWA
     ON DONNEES (ID_ICHIKAWA ASC);

CREATE  INDEX I_FK_DONNEES_SWOT
     ON DONNEES (ID_SWOT ASC);

CREATE  INDEX I_FK_DONNEES_PESTEL
     ON DONNEES (ID_PESTEL ASC);

# -----------------------------------------------------------------------------
#       TABLE : SWOT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SWOT
 (
   ID_SWOT INT NOT NULL AUTO_INCREMENT 
   , PRIMARY KEY (ID_SWOT) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE DONNEES 
  ADD FOREIGN KEY FK_DONNEES_ICHIKAWA (ID_ICHIKAWA)
      REFERENCES ICHIKAWA (ID_ICHIKAWA) ;


ALTER TABLE DONNEES 
  ADD FOREIGN KEY FK_DONNEES_SWOT (ID_SWOT)
      REFERENCES SWOT (ID_SWOT) ;


ALTER TABLE DONNEES 
  ADD FOREIGN KEY FK_DONNEES_PESTEL (ID_PESTEL)
      REFERENCES PESTEL (ID_PESTEL) ;


