<?php
session_start();
static $score=0;
$mr=$_POST['submit']||$_POST['submit1'];
if(isset($mr))
{
for($i=0;$i<=59;$i++)
{
  if(!isset($_POST["que1$i"]))
   {
     $score+=0;
   }
   else
   {
	    $_SESSION["keep1$i"]="que1$i";
       if($_POST["que1$i"]==1)
        {
          $score+=1;
        }
      if($_POST["que1$i"]==0)
        {
        $score-=0.1;
        }
	 
   }
}
for($i=0;$i<=33;$i++)
{
  if(!isset($_POST["que2$i"]))
  {
    $score+=0;
  }
  else
  {
       $_SESSION["keep2$i"]="que2$i";
       if($_POST["que2$i"]==1)
       {
         $score+=2;
       }
      if($_POST["que2$i"]==0)
       {
         $score-=0.2;
       }
  }
}  
for($i=0;$i<=5;$i++)
{
  if(!isset($_POST["que3$i"]))
  {
    $score+=0;
  }
  else
  {
	   $_SESSION["keep3$i"]="que3$i";
       if($_POST["que3$i"]==1)
       {
         $score+=2;
       }
       if($_POST["que3$i"]==0)
      {
        $score-=0.2;
      }
  }
}
$fp=fopen("C:/wamp/www/entrance/Set1/result.txt","a");
$mp=$_SESSION['user'];
$n=$_SESSION['symbol'];
fwrite($fp,$mp.PHP_EOL.$n.PHP_EOL.$score.PHP_EOL.PHP_EOL);
fclose($fp);
session_destroy();
session_start();
if($mr==$_POST['submit'])
{
  $_SESSION['start']=1;
}
if($mr==$_POST['submit1'])
{
  $_SESSION['start']=0;
}
echo("<script type='text/javascript'>");
echo("setTimeout(");header("Location:http://localhost/entrance/Set1/welcome.php");echo(",10000");
echo("</script>");
}
?>