<?php
include "Dashboard.php";
include "../BackendFiles/graphsBackend.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../Styles/Graphs.css">
  </head>
  <body>

    <div class="DashBoxes">
      <div class="First-box">
        <div class="boxData">
          <p class="boxName">Total Child</p>
          <?php     
          echo "<p class='boxValue1'>$fetchTotalChild</p>"; 
          echo "<p class='male'>Male: " .$fetchTotalMale."</p>"; 
          echo "<p class='female'>Female: ".$fetchTotalFemale."</p>"; 
          ?>
        </div>
        <img class="icon" src="../images/totalChildIcon.png" alt="Image not found..">
      </div>
      <div class="Second-box">
      <div class="boxData">
          <p class="boxName">Today Vaccinated</p>
          <?php
          echo "<p class=boxValue>" .$fetchTodaytTotal."</p>"; 
          ?>
        </div>
        <img class="icon2" src="../images/babyVaccine.png" alt="Image not found..">
      </div>
      <div class="Third-box">
      <div class="boxData">
          <p class="boxName">Child average age</p>
          <?php
          // echo "<p class=boxValue>" .$averageAgeFormatted." Months</p>"; 
          ?>
        </div>
        <img class="icon" src="../images/vaccineDose.png" alt="Image not found..">
      </div>
      <div class="Fourth-box">
      <div class="boxData">
          <p class="boxName">Total Vaccines Given</p>
          <?php
          echo "<p class=boxValue>" .$fetchTotalVaccines."</p>"; 
          ?>
        </div>
        <img class="icon4" src="../images/vaccineGiven.png" alt="Image not found..">
      </div>
    </div>

    <div class="bothCont">
      <div class="chart-container1">
        <canvas id="barChart"></canvas>
      </div>
      <div class="chart-container2">
        <canvas id="doughnutChart"></canvas>
      </div>
    </div>

    <script>
      const xValuesBar = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
      const yValuesBar = <?php echo json_encode(array_values($childrenVaccinatedData)); ?>;
      const barColorsBar = [
                  "rgba(255, 99, 132, 0.3)",
                  "rgba(54, 162, 235, 0.3)",
                  "rgba(255, 206, 86, 0.3)",
                  "rgba(75, 192, 192, 0.3)",
                  "rgba(153, 102, 255, 0.3)",
                  "rgba(255, 159, 64, 0.3)",
                  "rgba(255, 99, 132, 0.3)",
                  "rgba(54, 162, 235, 0.3)",
                  "rgba(255, 206, 86, 0.3)",
                  "rgba(95, 92, 222, 0.3)",
                  "rgba(153, 102, 255, 0.3)",
                  "rgba(255, 159, 64, 0.3)",
      ];
      const borderColorsBar=  [
                  "rgba(255, 99, 132, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(153, 102, 255, 1)",
                  "rgba(255, 159, 64, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(95, 92, 222, 1)",
                  "rgba(153, 102, 255, 1)",
                  "rgba(255, 159, 64, 1)",
                ];

      new Chart("barChart", {
        type: "bar",
        data: {
          labels: xValuesBar,
          datasets: [
            {
              backgroundColor: barColorsBar,
              data: yValuesBar,
              barThickness:25,
              borderColor: borderColorsBar,
              borderWidth: 1,
            },
          ],
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "Chart showing the rate of child vaccinated by months",
            fontSize:12,
            fontFamily: "poppins",
          },
             layout:{
            padding:{
              top:20, 
              right:25,
              bottom:15, 
              left:25,
            },
          },
        },
      });

      const xValuesDoughnut = <?php echo json_encode(array_keys($vaccineData)); ?>;
      const yValuesDoughnut = <?php echo json_encode(array_values($vaccineData)); ?>;
      const barColorsDoughnut = [
          "rgba(255, 99, 132, 0.7)",
          "rgba(54, 162, 235, 0.7)",
          "rgba(255, 206, 186, 0.7)",
          "rgba(75, 192, 192, 0.7)",
          "rgba(153, 102, 255, 0.7)",
          "rgba(255, 159, 64, 0.7)",
          "rgba(0, 255, 255, 0.7)", 
          "rgba(255, 0, 255, 0.7)", 
      ];

      new Chart("doughnutChart", {
        type: "doughnut",
        data: {
          labels: xValuesDoughnut,
          datasets: [
            {
              backgroundColor: barColorsDoughnut,
              data: yValuesDoughnut,
              borderWidth: 1,
            },
          ],
        },
        options: {
          title: {
            display: true,
            text: "Individual consumed vaccines",
            fontSize:16,
            fontFamily: "poppins",
            position: "top",
            lineHeight:3,
          },
          layout:{
              padding:{
              right:10,
              bottom:15, 
              left:10,
            },
          },
          cutoutPercentage: 65,  // adjusting thickess
          aspectRatio: 1,
          maintainAspectRatio: false, 
          legend:{
            display:false,
            position: "bottom",
            align: "start",
            labels:{
              fontSize:12,
              boxWidth:12,
            }

          }
        },
      });
      
    </script>
  </body>
</html>