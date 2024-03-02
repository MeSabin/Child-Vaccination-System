<?php
include "Dashboard.php";
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
                 include "../BackendFiles/Config.php"; 
            
                 $selectAllVaccQur ="SELECT * from addvaccine";
                 $refSelAllVaccQur =$conn->query($selectAllVaccQur);
               
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
