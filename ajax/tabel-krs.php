<?php 
    include('../function.php');

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM user WHERE 
                sudah_krs = 'Sudah' AND no_induk LIKE '%$keyword%' OR 
                sudah_krs = 'Sudah' AND nama LIKE '%$keyword%'
            ";

    $data_validasi = query($query);

    $jumlah_krs = jumlah_data($query);
?>

                    <div class="col-sm table-responsive" id="listKrs">
                        <table class="table text-white">
                            <thead class="topTable text-center">
                                <tr class="headerKrs ">
                                    <th scope="col">NO</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">SEMESTER</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="contentTable text-dark">
                                <?php $l = 1; ?>
                                <?php foreach($data_validasi as $valid) : ?>
                                    <tr class="text-white text-center">
                                        <td><?= $l; ?></td>
                                        <th scope="row"><?= $valid['no_induk']; ?></th>
                                        <td><?= $valid['nama']; ?></td>
                                        <td><?= $valid['semester']; ?></td>
                                        <td>
                                            <button id="btnDetail" class="btn btn-sm" type="menu">
                                                <a href="detail-krs.php?idkrs=<?= $valid['id_user']; ?>">DETAIL</a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php $l++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="jumlahData">Jumlah Data : <?= $jumlah_krs; ?></div>