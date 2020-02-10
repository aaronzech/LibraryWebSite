<!DOCTYPE html>
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


@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>
<body>

<div class="flex-container">
<header>
  
    <img src="assets/HomePageIcon.png" align="left";">
  <img src="assets/HomePageIcon.png" align="right";">
  <h1>Library</h1>

</header>

<nav class="nav">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="login.html">Login</a></li>
  <li><a href="Books.php">Books</a></li>
  <li><a href="account.html">Account</a></li>
  <li><br></li>
  <li>Admin Menu</li>
  <li><a href="addBook.php">Add Book</a></li>
  <li><a href="Library_Add_Patron1.php">Add Patron</a></li>
  <BR>
  <li>Reports</li>
  <li><a href="CheckoutHistory.php">Checkout History</a></li>
  <li><a href="itemsIn.php">Items available</a></li>
  <li><a href="itemsCheckedOut.php">Items checkout</a></li>
  <br>
  <li>Tools</li>
  <li><a href="Library_borrow.php">Book checkout</a></li>
  <li><a href="bookReturn.php"> Book Return </a></li>

</ul>
</nav>

<article class="article">



<h2>Items Available For Checkout </h2>

<?php
	// Include connection to the DB
	include_once 'C:\xampp\htdocs\LoginSystemTest\Includes\dbh.inc.php';

//$sql = "SELECT * FROM books WHERE isbn = 9781536609509";
$sql = "Select *
from books
where bookID NOT IN (Select bookID from borrowed);";
//Select * from books where bookID NOT IN (Select bookID from borrowed)AND isbn = 9781536609509 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>title</th><th>isbn</th><th>authorID</th><th>bookID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = "" .$row["title"];
		$isbn = "".$row["isbn"];
		$authorID = "".$row["authorID"];
		$quantity = "".$row["quantity"];
		$bookID = "".$row["bookID"];
		
		echo "<tr><td>$title</td><td>$isbn</td><td>$authorID</td><td>$bookID<td></tr>";
		
		
	
    }
	echo "</table>";
} else {
    echo "No copies available";
}




?>

</article>


<br>


<footer>Sp18 CSCI 2050-90 - Aaron, Lydia, Riley</footer>
</div>
</body>
</html>


