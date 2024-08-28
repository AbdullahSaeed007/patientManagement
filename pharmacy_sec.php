<?php

$currentPage = "AzizPharmacy";

session_start();

if (!isset($_COOKIE['session_id']) || $_COOKIE['session_id'] != session_id()) {
  header('Location: index.php');
  exit;
}

if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}
// session_start();
// if (!isset($_SESSION['name'])) {
//     header('location: login.php');
// }
require_once('includes/header_phar.php');

$query = "SELECT * FROM medicine_stock";
$query_run = mysqli_query($connection, $query);

if (isset($_POST['save'])) 
{
    $med_name2 = escape($_POST['med_name']);
    $med_form2 = escape($_POST['med_form']);
    $med_manufac2 = escape($_POST['med_manufac']);
    $med_expiry_date2 = escape($_POST['med_expiry_date']);
    $med_supplier_name2 = escape($_POST['med_supplier_name']);
    $med_quantity2 = escape($_POST['med_quantity']);
    $med_reorder_level2 = escape($_POST['med_reorder_level']);
    $med_price2 = escape($_POST['med_price']);
    $med_description2 = escape($_POST['med_description']);
    $med_stock_availability2 = escape($_POST['med_stock_availability']);
    $med_min_order_quantity2 = escape($_POST['med_min_order_quantity']);
    $med_order_frequency2 = escape($_POST['med_order_frequency']);
    $med_purchase_date2 = escape($_POST['med_purchase_date']);

    $query1 = "INSERT INTO medicine_stock(medicine_name, dosage_form, expiry_dates,quantity,manufacturer,purchase_date,supplier_name,reorder_level,descriptions,stock_availability,min_order_quantity,order_frequency,price) VALUES('$med_name2','$med_form2','$med_expiry_date2','$med_quantity2','$med_manufac2','$med_purchase_date2','$med_supplier_name2','$med_reorder_level2','$med_description2','$med_stock_availability2','$med_min_order_quantity2','$med_order_frequency2','$med_price2')";
$query_run1 = mysqli_query($connection, $query1);
if(!$query_run1) {
    die("Query failed" . mysqli_error($connection));
} else {

unset($med_name2);
unset($med_form2);
unset($med_manufac2);
unset($med_expiry_date2);
unset($med_supplier_name2);
unset($med_quantity2);
unset($med_reorder_level2);
unset( $med_price2);
unset($med_description2);
unset($med_stock_availability2);
unset($med_min_order_quantity2);
unset($med_order_frequency2);
unset($med_purchase_date2);
header('Location: '.$_SERVER['REQUEST_URI']);
exit;
  
}

}
if (isset($_GET['delete'])) 
{
    $id = $_GET['delete'];

    $query2 = "DELETE FROM medicine_stock WHERE id='$id'";
    $query_run2 = mysqli_query($connection, $query2);
    if(!$query_run2) {
        die("Query failed" . mysqli_error($connection));
    } else {
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
    }
}


?>
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
          
          <li><a class="dropdown-item" href="#">Change Password</a></li>

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
    <a href="main.php"> <li class="link">Home</li></a>
        <li class="link">Earnings</li>
        <li class="link">Pharmacy</li>
       <a href="patient_sec.php"> <li class="link">Patient Details</li></a>
    </ul>

</div>

<!-- Lower Nav end -->

<!-- Nav End -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card example-1 square scrollbar-cyan bordered-cyan">
                    <div class="card-header bg-dark text-light text-center" style="height: 3rem;background-color: #000000;
  background-image: linear-gradient(147deg, #000000 0%, #04619f 74%);">
                        <h4>Add New Medicine</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="form-group">

                                <label for="name">medicine name</label>
                                <input class="form-control" type="text" name="med_name" id="" required>
                            </div>


                            <div class="form-group">
                                <label for="email">dosage form</label>
                                <input class="form-control" type="text" rows="3" columns="3" name="med_form" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">manufacturer</label>
                                <input class="form-control" type="text" name="med_manufac" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">expiry date</label>
                                <input class="form-control" type="date" name="med_expiry_date" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">purchase date</label>
                                <input class="form-control" type="date" name="med_purchase_date" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">supplier name</label>
                                <input class="form-control" type="text" name="med_supplier_name" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">quantity</label>
                                <input class="form-control" type="number" name="med_quantity" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">reorder level</label>
                                <input class="form-control" type="number" name="med_reorder_level" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">price</label>
                                <input class="form-control" type="number"step="0.01" name="med_price" id="" required>

                            </div>
                           
                            <div class="form-group">
                                <label for="email">description</label>
                                <input class="form-control" type="text" name="med_description" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">stock availability</label>
                                <input class="form-control" type="number" name="med_stock_availability" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">min order quantity</label>
                                <input class="form-control" type="number" name="med_min_order_quantity" id="" required>

                            </div>
                            <div class="form-group">
                                <label for="email">order frequency</label>
                                <input class="form-control" type="number" name="med_order_frequency" id="" required>
                            </div>

                            <div class="form-group ">
                                <input class="form-control btn btn-outline-secondary mb-3" type="submit" name="save" value="Add Post" id="" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="card">
                    <h4 class="pt-2 bg-dark text-light text-center" style="height: 3rem;background-color: #000000;
  background-image: linear-gradient(147deg, #000000 0%, #04619f 74%);">All Medicines</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-dark text-light" style="height: 3rem;background-color: #000000;
  background-image: linear-gradient(147deg, #000000 0%, #04619f 74%);">
                                <tr>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Dosage Form</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Manufacturer</th>
                                    <th scope="col">Purchase Date</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Reorder level</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Stock Availability</th>
                                    <th scope="col">Min Order Quantity</th>
                                    <th scope="col">Order Frequency</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-dark">
                                <?php

                                while ($student = $query_run->fetch_assoc()) :   ?>
                                    <tr>
                                        <th scope="row"><?php echo $student['medicine_name']; ?></th>
                                        <td><?php echo $student['dosage_form'] ?></td>
                                        <td><?php echo $student['expiry_dates']?></td>
                                        <td><?php echo $student['quantity'] ?></td>
                                        <td><?php echo $student['manufacturer'] ?></td>
                                        <td><?php echo $student['purchase_date'] ?></td>
                                        <td><?php echo $student['supplier_name'] ?></td>
                                        <td><?php echo $student['reorder_level'] ?></td>
                                        <td><?php echo $student['descriptions'] ?></td>
                                        <td><?php echo $student['stock_availability'] ?></td>
                                        <td><?php echo $student['min_order_quantity'] ?></td>
                                        <td><?php echo $student['order_frequency'] ?></td>
                                        <td><?php echo $student['price'] ?></td>
                                        <td><a href="update.php?edit=<?php echo $student['id'] ?>" class="btn btn-outline-primary border border-dark rounded-pill p-2 hover-zoom"><i class="fa fa-pen"></i></a>&nbsp;
                                            <a href="pharmacy_sec.php?delete=<?php echo $student['id'] ?>" class="btn btn-outline-danger border border-dark rounded-pill p-2"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



    </div>
</section>
<!-- Image element - set the background image for the header in the line below-->
<div class="py-5 bg-image-full" style="background-image: url('images/bg.jpg')">
    <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
    <div style="height: 10rem"></div>
</div>
<!-- Content section
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Engaging Background Images</h2>
                <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>
            </div>
        </div>
    </div>
</section> -->
<!-- Footer-->


<?php require_once('includes/footer.php') ?>