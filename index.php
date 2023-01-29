<?php
require "config/config.php";
require "config/db.php";

// Create query
$query = "SELECT * FROM posts ORDER BY created_at DESC";

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

<?php include "include/header.php"; ?>

    <div class="container mt-2">
        <h1>Posts</h1>
        <?php foreach ($posts as $post): ?>
            <div class="card p-3 mt-3">
                <h3><?php echo $post["title"]; ?></h3>
                <small>Created on <?php echo $post["created_at"]; ?> by <?php echo $post["author"]; ?></small>
                <p><?php echo $post["body"]; ?></p>
                <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post["id"]; ?>" class="btn btn-primary">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>

<?php include "include/footer.php"; ?>