<?php 
require "./includes/header.php";
require "./database.php";
$postId=$_GET['id'];
$statement = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$statement->execute([$postId]);
$post = $statement->fetch();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['PUT'])){
    $postTitle = $_POST['postTitle'];
    $postText= $_POST['postText'];

    $statement = $pdo->prepare("UPDATE posts SET title=:title, body=:body WHERE id=:id");
    $statement -> execute([
        'title'=>$postTitle,
        'body'=>$postText,
        'id'=>$postId,
    ]);
    $_SESSION["post_o'zgartirildi"]="Post muvaffaqqiyatli o'zgartirildi";
    header("Location:blog.php");
    exit;
}

?>

<div class="container py-5 shadow-lg my-5 rounded">
    <h1 class="text-success">
        <img class="mb-2" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <span>Postni o'zgartirish</span>
    </h1>
    <hr>
    <form action="" method="POST">
        <input type="hidden" name="PUT">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" value="<?= $post['title'] ?>" name="postTitle">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Matn</label>
            <textarea class="form-control" rows="3" name="postText"> <?= $post['body'] ?> </textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-primary py-2 w-75" type="submit">O'zgartirish</button>
        </div>
    </form>
</div>

<?php require "./includes/footer.php"; ?>