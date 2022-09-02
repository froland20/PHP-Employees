<?php
// Employee osztály ami a DBconnect osztállyal van kibővítve
class Employee extends DBconnect
{
    protected function GetAllEmployees()
    {
        $showMaxEmployee = 20;
        // Ezzel az sql paranccsal elérjük az összes olyan munkavállalót akire szükségünk van.
        $sql = "SELECT e.emp_no, e.first_name, e.last_name, e.birth_date, e.gender, e.hire_date, t.title, s.salary, dts.dept_name, t.from_date
        FROM employees e
        INNER JOIN
        titles AS t
        ON t.emp_no=e.emp_no
        INNER JOIN
        salaries AS s
        ON s.emp_no=e.emp_no
        INNER JOIN
        dept_emp AS de
        ON de.emp_no = e.emp_no
        INNER JOIN
        departments AS dts
        ON de.dept_no=dts.dept_no
        WHERE t.to_date='9999-01-01' AND s.to_date='9999-01-01' AND de.to_date='9999-01-01'
        ORDER BY emp_no LIMIT $showMaxEmployee";

        // Eredmény eltárolása és sql parancs lefuttatása.
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    // Ezzel a funkcióval tudjuk módosítani egy SQL parancs visszatérési értékkel az adatbázisunkat.
    public function EditEmployee($sql)
    {
        $result = $this->connect()->query($sql);
        if ($result) {
            header('location:index.php');
        } else {
            die(mysqli_error($this->connect()));
        }
    }
}
