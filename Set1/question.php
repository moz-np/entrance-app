<!DOCTYPE html>
<html>
<head>
<?php 
  session_start();
  if(!isset($_SESSION['user'])||!isset($_SESSION['symbol'])) 
  { 
   header("Location:http://localhost/entrance/Set1/welcome.php");
  }
  $fp=file_get_contents("http://localhost/entrance/Set1/shortques.txt");
  $fp1=file_get_contents("http://localhost/entrance/Set1/longques.txt");
  $fp3=file_get_contents("http://localhost/entrance/Set1/passage.txt");
  $a=explode("\n",$fp);
  $b=explode("\n",$fp1);
  $c=explode("\n",$fp3);
?>
<script type="text/x-mathjax-config">
 MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['(',')']]}});
</script>
<script type="text/javascript"src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script> 
<style type="text/css">
.b,.c
{
  text-align: center;
}
.d,.e,.f,.long,.short
{
  margin:10px;
}
.e,.f
{
 text-align:center;
}
.passhead
{
  font-weight:bold; 
  font-size:180%;
}
.quese
{ 
  font-weight:bold;
  font-size:135%;
  margin-left:1em; 
  margin-right:0em; 
  text-indent:-1em; 
  text-align: justify; 
  text-justify: inter-word;
}
.submit
{ 
  background-color: #4CAF50;
  color: white;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-weight:bold;
  margin: 2px 2px;
  cursor: pointer;
}
.submit1
{
 visibility:hidden;
}
.sub
{
 text-align:center;
}
label
{
 font-size:120%;
}
.pass
{
 font-size:130%;
}
.content 
{
 max-width: 900px; 
 margin:auto; 
 background-color:white;
 border: 2px solid black;
}
body
{
 background-color:	#C0C0C0; 
 margin-top:0px;
}
.hea
{
border: 2px solid white;
color:	#B22222;
background-color: 	#E0FFFF;
}
.c
{
color:white;
border:2px solid white;
background-color:	#9ACD32;
margin-top:-2px;
margin-bottom:20px;
}
.e
{
color:white;
border:2px solid white;
background-color:#0000FF;
margin-top:-35px;
margin-left:0px;
margin-right:0px;
margin-bottom:0px;
text-align:center;
}
.f
{
color:white;
border:2px solid white;
background-color:#0000FF;
margin-top:5px;
margin-left:0px;
margin-right:0px;
margin-bottom:0px;
text-align:center;
}
#countdown 
{
 position:fixed;
 font-family: 'Orbitron', sans-serif;
 font-size:30px;
 bottom:0;
 left=-20px; 
 color:#191970;
}
.apt1q,.apt2q
{
 width:200px; 
 height:200px; 
 margin-left:300px;
}
.apt1a,.apt2a
{
 width:780px; 
 height:200px; 
 margin-top:20px;
 margin-bottom:20px;
 }
 .ques
 { 
  border:1px solid black;
 }
</style>
</head>
<body onload=" setTimeout(function() { document.getElementById('submit1').click();}, 7200000)">
<div id="countdown"></div>
<script type="text/javascript">
var timeInSecs;
var ticker;
function startTimer(secs) 
{
  timeInSecs = parseInt(secs);
  ticker = setInterval("tick()", 1000); 
}
function tick()
{
  var secs = timeInSecs;
  if (secs > 0) 
   {
     timeInSecs--; 
   }
  else 
   {
     clearInterval(ticker);
   }
var hours= Math.floor(secs/3600);
var mins = Math.floor(secs/60);
hours%=24; mins%=60; secs%=60;
hours=(hours<10)? "0"+hours:hours;
mins=(mins<10)? "0"+mins:mins;
secs=(secs<10)? "0"+secs:secs;
document.getElementById("countdown").innerHTML=hours+":"+mins+":"+secs;
}
startTimer(7200);
</script>
<div class="content">
<form action="http://localhost/entrance/Set1/math.php" method="post" id="form">
<div class="hea">
<h2 class="b">TRIBHUVAN UNIVERSITY<br/>INSTITUTE OF ENGINEERING<br/>B.E. Model Entrance Examination<br/><h2>
<h2 class="d">Full Marks: 140<br/>Time : 2 hour</h2><br>
</div>
<h2 class="c">Attempt All Questions</h2><br>
<h2 class="e">Group A [(60 \times 1 = 60)] </h2><br>
<div class="short">
<?php for($i=0;$i<count($a)-8;$i+=9)
{
  $d=$i/9;
  echo("<p class='ques'><p class='quese'>$a[$i]</p><br>");
  for($j=$i+1;$j<$i+9;$j+=2)
   {
	 $k=$j+1;
	 $cma="que1$d";
     echo("<label><input type='radio' id=$cma name='$cma' value='$a[$k]'/>$a[$j]</label><br/><br/>");     
    }
  echo("</p>");
}
?>
</div>
<h2 class="f">Group B [40 $\times$ 2 = 80]</h2><br>
<div class="long">
<?php 
for($i=0;$i<count($b)-8;$i+=9)
{ 
  $d=$i/9;
  echo("<p class='ques'><p class='quese'>$b[$i]</p><br>");
  for($j=$i+1;$j<$i+9;$j+=2)
   {
     $k=$j+1;
     $cma="que2$d";
     echo("<label><input type='radio' id=$cma name=$cma value='$b[$k]'/>$b[$j]</label><br/><br/>");
   }
  echo("</p>");
}
echo("<p class='passhead'>$c[0]</p><p class='pass'>$c[1]</p>");
for($i=2;$i<count($c);$i+=9)
{  
  $d=round($i/10,0);
  echo("<p class='ques'><p class='quese'>$c[$i]</p><br>");
  if($d==4)
    {
     echo("<div><img src='http://localhost/entrance/Set1/apt1q.jpg' class='apt1q'/></div>");
     echo("<div><img src='http://localhost/entrance/Set1/apt1a.jpg' class='apt1a'/></div>");
    } 
  if($d==5)
    {
     echo("<div><img src='http://localhost/entrance/Set1/apt2q.jpg' class='apt2q'/></div>");
     echo("<div><img src='http://localhost/entrance/Set1/apt2a.jpg' class='apt2a'/></div>");
    } 
  for($j=$i+1;$j<$i+9;$j+=2)
    {
      $k=$j+1;
      $cma="que3$d";
      echo("<label><input type='radio' id=$cma name=$cma value='$c[$k]'/>$c[$j]</label><br/><br/>");
    }
 echo("</p>");
}
?> 
</div>
<script type="text/javascript">
function myfunction()
{
 var r=confirm("Are you sure for submission?");
 if(r)
  {
   window.location="http://localhost/entrance/Set1/math.php";
   return true;
  }
 else
  {
   return false;
  }
}
</script>
<div class='sub'>
<input type='submit' id='submit' class='submit' value='Submit' name='submit' onclick="return myfunction()"/><br>
</div>
<input type='submit' id='submit1' class='submit1' value='Submit1' name='submit1'/><br>
</form>	
</div>
</body>
</html>