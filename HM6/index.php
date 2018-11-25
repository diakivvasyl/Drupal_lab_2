<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD posts</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-6">
            <div class="page-header clearfix">
                <h2 class="pull-right text-center">CRUD posts</h2>
                <div class="btn-group d-flex justify-content-center mb-2">
                    <a href="create.php" class="btn btn-dark create_btn"><i class="fas fa-plus fa-xs"></i> Add posts</a>
                    <a class="btn btn-dark counter text-white"></a>
                </div>
            </div>
            <?php
            require_once "config.php";

            $sql = "SELECT * FROM posts";
            if ($result = $pdo->query($sql)) {
                if ($result->rowCount() > 0) {
                    echo "<table class='table table-bordered table-dark'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>#ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Body</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['body'] . "</td>";
                        echo "<td>";
                        echo "<a href='read.php?id=" . $row['id'] . "' title='view posts' data-toggle='tooltip'><i class=\"far fa-eye\"></i></i></a>";
                        echo "<a href='update.php?id=" . $row['id'] . "' title='update posts' data-toggle='tooltip'><i class=\"fas fa-edit\"></i></a>";
                        echo "<a href='delete.php?id=" . $row['id'] . "' title='delete posts' data-toggle='tooltip'><i class=\"fas fa-trash-alt\"></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    unset($result);
                } else {
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
            }

            // Close connection
            unset($pdo);
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    count = $("tbody tr").length;
    $('.counter').text(count);

    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>