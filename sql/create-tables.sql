CREATE TABLE kayttaja (
	ktunnus     char(15) PRIMARY KEY,
	salasana    char(16),
	pro         boolean
);

CREATE TABLE resepti (
	id                  int        PRIMARY KEY,
	nimi                char(20),
	ohje                char(200),
	lisahuomio          char(100),
	hyvaksytty          boolean,
       	lisaaja             string     REFERENCES kayttaja(ktunnus)	
);

CREATE TABLE aines (
	aines           char(20)    PRIMARY KEY
);

CREATE TABLE ainesosa (
	resepti        int             PRIMARY KEY,
	maara          int,
	aines          char(20)    REFERENCES aines(aines)
);


