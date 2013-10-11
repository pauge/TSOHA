CREATE TABLE kayttaja (
	ktunnus char(15) PRIMARY KEY NOT NULL,
	salasana char(16) NOT NULL,
	pro boolean
);

CREATE TABLE resepti (
	id SERIAL PRIMARY KEY,
	nimi char(20) NOT NULL,
	ohje char(100) NOT NULL,
	lisahuomio char(100),
	hyvaksytty boolean,
       	lisaaja char(20) REFERENCES kayttaja(ktunnus) NOT NULL	
);

CREATE TABLE aines (
	aines char(20) PRIMARY KEY NOT NULL
);

CREATE TABLE ainesosa (
	resepti int REFERENCES resepti(id) NOT NULL,
	maara int NOT NULL,
	aines char(20) REFERENCES aines(aines)
);


