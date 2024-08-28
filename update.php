<?php
$currentPage = "Pharmacy";

session_start();

if (!isset($_COOKIE['session_id']) || $_COOKIE['session_id'] != session_id()) {
  header('Location: index.php');
  exit;
}

if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}

//session_start();
require_once('includes/header.php');




if (isset($_POST['edit_btn'])) {
    $med_name1 = escape($_POST['med_name']);
    $med_form1 = escape($_POST['med_form']);
    $med_manufac1 = escape($_POST['med_manufac']);
    $med_expiry_date1 = escape($_POST['med_expiry_date']);
    $med_supplier_name1 = escape($_POST['med_supplier_name']);
    $med_quantity1 = escape($_POST['med_quantity']);
    $med_reorder_level1 = escape($_POST['med_reorder_level']);
    $med_price1 = escape($_POST['med_price']);
    $med_description1 = escape($_POST['med_description']);
    $med_stock_availability1 = escape($_POST['med_stock_availability']);
    $med_min_order_quantity1 = escape($_POST['med_min_order_quantity']);
    $med_order_frequency1 = escape($_POST['med_order_frequency']);
    $med_purchase_date1 = escape($_POST['med_purchase_date']);
    $p_id = escape($_POST['p_id']);

    $query2 = "UPDATE medicine_stock
    SET medicine_name = '$med_name1',
        dosage_form = '$med_form1',
        expiry_dates = '$med_expiry_date1',
        quantity = '$med_quantity1',
        manufacturer = '$med_manufac1',
        purchase_date = '$med_purchase_date1',
        supplier_name = '$med_supplier_name1',
        reorder_level = '$med_reorder_level1',
        descriptions = '$med_description1',
        stock_availability = '$med_stock_availability1',
        min_order_quantity = '$med_min_order_quantity1',
        order_frequency = '$med_order_frequency1',
        price = '$med_price1' 
    WHERE id='$p_id'";

    $query_run2 = mysqli_query($connection, $query2);
    if (!$query_run2) {
        echo "Connection error";
    }else{
        header('location: pharmacy_sec.php');
    }
} 


?>
<form action="" method="post">
                        <?php
                        if(isset($_GET['edit'])){
                            $id = $_GET['edit'];
                        
                            $query3 = "SELECT * FROM medicine_stock WHERE id='$id'";
                            $query_run3 = mysqli_query($connection, $query3);
                            
                        }
                         while($stu = $query_run3->fetch_assoc()) :
                        ?>
                        <div class="modal-body">
                        <div class="form-group">
                                <input class="form-control" type="hidden" name="p_id" value="<?php echo $stu['id'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Medicine Name</label>
                            <input class="form-control" type="text" name="med_name" value="<?php echo $stu['medicine_name'] ?>" id="">
                            </div>
                            <div class="form-group">
                                <label for="name">Dosage Form</label>
                                <input class="form-control" type="text" name="med_form" value="<?php echo $stu['dosage_form'] ?>" id="">
                            </div>

                            <div class="form-group">
                                <label for="username">Expiry Date</label>
                                <input class="form-control" type="date" name="med_expiry_date" value="<?php echo $stu['expiry_dates'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Quantity</label>
                                <input class="form-control" type="number" name="med_quantity" value="<?php echo $stu['quantity'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Manufacturer</label>
                                <input class="form-control" type="text" name="med_manufac" value="<?php echo $stu['manufacturer'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Purchase Date</label>
                                <input class="form-control" type="date" name="med_purchase_date" value="<?php echo $stu['purchase_date'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Supplier Name</label>
                                <input class="form-control" type="text" name="med_supplier_name" value="<?php echo $stu['supplier_name'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Reorder Level</label>
                                <input class="form-control" type="number" name="med_reorder_level" value="<?php echo $stu['reorder_level'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Description</label>
                                <input class="form-control" type="text" name="med_description" value="<?php echo $stu['descriptions'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Stock Availability</label>
                                <input class="form-control" type="number" name="med_stock_availability" value="<?php echo $stu['stock_availability'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Minimum Order Quantity</label>
                                <input class="form-control" type="number" name="med_min_order_quantity" value="<?php echo $stu['min_order_quantity'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Order Frequency</label>
                                <input class="form-control" type="number" name="med_order_frequency" value="<?php echo $stu['order_frequency'] ?>" id="">

                            </div>
                            <div class="form-group">
                                <label for="email">Price</label>
                                <input class="form-control" type="number" step="0.01" name="med_price" value="<?php echo $stu['price'] ?>" id="">

                            </div>
                            <?php endwhile ?>
                        </div>
                        <div class="form-footer d-flex justify-content-center">
                            
                            <button type="submit" name="edit_btn" class="m-3 form-control btn btn-outline-primary">Save changes</button>
                        </div>
                    </form>


                    <?php require_once('includes/footer.php');
 ?>