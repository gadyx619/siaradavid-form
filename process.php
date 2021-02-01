<?php
session_start();
include('conn.php');
$id=0;
   $fname='';
   $lname='';
   $age='';  
   $email='';
   $pass='';
   $gender='';
   $dob='';   
   $cbox='';
   
$update='false';
if(isset($_POST['save'])){
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $age=$_POST['age'];
   $email=$_POST['email'];
   $pass=$_POST['pass'];
   $dob=$_POST['date'];
   $cbox=$_POST['cbox'].'  '.$_POST['cbox2'];
   $gender=$_POST['male'];
   $gender2=$_POST['female'];
   $gen=$gender;
   
        
        header("Location:index.php");
// Crud Insert
$query="INSERT INTO data(fname,lname,age,email,pass,gender,cbox,dob) VALUES('$fname','$lname','$age','$email','$pass','$gen','$cbox','$dob')";
$weka=mysqli_query($conn,$query);?>
<script>
$('#savebtn').on('click', function() {
    Swal.fire({
        title: 'Successfully Inserted',
        icon: 'success',
        text: 'Taarifa Zako Zimetumwa'

    })
});
</script>
<?php
}
// Crud Delete
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query2="DELETE FROM data where did=$id";
$futa=mysqli_query($conn,$query2);
       
}

if(isset($_GET['edit'])){
$id=$_GET['edit'];
$update=true;
$query3="SELECT * FROM data WHERE did=$id ";
$ed=mysqli_query($conn,$query3);
$check=mysqli_num_rows($ed);

if($check==1){
        $row = mysqli_fetch_array($ed);
        $fname=$row['fname'];
        $lname=$row['lname'];
        $age=$row['age'];
        $email=$row['email'];
        $pass=$row['pass'];
        $dob=$row['dob'];
        $cbox=$row['cbox'];
        
        }
}
if(isset($_POST['update'])){
        $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $age=$_POST['age'];
   $email=$_POST['email'];
   $pass=$_POST['pass'];
   $dob=$_POST['date'];
   $cbox=$_POST['cbox'].'  '.$_POST['cbox2'];
   $gender=$_POST['male'];
   $gender2=$_POST['female'];
   $gen=$gender;
   
$query5="UPDATE data SET fname='$fname', lname='$lname',age='$age',email='$email',pass='$pass',gender='$gen',cbox='$cbox',dob='$dob' WHERE did=$id";
$res=mysqli_query($conn,$query5);

header("Location:index.php?#tebo");
}

?>
