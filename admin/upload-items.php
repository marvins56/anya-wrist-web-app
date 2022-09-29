<?php
        include("db.php");

        $price = "";
        $imagename= "";
       
        $errors = array();

        if(isset($_POST['upload'])){

            $imagename = $_POST['imagename'];
            $price = $_POST['price'];

    
            if(empty($imagename)){
                array_push($errors,"enter product name");
            }
            if(empty($price)){
                array_push($errors,"enter product price");
            }
          
            if(count($errors) == 0){

                $maxsize = 5242880; // 5MB
                $name = $_FILES['file']['name'];
                $target_dir = "images/ ";
                $target_file = $target_dir . $_FILES["file"]["name"];
    
                // Select file type
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                // Valid file extensions
                $extensions_arr = array("jpg","png","jpeg");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){

            // Check file size
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                echo "File too large. File must be less than 5MB.";
            }else{
                // Upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "INSERT INTO products (name,imagename,price,location) VALUES('".$name."','$imagename','$price','".$target_file."')";
                 $result =  mysqli_query($conn,$query);
                    if($result){
                        echo('success fully uploaded');
                    }else{
                        echo('error uploading data');
                    }
                  
                }
            }

        }else{
            echo "Invalid file extension.";
        }

            }


          

    

        }
        ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <img src="images/favicon.png" alt="">
      <h1>upload</h1>
    </div>

    <!-- Login Form -->

    <form method="post"  enctype='multipart/form-data'>
        <?php include ('errors.php');?>
    
        <input type='file' class="fadeIn first" name='file' required />
             <br>
      <input type="text" id="login" class="fadeIn second" name="imagename" placeholder="item-name" required>
     <br>    
      <label for="number">PRICE</label>
      <input type="number" id="password" class="fadeIn third" name="price" placeholder="" required>
      <br>
      <br>
      <input type="submit"  name = "upload" class="fadeIn fourth" value="upload">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../inner-page.php">Go to the Site</a>
    </div>

  </div>
</div>
</body>
</html>