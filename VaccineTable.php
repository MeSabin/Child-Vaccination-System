<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="Styles/VaccineTable.css">
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
                 include "Config.php"; 
                 
                 $selectQuery ="SELECT * from addvaccine";
                 $reflectQuery =$conn->query($selectQuery);
                 
                 while($result =$reflectQuery->fetch_assoc()){
                ?> 
               <tr>
                  <td><?php echo $result['Id']; ?> </td>
                  <td><?php echo $result['Name']; ?> </td>
                  <td><?php echo $result['Dose']; ?> </td>
                  <td><?php echo $result['Age']; ?> </td>
                  <td class="action-column">
                     <a class="edit" name="updateVaccine" href="VaccineUpdate.php?id=<?php echo $result['Id']; ?>">Edit</a>
                     <a class="delete" name= "deleteVaccine "href="DeleteVaccine.php?id=<?php echo $result['Id']; ?>">Delete</a>
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
</body>
</html>