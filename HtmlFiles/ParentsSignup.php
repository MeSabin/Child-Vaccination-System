<?php
 include "Dashboard.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Child Vaccination Signup</title>
    <link rel="stylesheet" href="../Styles/parentsSignup.css" />
  </head>
  <body>
    <div class="container">
      <h2>Parents Signup</h2>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" class="fullname" name="fullname" placeholder="Full name of Mother/Father" />

        <label for="username">Username:</label>
        <input type="text" class="username" name="username" placeholder="Give a username" />

        <label for="phone">Phone Number:</label>
        <input
          type="text"
          class="phone"
          name="phone"
          pattern="[0-9]{10}"
          placeholder="Enter phone number"
          required
        />
        <label for="password">Password:</label>
        <input type="password" class="password" name="password" placeholder="Create a password" />
        <button class="ParentsSignupBtn">Sign Up</button>
      </form>

    </div>
  </body>
</html>
