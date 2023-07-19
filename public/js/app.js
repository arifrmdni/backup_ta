// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

//Get the cancel button closes the modal
var cancel = document.getElementById("cancelbtn");

//Get the button mulai uji
const b_uji = document.getElementById("btn_uji");

//get the tabel pembobotan
const tbl_col2 = document.getElementById("col2_uji");

//get tabel total nilai vector
const tbl_col3 = document.getElementById("col3_uji");

//get tabel perangkingan dari perbandingan perhitungan
const tbl_col4 = document.getElementById("col4_uji");

//get tabel perbaikan bobot
const p_b = document.getElementById("p_bt");

const l1 = document.getElementById("lanjut");

const l2 = document.getElementById("lanjut_2");

const l3 = document.getElementById("lanjut_3");

const activePage = window.location.pathname;

const links = document.querySelectorAll(".topnav a").forEach((link) => {
  if (link.href.includes(`${activePage}`)) {
    link.classList.add("active");
  }
});

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close_about")[0];
var r_uji = document.getElementById("row_uji");

// When the user clicks on the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
  modal.children[0].style.height = "500px";
  modal.children[0].children[1].innerHTML = "Tambah Data ";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

//when user click cancel from the modalbox
cancel.onclick = () => {
  modal.style.display = "none";
};

span2.onclick = function () {
  r_uji.style.display = "none";
};

tbl_col2.style.display = "none";
tbl_col3.style.display = "none";
tbl_col4.style.display = "none";

btn_uji.onclick = () => {
  tbl_col2.style.display = "block";
  p_b.style.display = "none";
};

l1.onclick = () => {
  p_b.style.display = "block";
};

l2.onclick = () => {
  tbl_col3.style.display = "block";
};

l3.onclick = () => {
  tbl_col4.style.display = "block";
};

links.forEach((link) => {
  link.addEventListener("click", () => {
    links.forEach((link) => links.classList.remove("active"));
  });
  this.classList.add("active");
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
