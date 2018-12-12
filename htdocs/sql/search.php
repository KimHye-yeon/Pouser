<?php
   header('Content-Type: application/json');
    $conn = mysqli_connect("localhost", "root", "123456789", "dormitory");
    $index = $_POST['index'];
    if($index<10)
    {
        switch($index){
            case '0':
                $sort = "abs(total.total) desc, student.name";
                break;
            case '1':
                $sort = "abs(total.total) desc, student.name desc";
                break;
            case '2':
                $sort = "total.bonus";
                break;
            case '3':
                $sort = "total.bonus desc";
                break;
            case '4':
                $sort = "total.black";
                break;
            case '5':
                $sort = "total.black desc";
                break;
            case '6':
                $sort = "abs(total.total)";
                break;
            case '7':
                $sort = "abs(total.total) desc";
                break;
        }
        $student = mysqli_query($conn, "SELECT student.grade, student.class, student.number, student.name, COALESCE(total.bonus,'0') as bonus, COALESCE(total.black,'0')as black, COALESCE(total.total,'0') as total FROM student LEFT OUTER JOIN total ON student.code = total.code ORDER BY ".$sort);
    }elseif($index < 20){
        switch($index-10){
            case '0':
                $sort = "student.class = '1'";
                break;
            case '2':
                $sort = "student.class = '2'";
                break;
            case '4':
                $sort = "student.class = '3'";
                break;
            case '6':
                $sort = "student.class = '4'";
                break;
        }
        $student = mysqli_query($conn,"SELECT student.grade, student.class, student.number, student.name, COALESCE(total.bonus,'0') as bonus, COALESCE(total.black,'0')as black, COALESCE(total.total,'0') as total FROM student LEFT OUTER JOIN total ON student.code = total.code WHERE student.grade ='1' and ".$sort);
    }elseif($index <30)
    {
        switch($index-20){
            case '0':
                $sort = "student.class = '1'";
                break;
            case '2':
                $sort = "student.class = '2'";
                break;
            case '4':
                $sort = "student.class = '3'";
                break;
            case '6':
                $sort = "student.class = '4'";
                break;
        }
        $student = mysqli_query($conn,"SELECT student.grade, student.class, student.number, student.name, COALESCE(total.bonus,'0') as bonus, COALESCE(total.black,'0')as black, COALESCE(total.total,'0') as total FROM student LEFT OUTER JOIN total ON student.code = total.code WHERE student.grade ='2' and ".$sort);
    }else{
        switch($index-30){
            case '0':
                $sort = "student.class = '1'";
                break;
            case '2':
                $sort = "student.class = '2'";
                break;
            case '4':
                $sort = "student.class = '3'";
                break;
            case '6':
                $sort = "student.class = '4'";
                break;
        }
        $student = mysqli_query($conn,"SELECT student.grade, student.class, student.number, student.name, COALESCE(total.bonus,'0') as bonus, COALESCE(total.black,'0')as black, COALESCE(total.total,'0') as total FROM student LEFT OUTER JOIN total ON student.code = total.code WHERE student.grade ='3' and ".$sort);
    }
    $return_arr = array();
    if($index<10)
    {
        for($cnt = 0;$cnt<50;$cnt++){
            $row = mysqli_fetch_assoc($student);
            $row_array["grade"] = $row["grade"];
            $row_array["class"] = "&nbsp&nbsp".$row["class"]."&nbsp&nbsp";
            if($row["number"]<10)
            {
                $row_array["number"] =$row["number"]."&nbsp&nbsp";
            }else $row_array["number"] = $row["number"];
            $row_array["name"] = "&nbsp&nbsp".$row["name"];
            $row_array["bonusmark"] = $row["bonus"];
            $row_array["blackmark"] = $row["black"];
            $row_array["total"] = $row["total"];
            array_push($return_arr,$row_array);
        }
    }else{
        while($row = mysqli_fetch_assoc($student))
        {
            $row_array["grade"] = $row["grade"];
            $row_array["class"] = $row["class"];
            $row_array["number"] = $row["number"];
            $row_array["name"] = $row["name"];
            $row_array["bonusmark"] = $row["bonus"];
            $row_array["blackmark"] = $row["black"];
            $row_array["total"] = $row["total"];
            array_push($return_arr,$row_array);
        }
    }
    echo json_encode($return_arr,JSON_UNESCAPED_UNICODE);


?>