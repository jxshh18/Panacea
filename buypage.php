<?php
include 'server/connection.php';
session_start();

if (!isset($_GET['id']) || !isset($_GET['type'])) {
    echo "Invalid Product Request.";
    exit;
}

$product_id = intval($_GET['id']);
$type = $_GET['type'];

if ($type === "featured") {
    $query = $conn->prepare("
        SELECT featured_id AS id, featured_name AS name, featured_price AS price, featured_image AS image
        FROM featured
        WHERE featured_id = ?
    ");
} 
else if ($type === "bestseller") {
    $query = $conn->prepare("
        SELECT best_id AS id, best_name AS name, best_price AS price, best_image AS image
        FROM bestsellers
        WHERE best_id = ?
    ");
} 
else {
    echo "Invalid type parameter.";
    exit;
}

$query->bind_param("i", $product_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    echo "Product not found.";
    exit;
}

$product = $result->fetch_assoc();
$total_amount = $product['price'];
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

<body class="bg-gray-100 min-h-screen">

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
      <a href="addtocart.php" class="inline-block align-middle">
        <img src="images/header/addtocart.png" alt="Cart" class="h-6 w-6 inline-block align-middle hover:scale-110 transition-transform duration-200">
      </a>
    </nav>
  </header>


<!-- PAGE CONTAINER -->
<div class="max-w-4xl mx-auto p-6 mt-10">

    <h1 class="text-3xl font-bold mb-6 text-center">Complete Your Purchase</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- LEFT: PRODUCT SUMMARY -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

            <?php if ($product): ?>
                <div class="space-y-2">
                    <p class="text-lg"><strong>Product:</strong> <?= htmlspecialchars($product['name']) ?></p>
                    <p class="text-lg"><strong>Price:</strong> ₱<?= number_format($product['price'], 2) ?></p>
                </div>
            <?php else: ?>
                <p class="text-red-500">Product not found.</p>
            <?php endif; ?>
        </div>


        <!-- RIGHT: CUSTOMER DETAILS -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">Customer Details</h2>

            <form class="space-y-4">

                <div>
                    <label class="block mb-1 font-semibold">Full Name</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="Juan Dela Cruz">
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Address</label>
                    <textarea class="w-full border rounded p-2" rows="3" placeholder="Street, Barangay, City, Province"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Phone Number</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="09XXXXXXXXX">
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Payment Method</label>
                    <select class="w-full border rounded p-2">
                        <option>Cash on Delivery</option>
                        <option>GCash</option>
                        <option>Credit / Debit Card</option>
                    </select>
                </div>

            </form>

            <!-- TOTAL -->
            <div class="border-t mt-6 pt-4">
                <p class="flex justify-between text-lg font-semibold">
                    <span>Total:</span>
                    <span class="text-blue-600">
                        ₱<?= number_format($product['price'], 2) ?>
                    </span>
                </p>

                <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg font-bold hover:bg-blue-700 transition">
                    Buy Now
                </button>
            </div>


        </div>
    </div>
</div>

<!-- Footer -->
  <footer class="bg-customBlue text-white pt-10 pb-4 px-6 mt-10">
    <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-16 justify-center text-center md:text-left">

      <!-- Contact Info -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">CONTACT INFO</h4>
        <p class="text-sm mb-1"><strong>ADDRESS:</strong><br>Gabriela ParkCaster Hills<br>Philippines</p>
        <p class="text-sm mt-2"><strong>PHONE:</strong> <br>+(63) 99 450 4823</p>
        <p class="text-sm mt-2"><strong>EMAIL:</strong> <br>panacea@gmai.com.ph</p>
        <p class="text-sm mt-2"><strong>WORKING DAYS/HOURS:</strong> <br>Mon – Sun / 8:00 AM – 6:00 PM</p>
        <div class="flex space-x-4 mt-4">
          <a href="https://www.facebook.com/jeymzyepuda"><img src="images/socials logos/fb.png" alt="Facebook" class="w-6 h-6"></a>
          <a href="https://www.instagram.com/patsue_8/"><img src="images/socials logos/ig.png" alt="Instagram" class="w-6 h-6"></a>
          <a href="https://x.com/"><img src="images/socials logos/x.png" alt="Twitter" class="w-6 h-6"></a>
        </div>
      </div>

      <!-- About -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">ABOUT PANACEA</h4>
        <ul class="space-y-1 text-sm">
          <li><a href="contact.html" class="hover:underline">About Us</a></li>
          <li><a href="privacy.html" class="hover:underline">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Customer Service -->
      <div>
        <h4 class="text-lg font-semibold font-primary mb-3">CUSTOMER SERVICE</h4>
        <ul class="space-y-1 text-sm">
          <li><a href="faq.html" class="hover:underline">Questions?</a></li>
        </ul>
      </div>

    </footer>

    <div class="bg-white text-center p-4">
      <p class="text-sm text-gray-600">&copy; 2025 Panacea Pharmaceutical. All rights reserved.</p>
    </div>

</body>
</html>
