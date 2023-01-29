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
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
        <h3><?php echo $post["title"]; ?></h3>
        <small>Created on <?php echo $post["created_at"]; ?> by <?php echo $post["author"]; ?></small>
        <p><?php echo $post["body"]; ?></p>
    </div>

    </body>
</html>
