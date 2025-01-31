<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts -->
    <?php include './components/teachers/sidebar.php' ?>
    <!-- Sidebar Ends -->

    <!-- Page Content -->
    <div id="content">
        <!-- Info-card Starts-->
        <?php include './components/teachers/info-card.php' ?>
        <!-- Info-card Ends-->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Header with Search and Add Teacher Button -->
            <!-- Header Starts -->
            <?php include './components/teachers/header.php' ?>
            <!-- Header Ends -->

            <!-- Filters Starts -->
            <?php include './components/teachers/filter.php' ?>
            <!-- Filters Ends -->

            <!-- Teachers Table Starts-->
            <?php include './components/teachers/teacher-table.php' ?>
            <!-- Teachers Table Ends-->
        </div>
    </div>
</div>

<!-- Add Teacher Modal Starts -->
<?php include './components/teachers/teacher-modal.php' ?>
<!-- Add Teacher Modal Ends -->


<?php include './layouts/footer.php' ?>