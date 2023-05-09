<?php
include "./db_connect.php";
include("./imports.php");

$sqlid = "SELECT * FROM Employee Order BY ID DESC";
$ret = mysqli_query($db, $sqlid);
while ($found = mysqli_fetch_array($ret)) {
  $idsx = $found['ID'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .dropdown-content {
      display: flex;
      flex-direction: column;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
      color: black;
    }

    .dropdown-content a {
      padding: 10px;
    }
  </style>

</head>

<body>
<!-- All Bulk Printing-->
<div id="bulkPrintAll" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              PRINT IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="all_PrintBulk.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee number starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>

    </div>
  </div>
  <!-- download -->
  <div id="downloadBulk" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              Download IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="bulkpdf.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee number starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Regular Bulk Printing -->
  <div id="printBulk" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              PRINT IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="printbulk.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee number starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Contractual Bulk Printing -->
  <div id="printBulk2" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              PRINT IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="printbulk2.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee number starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>

    </div>
  </div>
  <!-- download -->
  <div id="downloadBulk" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
        <div class="modal-header" style="background:#222d32">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
            <center>
              Download IDs IN BULK
            </center>
          </h4>
        </div>

        <div class="modal-body">
          <form action="bulkpdf.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">From</span>
              <input id="text" type="number" class="form-control" name="startpoint">
            </div>
            <div class="input-group" style="margin-bottom:10px">
              <span class="input-group-addon">To</span>
              <input type="number" class="form-control" name="endpoint">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Employee number starts @</span>
              <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $idsx; ?>" readonly="readonly">
            </div>


        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- download -->
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
          <center><img src='media/DOH-Logo.png' width='63%' height='140px' alt=''></center>
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
              <a data-toggle='modal' data-id='' href='./useradd.php' class='open-adduser'><i class="fa fa-user-plus"></i>Add Employee</a>
            </li>
            <li class="treeview">
              <a href="bulk.php"><i class='fa fa-print'></i>Bulk registration</a>
            </li>
            <li class="treeview">
              <a data-toggle='modal' href="#downloadBulk" class="Open-downloadBulk"><i class='fa fa-print'></i>Bulk download</a>
            </li>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i>
                <span>Bulk Printing</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <div class="dropdown-content">
                  <a data-toggle='modal' href="#bulkPrintAll" class="Open-printBulk"><i class='fa fa-print'></i> All</a>
                  <a data-toggle='modal' href="#printBulk" class="Open-printBulk"><i class='fa fa-print'></i> Regular</a>
                  <a data-toggle='modal' href="#printBulk2" class="Open-printBulk"><i class='fa fa-print'></i> Contractual</a>
                </div>
              </ul>
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

  <!-- new added graphs chart js-->
  <script src="admin/js/Chart.bundle.js"></script>
  <script src="admin/js/utils.js"></script>


  <!-- Classie --><!-- for toggle left push menu script -->
  <script src="admin/js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
      showLeftPush = document.getElementById('showLeftPush'),
      body = document.body;

    showLeftPush.onclick = function() {
      classie.toggle(this, 'active');
      classie.toggle(body, 'cbp-spmenu-push-toright');
      classie.toggle(menuLeft, 'cbp-spmenu-open');
      disableOther('showLeftPush');
    };


    function disableOther(button) {
      if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
      }
    }
  </script>
  <!-- //Classie --><!-- //for toggle left push menu script -->

  <!--scrolling js-->
  <script src="admin/js/jquery.nicescroll.js"></script>
  <script src="admin/js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- Bootstrap Core JavaScript -->
  <script src="admin/js/bootstrap.js"> </script>
  <!-- //Bootstrap Core JavaScript -->
  <script src=" css/bootstrap-dropdownhover.js"></script>
</body>

</html>