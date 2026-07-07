// Navbar effect saat scroll
window.addEventListener("scroll", () => {
    const navbar = document.querySelector("div[style*='border-radius: 50px']");

    if (window.scrollY > 50) {
        navbar.style.boxShadow = "0 8px 25px rgba(0,0,0,0.15)";
        navbar.style.transform = "translateY(-2px)";
        navbar.style.transition = "0.3s";
    } else {
        navbar.style.boxShadow = "none";
        navbar.style.transform = "translateY(0)";
    }
});

// Hover animation untuk icon
const icons = document.querySelectorAll("#search, #profile, #cart");

icons.forEach(icon => {
    icon.addEventListener("mouseenter", () => {
        icon.style.color = "#930500";
        icon.style.transform = "scale(1.2)";
        icon.style.transition = "0.3s";
    });

    icon.addEventListener("mouseleave", () => {
        icon.style.color = "black";
        icon.style.transform = "scale(1)";
    });
});

// Smooth scroll tombol Explore
const startBtn = document.getElementById("startBtn");

startBtn.addEventListener("click", () => {
    const categorySection = document.getElementById("categories");

    if(categorySection){
        categorySection.scrollIntoView({
            behavior: "smooth"
        });
    }
});

// Animasi navbar saat halaman dibuka
window.addEventListener("load", () => {
    const navbar = document.querySelector("div[style*='border-radius: 50px']");

    navbar.style.opacity = "0";
    navbar.style.transform = "translateY(-30px)";

    setTimeout(() => {
        navbar.style.transition = "0.8s ease";
        navbar.style.opacity = "1";
        navbar.style.transform = "translateY(0)";
    }, 100);
});

// Active menu saat section terlihat
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-links");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;

        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.style.color = "#930500";

        if (link.getAttribute("href") === `#${current}`) {
            link.style.color = "#c72a25";
            link.style.fontWeight = "700";
        }
    });
});

document.getElementById("cart").addEventListener("click", () => {
    const cart = document.getElementById("cart");

    cart.animate([
        { transform: "rotate(0deg)" },
        { transform: "rotate(-15deg)" },
        { transform: "rotate(15deg)" },
        { transform: "rotate(0deg)" }
    ], {
        duration: 400
    });
});

const cards = document.querySelectorAll(".top-card");

cards.forEach(card => {
    card.addEventListener("click", () => {

        card.animate([
            { transform: "scale(1)" },
            { transform: "scale(0.95)" },
            { transform: "scale(1)" }
        ], {
            duration: 250
        });

    });
});

cards.forEach(card => {
    card.addEventListener("click", () => {

        document.getElementById("product").scrollIntoView({
            behavior: "smooth"
        });

    });
});

const productCards = document.querySelectorAll(".product-card");

let cart = [];

productCards.forEach(card => {
    card.addEventListener("click", () => {

        card.animate([
            { transform: "scale(1)" },
            { transform: "scale(0.95)" },
            { transform: "scale(1)" }
        ], {
            duration: 250
        });

    });
});

function goToOrder(name, price, image){

    const singleProduct = [
        {
            name: name,
            price: Number(price),
            image: image,
            quantity: 1
        }
    ];

    localStorage.setItem(
        "cart",
        JSON.stringify(singleProduct)
    );

    window.location.href = "order.php";
}

let cartCount = 0;

function addToCart(event, name, price, image){

    event.stopPropagation();

    const btn = event.target;

    btn.animate(
        [
            { transform: "scale(1)" },
            { transform: "scale(0.85)" },
            { transform: "scale(1.15)" },
            { transform: "scale(1)" }
        ],
        {
            duration: 300
        }
    );

    const existingItem = cart.find(
        item => item.name === name
    );

    if(existingItem){
        existingItem.quantity++;
    }else{
        cart.push({
            name,
            price,
            image,
            quantity: 1
        });
    }

    updateCart();
}

function updateCart(){

    let total = 0;

    if(cart.length === 0){

        cartItems.innerHTML =
        `<p class="empty-cart">
            Your cart is empty
        </p>`;

    }else{

        cartItems.innerHTML = "";

        cart.forEach((item,index)=>{

            total += item.price * item.quantity;

            cartItems.innerHTML += `
    <div class="cart-item">

        <div>

            <strong>${item.name}</strong>

            <br>

            Rp${item.price.toLocaleString('id-ID')}

            <br><br>

            <button
                class="qty-btn"
                onclick="decreaseQty(${index})"
            >
                -
            </button>

            <span style="margin:0 8px">
                ${item.quantity}
            </span>

            <button
                class="qty-btn"
                onclick="increaseQty(${index})"
            >
                +
            </button>

        </div>

        <button
            class="delete-btn"
            onclick="removeItem(${index})"
        >
            ✖
        </button>

    </div>
`;
        });
    }

            const totalItems =
        cart.reduce(
            (sum,item) => sum + item.quantity,
            0
        );

        document.getElementById("cart-count").textContent =
        totalItems;

            cartTotal.textContent =
                "Rp" +
                total.toLocaleString("id-ID");
        } 

const cartIcon = document.getElementById("cart");

cartIcon.animate(
    [
        { transform: "rotate(0deg)" },
        { transform: "rotate(-15deg)" },
        { transform: "rotate(15deg)" },
        { transform: "rotate(-10deg)" },
        { transform: "rotate(0deg)" }
    ],
    {
        duration: 500
    }
);

function increaseQty(index){

    cart[index].quantity++;

    updateCart();
}

function decreaseQty(index){

    if(cart[index].quantity > 1){

        cart[index].quantity--;

    }else{

        cart.splice(index,1);
    }

    updateCart();
}


const cartSidebar = document.getElementById("cartSidebar");
const cartItems = document.getElementById("cartItems");
const cartTotal = document.getElementById("cartTotal");

document.getElementById("cart").addEventListener("click", () => {
    cartSidebar.classList.add("active");
});

document.getElementById("closeCart").addEventListener("click", () => {
    cartSidebar.classList.remove("active");
});

function removeItem(index){

    cart.splice(index,1);

    updateCart();
}
document.getElementById("checkoutBtn")
.addEventListener("click", () => {

    console.log("CHECKOUT DIKLIK");
    console.log(cart);

    if(cart.length === 0){
        alert("Cart masih kosong");
        return;
    }

    localStorage.setItem(
        "cart",
        JSON.stringify(cart)
    );

    window.location.href = "order.php";
});

// search bar animation
const searchInput = document.getElementById("searchInput");
const products = document.querySelectorAll(".product-card");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        let value = this.value.toLowerCase();

        products.forEach(card => {

            let name = card.getAttribute("data-name");

            if (name && name.toLowerCase().includes(value)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });

    });

}

const profile = document.querySelector(".profile");

if (profile) {

    profile.addEventListener("click", function() {
        profile.classList.toggle("show");

    });

}