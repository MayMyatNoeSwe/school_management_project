
<div class="max-w-2xl md:w-1/2 mx-auto mt-10 p-6">
    <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-lg shadow-xl overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="text-center mb-8">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202025-02-15%20211124-hDp7KFvYJ3ZUpddDUyydsioCnP5hjg.png"
                    alt="Classroom Logo" class="w-24 h-24 mx-auto mb-4 rounded-full bg-white p-2 shadow-md">
                <h2 class="text-3xl font-bold text-classroom-green">Student Registration</h2>
                <p class="text-classroom-green text-opacity-75">Join our 3rd Grade Classroom Hub!</p>
            </div>
            <div><?php include 'errors.php'?></div>
            <form action="" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="firstName" class="block text-sm font-medium text-classroom-green mb-2">
                        Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
               
                <div>
                    <label for="email" class="block text-sm font-medium text-classroom-green mb-2">Email
                    </label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                    
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-classroom-green mb-2">Phone</label>
                    <input type="tel" id="phone" name="phone" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-classroom-green mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-classroom-green mb-2">Confirm
                        Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-classroom-green mb-2">Address</label>
                    <input type="text" id="address" name="address" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-classroom-green mb-2">Role</label>
                    <select id="role" name="role" required
                        class="w-full px-3 py-2 border border-classroom-blue rounded-md focus:outline-none focus:ring-2 focus:ring-classroom-gold">
                        <option value="">Select Role</option>
                        <option value="student">Student</option>
                        <option value="parent">Parent</option>
                    </select>
                </div>
                <div class="md:col-span-2 flex items-center">
                    <input type="checkbox" id="terms" name="terms" required
                        class="h-4 w-4 text-classroom-gold focus:ring-classroom-gold border-classroom-blue rounded">
                    <label for="terms" class="ml-2 block text-sm text-classroom-green">
                        I agree to the <a href="#" class="text-classroom-gold hover:underline">Terms and
                            Conditions</a>
                    </label>
                </div>
                <div class="md:col-span-2">
                    <button type="submit" name="register"
                        class="w-full bg-classroom-gold text-white py-2 px-4 rounded-md hover:bg-opacity-90 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-classroom-gold">
                        Register
                    </button>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 bg-classroom-green bg-opacity-10 text-center">
            <p class="text-sm text-classroom-green">
                Already have an account? <a href="login.php" class="text-classroom-gold hover:underline">Log in here</a>
            </p>
        </div>
    </div>
</div>