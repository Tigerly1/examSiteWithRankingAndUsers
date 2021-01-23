<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if(strlen($username)<8){
    array_push($errors, "Username is too short");
  }
  if(strlen($password_1)<8){
    array_push($errors, "Password is too short");
  }
    // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Log out";
  	header('location: main.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Log out";
          header('location: main.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
if (isset($_POST['edit_question'])){
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $a = mysqli_real_escape_string($db, $_POST['a']);
  $b = mysqli_real_escape_string($db, $_POST['b']);
  $c = mysqli_real_escape_string($db, $_POST['c']);
  $d = mysqli_real_escape_string($db, $_POST['d']);
  $answer = mysqli_real_escape_string($db, $_POST['answer']);
  $query = "UPDATE questions SET question='$question', a='$a', b='$b', c='$c', d='$d', answer='$answer'  WHERE id = '$id' ";
  if (!$db->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db->error);
    exit();
  } else {
  }
  if(mysqli_query($db, $query)){
    header('location: qedit.php');
  }
}
if (isset($_POST['remove_question'])){
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $query = "DELETE FROM questions WHERE id='$id'";
  if(mysqli_query($db, $query)){
    header('location: qedit.php');
  }
}
if (isset($_POST['add_question'])){
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $a = mysqli_real_escape_string($db, $_POST['a']);
  $b = mysqli_real_escape_string($db, $_POST['b']);
  $c = mysqli_real_escape_string($db, $_POST['c']);
  $d = mysqli_real_escape_string($db, $_POST['d']);
  $answer = mysqli_real_escape_string($db, $_POST['answer']);
  $query = "INSERT INTO questions (question, a, b, c, d, answer) 
              VALUES ('$question', '$a', '$b', '$c', '$d', '$answer')";
  if (!$db->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db->error);
    exit();
  } else {
  }
  if(mysqli_query($db, $query)){
    header('location: qedit.php');
    }
  }
  if (isset($_POST['remove_user'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $query = "DELETE FROM users WHERE id='$id'";
    if(mysqli_query($db, $query)){
      header('location: rusers.php');
    }
  }
  if (isset($_POST['show_answers'])){
   /*  $id = mysqli_real_escape_string($db, $_POST['id']);
    $query = "SELECT ";
    if(mysqli_query($db, $query)){

    } */
    $answers =  mysqli_real_escape_string($db, $_POST['answers']);
    $questions = mysqli_real_escape_string($db, $_POST['quest']);
    $answersToArray = explode(",", $answers);
    $questionsToArray = explode("|", $questions);
    $CorrectAnswers = 0;
    $CurrentQuestion = 1;
    $pytanie = '';
    $maxPoints = count($answersToArray);
    if (!$db->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $db->error);
      exit();
    } else {
    }
    foreach($answersToArray as $value){
      $pytanie = $questionsToArray[$CurrentQuestion-1];
      if(!empty($_POST[$CurrentQuestion])){
        $answer = mysqli_real_escape_string($db, $_POST[$CurrentQuestion]);
        if($value == $answer){
          $CorrectAnswers++;
          $squery = "INSERT INTO rankingpytan (pytanie, niepoprawne, ilodp, poprawne) VALUES ('$pytanie', 0, 1, 1)";
        }
        else{
          $squery = "INSERT INTO rankingpytan (pytanie, niepoprawne, ilodp, poprawne) VALUES ('$pytanie', 1, 1, 0)";
        }
        
        
      }
      else{
        $squery = "INSERT INTO rankingpytan (pytanie, niepoprawne, ilodp, poprawne) VALUES ('$pytanie', 1, 1, 0)";
      }
      $marek = mysqli_query($db, $squery);
      $CurrentQuestion++;
    }
    if (!$db->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $db->error);
      exit();
    } else {
    }
    $nickname = $_SESSION['username'];
    $query = "INSERT INTO ranking (nick, points, maxpoints) VALUES ('$nickname', '$CorrectAnswers', '$maxPoints')";
    if(mysqli_query($db, $query)){
      $_SESSION['wynik'] = $CorrectAnswers;
      $_SESSION['maxpoints'] = $maxPoints;
      header('location: main.php');
    }
    
  }
  ?>
