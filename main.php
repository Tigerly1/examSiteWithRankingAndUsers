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
        <li class="active" ><a href="#">e14</a></li>
        <li><a href="ranking.php">ranking</a></li>
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
      <h1>
      <?php
      if(isset($_SESSION['wynik']) and isset($_SESSION['maxpoints'])){
        echo 'Twój ostatni wynik to: ' . $_SESSION['wynik'] . '/' . $_SESSION['maxpoints']. ' punktów';
        
      }
      ?>
      
      </h1>
      <?php 
      $conn = new mysqli('localhost', 'root', '', 'registration');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!$conn->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $mysqli->error);
      exit();
  } else {
  }
    $Number = 1;
    $Answers = array();
    $Questions = array();
    echo '<form method="post" action="main.php">';
    $sql = "SELECT id, question, a, b, c, d, answer FROM questions ORDER BY RAND() LIMIT 10 ";
      $result = $conn->query($sql);  
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($Number<11){
              echo '<div class="question">'. $Number. ". ".$row["question"] .
                 
              '<div class="answer" onclick="setValue(this)"><input style="display:none" type="radio" name="'.$Number.'" value="A">'."<b>A</b> ". strval($row['a']). '</div>'.
              '<div class="answer" onclick="setValue(this)"><input style="display:none" type="radio" name="'.$Number.'" value="B">'."<b>B</b> ". strval($row['b']). '</div>'.
              '<div class="answer" onclick="setValue(this)"><input style="display:none" type="radio" name="'.$Number.'" value="C">'."<b>C</b> ". strval($row['c']). '</div>'.
              '<div class="answer" onclick="setValue(this)"><input style="display:none" type="radio" name="'.$Number.'" value="D">'."<b>D</b> ". strval($row['d']). '</div>'."</div>";
              $Number++;
              
              array_push($Answers, $row['answer']);
              array_push($Questions,$row['question']);
             
            }
           
        }
    }
    $AnswersToString = implode(",",$Answers);
    $QuestionsToString = implode("|",$Questions);
    echo '<input type="hidden" name="answers" value="'.$AnswersToString.'">'.'<input type="hidden" name="quest" value="'.$QuestionsToString.'">'.'<button type="submit" name="show_answers" class="btn" id="btnend">END</button></form>' ;
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
