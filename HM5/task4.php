<!Doctype html>
<meta charset='utf-8'>
<html>
<head>
    <title>Task 4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
    ul, li {
     list-style: none;
    }
    footer:last-child {
    display: none;
    }
    #game {
    margin-left:100px;
    width:230px;
    }
</style>
</head>
<body>
<?php
   $color1="white";
   $color2="white";
   $color3="white";
   $color4="white";
   $color5="white";
   $color6="white";
   $color7="white";
   if(isset($_POST['submit']))
    {
	 $roll_first = rand(1,6);
	 $roll_second = rand(1,6);
     if($roll_first == $roll_second){
         if($roll_first==1) {
             $color1="green";
         }
         elseif($roll_first==2)
         {
             $color2="green";
         }
         elseif($roll_first==3)
         {
             $color3="green";
         }
         elseif($roll_first==4)
         {
             $color4="green";
         }
         elseif($roll_first==5)
         {
             $color5="green";
         }
         else
         {
             $color6="green";
         }
             $color7="green";
     }
     else{
         if($roll_first==1) {
             $color1="red";
         }
         elseif($roll_first==2)
         {
             $color2="red";
         }
         elseif($roll_first==3)
         {
             $color3="red";
         }
         elseif($roll_first==4)
         {
             $color4="red";
         }
         elseif($roll_first==5)
         {
             $color5="red";
         }
         else
         {
             $color6="red";
         }
         if($roll_second==1) {
             $color1="blue";
         }
         elseif($roll_second==2)
         {
             $color2="blue";
         }
         elseif($roll_second==3)
         {
             $color3="blue";
         }
         elseif($roll_second==4)
         {
             $color4="blue";
         }
         elseif($roll_second==5)
         {
             $color5="blue";
         }
         else
         {
             $color6="blue";
         }
     }

	}
  ?>
<div id="game">  
<h4>Task 4</h4>
 <table border="1" >
   <tr>
    <td style="padding:15px;background-color:<?php echo $color1; ?>;">My dear!</td>
	<td style="padding:15px; background-color:<?php echo $color2; ?>;">You are not the worst!</td>
	<td style="padding:15px; background-color:<?php echo $color3; ?>;">God loves you!</td>
   
   </tr>
      <tr>
    <td style="padding:15px; background-color:<?php echo $color4; ?>;">Nice try ;)</td>
	<td style="padding:15px; background-color:<?php echo $color5; ?>;">Great job :)</td>
	<td style="padding:15px; background-color:<?php echo $color6; ?>;">Lucky bastard! :D</td>
   
   </tr>
     <tr>
         <td style="padding:15px; background-color:<?php echo $color7; ?>;">JackPot</td>
     </tr>
  
 </table><br/>
 <form method="POST" action="<?php $_PHP_SELF; ?>">
   <input type="submit" name="submit" value="Roll A Dice" style="padding:10px;">
  </form>
  <hr/>
 </div> 
</body>

 <footer>
<nav class="navbar navbar-dark bg-dark">
  <ul class="navbar-nav mr-auto">
    <li><a href="/">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="/?file=task1.php">Task 1</a></li>
    <li class="nav-item"><a class="nav-link" href="/?file=task2.php">Task 2</a></li>
    <li class="nav-item"><a class="nav-link" href="/?file=task3.php">Task 3</a></li>
    <li class="nav-item"><a class="nav-link" href="/?file=task4.php">Task 4</a></li>
  </ul>
  <span class="navbar-text">
      Dyakiv Vasyl
    </span>
</nav>
</footer>
</html>
