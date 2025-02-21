<?php session_start(); 
if (!isset($_SESSION['name'])) {
    header("Location: register.php");
    exit();
}
?>

<!-- Header Section Starts -->
<?php include 'layouts/header.php'; ?>
<!-- Header Section Ends -->


<!-- Navbar Section Starts -->
<?php include 'components/nav.php'; ?>
<!-- Navbar Section Ends -->


<!-- Hero Section Starts -->
<?php include 'components/hero.php'; ?>
<!-- Hero Section Ends -->

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">
    <!-- Features Grid -->
    <?php include 'components/features.php'; ?>
    <!-- Features Grid Ends -->

    <!-- Schedule Section -->
    <?php include 'components/schedule.php'; ?>
    <!-- Schedule Section Ends -->

    <!-- Resources Section -->
    <?php include 'components/resources.php'; ?>
    <!-- Resources Section Ends -->
</main>
<!-- Main Content Ends -->

<!-- Footer Section Starts -->
<?php include 'layouts/footer.php'; ?>
<!-- Footer Section Ends -->