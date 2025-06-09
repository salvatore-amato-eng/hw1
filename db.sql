CREATE TABLE if NOT EXISTS UTENTI (
	EMAIL VARCHAR(255) PRIMARY KEY,
	SEX VARCHAR(1),
	NOME VARCHAR(255),
	COGNOME VARCHAR(255),
	PASSWORD VARCHAR(255) ,
	FUNCTION VARCHAR(255)
);

CREATE TABLE if NOT EXISTS CONTENUTI (
	URL VARCHAR(255),
	TITOLO VARCHAR(255) PRIMARY KEY ,
	DESCRIZIONE VARCHAR(255),
	PREZZO FLOAT
);

/*
INSERT INTO contenuti VALUES("pf274587_s_2.webp","NUCLEO-H53RRE","STM32 Nucleo-64 development board with STM32H533RET6 MCU, supports Arduino and morpho connectivity",5);
INSERT INTO contenuti VALUES("sct040to65g3_1.webp","SCT040TO65G3","Silicon carbide Power MOSFET 650 V, 40 mOhm typ., 35 A in a TO-LL package",6);

INSERT INTO contenuti VALUES("stf80n600k6.webp","STF80N600K6","N-channel 800 V, 515 mOhm typ., 7 A MDmesh K6 Power MOSFET in a TO-220FP packages",2);
INSERT INTO contenuti VALUES("nucleo-c071rb_1.webp","NUCLEO-C071RB","STM32 Nucleo-64 development board with STM32C071RB MCU, supports Arduino and ST morpho connectivity",1);

INSERT INTO contenuti VALUES("https://estore.st.com/media/catalog/product/m/2/m24m01e.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700","M24M01E-FMC6TG","1 Mbit Serial I2C bus EEPROM with configurable device address and software write protection registers",10);
INSERT INTO contenuti VALUES("https://estore.st.com/media/catalog/product/p/f/pf273573_m.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700","X-NUCLEO-NFC09A1","NFC card reader expansion board based on ST25R100 for STM32 Nucleos",11);
INSERT INTO contenuti VALUES("https://estore.st.com/media/catalog/product/p/f/pf274300_m.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700","STEVAL-MKI241KA","LSM6DSV16B adapter kit for standard DIL24 socket with bone conduction functionality",17);
INSERT INTO contenuti VALUES("https://estore.st.com/media/catalog/product/p/f/pf270999_m_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700","NUCLEO-G0B1RE","STM32 Nucleo_64 development board with STM32G0B1RE MCU, supports Arduino and ST morpho connectivity",3);
INSERT INTO contenuti VALUES("https://estore.st.com/media/catalog/product/t/s/tsv794iydt.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700","TSV794IYDT","High bandwidth (50 MHz) low offset (200 µV) rail-to-rail 5 V op amp.",2);

*/

CREATE TABLE if NOT EXISTS carrello (
	UTENTE VARCHAR(255) REFERENCES utenti(EMAIL),
	PRODOTTO VARCHAR(255)  REFERENCES contenuti(titolo),
	PRIMARY KEY(UTENTE,PRODOTTO)
);