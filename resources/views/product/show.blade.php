<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woofern</title>
    <!-- Including jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Linking external stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">FlowerBox</div>
        <div class="search-bar">
            <input type="text" placeholder="Search for flowers, gifts, cakes...">
        </div>
        <div class="icons">
            <a href="#">Login</a>
            <a href="#">Cart ({{$cart_count}})</a> <!-- Dynamic cart count -->
        </div>
    </header>

    <!-- Navigation Links -->
    <nav class="nav-links">
        <a href="#">Home</a>
        <a href="#">Flowers</a>
        <a href="#">Cakes</a>
        <a href="#">Gifts</a>
        <a href="#">Combos</a>
        <a href="#">Occasions</a>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Left Section: Images -->
        <div class="left-section">
            <div class="main-image">
                <img src="https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg" alt="Blue Beauty Flower Box">
            </div>
            <div class="thumbnails">
                <img src="https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg" alt="Thumbnail 1">
                <img src="https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg" alt="Thumbnail 2">
                <img src="https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg" alt="Thumbnail 3">
            </div>
        </div>

        <!-- Right Section: Product Details -->
        <div class="right-section">
            <div class="product-title">{{$product->name}}</div> <!-- Dynamic product name -->
            <div class="ratings">
                <div class="stars">⭐⭐⭐⭐☆  <span>(120 Ratings)</span></div>
            </div>
            <hr>
            <div class="price mt1">₹ {{$product->price}}</div> <!-- Dynamic product price -->

            <!-- Product Variants -->
            <div class="variant-selection">
                <div class="variant" onclick="selectVariant('flowers')">
                    <p>Blue Beauty Box</p>
                    <p>₹ 1695</p>
                </div>
                <div class="variant" onclick="selectVariant('with_cake')">
                    <p>With Cake</p>
                    <p>₹ 2045</p>
                </div>
            </div>

            <!-- Display session message if available -->
            @if(session('message'))
                <div class="message">{{ session('message') }}</div>
            @endif

            <!-- Editable Country Input -->
            <div class="editable-container" style="...">
                <input type="text" id="editable-input" class="editable-input" value="INDIA" readonly>
                <span class="edit-icon" id="edit-icon">✏️</span>
            </div>

            <!-- Pincode Check Section -->
            <div class="pincode-section">
                <input type="text" id="pincode-input" placeholder="Enter Pincode/Location">
                <button type="button" id="check-pincode-btn" onclick="checkDelivery()">Check</button>
            </div>
            <div id="message-container" class="message"></div>

            <!-- Delivery Options -->
            <div class="delivery-options" id="deliveryOptions">
                <div class="delivery-header">
                    <button id="todayBtn" onclick="showSlots('today')" class="active">Today</button>
                    <button id="tomorrowBtn" onclick="showSlots('tomorrow')">Tomorrow</button>
                    <button id="selectDateBtn" onclick="showSlots('calendar')">Select Date</button>
                </div>
                <div class="delivery-slots" id="slots"></div>
                <input type="date" id="calendar" onchange="showCustomSlots()">
            </div>

            <!-- Offer Section -->
            <div class="offer-container" id="offerContainer">
                <div>
                    <h2>Save <span class="highlight">₹ 3000</span> | Enjoy <span class="highlight">Priority Service</span></h2>
                </div>
                <div class="offer-details">
                    <div>
                        <span>🚚 FREE Standard Delivery</span>
                        <span>🚚 50% OFF on Special Deliveries</span>
                    </div>
                    <div>
                        <span>💰 5% Cashback on all Orders</span>
                        <span>💡 Customized Expert Recommendations</span>
                    </div>
                </div>
                <div class="cta-section">
                    <div class="cta-price">ADD ₹ 99 <del>₹ 999</del> / 1 year</div>
                    <button class="cta-button">Know more</button>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="tabs">
                <div class="tab active" onclick="showTab('product-info')">Product Info</div>
                <div class="tab" onclick="showTab('description')">Description</div>
                <div class="tab" onclick="showTab('more-info')">More Info</div>
            </div>
            <div id="product-info" class="tab-content active">
                <p>Exotic blue hydrangeas carefully curated in a luxury flower box...</p>
            </div>
            <div id="description" class="tab-content">
                <p>Express your heartfelt emotions with this exquisite flower arrangement...</p>
            </div>
            <div id="more-info" class="tab-content">
                <p>Box Dimensions: 20cm x 20cm x 15cm...</p>
            </div>

            <!-- Reviews Section -->
            <div class="reviews">
                <h3>Customer Reviews</h3>
                <div class="review">
                    <strong>John D.</strong>
                    <p>Absolutely beautiful! The flowers were fresh...</p>
                </div>
                <div class="review">
                    <strong>Maria K.</strong>
                    <p>The box was stunning and made my friend’s birthday extra special!</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="buttons">
                <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
                <button class="extra-special">Make It Extra Special</button>
            </div>
            <div id="message"></div>
        </div>
    </div>

    <!-- JavaScript Functions -->
    <script>
        function showTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            // Deactivate all tabs
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            // Show selected tab content
            document.getElementById(tabId).classList.add('active');
            // Highlight the active tab
            event.target.classList.add('active');
        }

        // Enable editing of the country input
        const inputField = document.getElementById('editable-input');
        const editIcon = document.getElementById('edit-icon');

        editIcon.addEventListener('click', () => {
            inputField.removeAttribute('readonly');
            inputField.focus();
        });

        inputField.addEventListener('blur', () => {
            inputField.setAttribute('readonly', true);
        });

        let selectedVariant = null;

        // Variant Selection
        function selectVariant(variant) {
            selectedVariant = variant;
            document.querySelectorAll('.variant').forEach(v => v.classList.remove('selected'));
            document.querySelector(`.variant:nth-child(${variant === 'flowers' ? 1 : 2})`).classList.add('active');
            const variants = document.querySelectorAll('.variant');

            variants.forEach(function(variant) {
                variant.addEventListener('click', function() {
                    // Remove the 'active' class from all variants
                    variants.forEach(function(v) {
                        v.classList.remove('active');
                    });

                    // Add the 'active' class to the clicked variant
                    variant.classList.add('active');
                });
            });
        }

        // Check Delivery Function
        function checkDelivery() {
            // Handle AJAX request for pincode validation
            document.getElementById('check-pincode-btn').addEventListener('click', () => {
                    const pincode = document.getElementById('pincode-input').value;
                    const messageContainer = document.getElementById('message-container');

                    if (!pincode) {
                        messageContainer.textContent = 'Please enter a pincode.';
                        messageContainer.className = 'message error';
                        return;
                    }
            
            $.ajax({
                url: '{{ route("location.check") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    pincode: pincode
                },
                success: function (response) {
                    messageContainer.textContent = response.message;
                    if(response.message=='Valid Pincode'){
                        messageContainer.className = 'message ' + response.status;
                    document.getElementById('deliveryOptions').style.display = 'block';
                    showSlots('today');
                    }
                   
                },
                error: function () {
                    messageContainer.textContent = 'Something went wrong. Please try again.';
                    messageContainer.className = 'message error';
                }
            });
            });
        }

        // Show Slots
        function showSlots(option) {
            const slotsDiv = document.getElementById('slots');
            document.getElementById('calendar').style.display = option === 'calendar' ? 'block' : 'none';

            document.querySelectorAll('.delivery-header button').forEach(btn => btn.classList.remove('active'));
            document.getElementById(`${option}Btn`).classList.add('active');

            let slots = [];
            if (option === 'today') slots = ["9 AM - 12 PM", "1 PM - 4 PM", "6 PM - 9 PM"];
            if (option === 'tomorrow') slots = ["10 AM - 1 PM", "2 PM - 5 PM", "7 PM - 10 PM"];

            slotsDiv.innerHTML = slots.map(slot => `<div class='slot' onclick="selectSlot(this)">${slot}</div>`).join('');
        }

        function showCustomSlots() {
            const selectedDate = document.getElementById('calendar').value;
            const slots = ["8 AM - 11 AM", "12 PM - 3 PM", "4 PM - 7 PM"];
            document.getElementById('slots').innerHTML = slots.map(slot => `<div class='slot' onclick="selectSlot(this)">${slot}</div>`).join('');
        }

        let selectedSlot = null;
        function selectSlot(slot) {
            document.querySelectorAll('.slot').forEach(s => s.classList.remove('selected'));
            slot.classList.add('selected');
            selectedSlot = slot.innerText;
        }

        function addToCart() {
            const productId = 1; // Assume a product ID
            const price = selectedVariant === 'with_cake' ? 2045 : 1695; // Make sure you match the price to the selected variant
            const deliveryType = document.querySelector('.delivery-header button.active')?.textContent;
            const pincode = document.getElementById('pincode-input').value;
            const deliveryDate = document.getElementById('calendar')?.value || null;

            // Check if a variant is selected
            if (!selectedVariant) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerText = 'Please select a product variant!';
                return;
            }

            // Check if a delivery slot is selected
            if (!selectedSlot) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerText = 'Please select a delivery slot!';
                return;
            }

            // Check if pincode is entered
            if (!pincode) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerText = 'Please enter a valid pincode!';
                return;
            }

            // Ensure a delivery option is selected (today, tomorrow, or calendar)
            if (!deliveryType) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerText = 'Please select a delivery option!';
                return;
            }

            // Send the data to the server
            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    product_id: productId,
                    product_variant: selectedVariant,
                    price: price,
                    delivery_type: deliveryType,
                    delivery_slot: selectedSlot,
                    delivery_date: deliveryDate,
                    pincode: pincode,
                    country: 'India'
                }),
            })
            .then(res => res.json())
            .then(data => {
                // Display message after adding to the cart
                document.getElementById('message').style.color = data.success ? 'green' : 'red';
                document.getElementById('message').innerText = data.message;
            })
            .catch(error => {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerText = 'An error occurred while adding to the cart. Please try again.';
                console.error('Error:', error);
            });
        }
    </script>

</body>
</html>

    

