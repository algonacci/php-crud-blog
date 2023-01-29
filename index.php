<?php
require "config/config.php";
require "config/db.php";

// Create query
$query = "SELECT * FROM posts";

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
        <title>PHP CRUD Blog</title>
    </head>
    <body>

    <div class="container">
        <h1>Posts</h1>
        <?php foreach ($posts as $post): ?>
            <div class="card p-3">
                <h3><?php echo $post["title"]; ?></h3>
                <small>Created on <?php echo $post["created_at"]; ?> by <?php echo $post["author"]; ?></small>
                <p><?php echo $post["body"]; ?></p>
                <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post["id"]; ?>" class="btn btn-primary">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>

    </body>
</html>
