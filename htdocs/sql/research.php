<?php
   header('Content-Type: application/json');
    $conn = mysqli_connect("localhost", "root", "123456789", "dormitory");
    $grade = $_POST['grade'];
    $class = $_POST['class'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $return_arr = array();
    if($grade==null || $class==null || $number==null || $name==null){
        echo json_encode($return_arr);
    }
    else{
        $student = mysqli_query($conn, "SELECT count(*) FROM student WHERE grade = '$grade' and  class = '$class' and  number = '$number' and  name = '$name'");
        if($student==null)
        {   
            echo json_encode($return_arr);
        }
        else{
            $student = mysqli_query($conn, "SELECT code FROM student WHERE grade = '$grade' and  class = '$class' and  number = '$number' and  name = '$name'");
            $student_row = mysqli_fetch_assoc($student);
            $code =$student_row['code'];
            $bonusmark = mysqli_query($conn, "SELECT bonusmark, reason, datatime FROM bonusmark WHERE code = '$code'");
            $blackmark = mysqli_query($conn, "SELECT blackmark, reason, datatime FROM blackmark WHERE code = '$code'");
            $row_1 = mysqli_fetch_assoc($bonusmark);
            $row_2 = mysqli_fetch_assoc($blackmark);
            $row_1==TRUE?$chk_1=TRUE:$chk_1=FALSE;
            $row_2==TRUE?$chk_2=TRUE:$chk_2=FALSE;
            while ($chk_1 || $chk_2) {
                if($chk_1 && $chk_2){
                    $row_array['bonusmark']['score'] = $row_1['bonusmark'];
                    $row_array['bonusmark']['reason'] = $row_1['reason'];
                    $row_array['bonusmark']['datatime'] = $row_1['datatime'];
                    $row_array['blackmark']['score'] = $row_2['blackmark'];
                    $row_array['blackmark']['reason'] = $row_2['reason'];
                    $row_array['blackmark']['datatime'] = $row_2['datatime'];
                }else if($chk_1){
                    $row_array['bonusmark']['score'] = $row_1['bonusmark'];
                    $row_array['bonusmark']['reason'] = $row_1['reason'];
                    $row_array['bonusmark']['datatime'] = $row_1['datatime'];
                    $row_array['blackmark']['score'] = "";
                    $row_array['blackmark']['reason'] = "";
                    $row_array['blackmark']['datatime'] = "";
                }else if($chk_2){
                    $row_array['bonusmark']['score'] = "";
                    $row_array['bonusmark']['reason'] = "";
                    $row_array['bonusmark']['datatime'] = "";
                    $row_array['blackmark']['score'] = $row_2['blackmark'];
                    $row_array['blackmark']['reason'] = $row_2['reason'];
                    $row_array['blackmark']['datatime'] = $row_2['datatime'];
                }
                array_push($return_arr,$row_array);
                $row_1 = mysqli_fetch_assoc($bonusmark);
                $row_1==true?$chk_1=TRUE:$chk_1=FALSE;
                $row_2 = mysqli_fetch_assoc($blackmark);
                $row_2==true?$chk_2=TRUE:$chk_2=FALSE;
            }
        }
        echo json_encode($return_arr);
    }

?>