<?php

function connect()
{
    $conn = new mysqli("localhost", "root", "", "motriz", "3308");
    // Check connection
    if ($conn->connect_errno) {
        echo "<h1>Falha ao conectar ao MySQL: </h1>" . $conn->connect_error;
        exit();
    }
    return $conn;
}

?>