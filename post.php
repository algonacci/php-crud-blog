<?php
require "config/config.php";
require "config/db.php";

if (isset($_POST["delete"])) {
 $delete_id = mysqli_real_escape_string($conn, $_POST["delete_id"]);

 $query = "DELETE FROM posts WHERE id = $delete_id";

 if (mysqli_query($conn, $query)) {
  header("Location: " . ROOT_URL . "");
 } else {
  echo "Error " . mysqli_error($conn);
 }
}

$id = mysqli_real_escape_string($conn, $_GET["id"]);

// Create query
$query = "SELECT * FROM posts WHERE id =  " . $id;

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$post = mysqli_fetch_assoc($result);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

<?php include "include/header.php"; ?>

    <div class="container">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary mt-3 mb-3">Back</a>
        <h3><?php echo $post["title"]; ?></h3>
        <small>Created on <?php echo $post["created_at"]; ?> by <?php echo $post["author"]; ?></small>
        <p><?php echo $post["body"]; ?></p>
        <hr>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="text-end" method="POST">
            <input type="hidden" name="delete_id" value="<?php echo $post["id"]; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>edit_post.php?id=<?php echo $post["id"]; ?>" class="btn btn-success">
            Edit Post
        </a>
    </div>

<?php include "include/footer.php"; ?>
