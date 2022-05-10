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
fecha datetime not null,
observacioningreso varchar(100) not null,
observacionsalida varchar(100) not null
);