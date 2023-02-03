$(document).ready(function () {
  //   Hilangkan tombol cari
  $("#cari_mhs").hide();
  $("#cari_matkul").hide();

  //Event ketika keyword ditulis
  $("#keyword_mhs").on("keyup", function () {
    $("#tabel_mhs").load("ajax/tabel-mhs.php?keyword=" + $("#keyword_mhs").val());
  });

  $("#keyword_matkul").on("keyup", function () {
    $("#tabel_matkul").load("ajax/tabel-matkul.php?keyword=" + $("#keyword_matkul").val());
  });
});
