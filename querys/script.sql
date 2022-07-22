--PostgreSql
create database restaurant;

create table comidas(
id int,
nombre varchar(20),
precio decimal,
descripción text
);

INSERT INTO public.comidas VALUES(1,'sopa',10,'Comida.....');
INSERT INTO public.comidas VALUES(2,'pizza',15,'Comida.....');
INSERT INTO public.comidas VALUES(3,'pollo',15,'Comida.....');
INSERT INTO public.comidas VALUES(4,'majadito',15,'Comida.....');
INSERT INTO public.comidas VALUES(5,'pescado',15,'Comida.....');
INSERT INTO public.comidas VALUES(6,'milanesa',15,'Comida.....');
INSERT INTO public.comidas VALUES(7,'bife',15,'Comida.....');



select * from comidas; 

update comidas set precio = 10 where id=2;

delete from comidas ;
delete from comidas where  id=1;
