CREATE TABLE kayttaja (
	ktunnus         char(15) PRIMARY KEY,
	salasana        char(16),
	pro             boolean
);

CREATE TABLE resepti (
	nimi    	char(20) PRIMARY KEY,
	ainesosa        char(15),
	ohje            char(200),
	lisahuomio      char(100),
	hyvaksytty      boolean,
        lisaaja         char(15) 
);




