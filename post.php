<?php
$title = "Post";
require("includes/header.php");

require "./database.php";

$id=$_GET['id'];

$statement = $pdo -> prepare("SELECT * FROM posts WHERE id = ? ");
$statement->execute([$id]);
$post = $statement -> fetch();
?>

<div class="container">
    <div class="starter-template">
        <h1><?= $post['title'] ?></h1>
        <p class="lead w-75 mx-auto"><?= $post['body'] ?></p>
        <small class="text-muted"><?= $post['created_at'] ?></small>
    </div>
</div>

<?php
require "includes/footer.php";
?>