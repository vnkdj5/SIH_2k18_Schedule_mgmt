
<div>
<center><h3>Add User</h3></center>
<div  style="margin:30px auto; width:400px;">

<form method="post" action="index.php?folder=registrations&file=addofficer">
<div class="form-group">
      <label for="officer_name">Name *:</label>
      <input  required type="text" class="form-control" id="officer_name" placeholder="Enter Name" name="officer_name">
    </div>
    <div class="form-group">
      <label for="officer_email">Email *:</label>
      <input required type="email" class="form-control" id="officer_email" placeholder="Enter email" name="officer_email">
    </div>
    <div class="form-group">
      <label for="officer_mobile">Mobile Number *:</label>
      <input required type="number" class="form-control" id="officer_mobile" placeholder="Enter Mobile Number" name="officer_mobile">
    </div>
    <div class="form-group">
      <label for="officer_password">Password *:</label>
      <input required type="password" class="form-control" id="officer_password" placeholder="Enter password" name="officer_password">
    </div>
    <div class="form-group">
                  <label>Select Department</label>
                  <select class="form-control" id="dept" name="dept">
                    <option value="0">Electrical Department</option>
                    <option value="1">Road Department</option>
                    <option value="2">Water SUpply Department</option>
                    <option value="3">Noise Pollution Department</option>
                    <option value="4">Garbage Collection Department</option>
                    <option value="5">Street Light Department</option>
                  </select>
                </div>
    <div class="form-group">
      <label for="officer_area">Area Pincode :</label>
      <input type="number" class="form-control" id="officer_area" placeholder="Enter Pincode" name="officer_area">
   		<input type="hidden" value="true" name="add_off" id="add_off"/>
    </div>
  <center>  <button type="submit" class="btn btn-primary">Add Officer</button></center>
  </form>
  
  </div>
  </div>
  
  <?php
 if(isset($_POST['add_off']))
{
    
    $officer_name=$_POST['officer_name'];
    $officer_email=$_POST['officer_email'];
    $officer_mobile=$_POST['officer_mobile'];
    $officer_password=$_POST['officer_password'];
    $officer_dept=$_POST['dept'];
    $officer_area=$_POST['officer_area'];
    $result = $db->query("INSERT INTO officer_info (officer_name,officer_email,officer_mobile,officer_password,officer_dept_id) VALUES ('$officer_name','$officer_email','$officer_mobile','$officer_password',$officer_dept)");
    $res2=$db->query("INSERT INTO officer_work values ('$officer_email','$officer_area')");  
   
    echo "<script>window.alert(\"Registered Successfully.\");</script>";
} 
?>
