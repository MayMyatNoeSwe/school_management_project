<div class="max-w-md w-1/2 mx-auto mt-10">
    <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-lg shadow-xl overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="text-center mb-8">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202025-02-15%20211124-hDp7KFvYJ3ZUpddDUyydsioCnP5hjg.png"
                    alt="Classroom Logo" class="w-24 h-24 mx-auto mb-4 rounded-full bg-white p-2 shadow-md">
                <h2 class="text-3xl font-bold text-classroom-green">Student Login</h2>
                <p class="text-classroom-green text-opacity-75">Welcome back to our 3rd Grade Classroom Hub!</p>
            </div>
            <form action="login.php" method="post">
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-classroom-green mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-classroom-green mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-classroom-gold focus:ring-classroom-gold border-classroom-blue rounded">
                        <label for="remember" class="ml-2 block text-sm text-classroom-green">
                            Remember me
                        </label>
                    </div>
                    <a href="forget-password.php" class="text-sm text-classroom-gold hover:underline">Forgot password?</a>
                </div>
                <button type="submit" name="login"
                    class="w-full bg-classroom-gold text-white py-2 px-4 rounded-md hover:bg-opacity-90 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-classroom-gold">
                    Login
                </button>
                <a href="register.php" class="text-sm text-classroom-gold hover:underline">Don't have an account? Register</a>
            </form>
        </div>
        <div class="px-6 py-4 bg-classroom-green bg-opacity-10 text-center">
            <p class="text-sm text-classroom-green">
                Need help? Contact your teacher or <a href="#" class="text-classroom-gold hover:underline">school
                    admin</a>.
            </p>
        </div>
    </div>