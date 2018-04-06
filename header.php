<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
      <!--  <meta http-equiv="refresh" content="30" >
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
-->
        <title>Student Information System</title>

        <link rel="stylesheet" href="CSS/style2.css" type="text/css">
        <link rel="stylesheet" href="CSS/main.css" type="text/css" rel="stylesheet" media="print">

        <script type="text/javascript">
        
        function Openeditcourse(a)
        {
            var links = "courseinsert.php?slid="+a+"&view=course";
            var returnedValue = showModalDialog(link, "Passed String","dialogWidth:450px; dialogHeight:400px; status:no; center:yes");
        }

        </script>
    </head>

    <body>
        <div id="wrap"> <!-- Need a div at the footer -->
            <section id="top">
                <nav id="mainnav">
                    <h1 id="sitename" class="logotext">
                        <a href="index.php">A School Name Here</a>
                    </h1>

                    <ul>
                        <li class="active"><a href="index.php"><span>Home</span></a></li>
                        <li><a href="viewresult.php"><span>Students</span></a></li>
                        <li><a href="admin.php"><span>Admin</span></a></li>
                        <li><a href="contact.php"><span>Contact</span></a></li>
                    </ul>
                </nav>
            </section>
       <!-- Main Page below -->     
            