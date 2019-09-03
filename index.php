<?php 
    $keyword=$_GET['keyword'];
    if(!empty($keyword))(
        $movie_url='http://www.omdbapi.com/?t=' .$keyword. '&apikey=d26212d6');
        $movie_json=file_get_contents($movie_url);
        $movie_array=json_decode($movie_json,true);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Movie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Movie Search</h2>
        <hr>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="search">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Movie Name" name="keyword" value="<?php echo $keyword?>">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-info" value="Search">
                </div>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Runtime</th>
                <th>Plot</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                if($movie_array['Response']=='False'){
                    $message=$movie_array['Error'];
                    echo"<script type='text/javascript'>alert('$message');</script>";
                    return;
                }
                ?>
                <td><?php echo ($movie_array['Title']) ?></td>
                <td><?php echo ($movie_array['Year']) ?></td>
                <td><?php echo ($movie_array['Runtime']) ?></td>
                <td><?php echo ($movie_array['Plot']) ?></td>     
            </tbody>
        </table>
    </div>
</body>
</html>
