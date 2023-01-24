// sidebar-menu
$(".sidebar ul li").on('click', function(){
  $(".sidebar ul li.active").removeClass('active');
  $(this).addClass('active');
});
// sidebar-menu selesai

// sidebar
const menu = document.getElementById('m-label');
const sidebar = document.getElementsByClassName('sidebar')[0];
const content = document.getElementById('content');

menu.onclick = (function(){
  sidebar.classList.toggle('hide');
});

content.onclick = (function(){
  sidebar.classList.add('hide');
});

// sidebar selesai

// dropdown
$(document).ready(function(){
  $(".dd").click(function(){
      $("#dropdown").slideToggle("slow");
  });
});

$(document).ready(function(){
  $("#dropdown").click(function(){
      $("#dropdown").slideToggle("slow");
  });
});
// dropdown selesai

// dropdown menu
$(function() {
  $("#sem1").hover(function() {
      $("#smt1.container.tab-pane").addClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem3").hover(function() {
      $("#smt3.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem5").hover(function() {
      $("#smt5.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#sem7").hover(function() {
      $("#smt7.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#validasi.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});

$(function() {
  $("#val").hover(function() {
      $("#validasi.container.tab-pane").addClass("active")
      $("#smt1.container.tab-pane").removeClass("active")
      $("#smt3.container.tab-pane").removeClass("active")
      $("#smt5.container.tab-pane").removeClass("active")
      $("#smt7.container.tab-pane").removeClass("active")
      $(this).find(".container.tab-pane.active").removeClass("active");
  });
});
// dropdown menu selesai

// Modal pilih
const pil = document.getElementById('pilih1');
const openp = document.getElementById('btnpilih1');
const yes = document.getElementById('confirm1');
const no = document.getElementById('back1');

openp.addEventListener('click', function () {
pil.classList.add('open');
});

yes.addEventListener('click', function () {
pil.classList.remove('open');
});

no.addEventListener('click', function () {
pil.classList.remove('open');
});

const pil3 = document.getElementById('pilih3');
const openp3 = document.getElementById('btnpilih3');
const yes3 = document.getElementById('confirm3');
const no3 = document.getElementById('back3');

openp3.addEventListener('click', function () {
pil3.classList.add('open');
});

yes3.addEventListener('click', function () {
pil3.classList.remove('open');
});

no3.addEventListener('click', function () {
pil3.classList.remove('open');
});

const pil5 = document.getElementById('pilih5');
const openp5 = document.getElementById('btnpilih5');
const yes5 = document.getElementById('confirm5');
const no5 = document.getElementById('back5');

openp5.addEventListener('click', function () {
pil5.classList.add('open');
});

yes5.addEventListener('click', function () {
pil5.classList.remove('open');
});

no5.addEventListener('click', function () {
pil5.classList.remove('open');
});

const pil7 = document.getElementById('pilih7');
const openp7 = document.getElementById('btnpilih7');
const yes7 = document.getElementById('confirm7');
const no7 = document.getElementById('back7');

openp7.addEventListener('click', function () {
pil7.classList.add('open');
});

yes7.addEventListener('click', function () {
pil7.classList.remove('open');
});

no7.addEventListener('click', function () {
pil7.classList.remove('open');
});