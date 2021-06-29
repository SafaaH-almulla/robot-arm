<?php

session_start();

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "armrobot";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

if(isset($_POST["Run"])){ $motor1 = $_POST["motor1"];

  $motor2 = $_POST["motor2"];

  $motor3 = $_POST["motor3"];

  $motor4 = $_POST["motor4"];

  $motor5 = $_POST["motor5"];

  $motor6 = $_POST["motor6"];  

    $sql = "INSERT INTO `Motor`(`motor1`, `motor2`, `motor3`,`motor4`, `motor5`, `motor6`)

            VALUES ('{$motor1}','{$motor2}','{$motor3}','{$motor4}','{$motor5}','{$motor6}')";

    if ($conn->query($sql) === TRUE){

     

         header('Location: armrobot.php');

          exit();

      }

    else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }

      $conn->close();

  header('Location: run.php');

}

if(isset($_POST["Save"])){

  

  $motor1 = $_POST["motor1"];

  $motor2 = $_POST["motor2"];

  $motor3 = $_POST["motor3"];

  $motor4 = $_POST["motor4"];

  $motor5 = $_POST["motor5"];

  $motor6 = $_POST["motor6"];  

    $sql = "INSERT INTO `Motor`(`motor1`, `motor2`, `motor3`,`motor4`, `motor5`, `motor6`)

            VALUES ('{$motor1}','{$motor2}','{$motor3}','{$motor4}','{$motor5}','{$motor6}')";

    if ($conn->query($sql) === TRUE){

         $_SESSION["insert_msg"] = " ";

         header('Location: armrobot.php');

          exit();

      }

    else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }

      $conn->close();

  }

?>


<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body {
  background-image: url("robarm.jpg");
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-size: 100% 100%;
}
sliderR{
	  width: 100%;

		
	}

</style>

</head>

<body>

 <h1><center>robot arm !</center></h1>

       <center> <?php if(isset($_SESSION['insert_msg'])){

                         echo   $_SESSION["insert_msg"] ;

                         unset($_SESSION['insert_msg']);

       }?></center>

      

<div class="slidecontainer">

<form action="#" method="post">

	<p>Motor 1: <input type="range" min="0" max="180" value="90" name="motor1" class="slider1" id="num1"><span id="rang1"></span></p>

	<p>Motor 2: <input type="range" min="0" max="180" value="90" name="motor2" class="slider2" id="num2"><span id="rang2"></span></p>

	<p>Motor 3: <input type="range" min="0" max="180" value="90" name="motor3" class="slider3" id="num3"><span id="rang3"></span></p>

	<p>Motor 4: <input type="range" min="0" max="180" value="90" name="motor4" class="slider4" id="num4"><span id="rang4"></span></p>

	<p><font color="white"> Motor 5: </font><input type="range" min="0" max="180" value="90" name="motor5" class="slider5" id="num5"><span id="rang5"></span></p>

	<p><font color="white"> Motor 6:</font> <input type="range" min="0" max="180" value="90" name="motor6" class="slider6" id="num6"><span id="rang6"></span></p>

			<input type="submit" name="Save" value="Save">

			<input type="submit" name="Run" value="Run">

</form>

		</div>

	<script>

		var slider1 = document.getElementById("num1");

		var output1 = document.getElementById("rang1");

		output1.innerHTML = slider1.value;

		slider1.oninput = function() {

  	output1.innerHTML = this.value;

  		}

		var slider2 = document.getElementById("num2");

		var output2 = document.getElementById("rang2");

		output2.innerHTML = slider2.value;

		slider2.oninput = function() {

  		output2.innerHTML = this.value;

			}

		var slider3 = document.getElementById("num3");

		var output3 = document.getElementById("rang3");

		output3.innerHTML = slider3.value;

		slider3.oninput = function() {

  	output3.innerHTML = this.value;

			}

	var slider4 = document.getElementById("num4");

	var output4 = document.getElementById("rang4");

		output4.innerHTML = slider4.value;

		slider4.oninput = function() {

			output4.innerHTML = this.value;

		}

		var slider5 = document.getElementById("num5");

		var output5 = document.getElementById("rang5");

		output5.innerHTML = slider5.value;

		slider5.oninput = function() {

  	output5.innerHTML = this.value;

			}

		var slider6 = document.getElementById("num6");

		var output6 = document.getElementById("rang6");

		output6.innerHTML = slider6.value;

		slider6.oninput = function() {

		output6.innerHTML = this.value;

		}

			</script>

</body>

</html>