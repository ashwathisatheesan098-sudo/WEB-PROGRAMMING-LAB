<html><head><center> <title>BOOK</title>
</head><body>
<h2>BOOK</h2>
<form name="book" action="pgm17.php" method="post">
BOOK NAME:<input type="text" name="bname"><br><br>
AUTHOR NAME:<input type="text" name="author"><br><br>
BOOK PRICE:<input type="text" name="price"><br><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
$conn = mysqli_connect("localhost:3307","root","","mca");
if(!$conn) {
die("Connection failed: ".mysqli_connect_error());
}
echo "connected successfully!!"."<br>";
if(isset($_POST['submit'])) {
$bname=$_POST["bname"];
$author=$_POST["author"];
$price=$_POST["price"];
$i="INSERT INTO book1(Bname, Author, Price) VALUES('$bname','$author','$price')";
if(mysqli_query($conn,$i)) {
echo "<br>Inserted";
} else {
echo "Error: ".mysqli_error($conn); 
}
echo "<h3>ALL BOOK DETAILS</h3>";
$q = "SELECT * FROM book1";
$r = mysqli_query($conn, $q);
if(mysqli_num_rows($r) > 0) {
echo "<table border='1' cellpadding='5' cellspacing='0'>
<tr>
<th>Book Name</th>
<th>Author Name</th>
<th>Price</th>
</tr>";
while($row = mysqli_fetch_assoc($r)) {
echo "<tr>
<td>".$row['Bname']."</td>
<td>".$row['Author']."</td>
<td>".$row['Price']."</td>
</tr>";
} echo "</table>";
} else {
echo "No records in table.";
}}mysqli_close($conn);
?></center>
</body></html>
