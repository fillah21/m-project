CREATE TABLE `user` (
    `id_user` int(11) primary key auto_increment,
    `username` varchar(50) NOT NULL,
    `pwd` varchar(255) NOT NULL,
    `nama` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `foto` varchar(100) NOT NULL,
    `no_induk` int(100) NOT NULL, 
    `semester` int(100) NOT NULL,
    `ipk` varchar(11) NOT NULL,
    `alamat` text NOT NULL,
    `no_hp` varchar(50) NOT NULL,
    `jk` varchar(10) NOT NULL,
    `sudah_krs` varchar(100) NOT NULL,
    `level` varchar(25) NOT NULL
);
