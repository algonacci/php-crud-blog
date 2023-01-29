<?php
require "config/config.php";
require "config/db.php";

if (isset($_POST["submit"])) {
 $title  = mysqli_real_escape_string($conn, $_POST["title"]);
 $author = mysqli_real_escape_string($conn, $_POST["author"]);
 $body   = mysqli_real_escape_string($conn, $_POST["body"]);

 $query = "INSERT INTO posts(title, author, body) VALUES ('$title', '$author', '$body')";

 if (mysqli_query($conn, $query)) {
  header("Location: " . ROOT_URL . "");
 } else {
  echo "Error " . mysqli_error($conn);
 }
}

?>

<?php include "include/header.php"; ?>

    <div class="container mt-2">
        <h1>Add Posts</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <input type="text" name="body" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">
        </form>
    </div>

<?php include "include/footer.php"; ?>