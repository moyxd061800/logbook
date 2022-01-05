<?php

session_start();

include('config.php'); 



if(isset($_POST['add'])){

    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $mname = mysqli_real_escape_string($connection, $_POST['mname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    





    $query = "INSERT INTO log_book (fname,mname,lname,address) 
                VALUES 
                ('$fname','$mname','$lname','$address')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)

    {

    $_SESSION['success'] = "Added Successfully";
    header('Location: index.php');

    }else{

    $_SESSION['failed'] = "Error Adding Data!";
    header('Location: index.php');
    }
}


//code for deleting customer data
if(isset($_POST['delete_btn'])){

    $rid = $_POST['delete_id'];
    

    $query = "DELETE FROM log_book WHERE id ='$rid' LIMIT 1";


    $query_run = mysqli_query($connection,$query);

    if($query_run){
           
        $_SESSION['success'] = "Data Deleted Successfully";
        header("Location: index.php");

    }else{
        $_SESSION['failed'] = "Error Deleting Data";
        header("Location: index.php");
    }
}





//code for updating resident data
if(isset($_POST['update_bt'])){

    $id = $_POST['edit_id'];
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $mname = mysqli_real_escape_string($connection, $_POST['mname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    


        $query = "UPDATE log_book SET fname='$fname',mname='$mname' WHERE id ='$id' LIMIT 1";

        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location: index.php');
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: index.php');

        }   
}



?>