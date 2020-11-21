-- admin@admin.com -> Adm1n
-- admin1@admin1.com -> Adm1n

-- postgres:
-- user: admin ;; pass: admin 
-- Database: 
-- sed

-- DROP DATABASE sed;

-- CREATE DATABASE sed
--     WITH 
--     OWNER = admin
--     ENCODING = 'UTF8'
--     LC_COLLATE = 'es_ES.UTF-8'
--     LC_CTYPE = 'es_ES.UTF-8'
--     TABLESPACE = pg_default
--     CONNECTION LIMIT = -1;
  

select * from cliente;
select * from cuentas;
select * from tarjeta;
select * from public."user";
select * from loginTime;

-- ========================================================================================

drop table IF EXISTS Tarjeta ;
drop table IF EXISTS Cuentas ;
drop table IF EXISTS Cliente ;
Alter table loginTime 
drop CONSTRAINT LoginxTime ;
drop table IF EXISTS public."user" ;
drop table IF EXISTS loginTime ;

-- ========================================================================================

-- APARTIR DE AQUI SE CREA LA BASE

CREATE TABLE public."user"
(
   id serial, 
   name character varying(250), 
   email character varying(250), 
   password character varying(250), 
   mobno bigint, 
   CONSTRAINT id PRIMARY KEY (id)
) 
WITH (
  OIDS = FALSE
);

create TABLE loginTime(
	ID  SERIAL PRIMARY KEY,
	userID  int ,
	timeLogin varchar
);

Alter table loginTime 
ADD CONSTRAINT LoginxTime 
FOREIGN KEY (userID) 
REFERENCES public."user"(id);



Create table Cliente(
ID  SERIAL PRIMARY KEY,
Nombre varchar,
Apellido varchar,
DUI varchar
);
Create table Cuentas(
ID  SERIAL PRIMARY KEY,
ClienteID int ,
cuenta varchar
);

Create table Tarjeta(
ID  SERIAL PRIMARY KEY,
cuentaID  int ,
numero_tarjeta varchar,
fecha varchar,
cvv varchar
);

Alter table Cuentas 
ADD CONSTRAINT ClientexCuenta 
FOREIGN KEY (ClienteID) 
REFERENCES Cliente (ID)
ON DELETE CASCADE;

Alter table Tarjeta 
ADD CONSTRAINT CuentaxTarjeta 
FOREIGN KEY (cuentaID) 
REFERENCES Tarjeta (ID)
ON DELETE CASCADE;


insert into Cliente(Nombre,Apellido,DUI) values ('Diego','Rubi','123456789');
insert into Cliente(Nombre,Apellido,DUI) values ('Alejandro','Cordova','123456789');

insert into Cuentas(ClienteID,Cuenta) values(1,'Debito');
insert into Cuentas(ClienteID,Cuenta) values(1,'Credito');

insert into Tarjeta(cuentaID,numero_tarjeta,fecha,cvv) 
	values (1,'1234567890123456','20/03','500');

insert into public."user"(name,email,password,mobno)
	values('Admin','admin@admin.com','bca91f373908f64e6ffe5700a82491ba',12345678);

insert into public."user"(name,email,password,mobno)
	values('Admin1','admin1@admin1.com','bca91f373908f64e6ffe5700a82491ba',12345678);

