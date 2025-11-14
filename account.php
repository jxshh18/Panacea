<?php

session_start();

if(!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
} 

if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panacea Pharmaceutical</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="indexcss.css">
  <link rel="icon" href="images/mainlogos/panacea smol logo.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            customBlue: '#0077c8',
            customGreen: {
              700: '#28A745',
              500: '#2FC250'
            }
          },
          fontFamily: {
            primary: ['"Playfair Display"', 'sans-serif']
          }
        }
      }
    }
  </script>
</head>
<body class="text-gray-800">
  <!-- Top Gray Bar -->
  <div class="bg-light-bg py-1"></div>

  <!-- Header -->
  <header class="bg-white shadow p-4 flex items-center sticky top-0 z-50">
    <div class="flex items-center space-x-2">
      <a href="/index.php">
        <img src="images/mainlogos/panacea_logo.png" alt="Panacea Logo" class="h-16">
      </a>
    </div>
    <div class="flex-grow mx-4">
      <div class="relative w-1/3">
        <input type="text" placeholder="Search..." class="border rounded p-2 pl-10 w-full" />
        <button class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 100 14 7 7 0 000-14zm0 0l6 6" />
          </svg>
        </button>
      </div>
    </div>
    <nav class="space-x-4">
      <a href="index.php" class="text-gray-700 hover:text-primary hover:underline transition">Home</a>
      <a href="faq.html" class="text-gray-700 hover:text-primary hover:underline transition">FAQ</a>
      <a href="privacy.html" class="text-gray-700 hover:text-primary hover:underline transition">Privacy</a>
      <a href="contact.html" class="text-gray-700 hover:text-primary hover:underline transition">Contact</a>
      <a href="signup.php" class="inline-block align-middle">
        <img src="images/header/user.png" alt="Cart" class="h-6 w-6 inline-block align-middle hover:scale-110 transition-transform duration-200">
      </a>
      <a href="maintenance.html" class="inline-block align-middle">
        <img src="images/header/addtocart.png" alt="Cart" class="h-6 w-6 inline-block align-middle hover:scale-110 transition-transform duration-200">
      </a>
    </nav>
  </header>

  <!-- Account -->
  <main class="flex-grow flex items-center justify-center py-10">
    <div class="bg-white text-center shadow-lg p-10 rounded-lg max-w-md w-full">
      <h2 class="text-3xl font-semibold mb-4">Account info</h2>
      <p class="text-center mt-4 text-green-700 font-light text-l mb-5"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
      <div class="w-16 h-1 bg-customBlue mx-auto mb-6"></div>
      <p class="text-lg font-medium mb-2">Name: <?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></p>
      <p class="text-lg font-medium mb-6">Email: <?php if(isset($_SESSION['user_email'])) echo $_SESSION['user_email']; ?></p>

      <div class="space-y-3">
        <a href="account.php?logout=1" class="text-customBlue hover:underline block">Logout</a>
      </div>
    </div>
  </main>
  </div>

<!-- Footer -->
  <footer class="bg-customBlue text-white pt-10 pb-4 px-6 mt-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

      <!-- Contact Info -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">CONTACT INFO</h4>
        <p class="text-sm mb-1"><strong>ADDRESS:</strong><br>Gabriela ParkCaster Hills<br>Philippines</p>
        <p class="text-sm mt-2"><strong>PHONE:</strong> <br>+(63) 99 450 4823</p>
        <p class="text-sm mt-2"><strong>EMAIL:</strong> <br>panacea@gmai.com.ph</p>
        <p class="text-sm mt-2"><strong>WORKING DAYS/HOURS:</strong> <br>Mon – Sun / 8:00 AM – 6:00 PM</p>
        <div class="flex space-x-4 mt-4">
          <a href="maintenance.html"><img src="images/socials logos/fb.png" alt="Facebook" class="w-6 h-6"></a>
          <a href="maintenance.html"><img src="images/socials logos/ig.png" alt="Instagram" class="w-6 h-6"></a>
          <a href="maintenance.html"><img src="images/socials logos/x.png" alt="Twitter" class="w-6 h-6"></a>
        </div>
      </div>

      <!-- About -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">ABOUT PANACEA</h4>
        <ul class="space-y-1 text-sm">
          <li><a href="maintenance.html" class="hover:underline">About Us</a></li>
          <li><a href="maintenance.html" class="hover:underline">Careers</a></li>
          <li><a href="maintenance.html" class="hover:underline">Store Finder</a></li>
          <li><a href="maintenance.html" class="hover:underline">Contact Us</a></li>
          <li><a href="maintenance.html" class="hover:underline">Terms and Conditions</a></li>
          <li><a href="maintenance.html" class="hover:underline">Privacy Policy</a></li>
          <li><a href="maintenance.html" class="hover:underline">Call & Pick-Up</a></li>
        </ul>
      </div>

      <!-- Customer Service -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">CUSTOMER SERVICE</h4>
        <ul class="space-y-1 text-sm">
          <li><a href="maintenance.html" class="hover:underline">Help Center</a></li>
          <li><a href="maintenance.html" class="hover:underline">Payment</a></li>
          <li><a href="maintenance.html" class="hover:underline">Shipping & Delivery</a></li>
          <li><a href="maintenance.html" class="hover:underline">Returns & Refunds</a></li>
          <li><a href="maintenance.html" class="hover:underline">How to Buy</a></li>
          <li><a href="maintenance.html" class="hover:underline">Questions?</a></li>
          <li><a href="maintenance.html" class="hover:underline">Track Your Order</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">SUBSCRIBE NEWSLETTER</h4>
        <p class="text-sm mb-3">Get all the latest information on events, sales and offers. Sign up for newsletter:</p>
        <form class="space-y-2">
          <input type="email" placeholder="Email address" class="w-full px-4 py-2 rounded-full bg-blue-800 text-white focus:outline-none">
          <button type="submit" class="bg-customGreen-700 hover:bg-customGreen-500 text-white font-bold py-2 px-4 rounded-full w-full">SUBSCRIBE</button>
          <label class="flex items-start text-xs text-gray-400 mt-2">
            <input type="checkbox" class="mr-2 mt-1">
            By subscribing, you agree to receive our newsletter and accept our privacy policy.
          </label>
        </form>
      </div>
    </div>
    </footer>

    <div class="bg-white text-center p-4">
      <p class="text-sm text-gray-600">&copy; 2025 Panacea Pharmaceutical. All rights reserved.</p>
    </div>
</body>
</html>
