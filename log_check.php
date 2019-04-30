 <?php

session_start();

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'foodbyte'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$array = array();
	$i = 0;
	function test($input)
	{
		$input=trim($input);
		$input=stripslashes($input);
		$input=htmlspecialchars($input);
		return $input;
  }
	$email = $_POST["email"];
	$password = $_POST["pwd"];
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result))
  {

    if (strcmp($email,$row['EMAIL'])==0)
    {
      if(strcmp($password,$row['PWD'])==0)
      {
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        header('Location: main_page.html');
      }
    }
  }
  echo "<h1 style='color:#010101;text:center'>Invalid username or password</h1>";
  $conn->close();
}
?>