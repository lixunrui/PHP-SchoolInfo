<?php 
    include("connection/connection.php");

    if(isset($_GET['resid']))
    {
        $rid=$_GET['resid'];
    }
    else
    {
        $rid = $_POST['rollno'];
    }

    $stmt = $con->prepare("SELECT * FROM studentdetails WHERE studid='$rid'");

    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $results = $stmt->fetchAll();
    foreach( $results as $result)
    {
        $regno = $result['studid'];
        $name = $result['studfname'] . " " . $result['studlname'] ;
        $fathersname = $result['fathername'];
        $course = $result['courseid'];
        $semester = $result['semester'];
        $dob = $result['dob'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Result</title>
        <style>
            html {
                background:#fff; height=100%; width=100%;
            }
            body{
                background:#f4f4f4; width=500px; margin=25px auto 25px;
                test-align=center; display:block; border:solder 1px #ccc; font:normal 14px "Trebuchet MS", Arial, Helvetica, sans-serif; line-height:22px; padding:50px;
            }
            a {color:#F60;}
        </style>
    </head>

    <body>
        <form action="" name="form1" method="post">
            <p>
                <label for="textfield">Reg No:</label>
                <?php echo $regno; ?>
            </p>
            <p>
                <label for="textfield3">Fathers Name:</label> 
                <?php echo $fathersname; ?> 
            </p>
            <p>
                <label for="select">Course</label>:
                <?php echo $course; ?> 
            </p>
            <p>
                <label for="select2">Semester</label>:
                <?php echo $semester; ?>
            </p>
            <p>
                <label for="textfield4">DOB</label>:  
                <?php echo $dob; ?>
            </p>
            
            <hr><!-- a line break -->

            <table width="483" height="96" border="1">
                <tr>
                    <td width="141">Subject</td>
                    <td width="67">Semester</td>
                    <td width="241">Comment</td>
                </tr>
                <tr>
                    <?php 
                        foreach( $results as $result)
                        {
                            $query = $con->prepare("SELECT * FROM subject WHERE subid=:subid");
                            $query->bindParam(':subid',$result['studid']);
                            $query->execute();
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            $queryResult = $query->fetchAll();
                            foreach($queryResult as $result)
                            {
                                echo "<tr>";
                           
                            echo "<td>&nbsp". $result['subname'] ."</td>";
                                echo "<td>&nbsp;". $result['semester']."</td>";
                                echo "<td>&nbsp;". $result['comment']."</td>";
                            }
                        }
                    ?>
                </tr>
            </table>
            
            <a href="viewresult.php"><strong>&lt;&lt;Back</strong></a>
        </form>
    </body>
</html>