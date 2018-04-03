<?php
  include("../../../auth/config.php");
  session_start();
  if (!isset($_SESSION['token'])){
    header("Location:../../../../auth/login");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <script src="../../../../js/index.js"></script>
  
    <link rel="stylesheet" type="text/css" href="../../../../css/feather.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/index.css">
  
    <title>Dashboard | CSCB20</title>
</head>
<body>
  <div id="container">
      <div id="sidebar">
          <div id="menu" class="round-button" onclick="toggleMenu()"><i class="feather icon-menu"></i></div>
          <h1>cscb20</h1>
          <h4>introduction to databases & web applications</h4>
          <nav>
            <a href="../../../../">
              <div class="nav-item">
                <h2><i class="feather icon-home"></i>home</h2>
              </div>
            </a>
            <a href="../../">
              <div class="nav-item">
                <h2><i class="feather icon-monitor"></i>dashboard</h2>
              </div>
            </a>
            <a href="./">
              <div class="nav-item active">
                <h2><i class="feather icon-hash"></i>marks</h2>
              </div>
            </a>
            <a href="../../../../auth/logout/">
              <div class="nav-item">
                <h2><i class="feather icon-log-out"></i>logout</h2>
              </div>
            </a>
          </nav>
        </div>
    <div id="content">
      <h1>class marks</h1>
      <h2>class average: <?php echo $mark?>%</h2>
      <form action="" method="post" class="instructor-marks">
        <div class="mark">
          <h3>UTORid</h3>
          <h3>Name</h3>
          <h3>quiz 1</h3>
          <h3>quiz 2</h3>
          <h3>quiz 3</h3>
          <h3>A1</h3>
          <h3>A2</h3>
          <h3>A3</h3>
          <h3>Practical</h3>
          <h3>Midterm</h3>
          <h3>Final</h3>
        </div>
        <?php
          $sql = "select * from Students where instructorId = '".$_SESSION['utorid']."'";
          $result = mysqli_query($db, $sql);
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "
            <div class='mark'>
              <h3>".$row['utorid']."</h3>
              <h3>".$row['firstName']." ".$row['lastName']."</h3>
              <input type='number' min='0' max='100' value='".$row['quiz1']."'/>
              <input type='number' min='0' max='100' value='".$row['quiz2']."'/>
              <input type='number' min='0' max='100' value='".$row['quiz3']."'/>
              <input type='number' min='0' max='100' value='".$row['a1']."'/>
              <input type='number' min='0' max='100' value='".$row['a2']."'/>
              <input type='number' min='0' max='100' value='".$row['a3']."'/>
              <input type='number' min='0' max='100' value='".$row['practical']."'/>
              <input type='number' min='0' max='100' value='".$row['midterm']."'/>
              <input type='number' min='0' max='100' value='".$row['final']."'/>
            </div>
            ";
          }
        ?>
        <button>Save Changes</button>
      </form>
      <footer>
        <p><b>Made with <i class="feather icon-heart"></i> by Rikin Katyal & Sajid Rahman</b></p>
        <p><a href="https://www.utoronto.ca/" target="_">University of Toronto</a> | <a href="http://web.cs.toronto.edu/" target="_">U of T Department of Computer Science</a> | <a href="http://www.utsc.utoronto.ca/home/" target="_">UTSC</a> | <a href="https://www.utsc.utoronto.ca/cms/computer-science-mathematics-statistics" target="_">UTSC CMS</a> | <a href="http://www.utsc.utoronto.ca/labs/"> UTSC Labs</a></p>
      </footer>
    </div>
  </div>
</body>
</html>