<?php
$conn = mysqli_connect("localhost", "root","123456789","dormitory");
$grade = $_GET['grade'];
$code = $_GET['code'];
$serial = $_GET['serial'];
$bonus = $_GET['bonus'];
$reason = $_GET['reason'];
if($grade == 1)
{
    mysqli_query($conn, "INSERT INTO bonusmark VALUES ('$code','$serial','$bonus','$reason', now())");
    mysqli_query($conn, "UPDATE sumbonus SET  bonussum = bonussum+$bonus where code = '$code'");
    mysqli_query($conn, "UPDATE total set bonus = (select bonussum from sumbonus where code='$code') where code = '$code'");
    mysqli_query($conn, "UPDATE total set black = (select blacksum from sumblack where code='$code') where code = '$code'");
    mysqli_query($conn, "UPDATE total set total = (bonus-black)");
}else if($grade == 2)
{
    mysqli_query($conn, "INSERT INTO blackmark VALUES ('$code','$serial','$bonus','$reason', now())");
    mysqli_query($conn, "UPDATE sumblack SET  blacksum = blacksum+$bonus WHERE code = '$code'");
    mysqli_query($conn, "UPDATE total set bonus = (select bonussum from sumbonus where code='$code') where code = '$code'");
    mysqli_query($conn, "UPDATE total set black = (select blacksum from sumblack where code='$code') where code = '$code'");
    mysqli_query($conn, "UPDATE total set total = (bonus-black)");
}


?>