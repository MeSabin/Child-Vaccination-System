
function openDelPop(id) {
   document.querySelector('.deleteOverlay').style.display = 'block';
   document.querySelector('.deleteCont').style.display = 'block';
   // Set the data-id attribute of the delete button in modal
   document.querySelector('.confirmDelete').setAttribute('data-id', id);
 }

 // Close modal
 function closeDelPop() {
   document.querySelector('.deleteOverlay').style.display = 'none';
   document.querySelector('.deleteCont').style.display = 'none';
 }

 // Delete function triggered by the button in the modal
 document.querySelector('.confirmDelete').addEventListener('click', function() {
   // Retrieve the ID from data-id attribute
   var id = document.querySelector('.confirmDelete').getAttribute('data-id');
   // Redirect to delete script with specific ID
   window.location.href = '../BackendFiles/DeleteVaccine.php?id=' + id;
 });

 