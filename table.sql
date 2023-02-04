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

CREATE TABLE `mata_kuliah` (
    `id_matkul` int(11) primary key auto_increment,
    `kode_matkul` varchar(100),
    `nama_matkul` varchar(100),
    `semester_matkul` int(11),
    `sks` int(11)
);

CREATE TABLE `krs` (
    `id_krs` int(11) primary key auto_increment,
    foreign key(id_user) references user(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(id_matkul) references mata_kuliah(id_matkul) ON DELETE CASCADE ON UPDATE CASCADE
);
