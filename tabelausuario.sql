CREATE TABLE "WARELINE".tblusu (
	usucod varchar(6) NOT NULL,
	usunome varchar(100) NOT NULL,
	ususenha varchar(20) NULL,
	status varchar(50) NOT NULL,
	acessos varchar(4000) NULL,
	origem varchar(1) NULL,
	codger varchar(3) NULL,
	nome varchar(80) NULL,
	senhamaster varchar(20) NULL,
	origem2 varchar(1) NULL,
	coduni int4 NULL,
	provisoria varchar(1) NULL,
	codvend varchar(3) NULL,
	situacao varchar(20) NULL,
	modulo varchar(11) NULL,
	biometria varchar(1) NULL,
	CONSTRAINT "TBLUSU_pkey" PRIMARY KEY (usucod)
)
WITH (
	OIDS=TRUE
);
