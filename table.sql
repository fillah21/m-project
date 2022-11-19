CREATE TABLE `user` (
    `id_user` int(11) primary key auto_increment,
    `username` varchar(50) NOT NULL,
    `pwd` varchar(255) NOT NULL,
    `level` varchar(25) NOT NULL
);
