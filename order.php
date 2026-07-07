<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;

}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Checkout - PetShop</title>

    <link rel="stylesheet" href="order.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="checkout-container">


        <!-- LEFT : ORDER -->
        <div class="order-section" id="orderSection">

            <h2>Your Order</h2>

            <div id="orderItems">
                <!-- Produk dari cart akan muncul otomatis lewat order.js -->
            </div>


       <div class="total-box">

    <div class="summary-row">
        <span>Subtotal</span>
        <span id="subTotal">Rp0</span>
    </div>

    <div class="summary-row">
        <span>Shipping Fee</span>
        <span>Rp10.000</span>
    </div>

    <hr>

    <div class="summary-row total-row">
        <strong>Total</strong>
        <strong id="totalPrice">Rp0</strong>
    </div>

</div>

        </div>


        <!-- RIGHT : DELIVERY -->
    <div class="delivery-section">

    <h2>Delivery Information</h2>

    <form action="process_order.php" method="POST">
        <input type="hidden" name="total" id="totalInput">

        <input
            type="text"
            id="fullName"
            name="name"
            placeholder="Full Name"
            required
        >

        <input
            type="text"
            id="phone"
            name="phone"
            placeholder="Phone Number"
            required
        >

        <textarea
            id="address"
            name="address"
            placeholder="Address"
            required
        ></textarea>

        <select
            id="paymentMethod"
            name="payment"
            required
        >
            <option value="" disabled selected>
                Select Payment Method
            </option>

            <option value="Bank Transfer">
                Bank Transfer
            </option>

            <option value="DANA">
                DANA
            </option>

            <option value="OVO">
                OVO
            </option>

            <option value="QRIS">
                QRIS
            </option>

            <option value="Cash on Delivery">
                Cash on Delivery
            </option>
        </select>

        <!-- total dikirim ke database -->
        <button type="button" id="orderBtn">
            Place Order
        </button>

    </form>

</div>

        <!-- invoice -->
        <div id="invoiceBox">

    <div class="invoice-icon">
        ✓
    </div>

    <h2>Order Confirmed</h2>

    <p class="invoice-subtitle">
        Thank you for shopping with PawShop
    </p>

    <div class="invoice-section">

        <div class="invoice-label">
            Customer
        </div>

        <div class="invoice-value" id="invName"></div>

    </div>

    <div class="invoice-section">

        <div class="invoice-label">
            Phone Number
        </div>

        <div class="invoice-value" id="invPhone"></div>

    </div>

    <div class="invoice-section">

        <div class="invoice-label">
            Delivery Address
        </div>

        <div class="invoice-value" id="invAddress"></div>

    </div>

    <div class="total-payment">

        <p>Total Payment</p>

        <h3 id="invTotal"></h3>

    </div>

    <span class="status-paid">
        Paid
    </span>

    <button
        class="back-home"
        onclick="window.location.href='index.php'"
    >
        Back To Home
    </button>

</div>


    <script src="order.js"></script>

</body>
</html>