// JavaScript for dropdown menu
const dropdownButton = document.getElementById("dropdown-button");
const dropdownList = document.getElementById("dropdown-list");

dropdownButton.addEventListener("click", function() {
  // toggle the "show" class on the dropdown list
  dropdownList.classList.toggle("show");
});

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropdown-button')) {
    var dropdowns = document.getElementsByClassName("dropdown-list");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

