<?php include( 'server.php' ) ?>
<?php
if ( !isset( $_SESSION['username'] ) ) {
    $_SESSION['msg'] = 'You must log in first';
    header( 'location: login.php' );
}
if ( $_SESSION['username'] != "admin" ) {
  header( 'location: main.php' );
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
    .btn:nth-of-type(2n){
      margin-left: 15px;
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
      height: 300px;
    }
    .question>div{
      height: 30px;
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
    .edit{
      width: 70%;
      float:right;
    }
    select{
      margin-bottom: 30px;
      width:70%;
      float:right;
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
        <li class="active"><a href="#">edytuj pytania</a></li>
        <li><a href="qadd.php">dodaj pytanie</a></li>
        <li><a href="rusers.php">usuń użytkowników</a></li>
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
      <h1>E14</h1>
      <?php 
      $conn = new mysqli('localhost', 'root', '', 'registration');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!$conn->set_charset("utf8")) {
      
      exit();
  } else {
      
  }
      $sql = "SELECT id, question, a, b, c, d, answer FROM questions ";
      $result = $conn->query($sql);  
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<form method="post" action="qedit.php"><div class="question"><div>'.$row['id'].'</div>'.
            '<input type="hidden" name="id" value="'.$row['id'].'">'.
            "<div>".'<input class="edit" type="text" name="question" value="'.$row['question'].'">'. "Pytanie" ."<br>"."</div>".
            "<div>".'<input class="edit" type="text" name="a" value="'.strval($row['a']).'">'."A"."<br>"."</div>".
            "<div>".'<input class="edit" type="text" name="b" value="'.strval($row['b']).'">'."B"."<br>"."</div>".
            "<div>".'<input class="edit" type="text" name="c" value="'.strval($row['c']).'">'."C"."<br>"."</div>".
            "<div>".'<input class="edit" type="text" name="d" value="'.strval($row['d']).'">'."D"."<br>"."</div>".
            "<div>"."Poprawna odpowiedź to:".'<select name="answer">
                 <option value="A"'.(($row['answer']=='A')?'selected="selected"':"").'>A</option>
                 <option value="B"'.(($row['answer']=='B')?'selected="selected"':"").'>B</option>
                 <option value="C"'.(($row['answer']=='C')?'selected="selected"':"").'>C</option>
                 <option value="D"'.(($row['answer']=='D')?'selected="selected"':"").'>D</option>
               </select><br>'.'</div><div class="input-group">
               <button type="submit" class="btn" name="edit_question">Edit</button>
               <button type="submit" class="btn" name="remove_question">Remove</button>
             </div>'."</div></form>";
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

</body>
</html>
