<?php
   include "Config.php";
   //fetching total number of children
   $getTotalChildQur = "SELECT COUNT(*) AS total FROM childlist";
   $runGetTtlChildQur = $conn->query($getTotalChildQur);
   $fetchTotalChild = $runGetTtlChildQur->fetch_assoc()['total'];

   // fetching total number of male chilren
   $getTotalMaleQur = "SELECT COUNT(*) AS total_male FROM childlist WHERE gender = 'male'";
   $runGetTtlMaleQur = $conn->query($getTotalMaleQur);
   $fetchTotalMale = $runGetTtlMaleQur->fetch_assoc()['total_male'];

   // fetching total number of female chilren
   $getTotalFemaleQur = "SELECT COUNT(*) AS total_female FROM childlist WHERE gender = 'female'";
   $runGetTtlFemaleQur = $conn->query($getTotalFemaleQur);
   $fetchTotalFemale = $runGetTtlFemaleQur->fetch_assoc()['total_female'];

   // fetching total child vaccinated today
   $todayDate=date('Y-m-d');
   $getTodayDateQur="SELECT COUNT(*) as todayTotal FROM childvaccine where Date='$todayDate'";
   $refGetTodayDate=$conn->query($getTodayDateQur);
   $fetchTodaytTotal=$refGetTodayDate->fetch_assoc()['todayTotal'];

   
   // Fetch all ages from childvaccine table
   $getAgesQuery = "SELECT Age FROM childvaccine";
   $result = $conn->query($getAgesQuery);
   $totalAgeInMonths = 0;
   $totalChildren = 0;

   // Loop through each row and calculate total age in months
   while ($row = $result->fetch_assoc()) {
      $age = $row['Age'];
      // Extract the numeric part of age
      preg_match('/\d+/', $age, $matches);
      $ageValue = intval($matches[0]);

      // Extract the time unit (Week, Weeks, Month, Months) and convert it to singular form
      preg_match('/[a-zA-Z]+/', $age, $timeUnitMatches);
      $timeUnit = strtolower($timeUnitMatches[0]);
      $timeUnit = rtrim($timeUnit, 's'); // Convert plural to singular

      // Convert weeks to months
      if ($timeUnit === 'week') {
         $ageValue /= 4.345; 
      }
      $totalAgeInMonths += $ageValue;
      $totalChildren++;
   }
   // Calculate the average age in months
   $averageAgeInMonths = $totalAgeInMonths / $totalChildren;
   // Format the average age to display only two digits after the decimal point
   $averageAgeFormatted = number_format($averageAgeInMonths, 2);


   $getTotalVaccGivenQur= "SELECT COUNT(*) as totalVacc FROM childvaccine";
   $runTtlVaccGiven= $conn->query($getTotalVaccGivenQur);
   $fetchTotalVaccines=$runTtlVaccGiven->fetch_assoc()['totalVacc'];

?>