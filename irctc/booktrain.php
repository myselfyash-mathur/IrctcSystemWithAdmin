<?php
session_start();

if(!isset($_SESSION['username']))
{
  header('Location:index.html');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Fill The Information</title>
</head>
<style type="text/css">
	.navbar{
		overflow-x:hidden;
		background-color:none;
		font-family: 'Amatic SC',cursive;
		align-content:center;
		text-align:center;
		align-content: center;
		width:100%;
	}
	.n1{
		color:white;
		width:70%;
		padding:2px;
		float:left;
		overflow-x:hidden;
		text-align: left;
		align-content:center;
		margin:2px;
		font-size: 40px;
		background-color:none;
	}
	.n2{
		width:25%;
		padding:12px;
		float:right;
		font-size:50px;
		overflow-x:hidden;
		align-content: center;
		text-align: right;
		margin:2px;
		background-color: none;
	}
	.o1{
		width:7%;
		margin:2px;
		padding-top:4px;
		text-align: left;
		float:left;
		margin-top: 2px;
		padding-left: 5px;
		background-color: none;
	}
	a{
		color:#cccccc;
		text-decoration: none;
	}
	.o2{
		width:88%;
		margin:2px;
		padding-top: 4px;
		text-align: left;
		float:left;
		font-size:50px;
		color:white;
		background-color: none;
	}
	.o1 :hover:not(.active){
		background-color: none;
	}
	.o2 :hover:not(.active){
		background-color: none;
	}
	.n2 :hover:not(.active){
		background-color: none;
	}
	ul{
		list-style-type:none;
		margin-top:0.05%;
		padding:0;
		width:100%;
		height:30%;
		font-family:'Amatic SC',cursive;
		font-size: 27px;
		background-color: #cccccc;
		overflow:hidden;
		border-radius: 12.5px;
	}
	li a{
		display:block;
		color:#000;
		padding: 8px 16px;
		text-decoration: none;
	}
	a{
		float:left;
	}
	li{
		float:left;
	}
	li a.active{
		background-color: #4d94ff;
		color:white;
	}
	li a:hover:not(.active){
		background-color: #cccccc;
		color:white;
	}
	.active{
		background-color: #80b3ff;
	}
	.button {
	float: left;
	background-color:#0033cc ;
	margin-top: 10px;
	border: none;
	color : white;
	padding : 15px 32px;
	text-align:center;
	text-decoration:none;
	display:inline-block;
	font-size:25px;
	margin:4px 2 px;
	cursor:pointer;
	font-family: 'Amatic SC', cursive;
	}

	table {
    border-collapse: collapse;
 	font-size: 20px;
    width: 100%;
    border: 1px solid #ddd ;
    font-family: 'Amatic SC', cursive;
  }

th, td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;

}

tr:hover{background-color:#f5f5f5}
@keyframes slider {
0% {
  left: 0;
}
20% {
  left: 0;
}
25% {
  left: -100%;
}
45% {
    left: -100%;
}
50% {
    left: -200%;
}
70% {
  left: -200%;
}
75% {
  left: -300%;
}
95% {
  left: -300%;
}
100% {
  left: -400%;
}
}
#slider {
  overflow: hidden;
}
#slider div img {
  width: 20%;
  float: left;
}
#slider div {
  position: relative;
  width: 500%;
  animation: 10s slider infinite; 
}


</style>
<body background="Seamless Polygon Backgrounds Vol2\Ready to use JPGs\01.jpg">
	<div class="navbar">
	<div class="n1">
		<div class="o1"><a href="home.php"><img src="64332.png" height="80 px"></a></div>
		<div class="o2"><a href="home.php">|IRCTC-E-Reservation|</a></div>	
	</div>
	<div class="n2">

		<a>|Contact Us|</a>
		<a href="profile.php"><?php
include("mysql.php");

$select_query = "SELECT `imgpath` FROM  `imgtbl` WHERE `Username`='".$_SESSION['username']."';";
$sql = mysqli_query($conn,$select_query) or die(mysqli_error($conn));   
if(mysqli_num_rows($sql)>0)
{
while($row = mysqli_fetch_array($sql,MYSQL_BOTH)){
?>
<img src="<?php echo $row["imgpath"]?>" style="width: 20%;">

<?php

}}
else if(isset($_SESSION['picture']))
{
	?>
<img src="<?php echo $_SESSION["picture"]?>" style="width: 20%;">

	<?php
}
else
{
?><a href="profile.php"><img src="user.jpg" height="80px"></a>
<?php	
}

?></a>
		
	</div>
</div>		
<ul>
	<li><a class="active" href="home.php">Home</a></li>
	<li><a href="train3.php">Trains</a></li>
	<li><a href="map.php">Map</a></li>
	<li><a>About</a></li>
	<li><a href=profile.php>Cancel Tickets</a></li>
	<li style="float:right;"><a href="Logout.php">Logout</a></li>
	<li style="float:right;"><a href="profile.php"><?php echo "Welcome ".$_SESSION['username'];?></a></li>

</ul>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="irctc";
mysql_connect("localhost","root","");
mysql_select_db("irctc");
$tn=$_POST['n1'];
$p=$_POST['n2'];
$fm=$_SESSION['from'];
$to=$_SESSION['to'];
$q="SELECT * FROM trains WHERE Tnumber='$tn'";
$m="SELECT * FROM rajdhani WHERE Source='$fm' AND Destination='$to'";
$r=mysql_query($q);
$n=mysql_query($m);
$ro=mysql_fetch_assoc($r);
$mo=mysql_fetch_assoc($n);

if($ro['Tnumber']==$tn && $mo['Tnumber']==$tn)
{

$d=$_SESSION['date'];
$un=$_SESSION['username'];
mysql_connect($servername,$username,$password);
mysql_select_db($dbname);
$var="123456798546413657945632179965423987563140055056775984231025995501596315962020599850";
$pnr=substr(str_shuffle($var),0,7);
$_SESSION['pnr']=$pnr;
$query="SELECT Rate FROM trains WHERE Tnumber='$tn'";
$query2="SELECT Capacity FROM trains WHERE Tnumber='$tn'";
$res=mysql_query($query2);
$row2=mysql_fetch_array($res);
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$amt=$row['Rate'];
if($row2['Capacity']==0)
{	echo "<h2>";
	echo "Sorry No Seats Available";
	echo "</h2>";
}
else
{
$cap=$row2['Capacity']-$p;
$tamt=$amt*$p;
$pnr=$_SESSION['pnr'];
 $ins="INSERT INTO booking(Name,Pnr,Tnumber,Source,Destination,Peoples,Amount,Dot) VALUES('$un','$pnr','','$fm','$to','','','$d')";
 mysql_query($ins);
$sql1="UPDATE booking SET Tnumber='$tn' WHERE Pnr='$pnr'";
$sql="UPDATE booking SET Peoples='$p' WHERE Pnr='$pnr'";
$sql2="UPDATE booking SET Amount='$tamt' WHERE Pnr='$pnr'";
$sql3="UPDATE trains SET Capacity='$cap' WHERE Tnumber='$tn'";
mysql_query($sql);
mysql_query($sql1);
mysql_query($sql2);
mysql_query($sql3);
}
}
else
{	echo "<h2>";
	echo "Sorry, You Entered Wrong Train Number";
	echo "</h2>";
}?>
<br>
<h2 style="font-size: 20px;font-family:'Amatic SC',Cursive; padding-left: 520px;">Your Informations are given Below:-</h2>
<table>
	
<?php
mysql_connect("localhost","root","");
mysql_select_db("irctc");
$pnr=$_SESSION['pnr'];
$sql="SELECT * FROM booking WHERE Pnr='$pnr'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
	while($row=mysql_fetch_assoc($result))
	{


?>		<tr style="border: 3px solid #cccccc; background-color: #cccccc;font-style: bold;">
		<td>User's Name</td>
		<td>PNR no.</td>
		<td>Train No.</td>
		<td>Source</td>
		<td>Destination</td>
		<td>Peoples</td>
		<td>Amount</td>
		<td>Date Of Travelling</td>
</tr>
		
      <tr>
         <td><?php echo $row['Name'];?></td>
        <td><?php echo $row['Pnr'];?></td>
        <td><?php echo $row['Tnumber'];?></td>
        <td><?php echo $row['Source'];?></td>
        <td><?php echo $row['Destination'];?></td>
        <td><?php echo $row['Peoples'];?></td>
        <td><?php echo $row['Amount'];?></td>
        <td><?php echo $row['Dot'];?></td>
       </tr>
   
  <?php 
	} }

else 
  {
    echo "No such record";
  }  
?> 

 </table>
 <h2 style="font-size: 20px;font-family:'Amatic SC',Cursive; padding-left: 520px;">
 We Hope you have a Safe and Happy Journey</h2>
<div id="slider">
    <div>
      <img src="13214.jpg">
      <img src="295875.jpg">
      <img src="437778.jpg">
      <img src="661783.jpg">
      <img src="672793.jpg">
    </div>  
  </div>
</body>
</html>