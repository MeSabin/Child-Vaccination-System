<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="VaccineTable.css">
</head>
<body>
   <div class="main-div">
      <p>Lists of Child Vaccines</p>
      <div class="table-div">
         <table>
            <thead>
               <th>S.N</th>
               <th>Vaccine Name</th>
               <th>Dose</th>
               <th>Recommended Age</th>
               <th>Action</th>
            </thead>
            <tbody>
               <?php
                 include "Config.php"; 
                 $selectQuery ="select * from addVaccine";
                 $reflectQuery =$conn->query($selectQuery);
                 
                 while($result =$reflectQuery->fetch_assoc()){
                ?> 
               <tr>
                  <td><?php echo $result['S.N.']; ?> </td>
                  <td><?php echo $result['Vaccine_Name']; ?> </td>
                  <td><?php echo $result['Dose']; ?> </td>
                  <td><?php echo $result['Recommended_for_child_under']; ?> </td>
                  <td>Edit</td>
                  <td>Delete</td>
               </tr>
            <?php    
              }
            ?>
            </tbody>
         </table>
      </div>
   </div>
</body>
</html>