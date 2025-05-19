const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

document.querySelector('#close-edit').onclick = () =>{
  document.querySelector('.edit-form-container').style.display = 'none';
  window.location.href = 'managepackage.php';
};