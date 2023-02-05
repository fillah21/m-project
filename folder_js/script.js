$(document).ready(function () {
  //   Hilangkan tombol cari
  $("#cari_mhs").hide();
  $("#cari_matkul").hide();
  $("#cari_krs").hide();

  //Event ketika keyword ditulis
  $("#keyword_mhs").on("keyup", function () {
    $("#tabel_mhs").load("ajax/tabel-mhs.php?keyword=" + $("#keyword_mhs").val());
  });

  $("#keyword_matkul").on("keyup", function () {
    $("#tabel_matkul").load("ajax/tabel-matkul.php?keyword=" + $("#keyword_matkul").val());
  });

  $("#keyword_krs").on("keyup", function () {
    $("#tabel_krs").load("ajax/tabel-krs.php?keyword=" + $("#keyword_krs").val());
    console.log("ok");
  });
});
