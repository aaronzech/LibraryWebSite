<!DOCTYPE html>
<?php
	include_once 'header.php';
	global $userCardNumber;
?>
<html>
<head>
<style> 
.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: center;
}

.flex-container > * {
    padding: 15px;
    -webkit-flex: 1 100%;
    flex: 1 100%;
}

.article {
    text-align: left;
}

header {background: MediumSeaGreen;color:white;}
footer {background: #aaa;color:white;}
.nav {background:#eee;}

.nav ul {
    list-style-type: none;
    padding: 0;
}
.nav ul a {
    text-decoration: none;
}

h1 { font-size: 4em }
h2 { font-size: 3em }
h3 { font-size: 2em }

@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>
<body>

<div class="flex-container">


<nav class="nav">

</nav>

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
<h1>Patron Record</h1>
<H3>for <?php echo $_SESSION['u_email'] ?></h3>

<?php

include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';

$currentUserEmail = $_SESSION['u_email'];


$sql = "Select * from patron where email ='$currentUserEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table bgcolor=ebeaea><tr><th>cardNumber</th><th>FirstName</th><th>LastName</th><th>Phone</th><th></th><th>email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cardNumber = "" .$row["cardNumber"];
		$pFname = "".$row["pFname"];
		$pLname = "".$row["pLname"];
		$phone = "".$row["phone"];
		$email = "".$row["email"];
		$userCardNumber = $cardNumber;
		echo "<tr><td>$cardNumber</td><td>$pFname</td><td>$pLname<td><td>$phone</td><td>$email</td></tr>";
		
		
	
    }
	echo "</table>";
} else {
    echo "No Patrons";
}




?>
<Br>
<H2>Book's checkedout </H2>
<?php
echo $userCardNumber;

include 'C:\xampp\htdocs\LoginSystemTest\sidebar_loggedin_admin.php';

//$sql = "SELECT * FROM books WHERE isbn = 9781536609509";
$sql = "Select *
from borrowed
where cardNumber = $userCardNumber";
//Select * from books where bookID IN (Select bookID from borrowed)AND isbn = 9781536609509 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>title</th><th>isbn</th><th>authorID</th><th>bookID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $bookID = "" .$row["bookID"];
		$cardNumber = "".$row["cardNumber"];
		$checkOutDate = "".$row["checkOutDate"];
		$dueDate = "".$row["dueDate"];
		
		echo "<tr><td>$bookID </td><td>$cardNumber</td><td>$checkOutDate</td><td>$dueDate<td></tr>";
		
		
	
    }
	echo "</table>";
} else {
    echo "No items checkedout";
}




?>




</article>





<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>


