<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts-->
    <?php include './components/schedule/sidebar.php'?>
    <!-- Sidebar Ends -->
    <!-- Page Content -->

    <div id="content">
        <!-- Info-card Starts -->

        <?php include './components/schedule/info-card.php' ?>
        <!-- Info-card Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header Starts -->
            <?php include './components/schedule/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts-->
            <?php include './components/schedule/filter.php' ?>
            <!-- Filter Ends -->
            <!-- Schedule-table Starts -->
            <?php include './components/schedule/schedule-table.php' ?>
            <!-- Schedule-table Ends -->
        </div>
    </div>
</div>

<!-- Add Schedule Modal Starts -->
<?php include './components/schedule/schedule-modal.php' ?>
<!-- Add Schedule Modal Ends -->



<?php include './layouts/footer.php' ?>