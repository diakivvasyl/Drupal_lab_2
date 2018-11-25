<?php
require_once "config.php";

$title = $body = "";
$title_err = $body_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter a title.";
    } elseif(!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $title_err = "Please enter a valid title.";
    } else{
        $title = $input_title;
    }

    $input_body = trim($_POST["body"]);
    if(empty($input_body)){
        $body_err = "Please enter an body.";
    } else{
        $body = $input_body;
    }

    if(empty($title_err) && empty($body_err)){

        $sql = "UPDATE posts SET title=:title, body=:body WHERE id=:id";
 
        if($stm = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stm->bindParam(":title", $param_title);
            $stm->bindParam(":body", $param_body);
            $stm->bindParam(":id", $param_id);
            
            // Set parameters
            $param_title = $title;
            $param_body = $body;
            $param_id = $id;

            if($stm->execute()){
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        unset($stm);
    }

    unset($pdo);
} else{

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM posts WHERE id = :id";
        if($stm = $pdo->prepare($sql)){

            $stm->bindParam(":id", $param_id);

            $param_id = $id;

            if($stm->execute()){
                if($stm->rowCount() == 1){

                    $row = $stm->fetch(PDO::FETCH_ASSOC);

                    $title = $row["title"];
                    $body = $row["body"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        unset($stm);

        unset($pdo);
    }  else{
        header("location: error.php");
        exit();
    }
}
require_once "tpl/update.tpl.php";
?>