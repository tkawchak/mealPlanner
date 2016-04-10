<?php
header('Access-Control-Allow-Origin: *');//Should work in Cross Domaim ajax Calling request
 mysql_connect("localhost","root","1234");
 mysql_select_db("mealplanner");
if(isset($_GET['type']))
{
    $res = [];

    if($_GET['type'] =="insert"){
        $name  = $_GET ['Name'];
        $mail  = $_GET ['Email'];
        $mobile  = $_GET ['Mob_Num'];
        $query1  = "insert into customer(cust_name, cust_mobile, cust_email) values('$name','$mail','$mobile')";
        $result1 = mysql_query($query1);

        if($result1)
        {
            $res["flag"] = true;
            $res["message"] = "Data Inserted Successfully";
        }
        else
        {
            $res["flag"] = false;
            $res["message"] = "Oppes Errors";
        }

    }
}
else{
    $res["flag"] = false;
    $res["message"] = "Invalid format";
}

    echo json_encode($res);
?>