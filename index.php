<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <title>Pet Shop</title>
</head>

<body
    style="
        font-family: 'Nunito', sans-serif;
        font-size: large;
        background-color: #930500;
    "
>

    <div
        id="hero"
    >

        <!-- Navbar -->
        <div
            style="
                width: 100%;
                display: flex;
                justify-content: center;
                padding-top: 20px;
            "
        >

            <div
                style="
                    width: 65%;
                    height: 50px;
                    background: white;
                    display: flex;
                    align-items: center;
                    padding: 0px 15px;
                    border-radius: 50px;
                "
            >

                <!-- Logo -->
                <img
                    src="logo pet.png"
                    width="175px"
                    style="
                        margin-left: -30px;
                        margin-top: 15px;
                    "
                >

                <!-- Menu -->
                <div
                    style="
                        flex: 1;
                        display: flex;
                        justify-content: center;
                    "
                >

                    <div
                        style="
                            display: flex;
                            gap: 25px;
                            position: absolute;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            font-size: 15px;
                            top: 50%;
                            align-items: center;
                            
                        "
                    >
                        <a href="#about" class="nav-links">About</a>
                        <a href="#product" class="nav-links">Product</a>
                        <a href="#contact" class="nav-links">Contact</a>
                    </div>

                </div>

                <!-- Icons -->
                <div
                    style="
                        display: flex;
                        gap: 20px;
                        font-size: 15px;
                        margin-left: auto;
                        margin-right: 10px;
                        align-items: center;
                    "
                >

                    <?php if (isset($_SESSION["id"])): ?>

                        <div class="profile">
                            <a href="profile.php">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>

                        <?php else: ?>

                        <a href="login.php">
                            <i id="profile" class="fas fa-user"></i>
                        </a>

                        <?php endif; ?>

                                    <div class="cart-wrapper">
                                        <i id="cart" class="fas fa-cart-shopping"></i>
                                        <span id="cart-count">0</span>
                                    </div>
                                    

                                </div>

                            </div>

                        </div>

        <!-- Hero Button -->
        <div class="hero-content">

            <h1>
                Your Pet Deserves The Best
            </h1>
            <p> 
            </p>

            <button id="startBtn">
                Explore
            </button>

        </div>

        <!-- Hero Image -->
        <div class="hero-image">

            <img src="hero.png" alt="Pet">

        </div>
    </div>

    <!-- Categories -->
    <section id="categories" class="categories">

    <h2>Top Categories</h2>

    <div class="categories-grid">

        <div class="top-card">
            <h4>Pet Food</h4>
            <img src="FOTOS IA.png" alt="Pet Food">
        </div> 

        <div class="top-card">
            <h4>Pet Toys</h4>
            <img src="toys.png" alt="Pet Food">
        </div>

        <div class="top-card">
            <h4>Pet Care</h4>
            <img src="care.png" alt="Pet Care">
        </div>

        <div class="top-card">
            <h4>Pet Medicines</h4>
            <img src="obat.png" alt="Pet Food">
        </div>

    </div>

    </section>

    <!-- Products -->
    <section id="product" class="products">

    <h2>Our Products</h2>

            <div class="product-grid">
            <div class="product-card" data-name="kibble">

            <img src="FOTOS IA.png">

            <p>Kibble</p>

            <div class="price-row">

                <span>Rp25.000</span>

                <div class="action-btns">

                    <button
                        class="cart-btn"
                        onclick="addToCart(event, 'Kibble', 25000, 'FOTOS IA.png')"
                    >
                        +
                    </button>

                    <button
                        class="buy-btn"
                        onclick="goToOrder(
                            'Kibble',
                            '25000',
                            'FOTOS IA.png'
                        )"
                    >
                        Buy
                    </button>

                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="whiskaskiten.png">

            <p>Whiskas Kitten 11kg</p>

            <div class="price-row">

                <span>Rp75.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event,  'Whiskas Kitten 11kg', 75000, 'whiskaskiten.png  ')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Whiskas Kitten 11kg',
                        '75000',
                        'whiskaskiten.png'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="whiskaswet.png">

            <p>Whiskas Wet Food Adult 400g</p>

            <div class="price-row">

                <span>Rp24.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'Whiskas Wet Food Adult 400g', 24000, 'whiskaswet.jpg')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Whiskas Wet Food Adult 400g',
                        '24000',
                        'whiskaswet.jpg'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="rcgolden.png">

            <p>Royal Canin Golden Retriever Puppy 3kg Dry</p>

            <div class="price-row">

                <span>Rp351.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'Royal Canin Golden Retriever Puppy 3kg Dry', 351000, 'rcgolden.png')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Royal Canin Golden Retriever Puppy 3kg Dry',
                        '351000',
                        'rcdolden.png'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="rchairball.png">

            <p>Royal Canin Hairball Care Wet 85gr</p>

            <div class="price-row">

                <span>Rp21.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'Royal Canin Hairball Care Wet 85gr', 21000, 'rchairball.png')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Royal Canin Hairball Care Wet 85gr',
                        '21000',
                        'rchairball.png'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="flu.png">

            <p>Botanicat Cold & Flu 6gr</p>

            <div class="price-row">

                <span>Rp35.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'Botanicat Cold & Flu 6gr', 35000, 'flu.png')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Botanicat Cold & Flu 6gr',
                        '35000',
                        'flu.png'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="1.png">

            <p>Cat Stratcher Box</p>

            <div class="price-row">

                <span>Rp30.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'Cat Stratcher Box', 30000, 'pet.png')"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Cat Stratcher Box',
                        '30000',
                        'pet.png'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

        <div class="product-card">

            <img src="shampoopet.png">

            <p>CATAPAW Shampo Anti Jamur</p>

            <div class="price-row">

                <span>Rp31.000</span>

                <div class="action-btns">

                <button
                    class="cart-btn"
                    onclick="addToCart(event, 'CATAPAW Shampo Anti Jamur', 31000, 'shampoopet.png'  )"
                >
                    +
                </button>

                <button
                    class="buy-btn"
                    onclick="goToOrder(
                        'Whiskas Kitten 11kg',
                        '55000',
                        'whiskas.jpg'
                    )"
                >
                    Buy
                    </button>
                </div>
            </div>
        </div>

    </div>

    </section>
    

    <!-- Contact -->
<section id="contact">

    <div class="contact-header">
        <h2>Contact Us</h2>
        <p>Have any questions? We'd love to hear from you.</p>
    </div>

    <div class="contact-cards">

        <div class="contact-card">
            <i class="fas fa-phone-alt"></i>
            <h4>Phone</h4>
            <a href="https://wa.me/6283875387724">
                +62 838-7538-7724
            </a>
        </div>

        <div class="contact-card">
            <i class="fas fa-envelope"></i>
            <h4>Email</h4>
            <p>shalwahsein@gmail.com</p>
        </div>

        <div class="contact-card">
            <i class="fas fa-map-marker-alt"></i>
            <h4>Address</h4>
            <p>Paw Paw Street No.127, Sukabumi</p>
        </div>

        <div class="contact-card">
            <i class="fas fa-clock"></i>
            <h4>Open Hours</h4>
            <p>Mon - Sat<br>08.00 - 20.00</p>
        </div>

    </div>

</section>

<footer class="footer">

    <div class="footer-container">

        <!-- Logo -->
        <div class="footer-col">

            <img src="logo pet.png" class="footer-logo">

            <p>
                We provide the best quality products
                for your beloved pets.
            </p>

            <div class="footer-social">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-tiktok"></i>
            </div>

        </div>


        <!-- Navigation -->
        <div class="footer-col">

            <h4>Quick Links</h4>

            <a href="#about">About</a>
            <a href="#product">Products</a>
            <a href="#contact">Contact</a>

        </div>


        <!-- Customer -->
        <div class="footer-col">

            <h4>Customer Service</h4>

            <a href="#">FAQ</a>
            <a href="#">Shipping</a>
            <a href="#">Returns</a>
            <a href="#">Privacy Policy</a>

        </div>


        <!-- Subscribe -->
        <div class="footer-col">

            <h4>Subscribe</h4>

            <p>
                Get updates on new products
                and promotions.
            </p>

            <div class="subscribe-box">

                <input
                    type="email"
                    placeholder="Enter your email">

                <button>
                    <i class="fas fa-paw"></i>
                </button>

            </div>

        </div>

    </div>


    <div class="footer-bottom">
        © 2026 PawShop. All Rights Reserved.
    </div>

</footer>

    <div id="cartSidebar" class="cart-sidebar">

    <div class="cart-header">
        <h3>My Cart</h3>

        <button id="closeCart">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div id="cartItems" class="cart-items">

        <p class="empty-cart">
            Your cart is empty
        </p>

    </div>

    <div class="cart-footer">

        <div class="cart-total">
            <span>Total</span>
            <span id="cartTotal">
                Rp0
            </span>
        </div>

        <button id="checkoutBtn">
            Checkout
        </button>

    </div>

</div>

    <script src="script.js"></script>

</body>
</html>