<?php
// A ViewEmployee osztály és az Employee osztály segítségével jelenítjük meg az adatainkat az oldalon.
class ViewEmployee extends Employee
{

    public function ShowAllEmployees()
    {
        // Eltároljuk egy változóba az összes olyan adatot amit a feltételeink szerint leszűrtünk és azokat kiíratjuk az oldalra foreach-el. 
        $datas = $this->GetAllEmployees();
        foreach ($datas as $data) {
            echo '<tr>';
            echo '<td>' . $data['first_name'] . ' ' . $data['last_name'] . '</td>';
            echo '<td>' . $data['title'] . '</td>';
            echo '<td>' . $data['salary'] . '</td>';
            echo '<td>' . $data['dept_name'] . '</td>';
            echo "<td><a href='update.php?emp_no=" . $data['emp_no'] . "&first_name=" . $data['first_name'] . "&last_name=" . $data['last_name'] . "&title=" . $data['title'] . "&salary=" . $data['salary'] . "&dept_name=" . $data['dept_name'] . "'><i class='bx bxs-edit'></i></a></td>";
            echo "<td><a href='delete.php?emp_no=" . $data['emp_no'] . "&first_name=" . $data['first_name'] . "&last_name=" . $data['last_name'] . "&title=" . $data['title'] . "&salary=" . $data['salary'] . "&dept_name=" . $data['dept_name'] . "'><i class='bx bx-message-square-x'></i></a></td>";
            echo '</tr>';
        }
    }
}
