<?php 
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['symbol']))
{
  header("Location:http://localhost/entrance/Set1/question.php");
}
if(isset($_SESSION['start']))
{
  $p=$_SESSION['start'];
}
session_destroy();
if(isset($_POST['submit']))
{
 session_start();
 $_SESSION['user']=$_POST['name'];
 $_SESSION['symbol']=$_POST['symbol'];
 header("Location:http://localhost/entrance/Set1/question.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body 
{
  background-color: #DBE8F9;
  font: 30px "Lucida Grande", "Trebuchet MS", Arial, Helvetica, sans-serif;
}
.forme 
{
  background-color:	#E0FFFF;
  height: 45%;
  width: 45%;
  margin: auto;
  top: 50px;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  position: fixed;
  align-items: center;
  justify-content: center;
  border:1px solid black;
  border-radius:50px;
}
.namel
{
  font-weight:bold;
  color:#FF7F50; 
  display:inline-block;
}
.symboll
{
  font-weight:bold;
  color:#483D8B; 
  display:inline-block; 
}
.name
{ 
  margin-left:146px; 
  margin-top:40px; 
  height:30px;
}
.symbol
{
  margin-left:15px; 
  margin-top:20px; 
  height:30px;
}
.submit
{ 
  background-color:#F4A460;
  color: red;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 22px;
  margin: 2px 2px;
  cursor: pointer;
  margin-left:280px;
  margin-top:20px;
}
.name[type="text"]
{
  font-size:25px;
}
.symbol[type="text"]
{
  font-size:25px;
}
.imag
{
  margin-top:30px;
  margin-left:230px;
}
</style>
<script type="text/javascript">
window.onload=function()
{
 var m=<?php echo json_encode($p);?>;
  if(m==1)
   {
    alert("Thanks for taking the test!!! Good Luck!!!");
   }
  if(m==0)
   {
    alert("Your form has been auto submitted!!!Thanks for taking the test!!! Good Luck!!!");
   }
};
</script>
<script type="text/javascript">
function go()
{
var a=document.getElementById('symbol').value, b=document.getElementById('name').value;
var c=[1001];
var d=["sandesh bhusal"];
var m=c.indexOf(parseInt(a)),n=d.indexOf(b.toLowerCase());
if(a==""|| b=="")
{
   alert("Either of the fields is empty!!!");
   return false;
}
else
{
if((m==-1)||(n==-1)||(m!=n))
{
  alert("No such entry found!!!");
  return false;
}
}
}
</script>
</head>
<body>
<img src="http://localhost/entrance/set1/img.gif" class="imag"/>
<div class="forme">
<form action="" method="POST" name="fo">
<label class="namel">Name<input type="text" id="name" class="name" name="name" autocomplete="off"/></label><br><br>
<label class="symboll">Admit Card No.<input type="text" id="symbol" class="symbol" name="symbol" autocomplete="off"/></label><br><br>
<label><input type="submit" class="submit" name="submit" value=" Start " onclick="return go()"/></label><br>
</form>
</div>
</body>
</html>