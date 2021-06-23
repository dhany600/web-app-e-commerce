<?php
    $conn = mysqli_connect("localhost","root","","projek_fai");

    function querryRead($querry){
        global $conn;

        $result = mysqli_query($conn, $querry);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }
?>