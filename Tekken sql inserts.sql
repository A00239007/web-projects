create table `fighter`(
	id integer not null auto_increment,
    name varchar(50) default null,
    play_style varchar(50) default null,
    age varchar(50) default null,
    description varchar(50) default null,
    primary key(id)
);

insert into `fighter` values(0, 'Master Raven', 'Ninjutsu','Unknown', 'UN Intelligence Agent'),
(0, 'Anna Williams', 'Aikido','41', 'Assassin'),
(0, 'Geese Howard', 'Kobujutsu','43', 'Underworld Kingpin of South Town, USA'),
(0, 'Eliza', 'Unknown','1000', 'Vampire'),
(0, 'Noctis', 'Weapon Summoning','30', 'Prince of the Kingdom of Lucis'),
(0, 'Lei', 'Five Animal Form/Druken Boxing','47', 'Police Detective'),
(0, 'Geese Howard', 'Kobujutsu','43', 'Underworld Kingpin of South Town, USA'),
(0, 'Nina Williams', 'Aikido','43', 'Assassin'),
(0, 'Yoshimitsu', 'Advanced Manji Ninjitsu','Unknown', 'Leader of the Manji Clan'),
(0, 'Sergei Dragnov', 'Commando Sambo','26', 'Spetsnaz Soldier'),
(0, 'Hwoawrang', 'Taekwondo','21', 'Leader of Resistances'),
(0, 'Mashall Law', 'Jeet Kune Do','48', 'Cook and Chinese Restaurant Owner'),
(0, 'Gigas', 'Destructive Impulse','Unknown', 'Bioweapon made by G Corp');

create table `user`(
	id integer not null auto_increment,
    name varchar(50) default null,
    email varchar(50) default null,
    primary key(id)
);

insert into `user` values(0,'Bille Herrington','lordofthelockerroom@gmail.com'),
(0,'Van Darkholme','dungeonmaster@gmail.com');
