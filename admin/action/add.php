<?php
require_once("../../config.php");
require_once(BLA . "inc/header.php");
require_once(BL . "functions/validate.php");

?>
<?php
$error_fields = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    if (checkEmpty($name) and checkEmpty($email) and checkEmpty($password)) {
        if (validateEmail($email)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // insert_statement
            $sql = "INSERT INTO `admin` set `admin_name`='$name',`admin_email`='$email',`admin_password`='$hashed_password'";

            $success_message = db_insert($sql);
        } else {
            $error_message = "Add correct email";
        }
        if (validatePassword($password)) {
        } else {
            $error_message = "Add password more than 5 character";
        }
    } else {
        $error_message = "Please fill all the fields";
    }
    require_once(BL . "functions/messages.php");
}
?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
    <!--will send the data at same page -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>
</div>




<?php
require_once(BLA . "inc/footer.php");
