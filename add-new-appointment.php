<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <title>iManager - Hospital</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">


    <!-- Template -->
    <link rel="import" href="./views/shared/_navbar.html" id="navbar-import">
    <link rel="import" href="./views/shared/_sidebar.html" id="sidebar-import">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body id="page-top">

<div id ="navbar-placeholder"></div>

<div id="wrapper">
    <div id ="sidebar-placeholder"></div>

    <div id="content-wrapper">
        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <div class="card-header">Add an appointment</div>
                <div class="card-body">
                    <form method="POST" action="AppointmentsController.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <div class="form-group">
                                        <?php
                                        include("config.php");
                                        $sql = "SELECT * FROM users WHERE user_role = '2'";
                                        $result = $db->query($sql); ?>
                                          <select id="Doctor" name="Doctor" class="form-control">
                                        <?php foreach($result as $key=>$value): ?>
                                        <option value="<?= $value['first_name'];?>"><?= $value['first_name'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
<!--                                        <input type="text" id="Doctor" class="form-control" placeholder="Doctor" required="required" autofocus="autofocus" name="Doctor">-->
                                        <label for="Doctor"></label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="Specialty" class="form-control" placeholder="Specialty" required="required" name="Specialty">
                                        <label for="Specialty">Specialty</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <label for="Date">Select date</label>
                                        <input type="date" id="Date" name="Date" max="3000-12-31"
                                               min="1000-01-01" class="form-control"/>
                                </div>
                                    </div>
                                </div>
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <label for="Hour">Select date</label>
                                    <select id ="Hour" name="Hour" class="form-control">
                                        <?php for($i = 0; $i < 24; $i++): ?>
                                            <option value="<?= $i; ?>"><?= $i ?>:00</option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                            </div>
                        <button class="btn btn-primary btn-block" type="submit" name="clicked">Send appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>


<script src="js/import-components.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


</body>

</html>

