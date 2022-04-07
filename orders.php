<?php
include("include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Orders - <?= $fetchWebsite['site_name'] ?></title>
    <link rel="icon" type="image/x-icon" href="../uploads/settings/<?= $fetchWebsite['site_favicon'] ?>" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
    <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
</head>
<body>
    <div class="modal fade" id="changestatusmodel" tabindex="-1" role="dialog" aria-labelledby="changestatusmodel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="changestatus">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <select name="change_status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Shipped">Shipped</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Orders</span></li>
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
                <div class="row layout-spacing">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Orders</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="style-3" class="table style-3  table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Sr # </th>
                                                <th class="checkbox-column text-center"> Invoice Number </th>
                                                <th class="text-center">User Image</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>User Contact</th>
                                                <th class="text-center">Order Status</th>
                                                <th class="text-center">Order Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $userid = $fetchSession['id'];
                                            $selectOrder = mysqli_query($con, "SELECT invoice.*,users.firstname,users.lastname,users.profile,users.email,users.phone FROM `invoice`,users WHERE users.id =invoice.user_id ORDER BY invoice.id DESC");
                                            while ($fetchOrder = mysqli_fetch_array($selectOrder)) {
                                                if ($fetchOrder['currency'] == "Euro") {
                                                    $currency_v = "€";
                                                } elseif ($fetchOrder['currency'] == "Dollar" || $fetchOrder['currency'] == "Cad") {
                                                    $currency_v = "$";
                                                } elseif ($fetchOrder['currency'] == "Pound") {
                                                    $currency_v = "£";
                                                } else {
                                                    $currency_v = "$";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td class="checkbox-column text-center"> <a href="invoice?invoice-number=<?= $fetchOrder['invoice_number']  ?>" target="_blank"><?= $fetchOrder['invoice_number']  ?></a> </td>
                                                    <td class="text-center">
                                                        <span><img src="<?=$url?>uploads/users/<?php if($fetchOrder['profile']==""){ echo"default.png"; } else{ echo  $fetchOrder['profile'];} ?>" class="profile-img" alt="avatar"></span>
                                                    </td>
                                                    <td><?=$fetchOrder["firstname"]." ".$fetchOrder["lastname"]?></td>
                                                    <td><?=$fetchOrder["email"]?></td>
                                                    <td><?=$fetchOrder["phone"]?></td>
                                                    <td class="text-center cursor changestatus" id="<?= $fetchOrder['id'] ?>">
                                                        <span class="shadow-none badge badge-primary">
                                                            <?php
                                                            if ($fetchOrder['order_status'] == "") {
                                                                echo "Nothing";
                                                            } else {
                                                                echo ucwords($fetchOrder['order_status']);
                                                            }
                                                            ?></span>
                                                    </td>
                                                    <td class="checkbox-column text-center"> <a href="invoice?invoice-number=<?= $fetchOrder['invoice_number']  ?>" target="_blank">View Invoice</a> </td>
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
    <script src="plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/components/notification/custom-snackbar.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        jQuery(document).on("click", ".changestatus", function() {
            var id = $(this).attr('id');
            $("#id").val(id);
            $('#changestatusmodel').modal('show');
        });
        $("#changestatus").on('submit', function(e) {
            e.preventDefault();
            $('input[type="submit"]').attr('disabled', 'disabled');
            $.ajax({
                url: 'include/update.php?page=changeorderstatus',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if (result == "true") {
                        setTimeout(function() {
                            window.open('orders.php', '_self');
                        }, 1000);
                        $('input[type="submit"]').removeAttr('disabled');
                        Snackbar.show({
                            text: 'Sucessfully Updated',
                            pos: 'bottom-right'
                        });
                    } else if (result == "wrong") {
                        $("#update").trigger('reset')
                        $('input[type="submit"]').removeAttr('disabled');
                        Snackbar.show({
                            text: 'Something Wrong While Updating.',
                            pos: 'bottom-right'
                        });
                    }
                }
            })
        });
        c3 = $('#style-3').DataTable({
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
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>