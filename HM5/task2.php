<!Doctype html>
<meta charset='utf-8'>
<html>
<head>
    <title>Task 2</title>
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
</style>
</head>
<body>
<?php
echo '<br>';
echo '<div class="container">';
echo '<br>';
echo '<h3> Enter a number </h3>';
echo '<form action="/?file=task2.php" method="post">
<label for="catFirst">catFirst</label>
     <input type="number" name="catFirst">
     <label for="catSec">catSec</label>
     <input type="number" name="catSec">
     <label for="hypo">hypo</label>
     <input type="number" name="hypo"> 
     <input type="submit" value="Send">
     </form>';

function pythagoras($catFirst=2, $catSec=4, $hypo=false, $precision=2)
{

    if (!empty($_POST['catFirst'])) {
        $catFirst = $_POST['catFirst'];
    }
    if (!empty($_POST['catFirst'])) {
        $catSec = $_POST['catSec'];
    }
    if (!empty($_POST['catFirst'])) {
        $hypo = $_POST['hypo'];
    }
    $toCalc='';
    if ($catFirst) {
        $catFirst = pow($catFirst, 2);
    } else {
        $toCalc .= 'catFirst';
    }
    if ($catSec) {
        $catSec = pow($catSec, 2);
    } else {
        $toCalc .= 'catSec';
    }
    if ($hypo) {
        $hypo = pow($hypo, 2);
    } else {
        $toCalc .= 'hypo';
    }

    switch ($toCalc)
    {
        case 'catFirst':
            return round(sqrt($hypo - $catSec),$precision);
            break;
        case 'catSec':
            return round(sqrt($hypo - $catFirst),$precision);
            break;
        case 'hypo':
            return round(sqrt($catFirst + $catSec),$precision);
            break;
    }

    return false;
}


echo pythagoras(); // 4.47

?>
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

