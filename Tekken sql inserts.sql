DROP TABLE IF EXISTS `fighter`;

create table `fighter`(
	id integer not null auto_increment,
    name varchar(50) default null,
    play_style varchar(50) default null,
    age varchar(50) default null,
    gender varchar(1) default null,
    description varchar(50) default null,
    primary key(id)
);

insert into `fighter` values(0, 'Master Raven', 'Ninjutsu','Unknown','F', 'UN Intelligence Agent'),
(0, 'Anna Williams', 'Aikido','41','F', 'Assassin'),
(0, 'Geese Howard', 'Kobujutsu','43','M', 'Underworld Kingpin of South Town, USA'),
(0, 'Eliza', 'Unknown','1000','F', 'Vampire'),
(0, 'Noctis', 'Weapon Summoning','30','M', 'Prince of the Kingdom of Lucis'),
(0, 'Lei', 'Five Animal Form/Druken Boxing','47','M', 'Police Detective'),
(0, 'Nina Williams', 'Aikido','43','F', 'Assassin'),
(0, 'Yoshimitsu', 'Advanced Manji Ninjitsu','Unknown','M', 'Leader of the Manji Clan'),
(0, 'Sergei Dragnov', 'Commando Sambo','26','M', 'Spetsnaz Soldier'),
(0, 'Hwoawrang', 'Taekwondo','21','M', 'Leader of Resistances'),
(0, 'Mashall Law', 'Jeet Kune Do','48', 'M','Cook and Chinese Restaurant Owner'),
(0, 'Gigas', 'Destructive Impulse','Unknown','M', 'Bioweapon made by G Corp');

DROP TABLE IF EXISTS `user`;

create table `user`(
	id integer not null auto_increment,
    name varchar(50) default null,
    email varchar(50) default null,
	password varchar(50) default null,
    primary key(id)
);

insert into `user` values(0,'Bille Herrington','lordofthelockerroom@gmail.com','yeet101')

