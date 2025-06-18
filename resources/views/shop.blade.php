<x-layout>
    
    
    <!-- Main Content -->
    <div class="col-12 shop-content" >
        <!-- Header -->
        <!-- <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <div class="server-status mb-3 mb-md-0">
                <span class="badge bg-success"></span>
                Server online
                <span class="text-muted ms-2">125</span>
            </div>
        </div> -->
        <!-- Promo Banner -->

        <!--
        <div class="banner p-3 p-md-4 mb-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 text-center text-md-start">
                    <h2 class="h3 h2-md">Get the Beginning set for half price!</h2>
                    <p class="mb-3">Discount on the "Beginning" case for our players!</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <h3 class="mb-0 me-3">137.00 $</h3>
                        <span class="text-decoration-line-through text-muted">277.00 $</span>
                    </div>
                    <button class="btn btn-yellow mt-3">Buy now</button>
                </div>
                <div class="col-12 col-md-4 mt-3 mt-md-0 text-center">
                    Add character illustrations here
                </div>
            </div>
        </div> 
-->

        <!-- Privilege Cards -->
        {{-- <h5 class="mb-4">Privilege</h5> --}}
        {{-- <div class="row g-4">
            <!-- Emperor Card -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-privilege bg-primary text-white h-100">
                    <div class="card-body">
                        <h5>Emperor</h5>
                        <p>The highest rank available!</p>
                        <button class="btn btn-light">Learn more</button>
                    </div>
                </div>
            </div>

            <!-- King of server Card -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-privilege h-100" style="background-color: #ff7675;">
                    <div class="card-body text-white">
                        <h5>King of server</h5>
                        <p>Become the real king of our server!</p>
                        <h4>50.00 $</h4>
                        <button class="btn btn-light">Learn more</button>
                    </div>
                </div>
            </div>

            <!-- Overlord Card -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-privilege h-100" style="background-color: #fd79a8;">
                    <div class="card-body text-white">
                        <h5>Overlord</h5>
                        <p>Do you want to be the best? Go for it!</p>
                        <h4>120.00 $</h4>
                        <button class="btn btn-light">Learn more</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Coin Cards -->
        <h4 class="mb-0 ">Shop</h4>
        <div class="row g-4 mt-0">
            @php
                $coinCards = [
                    ['points' => 40000, 'price' => 100.00],
                    ['points' => 20000, 'price' => 50.00],
                    ['points' => 12000, 'price' => 30.00],
                    ['points' => 8000, 'price' => 20.00],
                    ['points' => 4000, 'price' => 10.00],
                    ['points' => 2000, 'price' => 5.00],
                    ['points' => 1200, 'price' => 3.00],
                    ['points' => 400, 'price' => 1.00],
                ];
            @endphp

            @foreach($coinCards as $card)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-privilege mx-auto"
                        style="">
                        <div class="card-body">
                            <img src="{{ URL('images/coin.png') }}" alt="Coin Icon" class="img-fluid"
                                style="width: 100px; height: auto; margin: auto; display: block;">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <h6 class="text-muted" style="margin-top: 3px;">{{ $card['points'] }} Jpoint</h6>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-primary text-end">${{ number_format($card['price'], 2) }}</h5>
                                </div>
                            </div>
                            <button type="button" class="buy-coins-btn btn btn-yellow w-100 mt-3" 
                                data-points="{{ $card['points'] }}"
                                data-price="{{ $card['price'] }}"
                                onmouseover="this.style.backgroundColor='#BFA600'"
                                onmouseout="this.style.backgroundColor=''">
                                Buy now
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script>
        const listQrCode = [
            "{{ asset('images/banks/1.png') }}",
            "{{ asset('images/banks/3.png') }}",
            "{{ asset('images/banks/5.png') }}",
            "{{ asset('images/banks/10.png') }}",
            "{{ asset('images/banks/20.png') }}",
            "{{ asset('images/banks/30.png') }}",
            "{{ asset('images/banks/50.png') }}",
            "{{ asset('images/banks/100.png') }}"

        ];
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the modals
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'), {
                backdrop: 'static',
                keyboard: false
            });

            const successModal = new bootstrap.Modal(document.getElementById('successModal'), {
                backdrop: 'static',
                keyboard: false
            });



            // Function to handle coin purchase
            function handleCoinPurchase(points, price) {
                // Update modal content
                document.querySelector('.points-amount').textContent = points;
                document.getElementById('paymentAmount').textContent = price.toFixed(2);
                document.getElementById('referenceId').value = "";

                // Use QR code from listQrCode based on price
                let qrCodeIndex = 0;
                
                // Select appropriate QR code based on price
                if (price === 1.00) qrCodeIndex = 0;       
                else if (price === 3.00) qrCodeIndex = 1;  
                else if (price === 5.00) qrCodeIndex = 2;  
                else if (price === 10.00) qrCodeIndex = 3; 
                else if (price === 20.00) qrCodeIndex = 4; 
                else if (price === 30.00) qrCodeIndex = 5; 
                else if (price === 50.00) qrCodeIndex = 6; 
                else if (price === 100.00) qrCodeIndex = 7; 
                // Set the QR code image
                document.getElementById('qrCodeImage').src = listQrCode[qrCodeIndex];

                // Show the modal
                paymentModal.show();
            }

            // Add click event listeners to all buy buttons
            document.querySelectorAll('.buy-coins-btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    const points = this.getAttribute('data-points');
                    const price = parseFloat(this.getAttribute('data-price'));
                    handleCoinPurchase(points, price);
                });
            });

            // Handle send order button
            document.getElementById('sendOrderBtn').addEventListener('click', function () {
                const points = document.querySelector('.points-amount').textContent;
                const price = parseFloat(document.getElementById('paymentAmount').textContent);
                const referenceId = document.getElementById('referenceId').value;
                const paymentMethod = document.querySelector('input[name="payment_method"]:checked').id;

                // Create transaction data
                const transactionData = {
                    price: price,
                    coin: points,
                    payment_method: paymentMethod,
                    reference_id: referenceId,
                    payment_methods: "khqr"
                };

                // Send AJAX request to create transaction
                fetch('/transactions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(transactionData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        // Update success modal with transaction details
                        document.getElementById('successOrderId').textContent = data.data.order_id|| '';
                        document.getElementById('successPoints').textContent = data.data.coin|| '';
                        document.getElementById('successAmount').textContent = price.toFixed(2);
                        
                        // Hide payment modal and show success modal
                        paymentModal.hide();
                        setTimeout(() => {
                            // Trigger animation on show
                            successModal.show();
                            setTimeout(() => {
                                const successCircle = document.querySelector('.success-circle');
                                if (successCircle) {
                                    successCircle.style.animation = 'none';
                                    setTimeout(() => {
                                        successCircle.style.animation = 'success-circle-animation 1s ease-out';
                                    }, 10);
                                }
                            }, 300);
                        }, 300);
                    } else {
                        alert('Error creating transaction: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while processing your request.');
                });
            });

            // Handle modal close buttons
            document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
                button.addEventListener('click', function () {
                    paymentModal.hide();
                    successModal.hide();
                });
            });

            // show info modal 
            document.getElementById('info-icon').addEventListener('click', () => {
                const infoModal =  new bootstrap.Modal(document.getElementById('infoModal'))
                infoModal.show()
            })

            // close info modal
            document.getElementById('button-close-info').addEventListener('click', () => {
                bootstrap.Modal.getInstance(document.getElementById('infoModal')).hide();
            })
        });
    </script>

    <style>
        .text-navy {
            color: #1e3a8a;
        }

        .payment-option label {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option label:hover {
            background-color: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .payment-option.selected label {
            border-color: #0d6efd;
            background-color: #f0f9ff;
        }

        .qr-section {
            background-color: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .qr-section:hover {
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .qr-header {
            border-radius: 0.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .bank-logos img {
            max-height: 40px;
            object-fit: contain;
        }

        .payment-amount {
            color: #1a1a1a;
            font-weight: 700;
        }

        .game-title {
            color: #4a5568;
            font-weight: 600;
        }

        #sendOrderBtn {
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        #sendOrderBtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }

        /* QR Scan Animation */
        .qr-overlay {
            z-index: 2;
            pointer-events: none;
        }

        .qr-scan-animation {
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, transparent, #0d6efd, transparent);
            animation: qrScan 2s infinite;
            position: absolute;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.5);
        }

        @keyframes qrScan {
            0% {
                transform: translateY(-50px);
            }
            50% {
                transform: translateY(50px);
            }
            100% {
                transform: translateY(-50px);
            }
        }

        /* Hover Effects */
        .hover-effect {
            transition: all 0.3s ease;
        }

        .hover-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        /* Success Modal Styles */
        #successModal .modal-content {
            border-radius: 1rem;
        }

        #successModal .bi-check-circle {
            color: #10b981;
        }

        /* Modal Styles */
        .modal {
            z-index: 9999;
        }

        .modal-dialog {
            margin: 1.75rem auto;
            max-width: 500px;
            position: relative;
            z-index: 10000;
        }

        .modal-content {
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10000;
            background: #fff;
            overflow: hidden;
        }

        .modal.show {
            overflow-y: auto !important;
            display: block !important;
            pointer-events: auto !important;
        }

        .modal-open {
            overflow: hidden;
            padding-right: 0 !important;
        }

        .modal input,
        .modal button,
        .modal .payment-option,
        .modal-body,
        .modal-header,
        .modal-footer {
            position: relative;
            z-index: 10001;
        }

        .btn-close {
            opacity: 1;
            padding: 1rem;
            z-index: 10002;
            position: relative;
        }

        .modal-dialog {
            transform: none !important;
            pointer-events: auto !important;
        }

        .modal-backdrop.show {
            opacity: 0.5;
        }

        /* Input styling */
        .input-group-text {
            border-right: none;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }

        /* Button styling */
        .btn {
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }

        /* Success Animation */
        .success-animation {
            position: relative;
            display: inline-block;
        }

        .success-circle {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #10b981;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: success-circle-animation 1s ease-out;
            opacity: 0;
        }

        @keyframes success-circle-animation {
            0% {
                transform: translate(-50%, -50%) scale(0);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }

        .order-details {
            border-left: 4px solid #10b981;
        }
    </style>

</x-layout>
<x-loading-animation />
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal">
    <div class="modal-dialog modal-dialog-lg" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header border-0 pb-2 bg-primary text-white">
                <h5 class="modal-title" id="paymentModalLabel">
                    <i class="bi bi-cart-check me-2 mb-2"></i>Order: <span class="text-warning points-amount fw-bold">0</span> Points
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="payment-methods mb-4">
                            <h6 class="text-navy mb-3 border-bottom pb-2 fw-bold"><i class="bi bi-credit-card me-2"></i>Payment Methods</h6>
                            <div class="payment-option selected mt-3">
                                <input type="radio" name="payment_method" id="khqr" checked class="d-none">
                                <label for="khqr" class="d-flex align-items-center p-3 rounded-3 border shadow-sm hover-effect">
                                    <img src="{{ asset('images/banks/khqr-logo.png') }}" alt="KHQR" height="30">
                                    <span class="ms-2 fw-bold">KHQR Payment</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="order-info mx-3 w-100">
                            <h6 class="text-navy mb-3 border-bottom pb-2 fw-bold"></i>Order Information</h6>
                            <div class="mb-3">
                                <label class="form-label d-flex align-items-center">
                                    # Reference 
                                    <i id="info-icon" class="bi bi-info-circle ms-1 text-primary" style="cursor: pointer;"></i>
                                </label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text bg-light"><i class="bi bi-hash"></i></span> --}}
                                    <input type="text" class="form-control w-100" id="referenceId" required="true" placeholder="Enter reference number">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="qr-section text-center mt-3 shadow-sm border rounded-4 p-4">
                            <div class="qr-header bg-dark text-warning p-2 mb-3 rounded-3">
                                <i class="bi bi-qr-code me-2"></i>SCAN WITH ANY BANK APP
                            </div>
                            <div class="game-logo mb-3">
                                <img src="{{ asset('images/banks/game-logo.jpg') }}" style="border-radius: 10px;"
                                    alt="Game Logo" height="60" class="shadow-sm">
                            </div>
                            <div class="qr-code mb-3 position-relative">
                                <div class="qr-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                    <div class="qr-scan-animation"></div>
                                </div>
                                <img src="" id="qrCodeImage" alt="QR Code" class="img-fluid" style="max-width: 200px; border: 8px solid white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            </div>
                            <div class="price-info bg-light p-3 rounded-3">
                                <h3 class="payment-amount mb-2">$<span id="paymentAmount" class="text-success">0.00</span></h3>
                                <h4 class="game-title text-uppercase text-primary">JX2</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light rounded-bottom">
                <button type="button" class="btn text-danger" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary" id="sendOrderBtn">
                    <i class="bi bi-send me-1"></i>Send Order
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Info Modal -->
<div class="modal fade " id="infoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" style="z-index: 1056;max-width:1024px">
        <div class="modal-content">
            <div class="modal-header">
                <strong>របៀបកម្មង់ទិញ Jpoint</strong>
                <button id="button-close-info" type="button" class="btn-close" ></button>
            </div>
            <div class="modal-body">
                <p>ធ្វើតាមបីចំនុចខាងក្រោមដើម្បីបង្កើតការទិញ Jpoint:</p>
                <ul>
                    <li>បន្ទាប់ពីអ្នកបានស្កេន QRCode បង់ថ្លៃការទិញរួចរាល់ សូមបងប្អូនចម្លងលេខ Reference ពីវិក័យបត្រដែលអ្នកបានទិញ</li>
                    <li>វាយបញ្ចូលលេខ Reference ដែលអ្នកបានចម្លងទៅក្នុង Payment method Reference</li>
                    <li>ចុច SEND ORDER ដើមប្បីធ្វើការកម្មង់ទិញ</li>
                </ul>
                <p class="mb-0">ត្រូវចាំ ! អ្នកត្រូវរក្សាទុកលេខ Reference របស់លោកអ្នកសិន រហូតទាល់តែកាបញ្ជារទិញរបស់លោកអ្នកបានសម្រេច</p>
            </div>
            <img src="{{ asset('images/banks/tip.png') }}" alt="KHQR" >
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title"><i class="bi bi-check-circle me-2"></i>Success</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-5">
                <div class="success-animation mb-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                    <div class="success-circle"></div>
                </div>
                <h4 class="mt-3">Payment Successful!</h4>
                <p class="text-muted mb-4">Your order has been processed successfully. Points will be added to your account shortly.</p>
                <div class="order-details bg-light p-3 rounded-3 text-start mb-4">
                    <div class="row mb-2">
                        <div class="col-6 text-muted">Order ID:</div>
                        <div class="col-6 fw-bold">#<span id="successOrderId"></span></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-muted">Points:</div>
                        <div class="col-6 fw-bold"><span id="successPoints" class="text-success points-amount">0</span></div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-muted">Amount:</div>
                        <div class="col-6 fw-bold">$<span id="successAmount">0.00</span></div>
                    </div>
                </div>
                <button type="button" class="btn btn-success px-5 py-2 hover-effect" data-bs-dismiss="modal">
                    <i class="bi bi-arrow-return-left me-2"></i>Return to Shop
                </button>
            </div>
        </div>
    </div>
</div>
