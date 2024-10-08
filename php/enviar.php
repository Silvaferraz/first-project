<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("conect.php"); 

$conn = connect(); 
$sql = "INSERT INTO form (name, email, phone, message) VALUES (?, ?, ?, ?)";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['msg'];

$stmt = $conn->prepare($sql);
$stmt -> bind_param("ssss", $name, $email, $phone, $message);

$stmt->execute(); 
if ($stmt->errno == 0) {
    echo "<div class='vericada d-flex justify-content-center align-items-center'>
        <h1 class='d-flex align-items-center'>Mensagem enviada obrigada pela sua colaboração!</h1>
    </div>";
} else {
    echo "<h1>Ocorreu um erro ao enviar a mensagem, por favor recarregue a página e tente novamente</h1>";
}


$conn -> close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<style>
    .vericada{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>