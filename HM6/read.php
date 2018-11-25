<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "config.php";

    $sql = "SELECT * FROM posts WHERE id = :id";

    if ($stm = $pdo->prepare($sql)) {
        $stm->bindParam(":id", $param_id);

        $param_id = trim($_GET["id"]);

        if ($stm->execute()) {
            if ($stm->rowCount() == 1) {
                $row = $stm->fetch(PDO::FETCH_ASSOC);

                $title = $row["title"];
                $body = $row["body"];
            } else {
                header("location: error.php");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    unset($stm);

    unset($pdo);
} else {
    header("location: error.php");
    exit();
}
require_once "tpl/read.tpl.php"
?>