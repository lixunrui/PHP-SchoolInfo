<?php session_start();
    include("header.php");
    include("connection/connection.php");
?>

<section id="page">
    <header id="pageheader" class="homeheader">
        <h2 class="sitedescription">...</h2>
    </header>

    <section id="contents">
        <article class="post">
            <header class="postheader">
                <h2><a href="result.php">Student Registration No.</a></h2>
            </header>

            <form action="result.php" method="post" name="form1">
                <p>
                    <label for="textfield2">Roll No</label>
                    <input type="text" name="rollno" id="textfield2">
                </p>
                <p>
                    <input type="submit" name="button2" id="button2" value="Submit">
                </p>
            </form>
        </article>

        <article class="post">
            <header class="postheader">
                <h2>Search by Name and Class</h2>
            </header>
            <form action="" name="form2" method="post">
                <p>
                    <label for="textfield3">Name</label>
                    <input type="text" name="textfield2" id="textfield3">
                </p>
                <p>
                <label for="select">Course</label>
                <?php
                    $stmt = $con->prepare("SELECT * FROM course");
                    ?>
                    
                    <select name="select" id="select" width="100px">
                    <?PHP
                        $stmt->execute();
                       // $resources=$stmt->setFetchMode(PDO::FETCH_ASSOC);

                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            $courseid = $row['courseid'];
                            $coursekey = $row['coursekey'];
                            echo "<option value='$courseid'>$coursekey</option>";
                        }
                    ?> 
                    </select>
                    </p>

                    <p>
                    <input type="submit" value="Submit" name="submitresult" id="submitresult">
                    </p> 
                   
            </form>


            <form action="viewresult.php" name="form2" method="post">
                <table>
                    <tr>
                        <td width="136"><strong>Student ID</strong></td>
                        <td width="80"><strong>Name</strong></td>
                        <td width="80"><strong>Fathers Name</strong></td>
                        <td width="73"><strong>Semester</strong></td>
                        <td width="90"><strong>View</strong></td>
                    </tr>

                    <?php 
                    if(isset($_POST['submitresult']))
                    {
                       
                        $stmt2 = $con->prepare("SELECT * FROM  studentdetails WHERE (studfname LIKE :studFirstName OR studlname LIKE :studLastName) AND courseid=:selectCourseid");
    
                        $stmt2->bindParam(':studFirstName',$fname, PDO::PARAM_STR);
                        
                        $stmt2->bindParam(':studLastName',$_POST['textfield2'], PDO::PARAM_STR);
                        
                        $stmt2->bindParam(':selectCourseid',$_POST['select'], PDO::PARAM_INT);

                        $stmt2->execute();
                        //$fname = $_POST['textfield2'];
                        //$lname=$_POST['textfield2'];
                       
                       // $stmt2->execute(array($_POST['textfield2'],$_POST['textfield2'], $_POST['select']));
                        //$stmt2->setFetchMode(PDO::FETCH_ASSOC);    
                    }
                    
  
                if(isset($stmt2))
                {
                    while($row = $stmt2->fetch(PDO::FETCH_ASSOC))
                    {
                    ?>
                        <tr>
                            <td>&nbsp; <?php echo $row['studid']; ?></td>
                            <td>&nbsp; <?php echo $row['studfname']." ".$row['studlname']; ?></td>
                            <td>&nbsp; <?php echo $row['fathername']; ?></td>
                            <td>&nbsp; <?php echo $row['semester']; ?></td>
                            <td><a href="result.php?resid=<?php echo $row['studid'] ?>"><img src="images/view.png" width="26" height"26" alt=""></a></td>
                        </tr>
                        <?php
                    } 
                }?>
                    
                </table>
            </form>
            <p>&nbsp;</p>
        </article>
    </section>

    <section id="sidebar">
    </section>

    <section id="sidebar">
    <h2>&nbsp;</h2>
    <ul>
	    <li></li>
    </ul>
    <h2>&nbsp;</h2>
    <ul>
	    <li></li>
    </ul>
    </section>
    <div class="clear"></div>
    <div class="clear"></div>
</section>

<?php include("footer.php") ?>
