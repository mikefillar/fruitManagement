<?php 
    require "connection.php";
    if(isset($_POST['updateBtn']))
        {
            $fruit_id = $_POST['fruit_id'];
            $sql = "SELECT * FROM fruits where fruit_id = '$fruit_id'";
            $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL".mysqli_error($connection),E_USER_ERROR);
            $row = mysqli_fetch_array($result);
        }
    if(isset($_POST['updateFruit']))
        {
            $fruit_id = $_POST['fruit_id'];
            $fruit_name = $_POST['fruit_name'];
            $quantity = $_POST['quantity'];
            $unit_id = $_POST['unit_id'];
            echo $fruit_id;
            echo $fruit_name;
            echo $quantity;
            echo $unit_id;
            $sql = "UPDATE fruits set fruit_name = '$fruit_name', quantity = '$quantity', unit_id = '$unit_id' where fruit_id = '$fruit_id'";
            $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL".mysqli_error($connection),E_USER_ERROR);
            echo "<script> alert('Fruit updated successfully!') </script>";
            echo "<script> window.location.href = 'index.php' </script>";
        }
    if(isset($_POST['deleteBtn']))
        {
            $fruit_id = $_POST['fruits_id'];
            $sql = "DELETE FROM fruits where fruit_id = '$fruit_id'";
            $result = mysqli_query($connection,$sql) or trigger_error("Failed SQL".mysqli_error($connection),E_USER_ERROR);
            echo "<script> alert('Fruit deleted successfully!') </script>";
            echo "<script> window.location.href = 'index.php' </script>";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #form
            {
                margin: 0 auto;
            }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Update Fruits</title>
</head>
<body>
    <div class="container">
        <h3>Fruit Management</h3>
        <div id="form" class="w-50 mt-4">
            <h5>Update Fruit</h5>
            <form action="update.php" method="POST" class="form">
                <input type="hidden" name="fruit_id" id="fruit_id" value="<?php echo $row['fruit_id']; ?>">
                <label for="">Fruit Name :</label class="form-label">
                <input type="text" name="fruit_name" id="fruit_name" class="form-control" value="<?php echo $row['fruit_name']; ?>">
                <label for="">Quantity :</label class="form-label">
                <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo $row['quantity']; ?>">
                <label for="">Measure :</label class="form-label">
                <select name="unit_id" id="unit_id" class="form-control">
                    <option value="">Please select unit of measure</option>
                    <option value="1" <?php if($row['unit_id']==1){ echo "selected";} ?> >Piece/s</option>
                    <option value="2" <?php if($row['unit_id']==2){ echo "selected";} ?> >Kilo/s</option>
                    <option value="3" <?php if($row['unit_id']==3){ echo "selected";} ?> >Gram/s</option>
                    <option value="4" <?php if($row['unit_id']==4){ echo "selected";} ?> >Pack/s</option>
                </select>
                <br>
                <input type="submit" name="updateFruit" id="updateFruit" value="Update Fruit" class="btn btn-success">
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>