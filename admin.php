<?php 
session_start();
if(isset($_SESSION['userid']))
{
    if($_SESSION['type'] == "admin")
    {
        header("Location: dashboard.php");
    }
    else
    {
        header("Location: lectureaccount.php");
    }
}

include("header.php");
include("connection/connection.php");

if(isset($_POST['uid']) && isset($_POST['pwd']))
{
    $query= $con->prepare("SELECT * FROM administrator WHERE adminid=?");
    $query->bingParam(1, $_POST['uid']);
    $query->execute();
    while($row = $query->fetch(PDO::FETCHASSOC))
    {
        $pwdmd5=$row['password'];
    }
}

?>

<section id="page">
    <header id="pageheader" class="normalheader">
        <h2 class="sitedescription"></h2>
    </header>

<section id="content">
    <article class="post">
        <header class="postheader">
            <h2><u>Admin Login</u></h2>
            <h2><?PHP echo $log; ?></h2>
        </header>

    <section class="entry">
        <form action="admin.php" method="post" class="form">
            <p class="textfield">
                <label for="author">
                    <small>Admin Login ID (Required)</small>
                </label>
            </p>
        </form>
    </section>

    </article>

</section>

</section>


<?php 
include("footer.php") 
?>