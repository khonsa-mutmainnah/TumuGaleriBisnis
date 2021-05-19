<?php
    require_once('./class/class.User.php');

    if(isset($_GET['username'])){
        $objUser = new User();
        $objUser->username = $_GET['username'];
        $objUser->DeleteUser();
        echo "<script> alert('$objUser->message'); </script>";
        echo "<script>window.location = 'index.php?p=userlist'</script>";
    }
    else{
        echo '<script>window.history.back()</script>';
    }

?>