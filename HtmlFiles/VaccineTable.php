<?php
include "Dashboard.php";

// Database connection
include "../BackendFiles/Config.php";

// Pagination variables
$records_per_page = 4;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $records_per_page;

// Fetch data from the database with pagination
$selectAllVaccQur = "SELECT * FROM addvaccine LIMIT $offset, $records_per_page";
$refSelAllVaccQur = $conn->query($selectAllVaccQur);

// Count total number of records
$total_records_query = "SELECT COUNT(*) AS total FROM addvaccine";
$total_records_result = $conn->query($total_records_query);
$total_records = $total_records_result->fetch_assoc()['total'];

// Calculate total number of pages
$total_pages = ceil($total_records / $records_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../Styles/VaccineTable.css">
</head>
<body>

   <div class="main-container">
   <div class="table-container">
      <p class="TableInfo">List of Child Vaccines</p>
      <div class="table-div">
         <table>
            
            <thead>
               <th>S.N</th>
               <th>Vaccine Name</th>
               <th>No. of Dose</th>
               <th>Recommended Age</th>
               <th>Action</th>
            </thead>
            <tbody>
               <?php
                 while($fetchAllVaccData = $refSelAllVaccQur->fetch_assoc()){
                ?> 
               <tr>
                  <td><?php echo $fetchAllVaccData['Id']; ?> </td>
                  <td><?php echo $fetchAllVaccData['Name']; ?> </td>
                  <td><?php echo $fetchAllVaccData['Dose']; ?> </td>
                  <td><?php echo $fetchAllVaccData['Age']; ?> </td>
                  <td class="action-column">
                     <a class="edit" name="updateVaccine" href="VaccineUpdate.php?id=<?php echo $fetchAllVaccData['Id']; ?>">Edit</a>
                     <!-- Pass $id variable to JavaScript function -->
                     <a class="delete" href="#" onclick="openDelPop(<?php echo $fetchAllVaccData['Id']; ?>)" name="deleteVaccine">Delete</a>
                  </td>
               </tr>
            <?php    
              }
            ?>
            </tbody>
         </table>
      </div>
   </div>
   
   <div class="pagination">
   <ul>
      <?php if ($page > 1): ?>
         <li><a href="?page=<?php echo ($page - 1); ?>">&lsaquo; Previous</a></li>
      <?php endif; ?>
      
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
         <li <?php if ($i == $page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endfor; ?>

      <?php if ($page < $total_pages): ?>
         <li><a href="?page=<?php echo ($page + 1); ?>">Next &rsaquo;</a></li>
      <?php endif; ?>
   </ul>
</div>


   <div class="addComponent">
      <a href="VaccineForm.php"><button class="VaccineAdd" name="VaccineAdd">Add Vaccine</button></a>
   </div>
</div>   

<div class="deleteModal">
   <div class="deleteOverlay" onclick="closeDelPop()"></div>
    <div class="deleteCont">
      <p class="deleteMessage">Do you really want to Delete?</p>
      <hr class="line1">
     <div class="btn-delete">
         <button class="cancelDelete" onclick="closeDelPop()">Cancel</button>            
         <a ><button class="confirmDelete">Delete</button></a>
     </div>
   </div>
</div>      
<script src="../JavaScript/delVaccModal.js"></script>
</body>
</html>
