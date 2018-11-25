<!Doctype html>
<meta charset='utf-8'>
<html>
<head>
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
echo '<h3> Введіть число </h3>';
echo '<form action="index.php" method="post">
     <input type="number" name="number">
     <input type="submit">
     </form>';

function sumNumber()
{
    if (!empty($_POST['number'])) {
        $number = $_POST['number'];
        $number = sumRec($number);
        echo "Ваша сума $number";
    }
}
function sumRec($n) {
    if($n<=0)
        return 0;
    else return $n + sumRec($n - 1);
}
sumNumber();
echo '<br>';
echo '</div>';

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