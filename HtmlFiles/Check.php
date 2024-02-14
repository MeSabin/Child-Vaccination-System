<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        
        }

        #book-list {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px  rgb(26, 26, 248);
            border-radius: 5px;
        }
    </style>
</head>
<body> 

    <header>
        <h1>Book List</h1>
    </header>

    <div id="book-list">
        <h2>Available Books</h2>
        <ul id="books-container"></ul>
    </div>

    <script>
        // JavaScript code to fetch and display books dynamically
        document.addEventListener("DOMContentLoaded", function () {
            // Simulating a call to a PHP script to get book data
            fetch("get_books.php")
                .then(response => response.json())
                .then(data => {
                    const booksContainer = document.getElementById("books-container");

                    // Loop through the data and create list items
                    data.books.forEach(book => {
                        const listItem = document.createElement("li");
                        listItem.textContent = book.title + " by " + book.author;
                        booksContainer.appendChild(listItem);
                    });
                })
                .catch(error => console.error("Error fetching books:", error));
        });
        // Function to check if a number is prime
            function isPrime(num) {
                if (num <= 1) {
                return false;
                }
                for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    return false;
                }
                }
                return true;
            }
            
            // Function to find and display prime numbers between 1 and 100
            function findPrimesInRange(start, end) {
                for (let i = start; i <= end; i++) {
                if (isPrime(i)) {
                    console.log(i);
                }
                }
            } 

            
            // Call the function to find and display prime numbers between 1 and 100
            findPrimesInRange(1, 100);
  
    </script>

    <?php
        // PHP code to simulate server-side data retrieval
        $books = [
            ["title" => "The Great Gatsby", "author" => "F. Scott Fitzgerald"],
            ["title" => "To Kill a Mockingbird", "author" => "Harper Lee"],
            ["title" => "1984", "author" => "George Orwell"],
            ["title" => "Pride and Prejudice", "author" => "Jane Austen"],
            ["title" => "The Catcher in the Rye", "author" => "J.D. Salinger"],
        ];

        echo '<script>
                const booksData = {"books": ' . json_encode($books) . '};
            </script>';
            if (isset($_POST['submit'])) {
                // Getting email and password and storing them in variables
                    $email = mysqli_real_escape_string($conn, $_POST['Email']);
                    $password = mysqli_real_escape_string($conn, $_POST['Password']);
                
                    // Performing SQL query to check if the username and password matches in the database.
                    $query = "select * from admin where email='$email' and password='$password'";
                    // executes SQL query stored in $query using query() method on connection object $conn
                    $result = $conn->query($query);
                
                    // checks if one row with the email and password has been found
                    if ($result->num_rows == 1) {
                       
                        $_SESSION['isLoggedIn'] = true;
                        $token= bin2hex(random_bytes(15));
                
                       $getEmail = $result->fetch_assoc();
                       $_SESSION['back'] = $getEmail['Email'];
                
                        $updateQuery = "UPDATE admin SET token = '$token', status = 'inactive' WHERE email = '$email' AND password = '$password'";
                        $queryfire = $conn->query($updateQuery);
                
                
                            if($queryfire){
                                header("location: Dashboard.php");
                                exit();
                            }
                            else{ 
                                echo "Not inserted";
                            } 
                    // else statement to print message using session variable if username or password doesnot match        
                    } else {
                        $_SESSION['error_message'] = "Incorrect Email or Password";
                        header("location: Login.php"); 
                        exit();
                    }
                }
                // close the database connection after login page connection has performed
                $conn->close(); 
                
    ?>

</body>
</html>
