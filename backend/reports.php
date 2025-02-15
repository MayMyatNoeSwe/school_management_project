<?php include './layouts/header.php'?>
<div class="wrapper">
    <!-- Sidebar Starts-->
    <?php include './components/sidebar.php' ?>
    <!-- Sidebar Ends-->
    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <!-- Info-card starts -->
        <?php include './components/reports/info-card.php' ?>
        <!-- Info-card ends -->
        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Report Types Starts-->
            <?php include './components/reports/report-type.php' ?>
            <!-- Report Types Ends-->

            <!-- Report Generation Form Starts-->
            <?php include './components/reports/report-form.php' ?>
            <!-- Report Generation Form Ends-->

            <!-- Recent Reports Starts-->
            <?php include './components/reports/recent-report.php' ?>
            <!-- Recent Reports Ends-->
        </div>
    </div>
</div>


<?php include './layouts/footer.php'?>