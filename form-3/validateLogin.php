<?php
//session_start();

	if(isset( $_POST['submit_loginform']))
	{
 		function validate_data($data)
 		{
 	 		$data = trim($data);
  			$data = stripslashes($data);
  			$data = strip_tags($data);
  			$data = htmlspecialchars($data);
  			/*$data = mysqli_real_escape_string($data);*/
  			return $data;    
 		}

 		$regid = validate_data( $_POST['form-username'] );
 		$password = validate_data( $_POST['form-password'] );

 		$host = 'localhost';
 		$user = 'root';
 		$pass = '';
 		
 		$con=mysqli_connect($host, $user, $pass,'Movie_System');
 		if(mysqli_connect_errno())
 		{
			echo "Error while connecting ".mysqli_connect_error()."<br/>";
		}

 		$sql="SELECT Password,Username FROM Customer WHERE ".$regid."=Customer_ID;";
 		
		if ($result=mysqli_query($con,$sql))
  		{
  			// Fetch one and one row
  			$row=mysqli_fetch_row($result);
    		if ($row[0]==$password)
    		{
    			/*header('Location: /Movie-Recommendation-System/form-3/AfterCustomerLogin/CustomerPage.html');
    			echo "You have successfully logged in.<br /><br /><a href='/Movie-Recommendation-System/form-3/AfterCustomerLogin/CustomerPage.html'>Vist the website</a>";
    			echo "row[0] = ".$row[0];*/
    			
    			//$_SESSION['user'] = $regid;
                header("Location: /Movie-Recommendation-System/form-3/AfterCustomerLogin/CustomerPage.php?username=".urlencode($row[1])."&regid=".urlencode($regid));
    		}
    		else
    		{
    			echo "Invalid password.<br /><br />Please login again with valid details";
    			header( "Refresh:2; url=/Movie-Recommendation-System/form-3/login.html#", true, 303);
    		}
  			// Free result set
  			mysqli_free_result($result);
		}
		else
		{
			echo "Invalid registration ID.<br /><br />Please login again with valid details";
    		header( "Refresh:2; url=/Movie-Recommendation-System/form-3/login.html#", true, 303);
		}

 		mysqli_close($con);
	}
?>




