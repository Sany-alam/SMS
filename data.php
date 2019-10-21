<?php
include("connection.php");
if (isset($_POST['login'])) {

	$u=$_POST['username'];
  $p=$_POST['password'];
// file_input_contents("text.txt",$email.$password);
    $sql = "SELECT * FROM admin where username = '$u' and password = '$p'";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);

    if ($num>0) {
      $cols = mysqli_fetch_assoc($res);
      $id = $cols['id'];
      // echo $id;
      session_start();
      $_SESSION['id']=$id;
			echo "ok";
    }
    else {
			session_start();
    $_SESSION['msg'] = "credentials not mached!";
		echo "not";
    }

}


if (isset($_POST['showresult'])) {
	$ll = $_POST['roll'];
	$ard = $_POST['standard'];

	$q = "SELECT * FROM student where roll = '$ll' and standard = '$ard'";
	$r = mysqli_query($conn,$q);
	if (mysqli_num_rows($r)>0) {
		$z = mysqli_fetch_assoc($r);
		$name = $z['name'];
		$standard = $z['standard'];
		$roll = $z['roll'];
		$city = $z['city'];
		$contact = $z['contact'];
			// echo $name." ".$standard." ".$roll." ".$city." ".$contact;
			?>
			<form>
				<div class="form-group">
					<label for="name">student name</label>
					<input class="form-control" type="text" name="" value="<?php echo $name; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="name">standard of student</label>
					<input class="form-control" type="text"value="<?php echo $standard; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="name">Roll no -</label>
					<input class="form-control" type="text" value="<?php echo $roll; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="name">student from -</label>
					<input class="form-control" type="text"value="<?php echo $city; ?>" disabled>
				</div>
				<div class="form-group">
					<label for="name">guardian contact no</label>
					<input class="form-control" type="text" value="<?php echo $contact; ?>" disabled>
				</div>
			</form>
			<?php
	}
}






































































?>
