<?php

include 'config.php';
include 'login.php';


$ulogin=$_SESSION['email'];


  $login=mysqli_query($connection,  "SELECT * FROM account WHERE email = '$ulogin'");
  $row=mysqli_fetch_array($login);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="\final project\css\editprofile.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
    <style>
        body {
            margin: 0;
            padding-top: 140px;
            color: #2e323c;
            background: #e8e8e8;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 104px;
            height: 104px;
            margin-top: 50px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        #changeimg {
            height: 33px;
            background: #0d6efd;
            color: #fff;
            border-radius: 9px 9px 9px 9px;
            border: 1px #fff;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            margin-top: 10px;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-right {
            float: right;
            margin-top: 25px;

        }

    </style>


</head>

<body>

    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                                </div>

                                <h5 class="user-name ">
                                    <?php echo $row['firstname']." ".$row['lastname']?>
                                </h5>
                                <h6 class="user-email">
                                    <?php echo $row['email']?>
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form method="post">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">First Name</label>
                                        <input type="text" class="form-control" name="fname"
                                            value="<?php echo $row['firstname']?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Last Name</label>
                                        <input type="text" class="form-control" name="lname"
                                            value="<?php echo $row['lastname']?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $row['email']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Mobile No</label>
                                        <input type="tel" class="form-control" name="mobileno"
                                            value="<?php echo $row['mobileno']?>">
                                    </div>

                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a href="index.php"><button type="button" id="submit" name="submit"
                                                class="btn btn-secondary">Back</button></a>
                                        <a href="changepassword.php"><button type="button"
                                                class="btn btn-primary">Change Password</button></a>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php

if(isset($_POST['update']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $mobileno=$_POST['mobileno'];
 
   

  if((!empty($fname)) && (!empty($lname)) && (!empty($mobileno)) )
 {

  $update=mysqli_query($connection,"update account set firstname='$fname' , lastname='$lname' ,mobileno='$mobileno' ,user_image='$file_name'where email='$ulogin'");
  echo '<script> 
  alert(" data Successfully updated");
  window.location.href="profile.php";
  </script>';
 }

   
}

?>