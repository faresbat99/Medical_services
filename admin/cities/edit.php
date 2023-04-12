<?php
require '../../config.php';

require BLA . 'inc/header.php';
?>
<?php


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $row = getRow('cities', 'city_Id', $_GET['id']);
    if ($row) {
        $city_id = $row['city_Id'];
    } else {
        header('Location: ' . BURLA);
    }
} else {
    header('Location: ' . BURLA);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
    $city=mysqli_escape_string($conn,$_POST['name']);
    $sql = "UPDATE `cities` SET `city_name` = '" . $name;
    $success_message = db_insert($sql);
} catch (Exception $e) {
    $error_message = "duplicate city name , add new one";
}
$googleMap = "<iframe width=100% height=500px src='https://www.google.com/maps?q=$city&output=embed'></iframe>";
}
?>
<?php require BL . 'functions/messages.php'; ?>
<div class="col-sm-6 offset-sm-3 border p-3">   
    <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
    <form method="post" action="<?php echo BURLA . 'cities/update.php'; ?>">
        <div class="form-group">
            <label>Name Of City</label>
            <input type="text" name="name" value="<?php echo $row['city_name'];  ?>" class="form-control">
            <input type="hidden" name="city_Id" value="<?php echo $city_id; ?>" class="form-control">
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