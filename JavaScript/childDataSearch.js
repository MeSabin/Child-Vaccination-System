
// substring search algorithm to filter rows based on input

//DOMContentLoaded event triggers when initial HTML documens has been completely loaded
document.addEventListener("DOMContentLoaded", function() {
    //selecting search box
   const searchInput = document.querySelector('.searchInput');
   //selecting table body and rows
   const tableRows = document.querySelectorAll('tbody tr');

   searchInput.addEventListener('input', function() {
       //entered value from search box is trimmed and converted to lowercase making the search case insensitive
       //trim is used to remove space and tabs
       const searchText = searchInput.value.trim().toLowerCase();
       let anyMatchFound = false; 

       //for each row in table, checking if input matches the table data
       tableRows.forEach(row => {
        // textContent converts all datatypes to string
           const rowData = row.textContent.trim().toLowerCase();
           // if row data inclueds search input, displays the row data
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