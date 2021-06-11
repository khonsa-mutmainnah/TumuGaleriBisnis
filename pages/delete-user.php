<?php
    require_once('./class/class.User.php');

    if(isset($_GET['id_user'])){
        $objUser = new User();
        $objUser->id_user = $_GET['id_user'];
        $objUser->DeleteUser();
        echo "<script> alert('$objUser->message'); </script>";
        echo "<script>window.location = '?p=userlist'</script>";
    }
    else{
        echo '<script>window.history.back()</script>';
    }

?>