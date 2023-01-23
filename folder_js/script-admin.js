$('.sidebar ul li').on('click', function () {
  $('.sidebar ul li.active').removeClass('active');
  $(this).addClass('active');
});

const menu = document.getElementById('m-label');
const sidebar = document.getElementsByClassName('sidebar')[0];

menu.onclick = function () {
  sidebar.classList.toggle('hide');
};

// dsb mhs
// CRUD registrasi
const registrasi = document.getElementById('regis');
const btnOpen = document.getElementById('btnRegis');
const btnClose = document.getElementById('closeRegis');
const btnBack = document.getElementById('backBtn');

btnOpen.onclick = function () {
  registrasi.classList.toggle('open');
};

btnClose.onclick = function () {
  registrasi.classList.remove('open');
};

btnBack.onclick = function () {
  registrasi.classList.remove('open');
};

// CRUD edit
const edit = document.getElementById('edit');
const openEdit = document.getElementById('btnEdit');
const closeEdit = document.getElementById('closeEdit');
const backEdit = document.getElementById('backBtnEdit');

openEdit.onclick = function () {
  edit.classList.toggle('open');
};

closeEdit.onclick = function () {
  edit.classList.remove('open');
};

backEdit.onclick = function () {
  edit.classList.remove('open');
};

// CRUD delete
const del = document.getElementById('delete');
const openDel = document.getElementById('btnDel');
const confirmDel = document.getElementById('confirm');
const closeDel = document.getElementById('back');

openDel.onclick = function () {
  del.classList.toggle('open');
};

confirmDel.onclick = function () {
  del.classList.remove('open');
};

closeDel.onclick = function () {
  del.classList.remove('open');
};

// dsb matkul
// CRUD Input
const input = document.getElementById('inputMk');
const openIn = document.getElementById('btnMatkul');
const closeIn = document.getElementById('closeMatkul');
const backIn = document.getElementById('backBtnMk');

openIn.onclick = function () {
  input.classList.toggle('open');
};

closeIn.onclick = function () {
  input.classList.remove('open');
};

backIn.onclick = function () {
  input.classList.remove('open');
};

// CRUD edit
const editMk = document.getElementById('editMk');
const openEditMk = document.getElementById('btnEditMk');
const closeEditMk = document.getElementById('closeEditMk');
const backEditMk = document.getElementById('backEditMk');

openEditMk.onclick = function () {
  editMk.classList.toggle('open');
};

closeEditMk.onclick = function () {
  editMk.classList.remove('open');
};

backEditMk.onclick = function () {
  editMk.classList.remove('open');
};

// CRUD delete
const delMk = document.getElementById('deleteMk');
const openDelMk = document.getElementById('btnDelMk');
const confirmDelMk = document.getElementById('confirmMk');
const closeDelMk = document.getElementById('backMk');

openDelMk.onclick = function () {
  delMk.classList.toggle('open');
};

confirmDelMk.onclick = function () {
  delMk.classList.remove('open');
};

closeDelMk.onclick = function () {
  delMk.classList.remove('open');
};

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

openDetail.onclick = function () {
  krs.classList.toggle('open');
  menuKrs.classList.toggle('open');
};

backDetail.onclick = function () {
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
};

upDetail.onclick = function () {
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
};

openWarning.onclick = function () {
  delKrs.classList.toggle('open');
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
};

confirmDelKrs.onclick = function () {
  delKrs.classList.remove('open');
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
};

closeDelKrs.onclick = function () {
  delKrs.classList.remove('open');
  krs.classList.remove('open');
  menuKrs.classList.remove('open');
};
