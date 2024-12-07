 // Get modal element
 const modal = document.getElementById("editModal");
 const closeBtn = document.querySelector(".close");
 const editButtons = document.querySelectorAll(".edit");
 
 // Open modal when "Edit" button is clicked
 editButtons.forEach(button => {
     button.addEventListener("click", function () {
         modal.style.display = "block";
         
         // Optionally populate modal fields with current row data
         const row = this.closest("tr");
         document.getElementById("product").value = row.cells[0].innerText.trim();
         document.getElementById("price").value = row.cells[2].innerText.replace('₱ ', '').trim();
         document.getElementById("status").value = row.cells[5].innerText.trim();
     });
 });
 
 // Close modal when "X" button is clicked
 closeBtn.addEventListener("click", function () {
     modal.style.display = "none";
 });
 
 // Close modal when user clicks outside the modal content
 window.addEventListener("click", function (event) {
     if (event.target === modal) {
         modal.style.display = "none";
     }
 });
 
 // Save changes (you can add your own logic here)
 document.getElementById("editForm").addEventListener("submit", function (event) {
     event.preventDefault(); // Prevent default form submission
     alert("Changes saved!");
     modal.style.display = "none";
 });