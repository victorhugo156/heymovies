<?php

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Website</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <!-- Other navigation items -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php
        session_start();
        if (isset($_SESSION['customer_firstname'])) {
            echo '<li class="nav-item"><a class="nav-link" href="#">Welcome, ' . $_SESSION['customer_firstname'] . '</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </nav>



  session_start();


  // Check if the request is a POST request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Database connection details
          $servername = "localhost";
          $username = "root";
          $password = "";
          $db = "hey_movies";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $db);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

      // Retrieve user input
      $customer_email = $_POST["customer_email"];
      $Customer_password = $_POST["Customer_password"];

      // Prepare and execute a query to check user credentials
      $stmt = $conn->prepare("SELECT Customer_ID, customer_firstname, Customer_password FROM customerinformation WHERE customer_email = ?");
      $stmt->bind_param("s", $customer_email);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($Customer_ID, $customer_email, $db_Customer_password);
      
      if ($stmt->num_rows == 1 && password_verify($Customer_password, $Customer_password)) {
          $_SESSION['Customer_ID'] = $Customer_ID; // Store the user's ID in the session
          echo "success";
      } else {
          echo "failed";
      }
      
      $stmt->close();
      $conn->close();
  }       
?>