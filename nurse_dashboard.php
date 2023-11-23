<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory App</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    /* Custom styles go here */
    .my-5 {
      margin-top: 5rem;
    }

    .navbar {
      display: flex;
      justify-content: center;
      align-items: center;
      
    }

    .navbar-brand {
      
      text-decoration :blue;
      font-size: 30px;
      font-weight: bold;
      margin-left: 10px;
    }

    .navbar-brand:hover {
      color: red;
    }

    .btn-info {
      background-color: brown;
      color: blueviolet;
      margin-right: 10px;
      padding: 5px 10px; /* Adjusted button padding */
      font-size: 13px; /* Adjusted button button size */
    }

    .btn-info a {
      text-decoration: none;
      color: #ffffff;
      
    }

   

    .container {
      padding: 0 5px;

    }

    h1 {
      font-size: 15px;
      color: brown;
      margin-top: 10px;
      margin-bottom: 5px;
      
    }

    /* Added CSS for logo and Log Out button */
    .logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;  
    }

    .log-out-button {
      margin-left: auto; /* Move the Log Out button to the right */
    }
  </style>
</head>

<body>

  <header class="navbar navbar-dark bg-dark">
    <div class="container">
      <br>
      <img class="logo" src="image/slsu.png" alt="Your Logo">
      <h1 class="navbar-brand">RHU Meds and Supply Inventory</h1>
      <button class="btn btn-info log-out-button"><a href="index.html" ><i class="fas fa-sign-out-alt"></i> Log Out</a></button>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="d-flex justify-content-center">
        <button class="btn btn-info my-5"><a href="nurse_interface.php" class="text-light"><i class="fas fa-tachometer-alt"></i> Nurse Profile</a></button>

        <button class="btn btn-info my-5"><a href="npatient.php" class="text-light"><i class="fas fa-pills"></i> Patient</a></button>
        
        <button class="btn btn-info my-5"><a href="naddpatient.php" class="text-light"><i class="fas fa-user-plus"></i>  Add Patient</a></button>
        <button class="btn btn-info my-5"><a href="ncategory.php" class="text-light"><i class="fas fa-pills"></i> Category</a></button>
        <button class="btn btn-info my-5"><a href="nmedicine.php" class="text-light"><i class="fas fa-medkit"></i> Medicine</a></button>
        <button class="btn btn-info my-5"><a href="nsupplies.php" class="text-light"><i class="fas fa-tags"></i> Supplies</a></button>
        <button class="btn btn-info my-5"><a href="nexpiration.php" class="text-light"><i class="fas fa-calendar-times"></i> View Expirations</a></button>
        <button class="btn btn-info my-5"><a href="nprintable_report.php" class="text-light"><i class="fas fa-file-alt"></i> Report</a></button>
        <button class="btn btn-info my-5"><a href="nactivitylog.php" class="text-light"><i class="fas fa-clipboard-list"></i> Logs</a></button>
        
     
    </div>
    </div>
  </nav>

  <main class="container my-5">
    <!-- Content here -->
  </main>

  <!-- Bootstrap JS Bundle (Bootstrap JS and Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-mVWDr4u6jz0uIa/cj7mjoUpaGj0Rrj2Hz9Rndw5Z5LWFM6a3LqPjB5EJz0MzI6S+" crossorigin="anonymous"></script>

  <!-- Your additional scripts -->
  <script>
    function logOut() {
      // Your logout functionality
      console.log('Logged out');
    }
  </script>
</body>

</html>
