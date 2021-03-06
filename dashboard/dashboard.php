
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
      <a class="nav-link" href="#">
        <i class="fa fa-trophy menu-icon"></i>
        <span class="menu-title">Achievements</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./appointments">
        <i class="fa fa-calendar menu-icon"></i>
        <span class="menu-title">Appointments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./centers/map">
        <i class="icon-location menu-icon"></i>
        <span class="menu-title">Blood Drives</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="fa fa-tint menu-icon"></i>
        <span class="menu-title">Donation</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Rapid Test</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Donation History</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Results</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="fa fa-medkit menu-icon"></i>
        <span class="menu-title">Transfusion</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">Rapid Test</a></li>
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
               <i class="mdi mdi-calendar"></i> Today (<?php echo date("d M Y"); ?>)
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
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="images/dashboard/background_nature.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>17<sup>C</sup></h2>
                </div>
                <div class="ml-2">
                  <h4 class="location font-weight-normal">Nairobi</h4>
                  <h6 class="font-weight-normal">Kenya</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Next Safe Donation Date</p>
                <p class="fs-30 mb-2"><?php if(isset($_SESSION['next'])){
                  echo $_SESSION['next'];
                } ?></p>
                <p><?php if(isset($_SESSION['ndif'])){
                  echo $_SESSION['ndif'];
                } ?> days</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Last Donation</p>
                <p class="fs-30 mb-2"><?php if(isset($_SESSION['pre'])){
                  echo $_SESSION['pre'];
                } ?></p>
                <p><?php if(isset($_SESSION['pdif'])){
                  echo $_SESSION['pdif'];
                } ?> days</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Number of Donations</p>
                <p class="fs-30 mb-2"><?php if(isset($_SESSION['tot'])){
                  echo $_SESSION['tot'];
                } ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Number of Transfusions</p>
                <p class="fs-30 mb-2">0</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Donation Histoy</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless" id="donhistory">
                <thead>
                  <tr>
                    <th>Center</th>
                    <th>Donation Type</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $queryx = "SELECT * FROM `donation_report` where userID = '".$_SESSION['userID']."' order by appointment_date desc";
                    $statementx = $connect->prepare($queryx);
                    if($statementx->execute()){
                      $countx = $statementx->rowCount();
                        $resultx = $statementx->fetchAll();
                        if (!$resultx) {
                          echo '<tr><td colspan="5">No donation history for this user</td></tr>';
                        } else {
                          foreach($resultx as $rowx)
                          {
                            if ($rowx['donation_status']!='') {
                              if($rowx['donation_type']=="1"){
                                $type = "Red Blood Cells";
                              } else {
                                $type = "Whole Blood";
                              }
                              if($rowx['transID']!=''){
                                $st ='<td class="font-weight-medium"><div class="badge badge-info">Transfused</div></td>';
                              }else {
                                if($rowx['donation_status']!='Discarded'){
                                  if($rowx['donation_status']=="donated"){
                                    $st = '<td class="font-weight-medium"><div class="badge badge-success">'.ucwords($rowx['donation_status']).'</div></td>';
                                  } elseif ($rowx['donation_status']=='donating') {
                                    $st='<td class="font-weight-medium"><div class="badge badge-warning">'.ucwords($rowx['donation_status']).'</div></td>';
                                  } else {
                                    $st='<td class="font-weight-medium"><div class="badge badge-danger">'.ucwords($rowx['donation_status']).'</div></td>';
                                  }
                                }else{
                                  $st ='<td class="font-weight-medium"><div class="badge badge-danger">'.ucwords($rowx['donation_status']).'</div></td>';
                                }
                              }
                              echo "<tr>
                                <td>".$rowx['donation_venue']."</td>
                                <td class='font-weight-bold'>".$type."</td>
                                <td>".date_format(date_create($rowx['appointment_date']),'d M Y')."</td>
                                 ".$st."
                                 <td><a class='btn btn-info btn-sm journey'>View Journey</a></td></td>
                              </tr>";
                            }

                          }
                        }
                      } else {
                        ?><tr><td colspan="5">No donation history for this user</td></tr><?php
                      }
                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To Do Lists</h4>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Meeting with Doctor Rahesh
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Do a rapid test
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Donate blood at KNBT
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Follow up results
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Visit mum
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <div class="add-items d-flex mb-0 mt-2">
              <input type="text" class="form-control todo-list-input"  placeholder="Add new task">
              <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           <div class="d-flex justify-content-between">
            <p class="card-title">Summary</p>
            <a href="#" class="text-info">View all</a>
           </div>
            <p class="font-weight-500">Donations/Transfusion summary</p>
            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
          </div>
        </div>
      </div>
    </div>



  </div>
  <script>
    $("#donhistory").datatable();
  </script>
