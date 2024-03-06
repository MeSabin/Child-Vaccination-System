<?php
include "Dashboard.php";
include "../BackendFiles/Config.php"; 

$limit = 2;  // rows to show per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;  //starting index of rows/records

$searchChildQur = isset($_GET['search']) ? $_GET['search'] : '';
$selAllChildQur = "SELECT * FROM childlist";
if (!empty($searchChildQur)) {
   $selAllChildQur .= " WHERE Name LIKE '%$searchChildQur%' OR FatherName LIKE '%$searchChildQur%' OR MotherName LIKE '%$searchChildQur%'";
}
$selAllChildQur .= " LIMIT $offset, $limit";
$refSelAllChildQur = $conn->query($selAllChildQur);

// getting total rows from the table
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM childlist";
if (!empty($searchChildQur)) {
   $totalRecordsQuery .= " WHERE Name LIKE '%$searchChildQur%' OR FatherName LIKE '%$searchChildQur%' OR MotherName LIKE '%$searchChildQur%'";
}

$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];
$totalPages = ceil($totalRecords / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../Styles/ChildTable.css">
</head>
<body>

   <div class="searchContents">
   <form action="" method="GET">
         <input type="text" name="search" class="childDataSearch searchInput" placeholder="Search...">
         <button><img src="../images/SearchChild.png" alt="Image not found..."></button>
   </form>
   </div>

   <div class="main-container">
      <div class="table-container">
         <p class="TableInfo">List of Vaccinated Child</p>
         <div class="table-div">
            <table>
               <thead>
                  <th>Registration Id</th>
                  <th>Child Name</th>
                  <th>Father's Name</th>
                  <th>Mother's Name</th>
                  <th>Contact</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  while($fetchAllChildData = $refSelAllChildQur->fetch_assoc()) {
                  ?> 
                     <tr>
                        <td><?php echo $fetchAllChildData['RegisterId']; ?> </td>
                        <td><?php echo $fetchAllChildData['Name']; ?> </td>
                        <td><?php echo $fetchAllChildData['FatherName']; ?> </td>
                        <td><?php echo $fetchAllChildData['MotherName']; ?> </td>
                        <td><?php echo $fetchAllChildData['Phone']; ?> </td>
                        <td class="action-column">
                           <a class="edit" name="updateVaccine" href="ChildUpdate.php?id=<?php echo $fetchAllChildData['RegisterId']; ?>">Edit</a>
                           <a class="delete" href="#" onclick="openDelPop(<?php echo $fetchAllChildData['RegisterId']; ?>)" name="deleteVaccine">Delete</a>
                           <a class="viewDetails" href="#" onclick="" name="viewDetail">Details</a>
                           <a class="viewDetails" href="VaccineToChild.php?id=<?php echo $fetchAllChildData['RegisterId']; ?>" onclick="" name="addNewVacc">Vaccine</a>
                           <a class="crtAcc" href="ParentsSignup.php" onclick="" name="createAcc">Account</a>
                        </td>
                     </tr>
                  <?php    
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>

      <ul class="pagination">
      <div class="paginInfo">
         <span>Showing <?php   echo ($offset + 1) . ' to ' . min(($offset + $limit), $totalRecords); ?> of <?php echo $totalRecords; ?> entries</span>
      </div>
       <div class="paginationNums">
 
    <?php 
    if ($page > 1) {
        echo '<li><a href="?page=' . ($page - 1) . '">&lsaquo; Prev</a></li>';
    }
    
    for ($i = 1; $i <= $totalPages; $i++) {
      if ($i == $page) {
          echo '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
      } else {
          echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
      }
  }

    if ($page < $totalPages) {
        echo '<li><a href="?page=' . ($page + 1) . '">Next &rsaquo;</a></li>';
    }
    ?>
            
            </div>
</ul>

      <div class="addComponent">
         <a href="registerChild.php"><button class="VaccineAdd" name="VaccineAdd">+ Register Child</button></a>
      </div>
   </div>   

   <div class="deleteModal">
      <div class="deleteOverlay" onclick="closeDelPop()"></div>
      <div class="deleteCont">
         <p class="deleteMessage">Do you really want to Delete?</p>
         <hr class="line1">
         <p class="delInfo">This action is irreversible</p>
         <div class="btn-delete">
            <button class="cancelDelete" onclick="closeDelPop()">Cancel</button>            
            <a><button class="confirmDelete">Delete</button></a>
         </div>
      </div>
   </div>      
   <script src="../JavaScript/delChildModal.js"></script>
   <script src="../JavaScript/childDataSearch.js"></script>
</body>
</html>
