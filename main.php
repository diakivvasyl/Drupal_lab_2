<?php
$pos_i = $_GET['pos_i'];
$pos_j = $_GET['pos_j'];

echo json_encode(array("pos_i"=>$pos_i,"pos_j"=>$pos_j));