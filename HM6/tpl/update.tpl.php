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
    <title>Update posts</title>
</head>
<body>
<div class="container col-7 jumbotron mt-5">
    <h1 class="text-center display-4 pb-4">Update posts</h1>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                        <label class="font-weight-bold">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                        <span class="help-block"><?php echo $title_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($body_err)) ? 'has-error' : ''; ?>">
                        <label class="font-weight-bold">Body</label>
                        <textarea name="body" class="form-control"><?php echo $body; ?></textarea>
                        <span class="help-block"><?php echo $body_err;?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <button type="submit" value="Submit" class="btn btn-success">Yes</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
</div>
</body>
</html>