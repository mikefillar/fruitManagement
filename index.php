<?php 
    require "retrieve.php";
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
    <title>Fruits Management</title>
</head>
<body>
    <div class="container">
        <h3>Fruit Management</h3>
        <div id="form" class="w-50 mt-4">
            <h5>Add Fruit</h5>
            <form onsubmit="validation()" action="create.php" method="POST" class="form">
                <label for="">Fruit Name :</label class="form-label">
                <input type="text" name="fruit_name" id="fruit_name" class="form-control" required>
                <label for="">Quantity :</label class="form-label">
                <input type="number" name="quantity" id="quantity" class="form-control" required>
                <label for="">Measure :</label class="form-label">
                <select name="unit_id" id="unit_id" class="form-control" required>
                    <option value="">Please select unit of measure</option>
                    <option value="1">Piece/s</option>
                    <option value="2">Kilo/s</option>
                    <option value="3">Gram/s</option>
                    <option value="4">Pack/s</option>
                </select>
                <br>
                <input type="submit" name="submit" id="submit" value="Add Fruit" class="btn btn-primary">
            </form>
        </div>
        <div>
            <table class="table mt-4 border text-center"> 
                <thead>
                    <tr>
                        <th>Fruit Name</th>
                        <th>Quantity</th>
                        <th>Measure</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td> <?php echo $row['fruit_name']; ?> </td>
                            <td> <?php echo $row['quantity']; ?> </td>
                            <td> <?php echo $row['unit_name']; ?> </td>
                            <td>
                                <form action="update.php" method="POST">
                                    <input type="submit" class="btn btn-success" name="updateBtn" id="updateBtn" value="Update">
                                    <input type="submit" class="btn btn-danger" name="deleteBtn" id="deleteBtn" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
                                    <input type="hidden" name="fruit_id" id="fruit_id" value=" <?php echo $row['fruit_id'] ?> ">
                                </form>
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function validation()
            {
                let fruit_name = document.loginForm.fruit_name.value;
                let quantity = document.getElementById("quantity").value;
                let unit_id = document.getElementById("unit_id").value;
                if(email == "" && password == "" && unit_id == "")
                    {
                        return alert("All fields are required!");
                    }
            }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>