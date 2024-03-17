<?php
include "Dashboard.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../Styles/subDash.css">
  </head>
  <body>

    <div class="DashBoxes">
      <div class="First-box">
        <div class="boxData">
          <p class="boxName">Total Child</p>     
          <p class="boxValue">10</p>

        </div>
        <img class="icon" src="../images/totalChildIcon.png" alt="Image not found..">
      </div>
      <div class="Second-box">
      <div class="boxData">
          <p class="boxName">Today Vaccinated</p>
          <p class="boxValue">7</p>
        </div>
        <img class="icon2" src="../images/babyVaccine.png" alt="Image not found..">
      </div>
      <div class="Third-box">
      <div class="boxData">
          <p class="boxName">Most Doses Given</p>
          <p class="boxValue">First Dose</p>
        </div>
        <img class="icon" src="../images/vaccineDose.png" alt="Image not found..">
      </div>
      <div class="Fourth-box">
      <div class="boxData">
          <p class="boxName">Total Vaccine Given</p>
          <p class="boxValue">10</p>
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
      const xValuesBar = ["Male", "Female", "Average Age", "Vaccines Consumed", "Dose"];
      const yValuesBar = [52, 49, 44, 33, 45];
      const barColorsBar = [
        'rgba(255, 99, 132, 0.9)',
        'rgba(255, 159, 64, 0.9)',
        'rgba(75, 192, 192, 0.9)',
        'rgba(54, 162, 235, 0.9)',
        'rgba(153, 102, 255, 0.9)'
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
            text: "Chart showing the ratio of vaccines consumed",
          },
        },
      });

      const xValuesDoughnut = ["BCG", "Rota", "JE", "Rota", "OPV", "FIPV"];
      const yValuesDoughnut = [3, 5, 2, 4, 7, 6];
      const barColorsDoughnut = [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(153, 102, 255)",
              "rgb(139, 255, 55)"
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
