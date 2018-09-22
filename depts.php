<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>School Information System</title>
</head>
<body>
    <!-- Setting the head and title for the project -->
    <h4 class="text-center">Database Information Assignment</h4>
    <h2 class="text-center">School Information System</h2>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Departments List</li>
        </ol>
        <div class="jumbotron">
            <h3 class="cat-head text-info">Departments Information <a href="addDept.php" class="btn btn-success pull-right">Add Department</a></h3>
            <!-- Connection to Mysql DB -->
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "school";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $db);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // fetch Departments
                $sql = "SELECT * FROM depts";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    echo '<table class="table"><tr><th>Department Name</th><th>Head of Department</th></tr>';
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" .$row["name"]. "</td><td>" .$row["head"]. "</td></tr>";
                    }
                   
                    echo '</table>';
                }else{
                    echo '<button class="btn btn-danger pull-right">No Department exist</button>';
                }

            ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
