<?php
require "config/config.php";
require "config/db.php";

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
    </div>

<?php include "include/footer.php"; ?>
