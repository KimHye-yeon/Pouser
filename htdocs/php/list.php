<?php
    $i = 1;
    for($count = 0 ; $count <50 ; $count++){
        $row = mysqli_fetch_assoc($student);
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['grade'].'</td>';
        echo '<td>'.$row['class'].'</td>';
        echo '<td>'.$row['number'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['class'].'</td>';
        echo '<td>'.$row['number'].'</td>';
        echo '<td>'.($row['number']-$row['class']).'</td>';
        echo '</tr>';
        $i++;
    }
?>
