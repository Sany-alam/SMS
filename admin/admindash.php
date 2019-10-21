<?php session_start();
if (isset($_SESSION['id'])) {
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/index.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<link rel="stylesheet" href="../fonts/css/font-awesome.min.css">
	<script src="../js/jquery-slim.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/ajax.min.js"></script>
  <script src="../js/jquery-3.4.1.min.js">

  </script>
	<title>sms</title>
</head>
<body>
  <nav class="navbar bg-dark text-light">
	 <div class="container">
		 <h1>Darul marif</h1>
  	 	<a href="../logout.php">
         <button  type="button" class="btn btn-outline-light">Logout</button>
      </a>
	 </div>
	</nav>
	<!-- start body content -->

  <div class="container">
    <style media="screen">
    .first-table
    {
      margin-top: 20px;
    }
    .studentsearchresult
    {
      width: 100%;
    }
    .studentsearchresult tr
    {
      border-bottom: 1px solid #ddd;
    }
    /* .studentsearchresult tr:first-child td:first-child {
      width: 14vw;
      padding: 3vw 1vw 1vw 1vw;
    } */
      .studentsearchresult tr td
      {
        width: 14vw;
        padding: 2vw 1vw 1vw 1vw;
      }
      .studentsearchresult tr td h3{
        font-size: 2vw;
      }
      .studentsearchresult tr td p
      {
        font-size: 1.3vw;
      }
      .studentsearchresult tr td h5
      {
        font-size: 2vw;
      }
      table.studentsearchresult
      {
        border: 1px solid #000;
      }
      .studentsearchresult tr td input
      {
        font-size: 1.2vw;
    padding: 0.6vw;
      }
      .studentsearchresult tr td select
      {
        font-size: 1.2vw;
    padding: 0.6vw;
      }
      .studentsearchresult tr td select.form-control:not([size]):not([multiple])
      {
        height: 3.2vw!important;
      }
      .studentsearchresult tr td button
      {
        height: 3.2vw!important;
        font-size: 1.2vw;
      }
      /* #StudentSearchResult
      {
        height:300px;
        border-bottom: 1px solid #ddd;
      } */
      .second-table
      {
        display: block;
    height: 320px;
    overflow-y: scroll;
      }
      .second-table::-webkit-scrollbar
      {
        width: 10px;
      }
      .second-table::-webkit-scrollbar-thumb
      {
        background: #ddd;
        border-radius: 50px;
      }
    </style>
    <table class="studentsearchresult text-center first-table">
      <thead>
        <tr>
          <td colspan="2">
            <h5>Search students</h5>
          </td>
          <td>
            <input type="text" id="tdsName" class="form-control" placeholder="Enter full name">
          </td>
          <td>
            <select id="tdsClass" class="form-control">
              <option value="">Chose Class</option>
              <option value="1">1st</option>
              <option value="2">2nd</option>
              <option value="3">3rd</option>
              <option value="4">4th</option>
              <option value="5">5th</option>
              <option value="6">6th</option>
              <option value="7">7th</option>
              <option value="8">8th</option>
              <option value="9">9th</option>
              <option value="10">10th</option>
              <option value="11">11th</option>
              <option value="12">12th</option>
            </select>
          </td>
          <td>
            <input type="number" id="tdsRoll" class="form-control" placeholder="Enter roll number">
          </td>
          <td>
            <button type="submit" id="tdsSubmit" onclick="tdsSubmit()" class="btn btn-block btn-primary"><i class="fa fa-search"></i></button>
          </td>
          <td>
            <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block">
              add data
            </button>
          </td>
        </tr>
        <tr>
          <td><h3>Name</h3></td>
          <td><h3>Class</h3></td>
          <td><h3>Roll</h3></td>
          <td><h3>Address</h3></td>
          <td><h3>Contact</h3></td>
          <td></td>
          <td></td>
        </tr>
      </thead>
    </table>
    <table  class="studentsearchresult text-center second-table">
      <tbody id="StudentSearchResult">

      </tbody>
    </table>
    <!-- modals............................................ -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input id="Fullname" type="text" class="form-control my-3" placeholder="Enter student's Fullname">
              <input id="Standard" type="number" class="form-control my-3" placeholder="Enter student's Standard">
              <input id="Roll" type="number" class="form-control my-3" placeholder="Enter student's Roll number">
              <input id="Address" type="text" class="form-control my-3" placeholder="Enter student's Address">
              <input id="Contact" type="number" class="form-control my-3" placeholder="Enter student's Contact number">
              <input id="Image" type="file" class="form-control my-3" placeholder="Enter student's Image">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button onclick="save()" type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  showdata();
});

// add data
function save()
{
  var name = $("#Fullname").val();
  var standard = $("#Standard").val();
  var roll = $("#Roll").val();
  var address = $("#Address").val();
  var contact = $("#Contact").val();
  var image = $("#Image").val();
  var formdata = new FormData();
  formdata.append('name',name);
  formdata.append('standard',standard);
  formdata.append('roll',roll);
  formdata.append('address',address);
  formdata.append('contact',contact);
  formdata.append('image',image);
  formdata.append('save',"save");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
      alert(data);
      showdata();
    }
  });
}

// search student
function search()
{
    var sname = $("#sFullname").val();
    var sstandard = $("#sStandard").val();
    var formdata = new FormData();
    formdata.append('sname',sname);
    formdata.append('sstandard',sstandard);
    formdata.append('search',"search");
    $.ajax({
      processData:false,
      contentType:false,
      data:formdata,
      type:"post",
      url:"data.php",
      success:function(data,status)
      {
        $("#sedit_student_form").html(data);

      }
    });
}
// update student data
function update(id)
{
  // var id = zz;
  var name = $("#updatename"+id).val();
  var standard = $("#updatestandard"+id).val();
  var roll = $("#updateroll"+id).val();
  var city = $("#updatecity"+id).val();
  var contact = $("#updatecontact"+id).val();
  // alert(id+name+standard+roll+city+contact);
  var formdata = new FormData();
  formdata.append('name',name);
  formdata.append('standard',standard);
  formdata.append('roll',roll);
  formdata.append('city',city);
  formdata.append('contact',contact);
  formdata.append('update',"update");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
      // "Updated successfully! "+
      showdata();
      alert(data);

    }
  });
}

function tdsSubmit()
{
  var name = $("#tdsName").val();
  var standard = $("#tdsClass").val();
  var roll = $("#tdsRoll").val();
  var formdata = new FormData();
  formdata.append('name',name);
  formdata.append('standard',standard);
  formdata.append('roll',roll);
  formdata.append('tdsSubmit',"tdsSubmit");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
      // alert(data);
      $("#StudentSearchResult").html(data);


    }
  });
}

// show data in table
function showdata()
{
  var formdata = new FormData;
  formdata.append("showdata",'showdata');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data,status)
    {
      // alert(data);
      $("#StudentSearchResult").html(data);

    }
  });
}
// delete data
function Delete(id)
{
  var formdata = new FormData;
  formdata.append("id",id);
  formdata.append("Delete",'Delete');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data,status)
    {
      alert(data);
      showdata();
    }
  });
}

</script>
</html>

  <?php
}
else {
  header("location:../login.php");
  $_SESSION['msg']="Login please";
}
?>
