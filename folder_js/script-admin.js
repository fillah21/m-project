$('.sidebar ul li').on('click', function () {
  $('.sidebar ul li.active').removeClass('active');
  $(this).addClass('active');
});

const menu = document.getElementById('m-label');
const sidebar = document.getElementsByClassName('sidebar')[0];
const content = document.getElementById('content');

menu.onclick = (function(){
  sidebar.classList.toggle('hide');
});

content.onclick = (function(){
  sidebar.classList.add('hide');
});

// dsb kelola data admin
// data admin
const opend = document.getElementById('opend');
const kelola = document.getElementById('kelola');
const closel = document.getElementById('closel');

opend.addEventListener('click', function () {
  kelola.classList.toggle('active');
});

closel.addEventListener('click', function () {
  kelola.classList.remove('active');
});

// registrasi admin
const openr = document.getElementById('openr');
const regt = document.getElementById('regt');
const closer = document.getElementById('closer');
const backr = document.getElementById('backr');

openr.addEventListener('click', function () {
  regt.classList.toggle('active');
});

closer.addEventListener('click', function () {
  regt.classList.remove('active');
});

backr.addEventListener('click', function () {
  regt.classList.remove('active');
});

// edit data admin
const opene = document.getElementById('opene');
const editr = document.getElementById('editr');
const closee = document.getElementById('closee');
const backe = document.getElementById('backe');

opene.addEventListener('click', function () {
  editr.classList.toggle('active');
});

closee.addEventListener('click', function () {
  editr.classList.remove('active');
});

backe.addEventListener('click', function () {
  editr.classList.remove('active');
});

// confirm ubah level
const lev = document.getElementById('ganlev');
const ganti = document.getElementById('ganti');
const ya = document.getElementById('ya');
const ga = document.getElementById('ga');

ganti.addEventListener('click', function () {
  lev.classList.add('active');
});

ya.addEventListener('click', function () {
  lev.classList.remove('active');
});

ga.addEventListener('click', function () {
  lev.classList.remove('active');
});
// dsb kelola data admin selesai

// dsb mhs
// CRUD registrasi
const registrasi = document.getElementById('regis');
const btnOpen = document.getElementById('btnRegis');
const btnBack = document.getElementById('btnBack');

btnOpen.addEventListener('click', function () {
  registrasi.classList.toggle('active');
});

btnBack.addEventListener('click', function () {
  registrasi.classList.remove('active');
});

// CRUD edit
const edit = document.getElementById('edit');
const openEdit = document.getElementById('btnEdit');
const closeEdit = document.getElementById('closeEdit');
const backEdit = document.getElementById('backBtnEdit');

openEdit.addEventListener('click', function () {
  edit.classList.toggle('active');
});

closeEdit.addEventListener('click', function () {
  edit.classList.remove('active');
});

backEdit.addEventListener('click', function () {
  edit.classList.remove('active');
});

// CRUD delete
const del = document.getElementById('delete');
const openDel = document.getElementById('btnDel');
const confirmDel = document.getElementById('confirm');
const closeDel = document.getElementById('back');

openDel.addEventListener('click', function () {
  del.classList.add('active');
});

confirmDel.addEventListener('click', function () {
  del.classList.remove('active');
});

closeDel.addEventListener('click', function () {
  del.classList.remove('active');
});

// dsb matkul
// CRUD Input
const input = document.getElementById('inputMk');
const openIn = document.getElementById('btnMatkul');
const closeIn = document.getElementById('closeMatkul');
const backIn = document.getElementById('backBtnMk');

openIn.addEventListener('click', function () {
  input.classList.add('active');
});

closeIn.addEventListener('click', function () {
  input.classList.remove('active');
});

backIn.addEventListener('click', function () {
  input.classList.remove('active');
});

// CRUD edit
const editMk = document.getElementById('editMk');
const openEditMk = document.getElementById('btnEditMk');
const closeEditMk = document.getElementById('closeEditMk');
const backEditMk = document.getElementById('backEditMk');

openEditMk.addEventListener('click', function () {
  editMk.classList.add('active');
});

closeEditMk.addEventListener('click', function () {
  editMk.classList.remove('active');
});

backEditMk.addEventListener('click', function () {
  editMk.classList.remove('active');
});

// CRUD delete
const delMk = document.getElementById('deleteMk');
const openDelMk = document.getElementById('btnDelMk');
const confirmDelMk = document.getElementById('confirmMk');
const closeDelMk = document.getElementById('backMk');

openDelMk.addEventListener('click', function () {
  delMk.classList.add('active');
});

confirmDelMk.addEventListener('click', function () {
  delMk.classList.remove('active');
});

closeDelMk.addEventListener('click', function () {
  delMk.classList.remove('active');
});

// dsb Krs
// detail Krs

const menuKrs = document.getElementById('krs');
const krs = document.getElementById('detailKrs');
const openDetail = document.getElementById('btnDetail');
const upDetail = document.getElementById('upKrs');
const backDetail = document.getElementById('beforeKrs');
const openWarning = document.getElementById('downKrs');
const delKrs = document.getElementById('deleteKrs');
const confirmDelKrs = document.getElementById('confirmKrs');
const closeDelKrs = document.getElementById('backKrs');

openDetail.addEventListener('click', function () {
  krs.classList.add('active');
  menuKrs.classList.add('active');
});

backDetail.addEventListener('click', function () {
  krs.classList.remove('active');
  menuKrs.classList.remove('active');
});

upDetail.addEventListener('click', function () {
  krs.classList.remove('active');
  menuKrs.classList.remove('active');
});

openWarning.addEventListener('click', function () {
  delKrs.classList.add('active');
  krs.classList.remove('active');
  menuKrs.classList.remove('active');
});

confirmDelKrs.addEventListener('click', function () {
  delKrs.classList.remove('active');
  krs.classList.remove('active');
  menuKrs.classList.remove('active');
});

closeDelKrs.addEventListener('click', function () {
  delKrs.classList.remove('active');
  krs.classList.remove('active');
  menuKrs.classList.remove('active');
});
