<?php $currentPage = "Aziz Portal"; ?>
<?php require_once('includes/header_pat_sec - Copy.php') ?>
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
<?php
// if(isset($_POST["search"]))
// {
// $search  = escape($_POST['search_data']);
// $query="SELECT * FROM patient_sec WHERE pat_name='$search' ";
// $GLOBALS['$result'] = $connection->query($query);
// while ($student = $GLOBALS['$result']->fetch_assoc()) {
//   echo "<tr>";
//   echo "<td>" . $student['pat_name'] .  "</td>";
//   echo "<td>" . $student['pat_age'] . "</td>";
//   echo "</tr>";
// }
// }
?>
    <!-- Nav -->

    <!-- Upper Nav -->
    <div class="upper-nav">
      <div class="logo">
        <img src="img/logo.png" alt="CLINIC" />
      </div>

      <div class="profile flex">
        <!-- Drop Down BTN -->
        <div class="dropdown">
          <button
            class="btn btn-success dropdown-toggle"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            DR. Atif Aziz
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
          </ul>
        </div>
        <!-- Drop Down BTN End -->

        <div class="img"><img src="img/doc.jpg" alt="pic" /></div>
      </div>
    </div>
    <!-- Upper Nav end -->

    <!-- Lower Nav -->
    <div class="lower-nav">

    <ul class="links">
    <a href="main.php"> <li class="link">Home</li></a>
        <li class="link">Earnings</li>
        <a href="pharmacy_sec.php"> <li class="link">Pharmacy</li></a>
       <li class="link">Patient Details</li>
    </ul>

</div>

    <!-- search-box section start -->
    <form action="" method="POST">
    <section>
      <div class="search-box">
        <input
          class="search-txt"
          type="text"
          name="search_data"
          placeholder="Search by name only"
        />
        <button class="search_btn" type="submit"  name="search" class="btn mt-3 btn-success">Search</button>
        <!-- <a class="search-btn" href="#">
          <i id="icon" class="fas fa-search"></i
        ></a> -->
      </div>
    </section>
    </form>
    <!-- search-box section end -->

    <!-- info section nothing todo with backend -->

    <section class="info_display">
      <div>name</div>
      <div>age</div>
      <div>diagnosis</div>
      <div>date</div>
      <div>view</div>
    </section>

    <!-- search-result section start -->
    <form>
    <div class="pat_container">
    <?php  
if(isset($_POST["search"]))
{
$search1  = escape($_POST['search_data']);
$query="SELECT * FROM patient_sec WHERE pat_name LIKE '%$search1%' ";
$result = $connection->query($query);
while ($student = $result->fetch_assoc()) {  //fetch_array returns the value with the index
?>
    <div class="pat_listBox">
  <div><?php  echo $student['pat_name'] ?></div>
  <div><?php echo $student['pat_age']?></div>
  <div><?php echo $student['pat_diag']  ?></div>
  <div><?php echo $student['pat_date'] ?></div>
      <a class="search-result" href="#"> <i class="fas fa-eye"></i></a>
      </div>
<?php }} ?>
</div>
    </form>
    <!-- search-result section end -->

    <script
      src="https://kit.fontawesome.com/6717f879f7.js"
      crossorigin="anonymous"
    ></script>
    <!-- Lower Nav end -->

    <!-- Nav End -->
  
  <?php require_once('includes/footer.php') ?>