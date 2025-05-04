// Example cart array
let cart = [
        { productId: 1, name: "T-Shirt", price: 10.0, quantity: 2 },
        { productId: 2, name: "Jeans", price: 20.0, quantity: 1 }
    ];
    
    function placeOrder(userId) {
        const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    
        // Send cart and user ID to backend
        fetch("place_order.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ userId, cart, total })
        }).then(res => res.json())
        .then(data => alert(data.message));
    }
