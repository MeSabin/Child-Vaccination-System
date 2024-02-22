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
      <p class="TableInfo">List of Vaccinated Child</p>
      <div class="table-div">
         <table>
            
            <thead>
               <th>Registration Id</th>
               <th>Child Name</th>
               <th>Child DOB</th>
               <th>Child Age(Weeks/Months)</th>
               <th>Gender</th>
               <th>Father's Name</th>
               <th>Mother's Name</th>
               <th>Contact</th>
               <th>Address</th>
               <th>Vaccine Name</th>
               <th>Vaccine Dose</th>
               <th>Date Given</th>
               <th>Given By</th>
               <th>Action</th>
            </thead>
            <tbody>
               <?php
                 include "../BackendFiles/Config.php"; 
            
                 $selectQuery ="SELECT * from ChildList";
                 $reflectQuery =$conn->query($selectQuery);
               
                 while($result = $reflectQuery->fetch_assoc()){
                 
                ?> 
               <tr>
                  <td><?php echo $result['RegisterId']; ?> </td>
                  <td><?php echo $result['Name']; ?> </td>
                  <td><?php echo $result['DOB']; ?> </td>
                  <td><?php echo $result['Age']; ?> </td>
                  <td><?php echo $result['Gender']; ?> </td>
                  <td><?php echo $result['FatherName']; ?> </td>
                  <td><?php echo $result['MotherName']; ?> </td>
                  <td><?php echo $result['Phone']; ?> </td>
                  <td><?php echo $result['Address']; ?> </td>
                  <td><?php echo $result['VaccineName']; ?> </td>
                  <td><?php echo $result['VaccineDose']; ?> </td>
                  <td><?php echo $result['VaccineDate']; ?> </td>
                  <td><?php echo $result['DoctorName']; ?> </td>
                  <td class="action-column">
                     <a class="edit" name="updateVaccine" href="ChildUpdate.php?id=<?php echo $result['RegisterId']; ?>">Edit</a>
                     <!-- Pass $id variable to JavaScript function -->
                     <a class="delete" href="#" onclick="openDelPop(<?php echo $result['RegisterId']; ?>)" name="deleteVaccine">Delete</a>
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
            <a href="registerChild.php"><button class="VaccineAdd" name="VaccineAdd">Register Child</button></a>
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
      <script src="../JavaScript/delChildModal.js"></script>
</body>
</html>
