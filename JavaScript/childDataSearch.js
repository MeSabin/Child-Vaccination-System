
document.addEventListener("DOMContentLoaded", function() {
   const searchInput = document.querySelector('.searchInput');
   const tableRows = document.querySelectorAll('tbody tr');

   searchInput.addEventListener('input', function() {
       const searchText = searchInput.value.trim().toLowerCase();
       let anyMatchFound = false; // Flag variable to track if any match is found

       tableRows.forEach(row => {
           const rowData = row.textContent.trim().toLowerCase();
           if (rowData.includes(searchText)) {
               row.style.display = '';
               anyMatchFound = true; // Set flag to true if a match is found
           } else {
               row.style.display = 'none';
           }
       });

       // If no match is found, display all rows
       if (!anyMatchFound) {
           tableRows.forEach(row => {
               row.style.display = '';
           });
       }
   });
});