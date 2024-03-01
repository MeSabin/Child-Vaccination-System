
document.addEventListener("DOMContentLoaded", function() {
   const searchInput = document.querySelector('.searchInput');
   const tableRows = document.querySelectorAll('tbody tr');

   searchInput.addEventListener('input', function() {
       const searchText = searchInput.value.trim().toLowerCase();
       let anyMatchFound = false; 

       tableRows.forEach(row => {
           const rowData = row.textContent.trim().toLowerCase();
           if (rowData.includes(searchText)) {
               row.style.display = '';
               anyMatchFound = true; 
           } else {
               row.style.display = 'none';
           }
       });
       if (!anyMatchFound) {
           tableRows.forEach(row => {
               row.style.display = '';
           });
       }
   });
});