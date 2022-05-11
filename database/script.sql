use cggraneros;

create table curso(
id_cur int not null auto_increment primary key,
nombre varchar(30) not null
);

create table control(
id_con int not null auto_increment primary key,
id_cur int not null references curso(id_cur),
asignatura varchar(40) not null,
id_doc int not null references CGDocentes(id_doc),
id_est int not null references Estadocomponentes(id_est_comp),
fecha date not null,
hora time not null,
observacioningreso varchar(100) not null,
observacionsalida varchar(100) not null
);

insert into curso(nombre) values('1 Basico A');
insert into curso(nombre) values('1 Basico B');
insert into curso(nombre) values('2 Basico A');
insert into curso(nombre) values('2 Basico B');
insert into curso(nombre) values('3 Basico A');
insert into curso(nombre) values('3 Basico B');
insert into curso(nombre) values('4 Basico A');
insert into curso(nombre) values('4 Basico B');
insert into curso(nombre) values('5 Basico A');
insert into curso(nombre) values('5 Basico B');
insert into curso(nombre) values('6 Basico A');
insert into curso(nombre) values('6 Basico B');
insert into curso(nombre) values('7 Basico A');
insert into curso(nombre) values('7 Basico B');
insert into curso(nombre) values('8 Basico A');
insert into curso(nombre) values('8 Basico B');
insert into curso(nombre) values('1 Medio A');
insert into curso(nombre) values('1 Medio B');
insert into curso(nombre) values('2 Medio A');
insert into curso(nombre) values('2 Medio B');
insert into curso(nombre) values('3 Medio');
insert into curso(nombre) values('4 Medio');
insert into curso(nombre) values('Prekinder A');
insert into curso(nombre) values('Prekinder B');
insert into curso(nombre) values('Kinder A');
insert into curso(nombre) values('Kinder B');