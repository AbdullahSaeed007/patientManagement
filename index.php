<?php $currentPage = "Crud Portal"; ?>
<?php require_once('includes/headerLogin.php') ?>

<?php 
if(isset($_POST["submission"]))
{
$user_name     = escape($_POST['username']);
$pattern_un = "/^[a-zA-Z0-9_]{3,16}$/";
	if(!preg_match($pattern_un, $user_name)) {
		$errUn = "Must be at lest 3 character long, letter, number and underscore allowed";
	} else {
$query = "SELECT * FROM userlogin WHERE user_name = '$user_name'";
		$query_con = mysqli_query($connection, $query);
		if (!$query_con) {
			die("Query Failed" . mysqli_error($connection));
		}
		$count = mysqli_num_rows($query_con);
		if ($count > 0) {
			$errUn = "User already exists, Please choose another";
		}
    }
    
$user_email      = escape($_POST['userEmail']);
$pattern_ue = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";
	if(!preg_match($pattern_ue, $user_email)) {
		$errUe = "Invalid format of email";

	} else {
$query = "SELECT * FROM userlogin WHERE user_Email = '$user_email'";
		$query_con = mysqli_query($connection, $query);
		if (!$query_con) {
			die("Query Failed" . mysqli_error($connection));
		}
		$count = mysqli_num_rows($query_con);
		if ($count == 1) {
			$errUe = "Email already exists, Please choose another";
		}
    }
    

$user_pass      = escape($_POST['userPass']);



if($user_name && $user_email&&$user_pass!="" && !isset($errUn) && !isset($errUe))
{

$query = "INSERT INTO userlogin (user_name,user_Email,user_Pass) VALUES ('$user_name','$user_email','$user_pass')";
				$query_conn = mysqli_query($connection, $query);
				if(!$query_conn) {
					die("Query failed" . mysqli_error($connection));
				} else {
				
				$_SESSION['toastr'] = array(
					'type'      => 'success', 
					'message' => 'Check your email for activation link!',
					'title'     => 'Sign-up Successful!'
				);
				unset($user_name);
				unset($user_email);
				unset($user_pass);
			}
}
}
?>
<?php
if(isset($_POST["submission_s"]))
{
$user_Name     = escape($_POST['username_s']);
$user_pass      = escape($_POST['password_s']);

$query = "SELECT* FROM userlogin WHERE user_name = '$user_Name' AND user_Pass='$user_pass'";
		$query_con = mysqli_query($connection, $query);
        $check = mysqli_fetch_array($query_con);
if(isset($check)){
    $query = "UPDATE userlogin SET active_user = 1 where user_name='$user_Name'";
$query_con = mysqli_query($connection, $query);
		if (!$query_con) {
			die("Query Failed" . mysqli_error($connection));
      exit();
		}
    session_start();
    $_SESSION['username'] = $user_Name;
  setcookie('session_id', session_id(), time() + (86400 * 30), "/"); // 86400 = 1 day
  header('Location: main.php');
  exit;
} else {
  header('Location: index.php');
  exit;
}
}
?>

     <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username_s" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password_s"  placeholder="Password" />
            </div>
            <a href="dashboard.php"><input type="submit" value="Login" name="submission_s" class="btn solid" /></a>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>









          <form action="" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <?php echo isset($errUn)?"<span class='error text-danger'>{$errUn}</span>":""; ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="userEmail" placeholder="Email" />
            </div>
            <?php echo isset($errUe)?"<span class='error text-danger'>{$errUe}</span>":""; ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="userPass" placeholder="Password" />
            </div>
            <input type="submit" name="submission" class="btn" value="Sign up" />
        
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Posts</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/loginJs.js"></script>
  </body>
</html>
<?php require_once('includes/footer.php') ?>

