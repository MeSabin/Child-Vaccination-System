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
          echo "<p class='boxValue'>$fetchTotalChild</p>"; 
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
          echo "<p class=boxValue>" .$averageAgeFormatted." Months</p>"; 
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
    <div class="chart-container">
      <div class="barCont">
        <canvas id="barChart"></canvas>
      </div>
      <div class="donutCont">
        <canvas id="doughnutChart"></canvas>
      </div>
    </div>

    <script>
      const xValuesBar = ["Jan-Feb", "Mar-Apr", "May-June", "July-Aug", "Sep-Oct", "Nov-Dec"];
      const yValuesBar = [52, 49, 44, 33, 66, 98];
      const barColorsBar = [
        'rgba(255, 99, 132, 0.9)',
        'rgba(255, 159, 64, 0.9)',
        'rgba(75, 192, 192, 0.9)',
        'rgba(74, 162, 235, 0.9)',
        'rgba(108, 98, 185, 0.9)',
        'rgba(167, 28, 114, 0.9)'

      ];

      new Chart("barChart", {
        type: "bar",
        data: {
          labels: xValuesBar,
          datasets: [
            {
              backgroundColor: barColorsBar,
              data: yValuesBar,
              barThickness:30,
            },
          ],
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "Chart showing the rate of child vaccinated by months",
          },
        },
      });

      const xValuesDoughnut = ["BCG", "Rota", "JE", "OPV", "FIPV", "Measeles-Rubella"];
      const yValuesDoughnut = [3, 5, 2, 4, 7, 6];
      const barColorsDoughnut = [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgba(167, 28, 114)",
              'rgb(108, 98, 185)'
      ];

      new Chart("doughnutChart", {
        type: "doughnut",
        data: {
          labels: xValuesDoughnut,
          datasets: [
            {
              backgroundColor: barColorsDoughnut,
              data: yValuesDoughnut,
            },
          ],
        },
        options: {
          title: {
            display: true,
            text: "Individual consumed vaccines",
          },
        },
      });
      
    </script>
  </body>
</html>
