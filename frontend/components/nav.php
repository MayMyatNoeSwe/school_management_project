<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202025-02-15%20211124-hDp7KFvYJ3ZUpddDUyydsioCnP5hjg.png"
                    alt="Logo" class="h-8 w-8 object-contain" />
                <span class="ml-2 text-xl font-bold text-classroom-green">3rd Grade Hub</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php" class="text-classroom-green hover:text-classroom-gold transition-colors">Home</a>
                <a href="schedule.php"
                    class="text-classroom-green hover:text-classroom-gold transition-colors">Schedule</a>
                <a href="resources.php"
                    class="text-classroom-green hover:text-classroom-gold transition-colors">Resources</a>
                <a href="assignments.php"
                    class="text-classroom-green hover:text-classroom-gold transition-colors">Assignments</a>
                
                <?php if (isset($_SESSION['name'])): ?>
                <a href="profile.php" class="text-classroom-green hover:text-classroom-gold transition-colors"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></a>
                <a href="logout.php" class="text-classroom-green hover:text-classroom-gold transition-colors">Logout</a>
                <?php else: ?>
                <a href="login.php"
                    class="bg-classroom-gold text-white px-4 py-2 rounded-full hover:bg-opacity-90 transition-colors">
                    Student Login
                </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button class="text-classroom-green p-2" onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4">
            <a href="index.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Home</a>
            <a href="schedule.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Schedule</a>
            <a href="resources.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Resources</a>
            <a href="assignments.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Assignments</a>
            <a href="register.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Register</a>
            <a href="logout.php" class="block py-2 text-classroom-green hover:text-classroom-gold">Logout</a>
            <a href="login.php"
                class="w-full mt-2 bg-classroom-gold text-white px-4 py-2 rounded-full hover:bg-opacity-90">
                Student Login
            </a>
        </div>
    </div>
</nav>