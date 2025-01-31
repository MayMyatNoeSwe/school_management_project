<?php include './layouts/header.php'?>
<div class="wrapper">
    <!-- Sidebar starts-->
    <?php include './components/admin/sidebar.php'?>
    <!-- Sidebar ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <!-- Info-card starts -->
        <?php include './components/admin/info-card.php'?>
        <!-- Info-card ends -->
        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Recent-activity starts -->
            <?php include './components/admin/recent-activity.php'?>
            <!-- Recent-activity ends -->
            <!-- Upcoming-event starts -->
            <?php include './components/admin/upcoming-event.php'?>
            <!-- Upcoming-event ends -->
        </div>
    </div>
</div>
<?php include './layouts/footer.php'?>