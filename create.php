<?php 
    require "connection.php";
    if(isset($_POST['submit']))
        {
            function valid($value)
                {
                    $value = trim($value);
                    $value = htmlspecialchars($value);
                    return $value;
                }
            $fruit_name = valid($_POST['fruit_name']);
            $quantity = $_POST['quantity'];
            $unit_id = $_POST['unit_id'];
            $sql = "SELECT fruit_name FROM fruits where fruit_name = '$fruit_name'";
            $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL".mysqli_error($connection),E_USER_ERROR);
            $data = mysqli_fetch_assoc($result);
            if($data['fruit_name']==$fruit_name)
                {
                    echo "<script> alert('Fruit existed!') </script>";
                    echo "<script> window.location.href = 'index.php' </script>";
                }
            else
                {
                    $sql = "INSERT INTO fruits set fruit_name = '$fruit_name',quantity = '$quantity',unit_id = '$unit_id'";
                    $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL".mysqli_error($connection),E_USER_ERROR);
                    echo "<script> alert('Fruit added successfully!') </script>";
                    echo "<script> window.location.href = 'index.php' </script>";
                }
            
            
        }
    else
        {
            echo "<script> window.location.href = 'index.php' </script>";
        }
?>