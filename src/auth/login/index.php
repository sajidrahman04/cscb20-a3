<?php
  include("config.php");
  session_start();

  if (isset($_SESSION['token'])){
    header("Location:../../dashboard");
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // UTORid and password sent from form
    $UTORid = $_POST['UTORid'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Students WHERE student_name = '$UTORid'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if (count == 1) {
      $_SESSION['UTORid'] = $result["utorid"];
      $_SESSION['name'] = $result["student_name"];
      $_SESSION['token']    = generateToken();
      header('Location:../../dashboard/', false);
    } else {
      alert("Wrong login");
    }
  }

  if ($_GET['ref'] == "logout") {
    alert("Successfully logged out");
  }

  function generateToken()
  {
    return md5(uniqid(rand(), true));
  }

  function alert($msg)
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="../../js/index.js"></script>

    <link rel="stylesheet" type="text/css" href="../../css/feather.css">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">

    <title>Login | CSCB20</title>
  </head>
  <body>
    <div id="center-container">
      <h1>login to cscb20</h1>
      <form action="" method="POST">
        <div class="radio-toolbar">
          <input type="radio" id="student" name="radios" value="student" checked>
          <label for="student" id="student-label">student</label>

          <input type="radio" id="instructor" name="radios" value="instructor">
          <label for="instructor">instructor</label>

          <input type="radio" id="ta" name="radios" value="ta">
          <label for="ta" id="ta-label">t.a.</label>
        </div>
        <input type="text" name="UTORid" placeholder="UTORid" required>
        <input type="password" name="password" placeholder="password" required>
        <button>login</button>
      </form>
      <a href="../signup/">i don't have an account. signup.</a>
    </div>
  </body>
</html>