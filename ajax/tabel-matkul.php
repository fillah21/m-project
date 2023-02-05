<?php 
    include('../function.php');

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM mata_kuliah WHERE 
                kode_matkul LIKE '%$keyword%' OR 
                nama_matkul LIKE '%$keyword%'
            ";

    $data_matkul = query($query);

    $jumlah_matkul = jumlah_data($query);
?>

                    <div class="col-sm table-responsive" id="listMatkul">
                        <table class="table text-white">
                            <thead class="topTable text-center">
                                <tr class="headerMatkul">
                                    <th scope="col">NO</th>
                                    <th scope="col">KODE</th>
                                    <th scope="col">NAMA MATA KULIAH</th>
                                    <th scope="col">SEMESTER</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="contentTable text-dark">
                                <?php $j = 1; ?>
                                <?php foreach ($data_matkul as $matkul) : ?>
                                    <tr class="text-white text-center">
                                        <td><?= $j; ?></td>
                                        <th scope="row"><?= $matkul['kode_matkul']; ?></th>
                                        <td><?= $matkul['nama_matkul']; ?></td>
                                        <td><?= $matkul['semester_matkul']; ?></td>
                                        <td><?= $matkul['sks']; ?></td>
                                        <td>
                                            <span id="btnEditMk">
                                                <a href="edit-mk.php?idmatkul=<?= $matkul['id_matkul']; ?>">
                                                <button class="btn btn-sm p-0 m-0" style="width: 12px;">
                                                    <i class="bi bi-pen-fill" style="font-size: 12px;"></i>
                                                </button>
                                                </a>
                                            </span>
    
                                            <span class="text-dark mx-1" style="font-size: 9px;">|</span>
    
                                            <span id="btnDelMk">
                                                <a href="delete.php?idmatkul=<?= $matkul['id_matkul']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                                <button class="btn btn-sm p-0 m-0" style="width: 12px;">
                                                    <i class="bi bi-trash-fill" style="font-size: 12px;"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $j++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="jumlahData mt-3">Jumlah Data : <?= $jumlah_matkul; ?></div>