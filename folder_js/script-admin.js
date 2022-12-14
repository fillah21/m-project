$('.sidebar ul li').on('click', function () {
  $('.sidebar ul li.active').removeClass('active');
  $(this).addClass('active');
});

const menu = document.getElementById('m-label');
const sidebar = document.getElementsByClassName('sidebar')[0];

menu.addEventListener('click', function () {
  sidebar.classList.toggle('hide');
});

// dsb mhs
// CRUD registrasi
const registrasi = document.getElementById('regis');
const btnOpen = document.getElementById('btnRegis');
const btnClose = document.getElementById('closeRegis');

btnOpen.addEventListener('click', function () {
  registrasi.classList.toggle('open');
});
btnClose.addEventListener('click', function () {
  registrasi.classList.remove('open');
});

// CRUD edit
const edit = document.getElementById('edit');
const openEdit = document.getElementById('btnEdit');
const closeEdit = document.getElementById('closeEdit');

openEdit.addEventListener('click', function () {
  edit.classList.toggle('open');
});
closeEdit.addEventListener('click', function () {
  edit.classList.remove('open');
});

// CRUD delete
const del = document.getElementById('delete');
const openDel = document.getElementById('btnDel');
const confirmDel = document.getElementById('confirm');
const closeDel = document.getElementById('back');

openDel.addEventListener('click', function () {
  del.classList.add('open');
});

confirmDel.addEventListener('click', function () {
  del.classList.remove('open');
});

closeDel.addEventListener('click', function () {
  del.classList.remove('open');
});

// dsb matkul
// CRUD Input
const input = document.getElementById('inputMk');
const openIn = document.getElementById('btnMatkul');
const closeIn = document.getElementById('closeMatkul');

openIn.addEventListener('click', function () {
  input.classList.add('open');
});

closeIn.addEventListener('click', function () {
  input.classList.remove('open');
});

// CRUD edit
const editMk = document.getElementById('editMk');
const openEditMk = document.getElementById('btnEditMk');
const closeEditMk = document.getElementById('closeEditMk');

openEditMk.addEventListener('click', function () {
  editMk.classList.add('open');
});

closeEditMk.addEventListener('click', function () {
  editMk.classList.remove('open');
});

// CRUD delete
const delMk = document.getElementById('deleteMk');
const openDelMk = document.getElementById('btnDelMk');
const confirmDelMk = document.getElementById('confirmMk');
const closeDelMk = document.getElementById('backMk');

openDelMk.addEventListener('click', function () {
  delMk.classList.add('open');
});

confirmDelMk.addEventListener('click', function () {
  delMk.classList.remove('open');
});

closeDelMk.addEventListener('click', function () {
  delMk.classList.remove('open');
});

// dsb Krs
// detail Krs

const menuKrs = document.getElementById('krs');
const krs = document.getElementById('detailKrs');
const openDetail = document.getElementById('btnDetail');
const upDetail = document.getElementById('upKrs');
const downDetail = document.getElementById('downKrs');

openDetail.addEventListener('click', function () {
  krs.classList.add('open');
  menuKrs.classList.add('open');
});

upDetail.addEventListener('click', function () {
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
});

downDetail.addEventListener('click', function () {
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
});
