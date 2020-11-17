create table mascotas(ID  SERIAL PRIMARY KEY,nombre varchar,edad int);
insert into mascotas
(nombre, edad)
values
('Maggie', 3),
('Guayaba', 2),
('Capuchina', 2),
('Snowball', 1),
('Panqué', 1);
select * from mascotas
drop table mascotas