<?php
require_once "config.php";

$title = $body = "";
$title_err = $body_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_title = trim($_POST["title"]);
    if (empty($input_title)) {
        $title_err = "Please enter a title.";
    } elseif (!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $title_err = "Please enter a valid title.";
    } else {
        $title = $input_title;
    }

    $input_body = trim($_POST["body"]);
    if (empty($input_body)) {
        $body_err = "Please enter an body.";
    } else {
        $body = $input_body;
    }

    if (empty($title_err) && empty($body_err)) {

        $sql = "INSERT INTO posts (title, body) VALUES (:title, :body)";

        if ($stm = $pdo->prepare($sql)) {

            $stm->bindParam(":title", $param_title);
            $stm->bindParam(":body", $param_body);

            $param_title = $title;
            $param_body = $body;

            if ($stm->execute()) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        unset($stm);
    }

    unset($pdo);
}
require_once "tpl/create.tpl.php";
?>
