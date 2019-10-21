<?php
include("../connection.php");
session_start();

// add data
if (isset($_POST['save']))
{
  $Fullname = $_POST['name'];
  $Roll = $_POST['roll'];
  $Standard = $_POST['standard'];
  $Contact = $_POST['contact'];
  $Address = $_POST['address'];
  // $Image = $_FILES['image']['name'];
  // $Imagetmp = $_FILES['image']['tmp_name'];
  // move_uploaded_file($Imagetmp,"../data_images/$Image");
  // file_put_contents("text.txt",$Fullname."<br />".$Roll."<br />".$Standard."<br />".$Contact."<br />".$Address);

  $q = "INSERT INTO student(name,roll,standard,contact,city) VALUES ('$Fullname','$Roll','$Standard','$Contact','$Address')";
  $done = mysqli_query($conn,$q);
  if ($done) {
    echo $Fullname."  ".$Roll."  ".$Standard."  ".$Contact."  ".$Address;
  }

}

// update editdet data by modal
if (isset($_POST['update']))
{
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $standard = $_POST['standard'];
  $contact = $_POST['contact'];
  $city = $_POST['city'];

  $qq = "UPDATE student SET name='$name',roll='$roll',standard='$standard',contact='$contact',city='$city' where name = '$name' and standard = '$standard'";
  $ress = mysqli_query($conn,$qq);
    // echo $name."  ".$standard."  ".$roll."  ".$city."  ".$contact;
    echo "updated successfully!";
}


// search result
if (isset($_POST['tdsSubmit'])) {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $standard = $_POST['standard'];
 // echo $name." ".$standard." ".$roll;
 $q = "SELECT * FROM student WHERE  name = '$name' or standard = '$standard' or roll = '$roll'";
 $res = mysqli_query($conn,$q);
 if (mysqli_num_rows($res)>0)
 {
   while ($colums = mysqli_fetch_array($res))
   {
     $n = $colums['name'];
     $c = $colums['standard'];
     $r = $colums['roll'];
     $a = $colums['city'];
     $co = $colums['contact'];
     $id = $colums['id'];
     ?>
     <tr>
       <td><p><?php echo $n ?></p></td>
       <td><p><?php echo $c ?></p></td>
       <td><p><?php echo $r ?></p></td>
       <td><p><?php echo $a ?></p></td>
       <td><p><?php echo $co ?></p></td>
       <td>
         <input type="button" class="btn btn-warning" value="Edit" data-toggle="modal" data-target="#editmodal?id=<?php echo $id; ?>">
                        <!-- edit    modal -->
         <div id="editmodal?id=<?php echo $id; ?>" class="modal fade" role="dialog">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Add data</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                 <div class="form-group">
                   <input id="updatename<?php echo $id; ?>" type="text" class="form-control my-3" placeholder="Enter student's Fullname" value="<?php echo $n; ?>">
                   <input value="<?php echo $c; ?>" id="updatestandard<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Standard">
                   <input value="<?php echo $r; ?>" id="updateroll<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Roll number">
                   <input value="<?php echo $a ?>" id="updatecity<?php echo $id; ?>" type="text" class="form-control my-3" placeholder="Enter student's Address">
                   <input value="<?php echo $co ?>" id="updatecontact<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Contact number">
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button onclick="update(<?php echo $id; ?>)" type="button" class="btn btn-primary" data-dismiss="modal">Udate</button>
               </div>
             </div>
           </div>
         </div>
       </td>
       <td>
         <input type="button" class="btn btn-danger" value="Delete" onclick="Delete(<?php echo $id; ?>)">
       </td>
     </tr>
     <?php
   }
 }
 else {
   echo "<h1 class='display-5'>Invalid Data</h1>";
 }
}

// show data
if (isset($_POST['showdata'])) {
  $q = "SELECT * FROM student order by id desc";
  $res = mysqli_query($conn,$q);
  if (mysqli_num_rows($res)>0) {
    while ($stuf = mysqli_fetch_array($res))
    {
        $n = $stuf['name'];
        $c = $stuf['standard'];
        $r = $stuf['roll'];
        $a = $stuf['city'];
        $co = $stuf['contact'];
        $id = $stuf['id'];
        ?>
        <tr>
          <td><p><?php echo $n; ?></p></td>
          <td><p><?php echo $c; ?></p></td>
          <td><p><?php echo $r; ?></p></td>
          <td><p><?php echo $a; ?></p></td>
          <td><p><?php echo $co; ?></p></td>
          <td>
            <input type="button" class="btn btn-warning" value="Edit" data-toggle="modal" data-target="#editmodal<?php echo $id; ?>">
                    <!-- edit       modal -->
            <div id="editmodal<?php echo $id; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input id="updatename<?php echo $id; ?>" type="text" class="form-control my-3" placeholder="Enter student's Fullname" value="<?php echo $n; ?>">
                      <input value="<?php echo $c; ?>" id="updatestandard<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Standard">
                      <input value="<?php echo $r; ?>" id="updateroll<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Roll number">
                      <input value="<?php echo $a; ?>" id="updatecity<?php echo $id; ?>" type="text" class="form-control my-3" placeholder="Enter student's Address">
                      <input value="<?php echo $co; ?>" id="updatecontact<?php echo $id; ?>" type="number" class="form-control my-3" placeholder="Enter student's Contact number">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="update(<?php echo $id; ?>)" type="button" class="btn btn-primary" data-dismiss="modal">Udate</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td>
            <input type="button" class="btn btn-danger" value="Delete" onclick="Delete(<?php echo $id; ?>)">
          </td>
        </tr>
        <?php
    }
  }
}


// delete data
if (isset($_POST['Delete'])) {
  $id = $_POST['id'];
  $q = "DELETE FROM `student` WHERE id = $id";
  if (mysqli_query($conn,$q)) {
    echo "Successfully deleted!";
  }
  else {
    echo "something went wrong!";
  }
  // echo $id;
}
 ?>
