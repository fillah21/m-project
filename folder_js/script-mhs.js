// sidebar-menu
$(".sidebar ul li").on("click", function () {
  $(".sidebar ul li.active").removeClass("active");
  $(this).addClass("active");
});
// sidebar-menu selesai

// sidebar
const menu = document.getElementById("m-label");
const sidebar = document.getElementsByClassName("sidebar")[0];
const content = document.getElementById("content");

menu.onclick = function () {
  sidebar.classList.toggle("hide");
};

content.onclick = function () {
  sidebar.classList.add("hide");
};
// sidebar selesai

// dropdown
$(document).ready(function () {
  $(".dd").click(function () {
    $("#dropdown").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#dropdown").click(function () {
    $("#dropdown").slideToggle("slow");
  });
});
// dropdown selesai

// KRS
$(function() {
  $("#sem1").hover(function() {
      $("#smt1.container.tab-pane").addClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem2").hover(function() {
      $("#smt2.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem3").hover(function() {
      $("#smt3.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem4").hover(function() {
      $("#smt4.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem5").hover(function() {
      $("#smt5.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem6").hover(function() {
      $("#smt6.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem7").hover(function() {
      $("#smt7.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem8").hover(function() {
      $("#smt8.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#val").hover(function() {
      $("#validasi.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt2.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt4.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt6.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#smt8.container.tab-pane").removeClass("active")
      $("#biodata.container.tab-pane").removeClass("active")
      $("#about.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});
// KRS SELESAI

// BIODATA dan ABOUT
const bio = document.getElementsByClassName("bio");
const biodata = document.getElementById("biodata");
const ab = document.getElementsByClassName("ab");
const about = document.getElementById("about");

bio.onclick = function () {
  biodata.classList.addClass("active");
  about.classList.remove("active");
};

ab.onclick = function () {
  about.classList.addClass("active");
  biodata.classList.remove("active");
};