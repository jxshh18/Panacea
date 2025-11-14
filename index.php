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
      <a href="addtocart.php" class="inline-block align-middle">
        <img src="images/header/addtocart.png" alt="Cart" class="h-6 w-6 inline-block align-middle hover:scale-110 transition-transform duration-200">
      </a>
    </nav>
  </header>

  <!-- Banner -->
  <div class="carousel">
    <div class="slider-container">
        <div class="slider">
            <img src="images/banner/We_Care.png" alt="Image 1">
            <img src="images/banner/Keep_Yourself_Safe.png" alt="Image 2">
            <img src="images/banner/Help_Us.png" alt="Image 3">
        </div>
    </div>
  </div>

  <!-- Categories Section -->
<section id="products" class="py-10 px-6">
  <h3 class="text-2xl font-semibold text-center mb-8 text-primary">Shop by Category</h3>
  <div class="category-container">
  <?php include('server/get_categories.php'); ?>
  <?php while($row=$categories->fetch_assoc()){ ?>
    <a href="server/category.php?id=<?php echo $row['category_id']; ?>" class="category-item">
      <img src="<?php echo $row['category_image']; ?>">
      <p><?php echo $row['category_name']; ?></p>
    </a>
  <?php }?>
  </div>
</section>

<div class="mx-auto w-[1400px] border-b-2 border-gray-300 mb-6"></div>

  <!-- Featured Section -->
 <section id="products" class="py-10 px-6">
  <h3 class="text-2xl font-semibold text-center mb-8 text-primary">Featured Products</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
  <?php include('server/get_featured_products.php'); ?>
  <?php while($row=$featured_products->fetch_assoc()){ ?>
    <div class="bg-white shadow rounded p-4 hover:shadow-xl transition duration-300 cursor-pointer flex flex-col h-full">
      <a href="server/featuredproducts.php?id=<?php echo $row['featured_id']; ?>">
        <img src="<?php echo $row['featured_image']; ?>" class="mx-auto mb-4 h-80 object-contain">
      </a>
        <h4 class="font-semibold text-center text-primary"><?php echo $row['featured_name']; ?></h4>
        <p class="text-base text-customGreen-700 text-center font-bold">₱<?php echo $row['featured_price']; ?></p>
        <div class="text-center mt-4 flex justify-center gap-10">
          <a href="buypage.php?id=<?php echo $row['featured_id']; ?>&type=featured">
              <button class="bg-customBlue text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Buy Now
              </button>
          </a>
        </div>
    </div>
  <?php }?>
  </div>
  </section>

  <!-- Best Seller Section -->
 <section id="products" class="py-10 px-6">
  <h3 class="text-2xl font-semibold text-center mb-8 text-primary">Best Sellers</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
  <?php include('server/get_bestseller.php'); ?>
  <?php while($row=$bestseller_products->fetch_assoc()){ ?>
  <div class="bg-white shadow rounded p-4 hover:shadow-xl transition duration-300 cursor-pointer flex flex-col h-full">
    <a href="server/bestsellerproducts.php?id=<?php echo $row['best_id']; ?>">
      <img src="<?php echo $row['best_image']; ?>" class="mx-auto mb-4 h-80 object-contain">
    </a>
      <h4 class="font-semibold text-center text-primary"><?php echo $row['best_name']; ?></h4>
      <p class="text-base text-customGreen-700 text-center font-bold">₱<?php echo $row['best_price']; ?></p>
      <div class="text-center mt-4 flex justify-center gap-10">
        <a href="buypage.php?id=<?php echo $row['best_id']; ?>&type=bestseller">
            <button class="bg-customBlue text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              Buy Now
            </button>
        </a>
      </div>
  </div>
  <?php }?>
  </div>
  </section>

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
