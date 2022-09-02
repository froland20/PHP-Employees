<?php
include 'includes/dbconnect.php';
include 'includes/employee.php';
include 'includes/view_employee.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5" style="width: 100%">
        <h3 class="text-center">Employee Column</h3><br>
        <div class="table-responsive text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><a class="colum-sort">Full Name</a></th>
                        <th><a class="colum-sort">Title</a></th>
                        <th><a class="colum-sort">Salary</a></th>
                        <th><a class="colum-sort">Department</a></th>
                        <th><a></a></th>
                        <th><a></a></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $users = new ViewEmployee();
                    $users->ShowAllEmployees();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>