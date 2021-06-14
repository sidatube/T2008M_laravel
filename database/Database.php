<?php
function  connectDB(){
    $servername="localhost";
    $username="root";
    $password="";
    $db="T2008m_php";
    $conn = new mysqli($servername,$username,$password,$db);
    if ($conn->connect_error){
        return null;
    }
    return $conn;
}
function queryDB($sql_txt){
    $conn = connectDB();
    $list=[];
    if ($conn!=null){
        $rs= $conn->query($sql_txt);
        if ($rs->num_rows>0){
            while ($row=$rs->fetch_assoc()){
                $list[]=$row;
            }
        }
    }
    return $list;
}
function insertOrUpdate($sql_txt){
    $conn = connectDB();
    if ($conn!=null){
        return $conn->query($sql_txt);
    }
    return false;
}
