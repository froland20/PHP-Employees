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
    $nfname = $_POST['first_name'];
    $nlname = $_POST['last_name'];
    $ntitle = $_POST['title'];
    $nsalary = $_POST['salary'];
    $ndept_name = $_POST['dept_name'];

    // Az osztály példányosítása, hogy az azon belüli funckió végre tudja hajtani a lekérdezéseket.
    $query = "UPDATE employees SET first_name='$nfname', last_name='$nlname' WHERE emp_no=$nid";
    $update = new Employee();
    $update->EditEmployee($query);

    $query = "UPDATE titles SET title='$ntitle' WHERE emp_no=$nid AND to_date='9999-01-01'";
    $update->EditEmployee($query);

    $query = "UPDATE salaries SET salary='$nsalary' WHERE emp_no=$nid AND to_date='9999-01-01'";
    $update->EditEmployee($query);

    $query = "UPDATE dept_emp SET dept_no='$ndept_name' WHERE emp_no=$nid AND to_date='9999-01-01'";
    $update->EditEmployee($query);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Database Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container mt-5 mb-5" style="width: 100%">
        <h3 class="text-center">Update Employee</h3><br>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <form action="update.php" method="POST">
                    <tr>
                        <th><a class="column_sort" data-order="desc" href="#">ID</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">First Name</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Last Name</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Title</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Salary</a></th>
                        <th><a class="column_sort" data-order="desc" href="#">Department (d001-d009)</a></th>
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
                        <td><input type="text" name="p_emp_no" class="form-control text-center" value="<?php echo $id; ?>" readonly /></td>
                        <td><input type="text" name="first_name" class="form-control text-center" placeholder="Enter new First Name" maxlength="20" required /></td>
                        <td><input type="text" name="last_name" class="form-control text-center" placeholder="Enter new Last Name" maxlength="20" required /></td>
                        <td><input type="text" name="title" class="form-control text-center" placeholder="Enter new Title" maxlength="20" required /></td>
                        <td><input type="text" name="salary" class="form-control text-center" placeholder="Enter new Salary" maxlength="10" required /></td>
                        <td><input type="text" name="dept_name" class="form-control text-center" placeholder="Enter new Department" maxlength="5" required /></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"><input class="btn btn-dark mt-3 mb-3" type="submit" id="button" name="submit" value="Update Details"></td>
                    </tr>
                </form>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>