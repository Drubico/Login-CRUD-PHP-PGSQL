-- Database: sed
drop table IF EXISTS Tarjeta ;
drop table IF EXISTS Cuentas ;
drop table IF EXISTS Cliente ;
drop table IF EXISTS public."user" ;

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
)

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
alter table Cuentas 
ADD CONSTRAINT ClientexCuenta 
FOREIGN KEY (ClienteID) 
REFERENCES Cliente (ID)
ON DELETE CASCADE;

alter table Tarjeta 
ADD CONSTRAINT CuentaxTarjeta 
FOREIGN KEY (cuentaID) 
REFERENCES Tarjeta (ID)
ON DELETE CASCADE;



insert into Usuario(userName,passUser) values ('admin','admin');
insert into Usuario(userName,passUser) values ('admin1','admin1');

insert into Cliente(Nombre,Apellido,DUI) values ('Diego','Rubi','12345678-9');
insert into Cliente(Nombre,Apellido,DUI) values ('Alejandro','Cordova','12345678-9');

insert into Cuentas(ClienteID,Cuenta) values(1,'Debito');
insert into Cuentas(ClienteID,Cuenta) values(1,'Credito');

insert into Tarjeta(cuentaID,numero_tarjeta,fecha,cvv) 
	values (1,'1234567890123456','20/03','500');



select * from "user";

select concat(cl.nombre,' ',cl.apellido) as nombre,
Tr.numero_Tarjeta 
from Tarjeta Tr 
inner join Cuentas Cu
on Cu.ID = Tr.CuentaID
inner join Cliente Cl
on Cl.ID=Cu.ClienteID;

select concat(cl.nombre,' ',cl.apellido) as nombre,
cu.cuenta 
from Cuentas Cu inner join Cliente cl
on Cl.ID=Cu.ClienteID
where cl.id=1;

SELECT ID ,cuenta,ClienteID FROM Cuentas where ClienteID=1;

select * from cliente;
select * from cuentas;
select * from tarjeta;
