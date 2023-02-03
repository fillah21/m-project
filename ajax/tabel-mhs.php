<?php 
    include('../function.php');

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM user WHERE level = 'User' AND no_induk LIKE '%$keyword%' OR 
                level = 'User' AND nama LIKE '%$keyword%' OR
                level = 'User' AND email LIKE '%$keyword%' OR
                level = 'User' AND no_hp LIKE '%$keyword%'
            ";

    $mahasiswa = query($query);
?>

<table class="table text-white">
    <thead class="topTable text-center">
        <tr class="headerMhs ">
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA</th>
            <th scope="col">JK</th>
            <th scope="col">EMAIL</th>
            <th scope="col">No.HP</th>
            <th scope="col">ALAMAT</th>
            <th scope="col">SMT</th>
            <th scope="col">IPK</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    
    <tbody class="contentTable text-dark">
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
        <tr class=" text-white text-center">
            <td><?= $i; ?></td>
            <th scope="row"><?= $mhs['no_induk']; ?></th>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['jk']; ?></td>
            <td><?= $mhs['email']; ?></td>
            <td><?= $mhs['no_hp']; ?></td>
            <td><?= $mhs['alamat']; ?></td>
            <td><?= $mhs['semester']; ?></td>
            <td><?= $mhs['ipk']; ?></td>
            <td>
                <span id="btnEdit">
                    <a href="edit-mhs.php?idmhs=<?= $mhs['id_user']; ?>">
                        <button class="btn btn-sm p-0 ms-1" style="width: 12px;">
                            <i class="bi bi-pen-fill" style="font-size: 12px;"></i>
                        </button>
                    </a>
                </span>

                <span class="text-dark mx-1" style="font-size: 9px;">|</span>

                <span id="btnDel">
                    <a href="delete.php?idmhs=<?= $mhs['id_user']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                        <button class="btn btn-sm p-0 m-0 btnDelete" style="width: 12px;">
                            <i class="bi bi-trash-fill" style="font-size: 12px;"></i>
                                </button>
                </span>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>