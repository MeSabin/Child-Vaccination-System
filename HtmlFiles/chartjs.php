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
      const xValuesBar = ["Male", "Female", "Age", "Total Vaccines", "Dose"];
      const yValuesBar = [55, 49, 44, 33, 45];
      const barColorsBar = ["red", "green", "blue", "orange", "brown"];

      new Chart("barChart", {
        type: "bar",
        data: {
          labels: xValuesBar,
          datasets: [
            {
              backgroundColor: barColorsBar,
              data: yValuesBar,
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

      const xValuesDoughnut = ["BCG", "Rota", "JE"];
      const yValuesDoughnut = [55, 49, 44];
      const barColorsDoughnut = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145",
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
            text: "Child Vaccination Graph",
          },
        },
      });
    </script>
  </body>
</html>
