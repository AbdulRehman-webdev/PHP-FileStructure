<?php ob_start(); ?>
<?php session_start(); ?>
<?php require"system/function.php"; ?>
<?php require"inc/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Login - fastEX</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">

<?php require"inc/boiler-head.php"; ?>
<style>
body{
font-size: 13px;
font-family: 'Cabin', sans-serif !important;
height: 100vh;
margin: 60px 0 60px 0;
background-color: #DFDFDF;
}
#alert-message{
	color: #DC3545;
	background-color: transparent;
}
  
/*loader*/
.loader{
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    background: #F1F2F3;
    justify-content: center;
    align-items: center;
}
.loader > img{
    width: 120px;
}

.loader.hidden{
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut{
    100%{
        opacity: 0;
        visibility: hidden;

    }
}
/*loader*/

</style>

</head>
<body>

<!-- loader -->
<div class="loader">
<img src="public/media/img/loader.gif">
</div>
<!-- ./loader -->

<!-- container -->
<div class="container">

<!-- row -->
<div class="row">

<!-- column -->
<div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 col-xl-4"></div>
<!-- ./column -->

<!-- column -->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

<!-- card -->
<div class="card">

<!-- card-header -->
<div class="card-header bg-light"></div>
<!-- ./card-header -->

<!-- card-body -->
<div class="card-body">

<!-- text-center -->
<div class="text-center">
<h1 class="h4 text-gray-900 mb-4">fastEX <br>Admin's Panel</h1>
</div>
<!-- ./text-center -->

<hr>

<!-- form -->
<form method="POST" autocomplete="off">

<?php 
if(isset($_POST['login-user'])){
$Email = trim($_POST['email']);
$Password = trim($_POST['password']);
// =============================================
$query = "SELECT * FROM administrators WHERE email_address = '$Email' AND
password = '$Password' AND status ='active'";
// =============================================

// =============================================
$execute = mysqli_query($conn, $query);
$rows = mysqli_num_rows($execute);
if ($rows == 1){
$_SESSION['email'] = $Email;
if($_SESSION['email'] && $rows['password'] == $Password);
// redirect
header("Location: index");

} else {
echo"<div class='alert alert-danger text-center' id='alert-message'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Invalid email or password!</div>";
}
}
?>


<!-- email -->
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-envelope"></i></span>
</div>
<input type="text" name="email" id="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" autocomplete="off">
</div>
<!-- ./email -->

<!-- password -->
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-lock"></i></span>
</div>
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
</div>
<!-- ./password -->

<!-- show-password -->
<div class="form-group">
<div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
<input type="checkbox" class="custom-control-input" id="show-password">
<label class="custom-control-label" for="show-password" onclick="showPassword()">Show Password</label>
</div>
</div>
<!-- ./show-password -->

<!-- submit -->
<div class='form-group text-center'>
<button type='submit' name='login-user' id='login-user' class='btn btn-primary btn-block'><i class="fa fa-sign-in"></i> Login</button>
</div>
<!-- ./submit -->

<!-- login with google -->
<a href="#" class="btn btn-default btn-block"><i class="fa fa-google"></i> Login with Google</a>
<!-- ./login with google -->

<!-- login with facebook -->
<a href="#" class="btn btn-default btn-block mt-2"><i class="fa fa-facebook"></i> Login with Facebook</a>
<!-- ./login with facebook -->

</form>
<!-- ./form -->

</div>
<!-- ./card-body -->

<!-- card-footer -->
<div class="card-footer bg-light"></div>
<!-- ./card-footer -->

</div>
<!-- ./card -->

<!-- text-center -->
<div class="text-center">
<p><u> <a href="https://instagram.com/i_tech09" target="_blank" class="text-dark">&larr; Made with <i class="fa fa-heart"></i> By Cube Technology.</a> </u></p>
</div>
<!-- ./text-center -->

</div>
<!-- ./column -->

<!-- column -->
<div class="col-xs-0 col-sm-0 col-md-4 col-lg-4 col-xl-4"></div>
<!-- ./column -->

</div>
<!-- ./row -->

</div>
<!-- ./container -->


<!-- show-password-toggle -->
<script>
function showPassword() {
var x = document.getElementById("password");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
<!-- ./show-password-toggle -->

<!-- revoke-refresh-after-submit -->
<script>
if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
</script>
<!-- ./revoke-refresh-after-submit -->

<!-- loader -->
<script type="text/javascript">
	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
</script>
<!-- ./loader -->

<?php require"inc/boiler-foot.php"; ?>

</body>
</html>