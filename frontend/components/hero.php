
<header class="container mx-auto px-4 py-8 h-screen">
    <div class="flex flex-col md:flex-row items-center justify-center gap-1 h-[520px]">
        <div class="w-full md:w-4/5 h-[400px]">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202025-02-15%20211124-hDp7KFvYJ3ZUpddDUyydsioCnP5hjg.png"
                alt="Welcome illustration" class="w-full h-full max-w-md mx-auto" />
        </div>
        <div class="w-full md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-bold text-classroom-blue mb-6">Welcome to our classroom hub!
                <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></h1>
            <div class="inline-block bg-classroom-gold text-white px-6 py-2 rounded-full text-xl">
                3rd Grade
            </div>
        </div>
    </div>
</header>