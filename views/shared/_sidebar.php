<?php
ob_start();
session_start();
?>
<ul class="sidebar navbar-nav" id="sidebar-import">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register..html">Register</a>
                <a class="dropdown-item" href="ForgetPasswordView.php">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item" href="blank.html">Blank Page</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="tables.php">
                <i class="fas fa-fw fa-table"></i>
                <span>List of Doctors</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="my-appointments.php">
                <i class="fas fa-fw fa-table"></i>
                <span>My appointments</span></a>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="add-new-appointment.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add new appointment</span></a>
    </li>
<?php
if ( isset( $_SESSION['user_id'] ) ) {
if($_SESSION['user_id'] == 18)
    echo
    '   <li class="nav-item active">
            <a class="nav-link" href="add-new-doctor.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Add new doctor</span></a>
        </li>';
} ?>

    <li class="nav-item active">
        <a class="nav-link" href="contact-us.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact us</span></a>
    </li>

    </ul>
