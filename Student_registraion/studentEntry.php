<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Database Connection</title>
        
         <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
            
      <div id="wrapper">  
          <div id="page-wrapper" class="container"> 
          
        <form method="POST">
          <fieldset>  
            <legend>Student Registration </legend>
            Student Name: <input type="text" name="student_name" placeholder="Enter your name"/><br/>
            Creation Date: <input type="date" name="created_date" placeholder="Enter today's date"/><br/>
            <input type="submit" name="submit" value="Register" /><br/>           
          </fieldset>          
        </form>
              
        <?php
        {
            require_once 'student.php';
            require_once 'db.php';
            //session_start();
            if (isset($_POST['submit']))
            {
                $student = new Student($_POST['student_name'], $_POST['created_date']);
                //$_SESSION['student'] = $student;
                //print_r($_SESSION['student']);
                //exit();
                // escape variables for security
                $student_name = mysqli_real_escape_string($con, $_POST['student_name']);
                $creation_date = mysqli_real_escape_string($con, $_POST['created_date']);
                
                $sql = mysqli_query($con, "INSERT INTO Students (student_name, created)
                VALUES ('$student_name', '$creation_date')") ; 
                
//                if (!mysqli_query($con,$sql)) 
//                {
//                  die('Error: ' . mysqli_error($con));
//                }
                echo "1 record added.";
                echo '<br/>'."Student database updated.";

                mysqli_close($con);
                
            }
        }   
        ?>
        
              
         </div> <!--page-wrapper ends -->       
      </div> <!-- wrapper ends -->       
              
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
        
    </body>
</html>

