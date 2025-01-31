<?php include './layouts/header.php'?>
<div class="wrapper">
    <!-- Sidebar -->
    <?php include './components/students/sidebar.php' ?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar Starts-->
        <?php include './components/students/info-card.php' ?>
        <!-- Navbar Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Student Button -->
            <!-- Header Starts -->
            <?php include './components/students/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts-->
            <?php include './components/students/filter.php' ?>
            <!-- Filter Ends -->

            <!-- Students Table Starts-->
            <?php include './components/students/student-table.php' ?>
            <!-- Students Table Ends-->
        </div>
    </div>
</div>

<!-- Add Student Modal Starts -->
<?php include './components/students/student-modal.php' ?>
<!-- Add Student Modal Ends -->

<?php include './layouts/footer.php' ?>