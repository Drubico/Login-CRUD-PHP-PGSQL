-- Database: sed
drop table IF EXISTS Tarjeta ;
drop table IF EXISTS Cuentas ;
drop table IF EXISTS Cliente ;
drop table IF EXISTS Usuario ;

Create table Usuario(
ID  SERIAL PRIMARY KEY,
userName varchar,
passUser varchar
);
Create table Cliente(
ID  SERIAL PRIMARY KEY,
Nombre varchar,
Apellido varchar,
DUI varchar
);
Create table Cuentas(
ID  SERIAL PRIMARY KEY,
ClienteID int,
cuenta varchar
);
Create table Tarjeta(
ID  SERIAL PRIMARY KEY,
cuentaID  int,
numero_tarjeta varchar,
fecha varchar,
cvv varchar
);
alter table Cuentas 
ADD CONSTRAINT ClientexCuenta 
FOREIGN KEY (ClienteID) 
REFERENCES Cliente (ID);

alter table Tarjeta 
ADD CONSTRAINT CuentaxTarjeta 
FOREIGN KEY (cuentaID) 
REFERENCES Tarjeta (ID);



insert into Usuario(userName,passUser) values ('admin','admin');
insert into Usuario(userName,passUser) values ('admin1','admin1');

insert into Cliente(Nombre,Apellido,DUI) values ('Diego','Rubi','12345678-9');
insert into Cliente(Nombre,Apellido,DUI) values ('Alejandro','Cordova','12345678-9');

insert into Cuentas(ClienteID,Cuenta) values(1,'Debito');

insert into Tarjeta(cuentaID,numero_tarjeta,fecha,cvv) 
	values (1,'1234567890123456','20/03','500');



select * from usuario;
select * from Tarjeta Tr 
inner join Cuentas Cu
on Cu.ID = Tr.CuentaID;