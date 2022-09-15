<?php
session_start();
    include '../setAndGetActivity.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newstyle.css">
    <title>Delete Account</title>
</head>
<body>
    <div id="BG">
    <?php
    if (isset($_SESSION['uid'])===true){
    include '../headers/loggedin.php';
    } else{
        include '../headers/notloggedin.php';
}
$delete = true;
$userid = $_SESSION['uid'];
echo "<form method='POST' action='".deleteuser($userid)."'>
<p>Are you sure you want to delete your account?</p>
<input type='hidden' id='uid' value='".$userid."'>
<button type ='submit' name='yesdelete' value='".$userid."' class='btn9'>Yes</button>
</form>";
?>
<form action="homepage.php">
<button type ='submit' name='nodelete' class='btn8'>No</button>
</form>
    </div>

</body>
</html>