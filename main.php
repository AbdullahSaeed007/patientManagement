<?php $currentPage = "Aziz Portal"; ?>
<?php require_once('includes/header.php') ?>
<?php
session_start();

if (!isset($_COOKIE['session_id']) || $_COOKIE['session_id'] != session_id()) {
  header('Location: index.php');
  exit;
}

if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}


?>




<!-- Nav -->
<?php

if(isset($_POST["Print"]))
{
$pat_name     = escape($_POST['pat_name']);
$pat_age      = escape($_POST['pat_age']);
$pat_gen      = escape($_POST['pat_gen']);
$pat_diag     = escape($_POST['pat_diag']);
$pat_inves      = escape($_POST['pat_inves']);
$pat_pres  = escape($_POST['pat_pres']);
date_default_timezone_set("asia/karachi");
$date = date("Y-m-d H:i:s");
if($pat_name && $pat_age&&$pat_gen&&$pat_diag &&$pat_inves&&$pat_pres !="")
{
$query = "INSERT INTO patient_sec (pat_name,pat_age,pat_gen,pat_diag,pat_inves,pat_pres,pat_date) VALUES ('$pat_name','$pat_age','$pat_gen','$pat_diag','$pat_inves','$pat_pres','$date')";
				$query_conn = mysqli_query($connection, $query);
				if(!$query_conn) {
					die("Query failed" . mysqli_error($connection));
				} else {
				
				$_SESSION['toastr'] = array(
					'type'      => 'success', 
					'message' => 'Check your email for activation link!',
					'title'     => 'Sign-up Successful!'
				);
				unset($first_name);
				unset($last_name);
				unset($user_name);
				unset($user_email);
			}
}
}
?>
<!-- Upper Nav -->
<div class="upper-nav">


<div class="logo">
    <img src="img/logo.png" alt="CLINIC">
</div>


<div class="profile flex">

    <!-- Drop Down BTN -->
        <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          DR. Atif Aziz 
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          
          <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>

        </ul>
      </div>
    <!-- Drop Down BTN End -->



    <div class="img"><img src="img/doc.jpg" alt="pic"></div>    

</div>


</div>
<!-- Upper Nav end -->


<!-- Lower Nav -->

<div class="lower-nav">

    <ul class="links">
        <li class="link">Home</li>
        <li class="link">Earnings</li>
        <a href="pharmacy_sec.php"> <li class="link">Pharmacy</li></a>
       <a href="patient_sec.php"> <li class="link">Patient Details</li></a>
    </ul>

</div>

<!-- Lower Nav end -->

<!-- Nav End -->




<!-- Three Sections -->
<form action="" method="POST">

<div class="sections flex">
<div class="details-section">

 <h4>Patient Details</h4>   

<div class="flex">

<input type="text" name="pat_name" class="p-name" placeholder=" Patient Name">

<input type="age" name="pat_age" class="p-age" placeholder=" Age">

</div>


<!-- Radio Btns -->

<div class="flex">

    <h6>Gender</h6>
    <div class="form-check ">
        <input class="form-check-input" type="radio" value="Male" name="pat_gen" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Male
        </label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="radio" value="female" name="pat_gen" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Female
        </label>
      </div>

      <div class="form-check ">
        <input class="form-check-input" type="radio" value="other" name="pat_gen" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Other
        </label>
      </div>
</div>

<!-- Radio Btns Ends -->
 <!-- text areas -->
 <div class="TextArea flex">
 <div class="left ">
 <div class="mb-3 d-text-area">
    <label for="exampleFormControlTextarea1" class="form-label">Diagnosis</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="pat_diag" rows="3" style="width: 15rem;"></textarea>
  </div>


  <div class="mb-3 d-text-area">
    <label for="exampleFormControlTextarea1" class="form-label">Investigations</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="pat_inves" rows="3" style="width: 15rem;"></textarea>
  </div>

</div>

<div class="right">

    <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Prescription</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="pat_pres" rows="9" style="width: 15rem;"></textarea>
      </div>

</div>
</div>

</div>





<div class="medicine-section">

    <h4>Medicine Section</h4>

    <div class="flex m-section">
        <input type="text" class="drug-name">

        <!-- Drop Down BTN -->
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Medicines
            </button>
            <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> -->
            <select name="product_cat" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					            <?php
									$qry = "SELECT * FROM medicine_stock";
									$dbdata = mysqli_query($connection, $qry);
									while($data = mysqli_fetch_assoc($dbdata)){
								?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['medicine_name']; ?></option>
									<?php }?>
                    </select>
    
            <!-- </ul> -->
          </div>
        <!-- Drop Down BTN End -->

    </div>


    <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Dosage</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" style="width: 17rem;"></textarea>
      </div>

      <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Duration</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="1" style="width: 17rem;"></textarea>
      </div>


      <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">List</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" style="width: 17rem;"></textarea>
      </div>

</div>



<div class="clinic-pharmacy">

    <h4>Clinic's Pharmacy</h4>
    <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Avaibility</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" style="width: 17rem;"></textarea>
      </div>

     
      
    <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Quatity</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="2" style="width: 17rem;"></textarea>
      </div>

      
    <div class="mb-3 d-text-area">
        <label for="exampleFormControlTextarea1" class="form-label">Remainings</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="1" style="width: 17rem;"></textarea>
      </div>


      <center><button type="submit"  name="Print" class="btn mt-3 btn-success">Print</button></center>

</div>
</div>
</form>
<footer>
  <p class="footer__copy">
    <a class="footer__copy-link">&#169; AZIZ CLINIC. All rights reserved</a>
</p>
</footer>


<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
  <i class="ri-arrow-up-s-line scrollup__icon"></i>
</a>

<!--=============== SCROLL REVEAL ===============-->
<script src="https://unpkg.com/scrollreveal"></script>



<!-- Sections End -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
<?php require_once('includes/footer.php') ?>