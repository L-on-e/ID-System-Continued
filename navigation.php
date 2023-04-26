<?php 
 include "./db_connect.php";
 include ("./imports.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <!--left-fixed -navigation-->
      <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>


            <?php
            $sqln = "SELECT * FROM Inorg ";
            $rgetb = mysqli_query($db, $sqln);
            $numb = mysqli_num_rows($rgetb);
            if ($numb != 0) {
              while ($foundl = mysqli_fetch_array($rgetb)) {
                $profile = $foundl['pname'];
              }
              echo "<center><img src='media/$profile'  width='63%' height='140px' alt=''></center>";
            } else {



            ?>
              <h1>
                <a class="navbar-brand" href="index.html"><span class="fa fa-area-chart">

                  </span>MAIN MENU<span class="dashboard_text"></span>
                </a>
              </h1>
            <?php } ?>

          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">
                <h4>Administrator</h4>
              </li>
              <li class="treeview">
                <a href="admin.php">
                  <i class="fa fa-tv"></i> <span>Control Panel</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cog"></i>
                  <span>Initialisation</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a data-toggle='modal' data-id='' href='#Initialisation' class='open-Initial'><i class="fa fa-plus"></i>Add System Info</a></li>
                  <li><a data-toggle='modal' data-id='' href='#Initialisation2' class='open-Initial2'><i class="fa fa-minus"></i>Edit System Info</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a data-toggle='modal' data-id='' href='#Useradd' class='open-adduser'><i class="fa fa-user"></i>Add Employee</a>
              </li>
              <li class="treeview">
                <a data-toggle='modal' data-id='' href='./useradd.php' class='open-adduser'><i class="fa fa-user-plus"></i>Add Employee (New)</a>
              </li>
              <li class="treeview">
                <a href="bulk.php"><i class='fa fa-print'></i>Bulk registration</a>
              </li>
              <li class="treeview">
                <a data-toggle='modal' href="#Taxreceipted" class="Open-Taxreceipted"><i class='fa fa-print'></i>Bulk printing</a>
              </li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </aside>
    </div>
    <script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
  </script>
</body>
</html>