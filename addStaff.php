

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
            <li><a href="staffs.php">Staffs List</a></li>
            <li class="active">Add Staff</li>
        </ol>
        <div class="jumbotron">
            <h3 class="cat-head text-info">Add Staff</h3>
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
            
            $surname = $_POST['surname'];
            $midname = $_POST['midname'];
            $firstname = $_POST['firstname'];
            $doe = $_POST['doe'];
            $gender = $_POST['gender'];
            $section = $_POST['dept'];
            $gl = $_POST['gl'];

            // fetch Teachers
            $sql = "INSERT INTO staffs (surname, midname, firstname, doe, gender, dept, GL)
            VALUES ('$surname', '$midname', '$firstname', '$doe', '$gender', '$section', '$gl')";
            
            if ($conn->query($sql) === TRUE) {
                $success = 1;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();

            if($success === 1){
                header('Location: staffs.php');
            }else{
                echo '<h3 class="text-danger text-center">There was an error adding Staff</h3>';
            }
        
        }
    ?>

            <form action="addStaff.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Surname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="surname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Middle Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="midname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <input type="radio" name="gender" value="male" checked>Male
                        </div>
                        <div class="radio">
                            <input type="radio" name="gender" value="female">Female
                        </div>
                    </div>
                        
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date of Employment</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="doe">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="dept">
                            <?php 
                            
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Grade Level</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="gl">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success pull-right">Add Staff</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
