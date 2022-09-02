<?php
// Behívjuk az összes olyan fájlt amire szükségünk lesz itt is.
include 'includes/dbconnect.php';
include 'includes/employee.php';

// Eltároljuk azt az ID-t amit a tovább hoztunk erre az oldalra az index.php-ról
if (isset($_GET['emp_no'])) {
    $id = $_GET['emp_no'];
}

// Egy feltétel amit a 'submit' nevezetű gombunk kattintására fog lefutni.

if (isset($_POST['submit'])) {

    // Változókba mentjük el azokat az adatokat amiket megadtunk az 'input' mezőben.
    $nid = $_POST['p_emp_no'];

    // Az osztály példányosítása, hogy az azon belüli funckió végre tudja hajtani a lekérdezést.
    echo $query = "DELETE FROM employees WHERE emp_no=$nid";
    $update = new Employee();
    $update->EditEmployee($query);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Database Delete Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container mt-5 mb-5" style="width: 100%">
        <h3 class="text-center">Delete Employee</h3><br>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <form action="delete.php" method="POST">
                    <tr>
                        <th><a class="column_sort" data-order="desc" href="#">ID</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">First Name</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Last Name</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Title</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Salary</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Department</a></th>
                    </tr>

                    <tr>
                        <td><?php echo $_GET['emp_no'] ?></td>
                        <td><?php echo $_GET['first_name'] ?></td>
                        <td><?php echo $_GET['last_name'] ?></td>
                        <td><?php echo $_GET['title'] ?></td>
                        <td><?php echo $_GET['salary'] ?></td>
                        <td><?php echo $_GET['dept_name'] ?></td>
                    </tr>
                    <tr>
                        <td style="display: none;"><input type="hidden" name="p_emp_no" class="form-control text-center" value="<?php echo $id; ?>"/></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"><input class="btn btn-danger mt-3 mb-3" type="submit" id="button" name="submit" value="Delete Employee"></td>
                    </tr>
                </form>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>