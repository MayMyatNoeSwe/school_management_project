<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees - School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body> -->
<?php include './layouts/header.php' ?>
<div class="wrapper">
    <!-- Sidebar Starts-->
    <?php include './components/fees/sidebar.php' ?>
    <!-- Sidebar Ends-->

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <!-- Info-card Starts -->
        <?php include './components/fees/info-card.php' ?>
        <!-- Info-card Ends -->

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <!-- Fee Overview Cards Starts-->
            <?php include './components/fees/fee-overview.php' ?>
            <!-- Fee Overview Cards Ends-->
            <!-- Header Starts -->
            <?php include './components/fees/header.php' ?>
            <!-- Header Ends -->
            <!-- Filters Starts-->
            <?php include './components/fees/filter.php' ?>
            <!-- Filters Ends-->
            <!-- Fee Records Table Starts-->
            <?php include './components/fees/fee-table.php' ?>
            <!-- Fee Records Table Ends-->
        </div>
    </div>
</div>

<!-- Add Payment Modal Starts-->
<?php include './components/fees/payment-modal.php' ?>
<!-- Add Payment Modal Ends-->


<?php include './layouts/footer.php' ?>