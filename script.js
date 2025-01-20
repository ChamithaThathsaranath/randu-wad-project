// Home-page image slider function
document.addEventListener("DOMContentLoaded", function () {
    let slideIndex = 0;  // Initialize slideIndex to 0
    showSlides();  // Start the slideshow function

    function showSlides() {
        let slides = document.getElementsByClassName("mySlides");  // Get all slides

        // Hide all slides
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  // Set display to none
        }

        // Increment slideIndex
        slideIndex++;

        // If we go past the number of slides, reset the slideIndex
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        // Show the current slide
        slides[slideIndex - 1].style.display = "block";

        // Call showSlides every 2.5 seconds (2500ms) to cycle through slides
        setTimeout(showSlides, 2500);
    }
});

// Product detail page price update function
function updatePrice() {
    // Get the price from the data attribute
    var productDetails = document.querySelector('.single_pdetails'); // or use a specific selector
    var pricePerUnit = parseInt(productDetails.getAttribute('data-price')); // Read price from data attribute
    var quantity = parseInt(document.getElementById("quantity").value); // Get quantity

    // Calculate the total price
    var totalPrice = pricePerUnit * quantity;

    // Update the displayed total price
    document.getElementById("Price").innerText = "Rs. " + totalPrice;
}

// Remove cart items function
document.addEventListener("DOMContentLoaded", function () {
    // Update the total price when quantity is changed
    var quantityInputs = document.getElementsByClassName('cart-quantity-input');
    for (var i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener('change', updateCartTotal); // Trigger updateCartTotal on quantity change
    }

    // Add remove functionality to all remove buttons
    var removeCartItemButtons = document.getElementsByClassName('remove-btn');
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        removeCartItemButtons[i].addEventListener('click', function (event) {
            var buttonClicked = event.target;
            var row = buttonClicked.closest('.cart-row'); // Remove the closest cart-row
            if (row) {
                row.remove(); // Remove the row from the cart
            }
            updateCartTotal(); // Update total after item removal
        });
    }

    // Initial total update on page load
    updateCartTotal();
});

// Function to update the cart total
function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart-row');
    
    var total = 0; // Initialize total to 0

    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];

        var price = parseFloat(priceElement.innerText.replace('Rs.', '')); // Get the price
        var quantity = quantityElement.value; // Get the quantity value

        total += (price * quantity); // Add the price * quantity to total
    }

    // Update the total price displayed in the checkout section
    document.getElementById('cart-total-price').innerText = 'Rs. ' + total.toFixed(2);
}

// Add to cart function
document.addEventListener("DOMContentLoaded", function () {
    const addToCartButton = document.querySelector('.productPGbutton');
    const productNameElement = document.getElementById('product-name');
    const productPriceElement = document.getElementById('Price');
    const quantityInput = document.getElementById('quantity');
    const productImageElement = document.getElementById('Main-image');  // Using the correct ID for the image

    addToCartButton.addEventListener('click', function () {
        const productName = productNameElement.innerText.trim();
        const productPrice = parseFloat(productPriceElement.innerText.replace('Rs.', '').trim()); // Improved price parsing
        const quantity = parseInt(quantityInput.value) || 1; // Ensures valid quantity input
        const productImageSrc = productImageElement.src;  // Get the image src from the Main-image element

        // Retrieve cart data from localStorage or initialize an empty cart
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product is already in the cart
        const existingProduct = cart.find(item => item.name === productName);

        if (existingProduct) {
            // Update quantity of existing product
            existingProduct.quantity += quantity;
            alert(`${productName} quantity updated to ${existingProduct.quantity}.`);
        } else {
            // If product is new, add it to the cart
            const newProduct = { 
                name: productName, 
                price: productPrice, 
                quantity: quantity, 
                image: productImageSrc 
            };
            cart.push(newProduct);
            alert(`${productName} added to cart.`);
        }

        // Store updated cart in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Re-render the cart to show the newly added product
        renderCart();
    });

    // Render the cart on page load to display existing items
    renderCart();
});





document.addEventListener("DOMContentLoaded", function () {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalElement = document.getElementById('cart-total-price'); // The total display element

    // Load cart data from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartTotal = parseFloat(localStorage.getItem('cartTotal')) || 0; // Fetch the stored cart total or set to 0

    function renderCart() {
        // Clear existing cart items
        cartItemsContainer.innerHTML = '';

        // Loop through the cart and add each product to the cart table
        cart.forEach((product, index) => {
            const subtotal = product.price * product.quantity; // Calculate subtotal
            const cartRow = document.createElement('tr');
            cartRow.classList.add('cart-row');
            cartRow.innerHTML = `
                <td class="cart-item cart-column">
                    <img class="cart-item-image" src="${product.image}" width="100" height="100" alt="${product.name}">
                    <span class="cart-item-title">${product.name}</span>
                </td>
                <td class="cart-price cart-column">Rs.${product.price.toFixed(2)}</td>
                <td class="cart-quantity cart-column">
                    <input class="cart-quantity-input" type="number" value="${product.quantity}" min="1" data-index="${index}">
                </td>
                <td class="cart-subtotal cart-column">Rs.${subtotal.toFixed(2)}</td> <!-- Subtotal column -->
                <td>
                    <button class="remove-btn" type="button" data-index="${index}">Remove</button>
                </td>
            `;
            cartItemsContainer.appendChild(cartRow);
        });

        // Update total price and store it in localStorage
        updateCartTotal();

        // Attach event listeners for remove and quantity change
        addRemoveEventListeners();
        addQuantityChangeEventListeners();
    }

    // Function to update the cart total
    function updateCartTotal() {
        cartTotal = 0; // Reset the cartTotal each time we update
        cart.forEach(product => {
            cartTotal += product.price * product.quantity;
        });

        // Update the total price displayed in the checkout section
        cartTotalElement.innerText = 'Rs. ' + cartTotal.toFixed(2);

        // Save the updated total in localStorage so it can be accessed by the checkout page
        localStorage.setItem('cartTotal', cartTotal.toFixed(2));  // Store the updated total in localStorage
    }

    // Function to add event listeners to remove buttons
    function addRemoveEventListeners() {
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const index = button.getAttribute('data-index');
                removeProductFromCart(index);
            });
        });
    }

    // Function to remove a product from the cart
    function removeProductFromCart(index) {
        // Remove product from cart array
        cart.splice(index, 1);

        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Re-render cart to reflect changes
        renderCart();
    }

    // Function to add event listeners to quantity inputs
    function addQuantityChangeEventListeners() {
        const quantityInputs = document.querySelectorAll('.cart-quantity-input');
        quantityInputs.forEach(input => {
            input.addEventListener('change', function () {
                const index = input.getAttribute('data-index');
                const newQuantity = parseInt(input.value) || 1; // Ensure valid quantity input

                // Update quantity in the cart
                cart[index].quantity = newQuantity;

                // Save updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                // Recalculate and update the subtotal for the changed item
                const subtotalCell = input.parentElement.nextElementSibling;
                const newSubtotal = cart[index].price * newQuantity;
                subtotalCell.textContent = `Rs.${newSubtotal.toFixed(2)}`;

                // Update the cart total
                updateCartTotal();
            });
        });
    }

    // Render the cart on page load
    renderCart();
});



// Function to update the cart total
function updateCartTotal() {
    let total = 0;

    // Recalculate the total based on subtotals
    cart.forEach(product => {
        total += product.price * product.quantity;
    });

    // Save the total to localStorage
    localStorage.setItem('cartTotal', total.toFixed(2));

    // Update the total price displayed in the cart page
    document.getElementById('cart-total-price').innerText = 'Rs. ' + total.toFixed(2);
}



document.addEventListener("DOMContentLoaded", function () {
    const totalPriceElement = document.getElementById('cart-total-price');

    // Function to update total price dynamically
    function updateTotalPrice() {
        // Retrieve the total from localStorage
        const savedTotal = localStorage.getItem('cartTotal');  

        if (savedTotal) {
            // If the total is available in localStorage, update the total in the checkout page
            totalPriceElement.innerText = 'Rs. ' + savedTotal;
        } else {
            // If no total is saved, display a default value
            totalPriceElement.innerText = 'Rs. 0.00';
        }
    }

    // Update total price every 500ms to ensure real-time updates
    setInterval(updateTotalPrice, 500); // Adjust the interval as needed

    // Initially update total price when page loads
    updateTotalPrice();
});
// Home-page image slider function
document.addEventListener("DOMContentLoaded", function () {
    let slideIndex = 0;  // Initialize slideIndex to 0
    showSlides();  // Start the slideshow function

    function showSlides() {
        let slides = document.getElementsByClassName("mySlides");  // Get all slides

        // Hide all slides
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  // Set display to none
        }

        // Increment slideIndex
        slideIndex++;

        // If we go past the number of slides, reset the slideIndex
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        // Show the current slide
        slides[slideIndex - 1].style.display = "block";

        // Call showSlides every 2.5 seconds (2500ms) to cycle through slides
        setTimeout(showSlides, 2500);
    }
});

// Product detail page price update function
function updatePrice() {
    // Get the price from the data attribute
    var productDetails = document.querySelector('.single_pdetails'); // or use a specific selector
    var pricePerUnit = parseInt(productDetails.getAttribute('data-price')); // Read price from data attribute
    var quantity = parseInt(document.getElementById("quantity").value); // Get quantity

    // Calculate the total price
    var totalPrice = pricePerUnit * quantity;

    // Update the displayed total price
    document.getElementById("Price").innerText = "Rs. " + totalPrice;
}

// Remove cart items function
document.addEventListener("DOMContentLoaded", function () {
    // Update the total price when quantity is changed
    var quantityInputs = document.getElementsByClassName('cart-quantity-input');
    for (var i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener('change', updateCartTotal); // Trigger updateCartTotal on quantity change
    }

    // Add remove functionality to all remove buttons
    var removeCartItemButtons = document.getElementsByClassName('remove-btn');
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        removeCartItemButtons[i].addEventListener('click', function (event) {
            var buttonClicked = event.target;
            var row = buttonClicked.closest('.cart-row'); // Remove the closest cart-row
            if (row) {
                row.remove(); // Remove the row from the cart
            }
            updateCartTotal(); // Update total after item removal
        });
    }

    // Initial total update on page load
    updateCartTotal();
});

// Function to update the cart total
function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart-row');
    
    var total = 0; // Initialize total to 0

    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];

        var price = parseFloat(priceElement.innerText.replace('Rs.', '')); // Get the price
        var quantity = quantityElement.value; // Get the quantity value

        total += (price * quantity); // Add the price * quantity to total
    }

    // Update the total price displayed in the checkout section
    document.getElementById('cart-total-price').innerText = 'Rs. ' + total.toFixed(2);
}

// Add to cart function
document.addEventListener("DOMContentLoaded", function () {
    const addToCartButton = document.querySelector('.productPGbutton');
    const productNameElement = document.getElementById('product-name');
    const productPriceElement = document.getElementById('Price');
    const quantityInput = document.getElementById('quantity');
    const productImageElement = document.getElementById('Main-image');  // Using the correct ID for the image

    addToCartButton.addEventListener('click', function () {
        const productName = productNameElement.innerText.trim();
        const productPrice = parseFloat(productPriceElement.innerText.replace('Rs.', '').trim()); // Improved price parsing
        const quantity = parseInt(quantityInput.value) || 1; // Ensures valid quantity input
        const productImageSrc = productImageElement.src;  // Get the image src from the Main-image element

        // Retrieve cart data from localStorage or initialize an empty cart
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product is already in the cart
        const existingProduct = cart.find(item => item.name === productName);

        if (existingProduct) {
            // Update quantity of existing product
            existingProduct.quantity += quantity;
            alert(`${productName} quantity updated to ${existingProduct.quantity}.`);
        } else {
            // If product is new, add it to the cart
            const newProduct = { 
                name: productName, 
                price: productPrice, 
                quantity: quantity, 
                image: productImageSrc 
            };
            cart.push(newProduct);
            alert(`${productName} added to cart.`);
        }

        // Store updated cart in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Re-render the cart to show the newly added product
        renderCart();
    });

    // Render the cart on page load to display existing items
    renderCart();
});





document.addEventListener("DOMContentLoaded", function () {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalElement = document.getElementById('cart-total-price'); // The total display element

    // Load cart data from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartTotal = parseFloat(localStorage.getItem('cartTotal')) || 0; // Fetch the stored cart total or set to 0

    function renderCart() {
        // Clear existing cart items
        cartItemsContainer.innerHTML = '';

        // Loop through the cart and add each product to the cart table
        cart.forEach((product, index) => {
            const subtotal = product.price * product.quantity; // Calculate subtotal
            const cartRow = document.createElement('tr');
            cartRow.classList.add('cart-row');
            cartRow.innerHTML = `
                <td class="cart-item cart-column">
                    <img class="cart-item-image" src="${product.image}" width="100" height="100" alt="${product.name}">
                    <span class="cart-item-title">${product.name}</span>
                </td>
                <td class="cart-price cart-column">Rs.${product.price.toFixed(2)}</td>
                <td class="cart-quantity cart-column">
                    <input class="cart-quantity-input" type="number" value="${product.quantity}" min="1" data-index="${index}">
                </td>
                <td class="cart-subtotal cart-column">Rs.${subtotal.toFixed(2)}</td> <!-- Subtotal column -->
                <td>
                    <button class="remove-btn" type="button" data-index="${index}">Remove</button>
                </td>
            `;
            cartItemsContainer.appendChild(cartRow);
        });

        // Update total price and store it in localStorage
        updateCartTotal();

        // Attach event listeners for remove and quantity change
        addRemoveEventListeners();
        addQuantityChangeEventListeners();
    }

    // Function to update the cart total
    function updateCartTotal() {
        cartTotal = 0; // Reset the cartTotal each time we update
        cart.forEach(product => {
            cartTotal += product.price * product.quantity;
        });

        // Update the total price displayed in the checkout section
        cartTotalElement.innerText = 'Rs. ' + cartTotal.toFixed(2);

        // Save the updated total in localStorage so it can be accessed by the checkout page
        localStorage.setItem('cartTotal', cartTotal.toFixed(2));  // Store the updated total in localStorage
    }

    // Function to add event listeners to remove buttons
    function addRemoveEventListeners() {
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const index = button.getAttribute('data-index');
                removeProductFromCart(index);
            });
        });
    }

    // Function to remove a product from the cart
    function removeProductFromCart(index) {
        // Remove product from cart array
        cart.splice(index, 1);

        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Re-render cart to reflect changes
        renderCart();
    }

    // Function to add event listeners to quantity inputs
    function addQuantityChangeEventListeners() {
        const quantityInputs = document.querySelectorAll('.cart-quantity-input');
        quantityInputs.forEach(input => {
            input.addEventListener('change', function () {
                const index = input.getAttribute('data-index');
                const newQuantity = parseInt(input.value) || 1; // Ensure valid quantity input

                // Update quantity in the cart
                cart[index].quantity = newQuantity;

                // Save updated cart to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                // Recalculate and update the subtotal for the changed item
                const subtotalCell = input.parentElement.nextElementSibling;
                const newSubtotal = cart[index].price * newQuantity;
                subtotalCell.textContent = `Rs.${newSubtotal.toFixed(2)}`;

                // Update the cart total
                updateCartTotal();
            });
        });
    }

    // Render the cart on page load
    renderCart();
});



// Function to update the cart total
function updateCartTotal() {
    let total = 0;

    // Recalculate the total based on subtotals
    cart.forEach(product => {
        total += product.price * product.quantity;
    });

    // Save the total to localStorage
    localStorage.setItem('cartTotal', total.toFixed(2));

    // Update the total price displayed in the cart page
    document.getElementById('cart-total-price').innerText = 'Rs. ' + total.toFixed(2);
}



document.addEventListener("DOMContentLoaded", function () {
    const totalPriceElement = document.getElementById('cart-total-price');

    // Function to update total price dynamically
    function updateTotalPrice() {
        // Retrieve the total from localStorage
        const savedTotal = localStorage.getItem('cartTotal');  

        if (savedTotal) {
            // If the total is available in localStorage, update the total in the checkout page
            totalPriceElement.innerText = 'Rs. ' + savedTotal;
        } else {
            // If no total is saved, display a default value
            totalPriceElement.innerText = 'Rs. 0.00';
        }
    }

    // Update total price every 500ms to ensure real-time updates
    setInterval(updateTotalPrice, 500); // Adjust the interval as needed

    // Initially update total price when page loads
    updateTotalPrice();
});
