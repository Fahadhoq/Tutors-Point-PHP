
<?php
	require('db_rw.php');
    session_start();

	if( ($_SESSION['abc'] == "validParent") || isset($_COOKIE['rm']) ){
     
        $id = $_SESSION['id']; 
	 
    $sql = "SELECT * FROM parentregistration WHERE  id='$id' ";

	$result = mysqli_query($conn , $sql);
	
	if($result->num_rows != null){
		$row = mysqli_fetch_array($result);
			
		    $id = $row['id'];	
		    $name = $row['username'];
			//$password = md5($row['password']);
			$email = $row['email'];
			$mobile = $row['mobile'];
			$image  = $row['image'];
            $is_admin_approve  = $row['is_admin_approve'];
		
	}else{
		//echo "data not edit".mysqli_error($conn);
        header('location: ParentLogin.php?status=user-not-found');
	}
		 
    }else {
        header('location: ParentLogin.php?status=invalid-creadiantial');
    }
	
	if(isset($_GET['status']))
		{
			$status = $_GET['status'];

			echo $status;
		}

mysqli_close($conn);
?>



<html>
<head>
        <title>Parent home</title>
		
	
<style> 
.div1 {
    background-image: url(white-wood-texture-background-design_1022-75.jpg);
    text-align: center;
    width: 1330px;
    height: 100px;
    border: 1px solid blue;
    box-sizing: border-box;
	front-colar:white-space;
}

.div2 {
    background-image: url(white-wood-texture-background-design_1022-75.jpg);
    text-align: center;
    width: 1330px;
    height: 70px;    
    padding: 1px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div3 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: 4px 2px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div4 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: -74px 225px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div5 {
    text-align: center;
    width: 210px;
    height: 70px;    
    padding: 5px;
    margin: 4px 448px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div6 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: 10px 2px;
    border: 1px solid red;
    box-sizing: border-box;
	} 
.div7 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: -80px 225px;
    border: 1px solid red;
    box-sizing: border-box;
	} 
.div8 {
    text-align: center;
    width: 210px;
    height: 70px;    
    padding: 5px;
    margin: 10px 448px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div9 {
    text-align: center;
    width: 520px;
    height: 70px;    
    padding: 5px;
    margin: 4px 70px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div10 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: 10px 2px;
    border: 1px solid red;
    box-sizing: border-box;
	}
.div11 {
    text-align: center;
    width: 220px;
    height: 70px;    
    padding: 5px;
    margin: -80px 225px;
    border: 1px solid red;
    box-sizing: border-box;
	}                                 
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    
}

.button2:hover {
   
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row-reverse;
    flex-direction: row-reverse;
    width: 1330px;
    height: 550px;
    background-color: grey;
}

.flex-item {
    text-align: center;
    background-color: lightgrey;
    width: 665px;
    height: 550px;
    margin: 2px;
}

h1 {
   color: black;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

</style>

</head>
<body>

<div class="div1"><h1>DICCI NICCI TUTOR</h1></div>
<div class="div2">

<a href="http://localhost/PHP/dicchi-nicchi-tutor/dnt.html" class="button">Home</button></a>
<!-- <a href="http://localhost/PHP/dicchi-nicchi-tutor/Search%20a%20tutor.php" class="button">Search tutor</button></a> -->
<!-- <a href="http://localhost/PHP/dicchi-nicchi-tutor/TutorLogIn.html" class="button">Search tution</button></a> -->
<a href="http://localhost/PHP/dicchi-nicchi-tutor/Contact.html" class="button">Contact </button></a>
<!-- <a href="http://localhost/PHP/dicchi-nicchi-tutor/AdminLogin.php" class="button">Admin</button></a> -->
<a href='Parentlogout.php' class="button"> logout</a> <br/><br/>;

</div>


<div class="flex-container">
   

  <div class="flex-item">
  <h1>User Name : <?php echo $name ?> </h1> <br>
  <a href="http://localhost/PHP/dicchi-nicchi-tutor/ParentInfoUpdate.php?userid=<?php echo $id ?> " class="button" > UPDATE Information </a></br>

  </div>

<div class="flex-item">
<h1>Parent Home  </h1>
 
    <div class="container">
                <?php if($is_admin_approve == 0){
                    $output = '<div class="div9">';
                         $output .= '<a href="" class="button">Account is Not Verifyed Yet. Please Wait For Admin Approve</a> <br>';
                    $output .= '</div>'; 

                    echo $output;
                }else{

                    $output = '<div class="div3">';
                       $output .= '<a href="http://localhost/PHP/dicchi-nicchi-tutor/Search%20a%20tutor.php" class="button">Search tutor</a> <br>';
                    $output .= '</div>';    
                    $output .= '<div class="div4">';
                      $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/Parent_Tution_Request.php"   class="button">Tution Request </a> </br>';
                    $output .= '</div>';
                    $output .= '<div class="div5">';    
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/Parent_Teacher_List.php" class="button">My Teacher List</a> </br>';
                    $output .= '</div>';
                    $output .= '<div class="div6">';    
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/AddStudent.php" class="button">Add Student</a> </br>';
                    $output .= '</div>';  
                    $output .= '<div class="div7">';    
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/Parent_All_Student.php" class="button">All Students List</a> </br>';
                    $output .= '</div>'; 
                    $output .= '<div class="div8">';
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/ParentComplain.php"   class="button">payment</a> </br>';
                    $output .= '</div>';
                    $output .= '<div class="div10">';
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/Add_Student_Tution.php"   class="button"><small> Add Student Tution </small></a> </br>';
                    $output .= '</div>';
                    $output .= '<div class="div11">';
                        $output .= '<a  href="http://localhost/PHP/dicchi-nicchi-tutor/Parent_students_Tution_list.php"   class="button"><small> Student Tution List </small></a> </br>';
                    $output .= '</div>';
                    
                    echo $output;

                } ?>
                
            

    </div>

</div>

</div>

</body>
</html>
