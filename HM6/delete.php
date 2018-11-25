<?php
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";

    $sql = "DELETE FROM posts WHERE id = :id";

    if ($stm = $pdo->prepare($sql)) {
        $stm->bindParam(":id", $param_id);

        $param_id = trim($_POST["id"]);

        if ($stm->execute()) {
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    unset($stm);

    unset($pdo);
} else {
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
require_once "tpl/delete.tpl.php";
?>