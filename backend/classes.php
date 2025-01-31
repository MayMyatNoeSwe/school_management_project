<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts -->
    <?php include './components/classes/sidebar.php'?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar Starts-->
        <?php include './components/classes/info-card.php'?>
        <!-- Navbar Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header Starts -->
            <?php include './components/classes/header.php'?>
            <!-- Header Ends -->

            <!-- Class Overview Starts -->
            <?php include './components/classes/class-overview.php'?>
            <!-- Class Overview Ends -->

            <!-- Filters Starts-->
            <?php include './components/classes/filters.php'?>
            <!-- Filter Ends -->

            <!-- Classes Table Starts-->
            <?php include './components/classes/class-table.php'?>
            <!-- Class Table Ends -->
        </div>
    </div>
</div>

<!-- Add Class Modal Starts-->
<?php include './components/classes/class-modal.php'?>
<!-- Add Class Modal Ends-->


<?php include './layouts/footer.php' ?>