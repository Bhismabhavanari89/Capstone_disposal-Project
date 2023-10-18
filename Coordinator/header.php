<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  View Projects
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./aproject.php">Allocated Projects</a></li>
                  <li><a class="dropdown-item" href="./naproject.php">Non Allocated Projects</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  View Students
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./facultywise.php">Allocated Students</a></li>
                  <li><a class="dropdown-item" href="./topicwise.php">Non Allocated Students</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  View Marks
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./amarks.php">Allocated Marks Internal</a></li>
                  <li><a class="dropdown-item" href="./namarks.php">Non Allocated Marks Internal</a></li>
                  <li><a class="dropdown-item" href="./aemarks.php">Allocated Marks External</a></li>
                  <li><a class="dropdown-item" href="./naemarks.php">Non Allocated Marks External</a></li>
                </ul>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#">New Project Submission</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./issue.php">Issues From Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./change.php">Change Student</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./enable_project.php">Enable Project</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>