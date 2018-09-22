

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
            <li><a href="classes.php">Classes List</a></li>
            <li class="active">Add Class</li>
        </ol>
        <div class="jumbotron">
            <h3 class="cat-head text-info">Add Class</h3>
    <?php 
        if($_POST){

            // foreach ($_POST as $key => $value) {
            //     echo '<button class="btn btn-danger">' .$key. '</button>';
            //     echo '<button class="btn btn-danger">' .$value. '</button>';
            // }

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
            
            $className = trim($_POST['className']);
            $classTeacher = trim($_POST['classTeacher']);
           

            // fetch Teachers
            $sql = "INSERT INTO classes (className, classTeacher)
            VALUES ('$className', '$classTeacher')";
            
            if ($conn->query($sql) === TRUE) {
                $success = 1;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();

            if($success === 1){
                header('Location: classes.php');
            }else{
                echo '<h3 class="text-danger text-center">There was an error adding Class</h3>';
            }
        
        }
    ?>

            <form action="addClass.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Class Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="className">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Class Teacher</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="classTeacher">
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

                                $sql = "SELECT * FROM staffs WHERE dept = 'teaching'";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0){
                                    
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option>" .$row["surname"]. " " .$row["firstname"]. " " .$row["midname"]."</option>";
                                    }

                                }
                                
                                $conn->close();
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success pull-right">Add Class</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
