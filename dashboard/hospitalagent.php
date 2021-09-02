
<!-- partial -->
<!-- partial:partials/_sidebar.php -->
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile/">
        <i class="fa fa-user menu-icon"></i>
        <span class="menu-title">Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="fa fa-medkit menu-icon"></i>
        <span class="menu-title">Transfusion</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Requisition</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Transfusion History</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-whatsapp menu-icon"></i>
        <span class="menu-title">Chat</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">User Manual</span>
      </a>
    </li>
  </ul>
</nav>
<!-- partial -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <?php if(isset($_SESSION['firstName'])){
              echo $_SESSION['firstName'];
            }else {
              echo "Guest";
            }
             ?></h3>
            <h6 class="font-weight-normal mb-0">
              <?php if(isset($_SESSION['instance'])){
                echo $_SESSION['instance'];
              }else {
                echo "";
              }?>
            You have <span class="text-primary">3 unread messages!</span></h6>
          </div>
          <div class="col-12 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="#">January - March</a>
                <a class="dropdown-item" href="#">March - June</a>
                <a class="dropdown-item" href="#">June - August</a>
                <a class="dropdown-item" href="#">August - November</a>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
      <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-0">Available Blood Types</p>
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>
      </div>
    </div>
  </div>

    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0 text-center">Stock Per Center(in mls)</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Center</th>
                    <td>A+</td>
                    <td>A-</td>
                    <td>B+</td>
                    <td>B-</td>
                    <td>O+</td>
                    <td>O-</td>
                    <td>AB+</td>
                    <td>AB</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryx = "SELECT * FROM tbl_centers group by name";
                  $statementx = $connect->prepare($queryx);
                  if($statementx->execute()){
                    $countx = $statementx->rowCount();
                      $resultx = $statementx->fetchAll();
                      if (!$resultx) {
                        echo '<tr><td colspan="9" align="center">No data available</td></tr>';
                      } else {
                        foreach($resultx as $rowx)
                        {
                          echo "<tr><td>". $rowx['name']."</td>";
                          $types =  ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
                          $data = [];
                          foreach ($types as $value) {
                            $stock =0;
                            $queryxa = "SELECT sum(quantity) as qty FROM `donation_report` where bloodType = '$value' and donation_venue = '".$rowx['name']."'  ";
                            $statementxa = $connect->prepare($queryxa);
                            if($statementxa->execute()){
                              $countxa = $statementxa->rowCount();
                                $resultxa = $statementxa->fetchAll();
                                if (!$resultxa) {
                                  $stock =0;
                                } else {
                                  foreach($resultx as $rowxa)
                                  {
                                    if($rowxa['total_stock']==''){
                                      $stock =0;
                                    }else {
                                      $stock = $rowxa['total_stock'];
                                    }
                                  }
                                }
                                $data[$value] = $stock;
                              }
                                echo "<td>".$stock."</td>";
                          }
                          echo "</tr>";
                        }
                      }
                    }
                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php
    $types =  ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
    $data = [];
    foreach ($types as $value) {
      $queryx = "SELECT * FROM `stock_by_group` where bloodType = '$value' ";
      $statementx = $connect->prepare($queryx);
      if($statementx->execute()){
        $countx = $statementx->rowCount();
          $resultx = $statementx->fetchAll();
          if (!$resultx) {
            $stock =0;
          } else {
            foreach($resultx as $rowx)
            {
              if($rowx['total_stock']==''){
                $stock =0;
              }else {
                $stock = $rowx['total_stock'];
              }
            }
          }
        }
        $data[$value] = $stock;
    }
    ?>
  </div>
<style media="screen">
.highcharts-figure, .highcharts-data-table table {
min-width: 310px;
max-width: 800px;
margin: 1em auto;
}

#container {
height: 400px;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #EBEBEB;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}
.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}
.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}
.highcharts-data-table tr:hover {
background: #f1f7ff;
}
</style>
<script>
Highcharts.chart('container', {
chart: {
  type: 'column'
},
title: {
  text: 'Blood Availability'
},
subtitle: {
  text: 'Source: iDonate'
},
xAxis: {
  categories: [
    'A+',
    'A-',
    'B+',
    'B-',
    'O+',
    'O-',
    'AB+',
    'AB-'
  ],
  crosshair: true
},
yAxis: {
  min: 0,
  title: {
    text: 'Blood (ml)'
  }
},
tooltip: {
  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    '<td style="padding:0"><b>{point.y:.1f} ml</b></td></tr>',
  footerFormat: '</table>',
  shared: true,
  useHTML: true
},
plotOptions: {
  column: {
    pointPadding: 0.1,
    borderWidth: 0
  }
},
series: [{
  name: 'Donated',

  data: [<?php echo join($data, ',') ?>]

}, {
  name: 'Transfused',
  data: [0, 0,0,0, 0,0, 0, 0]

}]
});
</script>
