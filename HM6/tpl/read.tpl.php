<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read posts</title>
</head>
<body>

<div class="container col-7 jumbotron mt-5">
    <h1 class="text-center display-4 pb-4">Read posts</h1>
    <div class="form-group">
        <label class="font-weight-bold">Title</label>
        <p class="form-control-static alert alert-info"><?php echo $row["title"]; ?></p>
    </div>
    <div class="form-group font-weight-bold">
        <label class="font-weight-bold">Body</label>
        <p class="form-control-static alert alert-info"><?php echo $row["body"]; ?></p>
    </div>
    <p><a href="index.php" class="btn btn-secondary">Back</a></p>
</div>
</body>
</html>