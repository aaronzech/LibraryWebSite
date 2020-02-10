
<?php
	include_once 'header.php';
	global $userCardNumber;
	
?>



<article class="article">
<!-- Load the sidebar -->
<?php
	// Include connection to the DB
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';

	// Run SQL to find if the current user email has admin privileges.
	@$email = $_SESSION['u_email'];
	$sql = "SELECT * FROM patron WHERE email = '$email' AND isAdmin = 1";
	$results = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($results);
			
	if(isset($_SESSION['u_email']) AND $resultCheck > 0)
	{
		// If logged in as an admin, display admin sidebar.
		//include 'C:\Apache24\htdocs\Login System Test\sidebar_loggedin_admin.php';
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';
	}
	else if(isset($_SESSION['u_email']))
	{
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin.php';
	}
	else 
	{
		include 'C:\xampp\htdocs\LoginSystemTest\sidebar_notloggedin.php';
	};
	
	
	
?>

<?php


	// Include connection to the DB
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';
	
	
	
	

	// Assign CardNumber
	$currentUserEmail = $_SESSION['u_email'];


	$sql = "Select * from patron where email ='$currentUserEmail'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	"<table bgcolor=ebeaea><tr><th>cardNumber</th><th>FirstName</th><th>LastName</th><th>Phone</th><th></th><th>email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cardNumber = "" .$row["cardNumber"];
		$pFname = "".$row["pFname"];
		$pLname = "".$row["pLname"];
		$phone = "".$row["phone"];
		$email = "".$row["email"];
		echo $userCardNumber = $cardNumber;
		
	
		
	
    }
	echo "</table>";
} 
	
	// checkout first availaibe bookid copy
	
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';
	
/// Available copies query
$sql = "Select * from books where bookID NOT IN (Select bookID from borrowed)AND isbn = 9781620311219 Limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = "" .$row["title"];
		$isbn = "ISBN: ".$row["isbn"];
		$authorID = "Authord ID: ".$row["authorID"];
		$quantity = "Copies: ".$row["quantity"];
		$bookID = "Book ID: ".$row["bookID"];
		
		echo "<b><U>$title</b></U><br>$isbn<br>$authorID<br>$quantity<br>$bookID<br>
		<form action=Library_borrow.php method=post>
		<input type=submit name=someAction value=Checkout>
		</form><br><br> ";
    }
} else {
    echo "<h3 style=color:red;>No available copies</h3>";


$conn->close();


	
	

	
	// checkout book
	
	// automatic today
	$currentDateTime = date('Y-m-d');
	
	// Due Date
	$dueDate=strtotime($currentDateTime);
	$dueDate=date('Y-m-d',$dueDate);
	
	$dueDate = $currentDateTime;
	$dateDue = date("Y-m-d",strtotime($dueDate));
	
	//One week later
	$oneWeekLater = strtotime('+2 Week');
	$year = date('Y', $oneWeekLater);
	$month = date('m', $oneWeekLater);
	$day = date('d', $oneWeekLater);


	// Insert query
	$sql = "INSERT INTO `borrowed`(`bookID`,`cardNumber`,`checkOutDate`,`dueDate`) VALUES ('$bookID','$userCardNumber','$currentDateTime','$year-$month-$day')";
	
	mysqli_query($conn, $sql);
	
	$str = $sql;
	echo $str;    // this will echo the query;

	}


?>
<html>
	<H1>555555555555555555555555555555555555555<?php echo $str ?> </h1>
</html>
