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

opend.onclick = (function () {
  kelola.classList.toggle('active');
});

closel.onclick = (function () {
  kelola.classList.remove('active');
});

// registrasi admin
const openr = document.getElementById('openr');
const regt = document.getElementById('regt');
const closer = document.getElementById('closer');
const backr = document.getElementById('backr');

openr.onclick = (function () {
  regt.classList.toggle('active');
});

closer.onclick = (function () {
  regt.classList.remove('active');
});

backr.onclick = (function () {
  regt.classList.remove('active');
});

// edit data admin
const opene = document.getElementById('opene');
const editr = document.getElementById('editr');
const closee = document.getElementById('closee');
const backe = document.getElementById('backe');

opene.onclick = (function () {
  editr.classList.toggle('active');
});

closee.onclick = (function () {
  editr.classList.remove('active');
});

backe.onclick = (function () {
  editr.classList.remove('active');
});

// confirm ubah level
const lev = document.getElementById('ganlev');
const ganti = document.getElementById('ganti');
const ya = document.getElementById('ya');
const ga = document.getElementById('ga');

ganti.onclick = (function () {
  lev.classList.add('active');
});

ya.onclick = (function () {
  lev.classList.remove('active');
});

ga.onclick = (function () {
  lev.classList.remove('active');
});
// dsb kelola data admin selesai

// dsb mhs
// CRUD registrasi
const registrasi = document.getElementById('regis');
const btnOpen = document.getElementById('btnRegis');
const btnBack = document.getElementById('btnBack');

btnOpen.onclick = (function () {
  registrasi.classList.toggle('active');
});

btnBack.onclick = (function () {
  registrasi.classList.remove('active');
});

// CRUD edit
const edit = document.getElementById('edit');
const openEdit = document.getElementById('btnEdit');
const closeEdit = document.getElementById('closeEdit');
const backEdit = document.getElementById('backBtnEdit');

openEdit.onclick = (function () {
  edit.classList.toggle('active');
});

closeEdit.onclick = (function () {
  edit.classList.remove('active');
});

backEdit.onclick = (function () {
  edit.classList.remove('active');
});

// CRUD delete
const del = document.getElementById('delete');
const openDel = document.getElementById('btnDel');
const confirmDel = document.getElementById('confirm');
const closeDel = document.getElementById('back');

openDel.onclick = (function () {
  del.classList.add('active');
});

confirmDel.onclick = (function () {
  del.classList.remove('active');
});

closeDel.onclick = (function () {
  del.classList.remove('active');
});

// dsb matkul
// CRUD Input
const input = document.getElementById('inputMk');
const openIn = document.getElementById('btnMatkul');
const balik = document.getElementById('balik');

openIn.onclick = (function () {
  input.classList.add('active');
});

balik.onclick = (function () {
  input.classList.remove('active');
});

// CRUD edit
const editMk = document.getElementById('editMk');
const openEditMk = document.getElementById('btnEditMk');
const closeEditMk = document.getElementById('closeEditMk');
const backEditMk = document.getElementById('backEditMk');

openEditMk.onclick = (function () {
  editMk.classList.add('active');
});

closeEditMk.onclick = (function () {
  editMk.classList.remove('active');
});

backEditMk.onclick = (function () {
  editMk.classList.remove('active');
});

// CRUD delete
const delMk = document.getElementById('deleteMk');
const openDelMk = document.getElementById('btnDelMk');
const confirmDelMk = document.getElementById('confirmMk');
const closeDelMk = document.getElementById('backMk');

openDelMk.onclick = (function () {
  delMk.classList.add('active');
});

confirmDelMk.onclick = (function () {
  delMk.classList.remove('active');
});

closeDelMk.onclick = (function () {
  delMk.classList.remove('active');
});

// dsb Krs
// detail Krs

const krs = document.getElementById('detailKrs');
const openDetail = document.getElementById('btnDetail');
const upDetail = document.getElementById('upKrs');
const backDetail = document.getElementById('beforeKrs');
const delKrs = document.getElementById('deleteKrs');
const confirmDelKrs = document.getElementById('confirmKrs');
const closeDelKrs = document.getElementById('backKrs');

openDetail.onclick = (function () {
  krs.classList.add('active')
});

backDetail.onclick = (function () {
  krs.classList.remove('active');
});

upDetail.onclick = (function () {
  krs.classList.remove('active');
});

confirmDelKrs.onclick = (function () {
  delKrs.classList.remove('active');
  krs.classList.remove('active');
});

closeDelKrs.onclick = (function () {
  delKrs.classList.remove('active');
  krs.classList.remove('active');
});
