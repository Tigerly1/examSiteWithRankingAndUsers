<?php include( 'server.php' ) ?>
<?php
if ( !isset( $_SESSION['username'] ) ) {
    $_SESSION['msg'] = 'You must log in first';
    header( 'location: login.php' );
    
}
if($_SESSION['username']=="admin"){
  header('location: qedit.php');
  
}
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<title>Bootstrap Example</title>
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1'>
<link rel = 'stylesheet' href = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
<style>
/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .okej{
      margin-top:100px;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
    height: 3000px;
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    .inlinediv{
        display:inline-block;
        width: 40%;
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    .question{
      margin-top:30px;
      font-size: 18px;
      border-top: 2px solid #ededed;
      border-bottom: 2px solid #ededed;
      cursor: default;
    }
    .answer{
      font-size: 18px;
      border-bottom: 2px solid #ededed;
      background-color: #f0f0f0;
    }
    .answer{
      font-size: 18px;
      border-bottom: 2px solid #ededed;
      background-color: #f0f0f0;
    }
    .answer:hover{
      border-bottom: 2px solid #ededed;
      background-color: #e3e3e3;
    }
    #btnend{
      margin: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">/**\</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="main.php">e14</a></li>
        <li class="active"><a href="#">ranking</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
      
        <?php  if (isset($_SESSION['username'])) : ?>
            <li><a href="#">
    	      <strong><?php echo $_SESSION['username']; ?></strong></p>
            </a></li>
            <li><a href="index.php?logout='1'">Log Out
          </a></li>
          <?php  else:  ?>
        <li><a href="./index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif ?>
        

      
      </ul> 
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>RANKING</h1>
      <?php 
      $conn = new mysqli('localhost', 'root', '', 'registration');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!$conn->set_charset("utf8")) {
      
      exit();
  } else {
      
  }
    $percentOfPoints = 0;
    $divId = 1;
    $divIdd = 1;
    $sql = "SELECT nick, SUM(points) AS points, SUM(maxpoints) AS maxpoints, (SUM(points) / SUM(maxpoints)) AS percents FROM ranking  GROUP BY nick ORDER BY percents DESC";
      $result = $conn->query($sql);  
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $percentOfPoints = round($row['points'] / $row['maxpoints'] * 100);
            echo '<div>'.$divId.'. '.'<div class="inlinediv">'.$row['nick'].'</div>'.
            '<div class="inlinediv">'.$percentOfPoints.'% Poprawnych odpowiedzi'.'</div></div>';
            $divId++;
        }
    }
    echo '<div class="okej"></div>';
    $sql = "SELECT pytanie, SUM(niepoprawne) AS niepoprawne, SUM(ilodp) AS ilodp, (SUM(niepoprawne) / SUM(ilodp)) AS percents FROM rankingpytan  GROUP BY pytanie ORDER BY percents DESC LIMIT 3";
      $result = $conn->query($sql);  

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $percentOfPoints = round($row['niepoprawne'] / $row['ilodp'] * 100);
            echo '<div>'.$divIdd.'. '.'<div class="inlinediv">'.$row['pytanie'].'</div>'.
            '<div class="inlinediv">'.$percentOfPoints.'% Niepoprawnych odpowiedzi'.'</div></div>';
            $divIdd++;
        }
    }
      ?>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<p>Footer Text</p>
</footer>
<script>
function setValue(element) {
  element.parentElement.childNodes.forEach((el, i)=>{
    if(i>0){
      el.style.backgroundColor = "#f0f0f0"
    }
  })
  element.children[0].checked = true
  element.style.backgroundColor = '#959695'
}
</script>
</body>
</html>
