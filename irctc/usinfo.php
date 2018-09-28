<?php
session_start();

if(!isset($_SESSION['username']))
{
  header('Location:admin.html');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Information</title>
</head>
<script>
		function valform(form){
			if(document.getElementById("name").value=="")
			{
				alert("Please Enter a Name in the Field");
				return false;
			}

		}
	</script>
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
    height:6%;
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
    background-color: #e6af4b;
    color:white;
  }
  li a:hover:not(.active){
    background-color: #cccccc;
    color:white;
  }
  .active{
    background-color: #ffff66;
  }
  .button {
  float: left;
  background-color:#4caf50;
  margin-left: 39%;
  margin-top: 1%;
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
    .sign_in1
{
  float:left;
width="10%";
height="10%";
margin-top: 0.1%;
padding-right: 0%;
margin-left: 0%;
font-family: 'Amatic SC', cursive;
font-size: 20px;
color: black;
padding: 10px;
text-align: left;
background-color: none;  


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
	</style>
<body background="Seamless Polygon Backgrounds Vol2\Ready to use JPGs\05.jpg">
	 <div class="navbar">
  <div class="n1">
    <div class="o1"><a href="base.php"><img src="64332.png" height="80 px"></a></div>
    <div class="o2"><a href="base.php">|IRCTC-Admin-Panel|</a></div>  
  </div>
  <div class="n2">

    <a>|Contact Us|</a>
    <?php
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
else
{
?><a href="profile.php"><img src="user.jpg" height="80px"></a>
<?php 
}

?></a>
    
  </div>
</div>    
<ul>
  <li><a href="base.php">Home</a></li>
  <li><a href="trinfo.php">Train Info.</a></li>
  <li><a class="active" href="usinfo.php">Users Info.</a></li>
  <li><a href="amap.php">Map</a></li>
  <li><a href=bkinfo.php>Booking Info.</a></li>
  <li><a href=udtinfo.php>Train Data Updation</a></li>
  <li><a href=deltrain.php>Delete Train</a></li>
  <li style="float:right;"><a href="Logout.php">Logout</a></li>
  <li style="float:right;"><a href="base.php"><?php echo "Welcome ".$_SESSION['username'];?></a></li>

</ul>
<div class="sign_in1">
	<form name="form" id="form" method="POST" action="usinfo1.php" ... onsubmit="return valform(this);">
		<p style="font-size: 30px;">Name:-<input type="text" name="name" id="name" style="margin-left:60px;padding: 7px;width:40%;font-family: 'Amatic SC',cursive;font-size: 25px;">
		<input type="submit" name="submit" class="button">
	</form>	
</div>
	<table>
      <tr style="border: 3px solid #cccccc; background-color: #cccccc;font-style: bold;">
        <td>Name</td>
        <td>Username</td>
        <td>Email-Id</td>
        <td>Phone</td>
      </tr>
<?php

$servername="localhost";
$username="root";
$password="";
$dbname="irctc";
mysql_connect($servername,$username,$password);
mysql_select_db("irctc");
$sql="SELECT * FROM users";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
  while($row=mysql_fetch_assoc($result))
  	{
    ?>
    
      <tr>
        <td><?php echo $row['Name'];?></td>
        <td><?php echo $row['Username'];?></td>
        <td><?php echo $row['Email'];?></td>
        <td><?php echo $row['Phone'];?></td>
        </tr>
   
  <?php  
	} 
}
else 
  {
    echo "No such record";
  }  
?> 
 </table>
</body>
</html>