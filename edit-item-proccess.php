<?php
    require 'Function.php';
    $idsession = $_SESSION["ID"];
    $idsession = querryRead("SELECT * FROM user WHERE id = $idsession")[0];
?>