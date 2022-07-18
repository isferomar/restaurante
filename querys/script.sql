--PostgreSql
create database restaurant;

create table comida(
id int,
nombre varchar(20),
precio decimal,
descripción text
);

INSERT INTO public.comida VALUES(1,'sopa',10,'Comida.....');
INSERT INTO public.comida VALUES(2,'pizza',15,'Comida.....');
INSERT INTO public.comida VALUES(3,'pollo',15,'Comida.....');
INSERT INTO public.comida VALUES(4,'majadito',15,'Comida.....');
INSERT INTO public.comida VALUES(5,'pescado',15,'Comida.....');
INSERT INTO public.comida VALUES(6,'milanesa',15,'Comida.....');
INSERT INTO public.comida VALUES(7,'bife',15,'Comida.....');



select * from comida; 

update comida set precio = 10 where id=2;

delete from comida ;
delete from comida where  id=1;
