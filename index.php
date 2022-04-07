<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>Dasboard - <?= $fetchWebsite['site_name'] ?></title>
  <link rel="icon" type="image/x-icon" href="../uploads/settings/<?= $fetchWebsite['site_favicon'] ?>" />
  <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
  <script src="assets/js/loader.js"></script>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
  <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
  <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<body>
  <?php include("include/begin-nav.php"); ?>
  <!--  BEGIN NAVBAR  -->
  <div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg></a>
      <ul class="navbar-nav flex-row">
        <li>
          <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Index</span></li>
              </ol>
            </nav>
          </div>
        </li>
      </ul>
    </header>
  </div>
  <!--  END NAVBAR  -->
  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <?php include("include/sidebar.php"); ?>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
      <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
          <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
              <div class="widget-heading">
                <h5 class="">Revenue</h5>
                <ul class="tabs tab-pills">
                  <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                </ul>
              </div>
              <div class="widget-content">
                <div class="tabs tab-content">
                  <div id="content_1" class="tabcontent">
                    <div id="revenueMonthly"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
            <div class="widget-three">
              <div class="widget-heading">
                <h5 class="">Summary</h5>
              </div>
              <div class="widget-content">
                <div class="order-summary">
                  <div class="summary-list">
                    <div class="w-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7" y2="7"></line>
                      </svg>
                    </div>
                    <div class="w-summary-details">
                      <div class="w-summary-info">
                        <h6>Pending Orders</h6>
                        <?php
                        $selectTotal = mysqli_query($con, "SELECT count(*) as total from invoice  where invoice.order_status='Pending'");
                        $fetchTotal = mysqli_fetch_array($selectTotal);
                        ?>
                        <p class="summary-count"><?= $fetchTotal['total'] ?></p>
                      </div>
                      <div class="w-summary-stats">
                        <div class="progress">
                          <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <div class="w-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                      </svg>
                    </div>
                    <div class="w-summary-details">
                      <div class="w-summary-info">
                        <h6>Shipped Orders</h6>
                        <?php
                        $selectTotal = mysqli_query($con, "SELECT count(*) as total from invoice  where invoice.order_status='Shipped'");
                        $fetchTotal = mysqli_fetch_array($selectTotal);
                        ?>
                        <p class="summary-count"><?= $fetchTotal['total'] ?></p>
                      </div>
                      <div class="w-summary-stats">
                        <div class="progress">
                          <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <div class="w-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                      </svg>
                    </div>
                    <div class="w-summary-details">
                      <div class="w-summary-info">
                        <h6>Completed Orders</h6>
                        <?php
                        $selectTotal = mysqli_query($con, "SELECT count(*) as total from invoice  where invoice.order_status='Completed'");
                        $fetchTotal = mysqli_fetch_array($selectTotal);
                        ?>
                        <p class="summary-count"><?= $fetchTotal['total'] ?></p>
                      </div>
                      <div class="w-summary-stats">
                        <div class="progress">
                          <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
              <div class="widget-heading">
                <h5 class="">Recent Orders</h5>
              </div>
              <div class="widget-content">
                <div class="table-responsive">
                  <table class="table style-3  table-hover" id="style-3">
                    <thead>
                      <tr>
                          <th>
                          <div class="th-content">S.No</div>
                        </th>
                        <th>
                          <div class="th-content">Customer Name</div>
                        </th>
                        <th>
                          <div class="th-content">Customer Profile</div>
                        </th>
                        <th>
                          <div class="th-content">Invoice</div>
                        </th>
                        <th>
                          <div class="th-content">Status</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $selectRecent33 = mysqli_query($con, "SELECT invoice.*,users.firstname,users.lastname,users.profile,users.email,users.phone FROM `invoice`,users WHERE users.id =invoice.user_id ORDER BY invoice.id DESC LIMIT 7");
                      $z =1;
                      while ($fetchRecent33 = mysqli_fetch_array($selectRecent33)) {
                      ?>
                        <tr>
                            <td>
                            <div class="td-content customer-name"><?= $z++ ?></div>
                          </td>
                          <td>
                            <div class="td-content customer-name"><?= ucwords($fetchRecent33['firstname'] . " " . $fetchRecent33['lastname']) ?></div>
                          </td>
                          <td>
                            <div class="td-content customer-name"><img src="<?=$url?>uploads/users/<?php if($fetchRecent33['profile']==""){ echo"default.png"; } else{ echo  $fetchRecent33['profile'];} ?>" alt="avatar"></div>
                          </td>
                          <?php if ($fetchRecent33['order_status'] == "Shipped") { ?>
                            <td>
                              <div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div>
                            </td>
                          <?php } ?>
                          <?php if ($fetchRecent33['order_status'] == "Completed") { ?>
                            <td>
                              <div class="td-content"><span class="badge outline-badge-success">Paid</span></div>
                            </td>
                          <?php } ?>
                          <?php if ($fetchRecent33['order_status'] == "Pending") { ?>
                            <td>
                              <div class="td-content"><span class="badge outline-badge-danger">Pending</span></div>
                            </td>
                          <?php } ?>
                          <td>
                            <div class="td-content"><a href="invoice?invoice-number=<?= $fetchRecent33['invoice_number'] ?>" target="_blank">View Invoice</a></div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
              <div class="widget-heading">
                <h5 class="">Top 10 Buyer</h5>
              </div>
              <div class="widget-content">
                <div class="table-responsive">
                  <table class="table style-3  table-hover" id="style-3">
                    <thead>
                      <tr>
                          <th>
                          <div class="th-content">S.No</div>
                        </th>
                        <th>
                          <div class="th-content">Customer Profile</div>
                        </th>
                        <th>
                          <div class="th-content">Customer Name</div>
                        </th>
                       
                        <th>
                          <div class="th-content">Email</div>
                        </th>
                        <th>
                          <div class="th-content">Phone</div>
                        </th>
                        <th>
                          <div class="th-content">Status</div>
                        </th>
                        <th>
                          <div class="th-content">Points</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $selectRecent331 = mysqli_query($con, "SELECT * FROM `users` WHERE role = 3 ORDER BY points DESC limit 10;");
                      $z =1;
                      while ($fetchRecent331 = mysqli_fetch_array($selectRecent331)) {
                      ?>
                        <tr>
                            <td>
                            <div class="td-content customer-name"><?= $z++ ?></div>
                          </td>
                          <td>
                            <div class="td-content customer-name"><img src="<?=$url?>uploads/users/<?php if($fetchRecent331['profile']==""){ echo"default.png"; } else{ echo  $fetchRecent331['profile'];} ?>" alt="avatar"></div>
                          </td>
                          <td>
                            <div class="td-content customer-name"><?= ucwords($fetchRecent331['firstname'] . " " . $fetchRecent331['lastname']) ?></div>
                          </td>
                          
                          <td>
                            <div class="td-content customer-name"><?= $fetchRecent331['email'] ?></div>
                          </td>
                          <td>
                            <div class="td-content customer-name"><?= $fetchRecent331['phone'] ?></div>
                          </td>
                          <td>
                          <div class="td-content customer-name"><?= $fetchRecent331['points_status'] ?></div>
                          </td>
                          <td>
                          <div class="td-content customer-name"><?= $fetchRecent331['points'] ?></div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
              <div class="widget-heading">
                <h5 class="">Newsletters Subscriber</h5>
              </div>
              <div class="widget-content">
                <div class="table-responsive">
                  <table class="table style-3  table-hover" id="style-6">
                    <thead>
                      <tr>
                        <th class="text-center">Sr no</th>
                        <th class="text-center">Customer Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      $selectRecent = mysqli_query($con, "SELECT * FROM `newsletters` order by id desc");
                      while ($fetchRecent = mysqli_fetch_array($selectRecent)) {
                      ?>
                        <tr>
                          <td class="text-center"><?= $i++ ?></td>
                          <td class="text-center"><?= $fetchRecent["email"] ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("include/footer.php"); ?>
    </div>
    <!--  END CONTENT AREA  -->
  </div>
  <!-- END MAIN CONTAINER -->
  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/app.js"></script>
  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
  <script src="assets/js/custom.js"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="plugins/apex/apexcharts.min.js"></script>
  <script src="plugins/table/datatable/datatables.js"></script>
  <script>
    c3 = $('#style-3,#style-6').DataTable({
      "oLanguage": {
        "oPaginate": {
          "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
      },
      "stripeClasses": [],
      "lengthMenu": [10, 25, 50, 100],
      "pageLength": 10
    });
    multiCheck(c3);
  </script>
  <script>
    try {
      Apex.tooltip = {
        theme: 'dark'
      }
      /*
          =================================
              Revenue Monthly | Options
          =================================
      */
      <?php
      $total_monthamount = 0;
      $monthname = array();
      $monthamount = array();
      $selectMonth = mysqli_query($con, "SELECT monthname(invoice.created) as monthname,sum(invoice.grandtotal) as monthamount from invoice where invoice.order_status='Completed' and invoice.created > now() - INTERVAL 12 month group by month(invoice.created)");
      while ($fetchMonth = mysqli_fetch_array($selectMonth)) {
        $monthname[] = $fetchMonth['monthname'];
        $monthamount[] = $fetchMonth['monthamount'];
        $total_monthamount += $fetchMonth['monthamount'];
      }
      ?>
      var options1 = {
        chart: {
          fontFamily: 'Nunito, sans-serif',
          height: 365,
          type: 'area',
          zoom: {
            enabled: false
          },
          dropShadow: {
            enabled: true,
            opacity: 0.3,
            blur: 5,
            left: -7,
            top: 22
          },
          toolbar: {
            show: false
          },
          events: {
            mounted: function(ctx, config) {
              const highest1 = ctx.getHighestValueInSeries(0);
              const highest2 = ctx.getHighestValueInSeries(1);
              ctx.addPointAnnotation({
                x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                y: highest1,
                label: {
                  style: {
                    cssClass: 'd-none'
                  }
                },
                customSVG: {
                  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                  cssClass: undefined,
                  offsetX: -8,
                  offsetY: 5
                }
              })
              ctx.addPointAnnotation({
                x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                y: highest2,
                label: {
                  style: {
                    cssClass: 'd-none'
                  }
                },
                customSVG: {
                  SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                  cssClass: undefined,
                  offsetX: -8,
                  offsetY: 5
                }
              })
            },
          }
        },
        colors: ['#1b55e2', '#e7515a'],
        dataLabels: {
          enabled: false
        },
        markers: {
          discrete: [{
            seriesIndex: 0,
            dataPointIndex: 7,
            fillColor: '#000',
            strokeColor: '#000',
            size: 5
          }, {
            seriesIndex: 2,
            dataPointIndex: 11,
            fillColor: '#000',
            strokeColor: '#000',
            size: 4
          }]
        },
        subtitle: {
          text: 'Total Profit',
          align: 'left',
          margin: 0,
          offsetX: -10,
          offsetY: 35,
          floating: false,
          style: {
            fontSize: '14px',
            color: '#888ea8'
          }
        },
        title: {
          text: '$' + <?= $total_monthamount ?>,
          align: 'left',
          margin: 0,
          offsetX: -10,
          offsetY: 0,
          floating: false,
          style: {
            fontSize: '25px',
            color: '#bfc9d4'
          },
        },
        stroke: {
          show: true,
          curve: 'smooth',
          width: 2,
          lineCap: 'square'
        },
        series: [{
          name: 'Income',
          data: [<?= "'" . implode("','", $monthamount) . "'" ?>]
        }, {
          name: 'Expenses',
          data: [<?= "'3'" ?>]
        }],
        labels: [<?= "'" . implode("','", $monthname) . "'" ?>],
        xaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            show: true
          },
          labels: {
            offsetX: 0,
            offsetY: 5,
            style: {
              fontSize: '12px',
              fontFamily: 'Nunito, sans-serif',
              cssClass: 'apexcharts-xaxis-title',
            },
          }
        },
        yaxis: {
          labels: {
            formatter: function(value, index) {
              return (value / 1000) + 'K'
            },
            offsetX: -22,
            offsetY: 0,
            style: {
              fontSize: '12px',
              fontFamily: 'Nunito, sans-serif',
              cssClass: 'apexcharts-yaxis-title',
            },
          }
        },
        grid: {
          borderColor: '#191e3a',
          strokeDashArray: 5,
          xaxis: {
            lines: {
              show: true
            }
          },
          yaxis: {
            lines: {
              show: false,
            }
          },
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: -10
          },
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetY: -50,
          fontSize: '16px',
          fontFamily: 'Nunito, sans-serif',
          markers: {
            width: 10,
            height: 10,
            strokeWidth: 0,
            strokeColor: '#fff',
            fillColors: undefined,
            radius: 12,
            onClick: undefined,
            offsetX: 0,
            offsetY: 0
          },
          itemMargin: {
            horizontal: 0,
            vertical: 20
          }
        },
        tooltip: {
          theme: 'dark',
          marker: {
            show: true,
          },
          x: {
            show: false,
          }
        },
        fill: {
          type: "gradient",
          gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .28,
            opacityTo: .05,
            stops: [45, 100]
          }
        },
        responsive: [{
          breakpoint: 575,
          options: {
            legend: {
              offsetY: -30,
            },
          },
        }]
      }
      /*
          ================================
              Revenue Monthly | Render
          ================================
      */
      var chart1 = new ApexCharts(
        document.querySelector("#revenueMonthly"),
        options1
      );
      chart1.render();
      /*
          =================================
              Sales By Category | Render
          =================================
      */
      var chart = new ApexCharts(
        document.querySelector("#chart-2"),
        options
      );
      chart.render();
      /*
          =============================================
              Perfect Scrollbar | Recent Activities
          =============================================
      */
      const ps = new PerfectScrollbar(document.querySelector('.mt-container'));
    } catch (e) {
      console.log(e);
    }
  </script>
</body>
</html>