<?php
require '../../config.php';

require BLA . 'inc/header.php';
require BL . 'functions/validate.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = mysqli_escape_string($conn, $_POST['name']);
    if (checkEmpty($city) && checkLess($city, 3)) {
        try {
            $sql = "INSERT INTO `cities` (`city_name`)VALUES('$city')";
            $success_message = db_insert($sql);
        } catch (Exception $e) {
            $error_message = "duplicate city name , add new one";
        }
    } else {
        $error_message = "please fill all the fields";
    }
    $googleMap = "<iframe width=100% height=500px src='https://www.google.com/maps?q=$city&output=embed'></iframe>";
}
?>
<?php require BL . 'functions/messages.php'; ?>
<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name Of City</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>
    <div class="m-4">

        <?php if (isset($_POST['name'])) {
            echo $googleMap;
        }
        ?>
    </div>


</div>


<?php require BLA . 'inc/footer.php';  ?>