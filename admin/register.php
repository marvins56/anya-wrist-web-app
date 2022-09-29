<?php include 'db.php';

$username= "";
$email= "";

$password= "";
$password2= "";

$errors = array();
if(isset($_POST['submit'])){

  // receive all input values from the form to preventig injection
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
   
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  


          //errors for the form
          if(empty($username))
          {array_push($errors,"username required or invalid username length");}

          if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
          {array_push($errors,"email required or invalid email format");}

 

          if(empty($password) )
          {array_push($errors,"weak password");}
      
          if ($password != $password2) {
          	array_push($errors, "passwords dont match");
            }

// checking if user exists
$user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
     
      }

//if it doent exist register teh user
  // checking for errors
  // Finally, register user if there are no errors in the form
              if (count($errors) == 0) {
                $password3 = md5($password2);//encrypt the password before saving in the database

                $query = "INSERT INTO admin (username, email, password)
                      VALUES('$username', '$email', '$password3')";
                mysqli_query($conn, $query);

                $_SESSION['username'] = $username;
                header('location:index.php');
              }

}



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login 04</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
              <div
                class="img"
                style="background-image: url(images/bg-1.jpg)"
              ></div>
              
              <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">register</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a
                        href="#"
                        class="social-icon d-flex align-items-center justify-content-center"
                        ><span class="fa fa-facebook"></span
                      ></a>
                      <a
                        href="#"
                        class="social-icon d-flex align-items-center justify-content-center"
                        ><span class="fa fa-twitter"></span
                      ></a>
                    </p>
                  </div>
                </div>
                <?php  include 'errors.php';?>
                <form action="" method="post" class="signin-form">
                  <div class="form-group mb-3">
                    <label class="label" for="name">Username</label>
                    <input
                      type="text"
                      name = "username"
                      value="<?php echo $username; ?>"
                      class="form-control"
                      placeholder="Username"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="label" for="name">Email</label>
                    <input
                      type="email"
                      name = "email"
                      class="form-control"
                      value="<?php echo $email; ?>"
                      placeholder="example@gmail.com"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      name = "password"
                      placeholder="Password"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      name = "password2"
                      value="<?php echo $password2; ?>"
                      placeholder="re enter Password"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <button
                      type="submit"
                      name = "submit"
                      class="form-control btn btn-primary rounded submit px-3"
                    >
                      register
                    </button>
                  </div>
                  <a href="index.php">login</a>
                  <div class="form-group d-md-flex"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
