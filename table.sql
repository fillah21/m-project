CREATE TABLE `user` (
    `id_user` int(11) primary key auto_increment,
    `username` varchar(50) NOT NULL,
    `pwd` varchar(255) NOT NULL,
    `nama` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `no_induk` int(100) NOT NULL, 
    `semester` varchar(100) NOT NULL,
    `ipk` varchar(11) NOT NULL,
    `jumlah_sks` int(11) NOT NULL,
    `sudah_krs` varchar(100) NOT NULL,
    `level` varchar(25) NOT NULL
);
