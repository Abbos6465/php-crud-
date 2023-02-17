<?php
$title = "Post yaratish";
require("includes/header.php");

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $postTitle = $_POST['postTitle'];
    $postText = $_POST['postText'];

    $statement = $pdo->prepare("INSERT INTO posts (title,body) VALUES (:postTitle,:postText)");
    $statement->execute([
        'postTitle' => $postTitle,
        'postText' => $postText
    ]);

    $_SESSION['post-yaratildi'] = 'Post Muvaffaqqiyatli yaratildi';

    header("location: blog.php");
    exit;
}

?>
<div class="container py-5 shadow-lg my-5 rounded">
    <h1 class="text-success">
        <img class="mb-2" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <span>Post yaratish</span>
    </h1>
    <hr>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" name="postTitle">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Matn</label>
            <textarea class="form-control" rows="3" name="postText"></textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-success py-2 w-75" type="submit">Saqlash</button>
        </div>
    </form>
</div>
<?php
require "includes/footer.php";
?>