// Ambil data cart dari localStorage
const cart = JSON.parse(localStorage.getItem("cart")) || [];

// Ambil tempat untuk menampilkan item
const orderItems = document.getElementById("orderItems");

const totalPrice = document.getElementById("totalPrice");

let total = 0;


// Tampilkan semua produk
cart.forEach(item => {

    const subtotal = item.price * item.quantity;

    total += subtotal;


    orderItems.innerHTML += `
    
        <div class="order-item">

            <h3>${item.name}</h3>

            <p>
                Price: Rp${item.price.toLocaleString("id-ID")}
            </p>

            <p>
                Quantity: ${item.quantity}
            </p>

            <span>
                Subtotal: Rp${subtotal.toLocaleString("id-ID")}
            </span>

        </div>

    `;

});


// Tampilkan total harga
const shippingFee = 10000;
const grandTotal = total + shippingFee;
document.getElementById("subTotal").textContent =
"Rp" + total.toLocaleString("id-ID");


// Tampilkan total harga
document.getElementById("invTotal").textContent =
    totalPrice.textContent =
    "Rp" + grandTotal.toLocaleString("id-ID");

document.getElementById("totalInput").value = grandTotal;



// Tombol Place Order
document.getElementById("orderBtn")
.addEventListener("click", () => {

    // tampil invoice
    document.getElementById("invName").textContent =
        document.getElementById("fullName").value;

    document.getElementById("invPhone").textContent =
        document.getElementById("phone").value;

    document.getElementById("invAddress").textContent =
        document.getElementById("address").value;

    document.getElementById("invTotal").textContent =
        totalPrice.textContent;

fetch("process_order.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    },
    body:
        "name=" + encodeURIComponent(document.getElementById("fullName").value) +
        "&phone=" + encodeURIComponent(document.getElementById("phone").value) +
        "&address=" + encodeURIComponent(document.getElementById("address").value) +
        "&payment=" + encodeURIComponent(document.getElementById("paymentMethod").value) +
        "&total=" + encodeURIComponent(grandTotal) +
        "&cart=" + encodeURIComponent(JSON.stringify(cart))
})
.then(response => response.text())
.then(data => {

    console.log(data);

    document.querySelector(".delivery-section").style.display = "none";
    document.getElementById("orderSection").style.display = "none";
    document.getElementById("invoiceBox").style.display = "block";

});

});