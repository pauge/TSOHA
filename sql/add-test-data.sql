INSERT INTO kayttaja VALUES(
	'administrator',  
	'salainensana',   
	'true'           
);

INSERT INTO resepti VALUES(
	'Vodkapaukku',   	
	'4cl Vodka',
	'kaada ja nauti',
	'ota kaksi kerrallaan',
	'true',
        'administrator'
);

INSERT INTO aines VALUES(
        'appelsiinimehu'
);

INSERT INTO ainesosa VALUES(
	resepti        int             PRIMARY KEY,
	maara          int,
	aines          char(20)    REFERENCES aines(aines)
);