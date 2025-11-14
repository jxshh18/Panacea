<?php
session_start();

if (isset($_POST['best_id'])) {
    $_POST['featured_id'] = $_POST['best_id'];
    $_POST['featured_image'] = $_POST['best_image'];
    $_POST['featured_name'] = $_POST['best_name'];
    $_POST['featured_price'] = $_POST['best_price'];
    $_POST['featured_quantity'] = $_POST['best_quantity'];
}

if (isset($_POST['addtocart'])) {

    $featured_id = $_POST['featured_id'];
    $featured_image = $_POST['featured_image'];
    $featured_name = $_POST['featured_name'];
    $featured_price = $_POST['featured_price'];
    $featured_quantity = isset($_POST['featured_quantity']) ? (int)$_POST['featured_quantity'] : 1;

    if (isset($_SESSION['cart'])) {

        $ids = array_column($_SESSION['cart'], "featured_id");

        if (!in_array($featured_id, $ids)) {

            $_SESSION['cart'][$featured_id] = [
                'featured_id' => $featured_id,
                'featured_image' => $featured_image,
                'featured_name' => $featured_name,
                'featured_price' => $featured_price,
                'featured_quantity' => $featured_quantity
            ];

        } else {
            echo '<script>alert("Item Already Added")</script>';
        }

    } else {

        $_SESSION['cart'][$featured_id] = [
            'featured_id' => $featured_id,
            'featured_image' => $featured_image,
            'featured_name' => $featured_name,
            'featured_price' => $featured_price,
            'featured_quantity' => $featured_quantity
        ];
    }
}

if (isset($_POST['update_quantity'])) {
    $product_id = $_POST['product_id'];
    $new_qty = (int)$_POST['quantity'];

    if ($new_qty > 0) {
        $_SESSION['cart'][$product_id]['featured_quantity'] = $new_qty;
    }
}

if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
}

if (!isset($_SESSION['cart'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panacea Pharmaceutical - Cart</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="images/mainlogos/panacea smol logo.png">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            customBlue: '#0077c8',
            customGreen: { 700: '#28A745', 500: '#2FC250' }
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

<!-- HEADER -->
<header class="bg-white shadow p-4 flex items-center sticky top-0 z-50">
    <a href="index.php"><img src="images/mainlogos/panacea_logo.png" class="h-16"></a>

    <div class="flex-grow mx-4">
      <div class="relative w-1/3">
        <input type="text" placeholder="Search..." class="border rounded p-2 pl-10 w-full" />
      </div>
    </div>

    <nav class="space-x-4">
      <a href="index.php" class="hover:underline">Home</a>
      <a href="faq.html" class="hover:underline">FAQ</a>
      <a href="privacy.html" class="hover:underline">Privacy</a>
      <a href="contact.html" class="hover:underline">Contact</a>

      <a href="signup.php"><img src="images/header/user.png" class="h-6 inline-block"></a>
      <a href="addtocart.php"><img src="images/header/addtocart.png" class="h-6 inline-block"></a>
    </nav>
</header>

<!-- CART -->
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Your Shopping Cart</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full border bg-white shadow rounded-lg">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-3 px-4">Product</th>
            <th class="py-3 px-4">Price</th>
            <th class="py-3 px-4">Quantity</th>
            <th class="py-3 px-4">Subtotal</th>
            <th class="py-3 px-4">Remove</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          $total = 0;
          foreach ($_SESSION['cart'] as $value) { 
            $subtotal = $value['featured_price'] * $value['featured_quantity'];
            $total += $subtotal;
        ?>
          <tr class="border-t">
            <td class="py-4 px-4 flex items-center gap-3">
              <img src="../<?php echo $value['featured_image']; ?>" class="h-16 w-16 object-cover rounded">
              <?php echo $value['featured_name']; ?>
            </td>

            <td class="py-4 px-4">₱<?php echo number_format($value['featured_price'], 2); ?></td>

            <td class="py-4 px-4">
              <form method="POST" action="addtocart.php" class="flex gap-2">
                <input type="hidden" name="product_id" value="<?php echo $value['featured_id']; ?>">
                <input type="number" name="quantity" value="<?php echo $value['featured_quantity']; ?>"
                       min="1" class="w-16 border p-1 rounded">
                <button name="update_quantity" class="text-blue-600 hover:underline">Update</button>
              </form>
            </td>

            <td class="py-4 px-4">₱<?php echo number_format($subtotal, 2); ?></td>

            <td class="py-4 px-4">
              <form method="POST" action="addtocart.php">
                <input type="hidden" name="product_id" value="<?php echo $value['featured_id']; ?>">
                <button name="remove_product" class="text-red-600 hover:underline">remove</button>
              </form>
            </td>
          </tr>
        <?php } ?>
        </tbody>

      </table>
    </div>

    <div class="mt-6 text-right">
        <p class="text-xl font-bold">
          Total: <span class="text-customBlue">₱<?php echo number_format($total, 2); ?></span>
        </p>

        <a href="buypage.php?id=<?php echo $value['featured_id']; ?>">
          <button class="mt-3 px-6 py-2 bg-blue-600 text-white font-semibold rounded">Buy Now</button>
        </a>
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

