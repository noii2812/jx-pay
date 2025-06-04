<x-layout>
    <!-- Main Content -->
    <div class="col-12 shop-content">
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
        <h5 class="mb-4">Privilege</h5>
        <div class="row g-4">
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
        </div>

        <!-- Coin Cards -->
        <div class="row g-4 mt-2">
            @php
                $coinCards = [
                    ['points' => 4000, 'price' => 100.00],
                    ['points' => 2000, 'price' => 50.00],
                    ['points' => 1200, 'price' => 30.00],
                    ['points' => 800, 'price' => 20.00],
                    ['points' => 400, 'price' => 10.00],
                    ['points' => 200, 'price' => 5.00],
                    ['points' => 120, 'price' => 3.00],
                    ['points' => 40, 'price' => 1.00],
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
                                    <h5 class="text-primary">${{ number_format($card['price'], 2) }}</h5>
                                </div>
                            </div>
                            <button type="button" class="buy-coins-btn btn btn-yellow w-100 mt-3"
                                data-points="{{ $card['points'] }}"
                                data-price="{{ $card['price'] }}">
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

    <script>
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

            // Function to generate reference number
            function generateReference() {
                const timestamp = Date.now().toString();
                const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                return `TRX-${timestamp}${random}`;
            }

            // Function to handle coin purchase
            function handleCoinPurchase(points, price) {
                // Update modal content
                document.querySelector('.points-amount').textContent = points;
                document.getElementById('paymentAmount').textContent = price.toFixed(2);
                document.getElementById('referenceId').value = generateReference();

                // Generate QR code
                const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=KHQR_PAYMENT_${price}_${points}`;
                document.getElementById('qrCodeImage').src = qrCodeUrl;

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
                    payment_methods: {
                        khqr: true
                    }
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
                    if (data.success) {
                        paymentModal.hide();
                        setTimeout(() => {
                            successModal.show();
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
    </style>

</x-layout>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="paymentModalLabel">
                    Order: <span class="text-danger points-amount">0</span> Points
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="payment-methods mb-4">
                            <h6 class="text-navy mb-3">Payment Methods</h6>
                            <div class="payment-option selected">
                                <input type="radio" name="payment_method" id="khqr" checked class="d-none">
                                <label for="khqr" class="d-flex align-items-center p-3 rounded-3 border">
                                    <img src="{{ asset('images/banks/khqr-logo.png') }}" alt="KHQR" height="30">
                                    <span class="ms-2">KHQR Payment</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order-info">
                            <h6 class="text-navy mb-3">Order Information</h6>
                            <div class="mb-3">
                                <label class="form-label d-flex align-items-center">
                                    Reference #
                                    <i class="bi bi-info-circle ms-1" data-bs-toggle="tooltip"
                                        title="Please save this reference number for tracking your payment"></i>
                                </label>
                                <input type="text" class="form-control" id="referenceId">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="qr-section text-center mt-3">
                    <div class="qr-header bg-dark text-warning p-2 mb-3">
                        THIS IS KHQR CODE, CAN SCAN WITH ANY BANK!
                    </div>
                    <div class="game-logo mb-3">
                        <img src="{{ asset('images/banks/game-logo.jpg') }}" style="border-radius: 10px;"
                            alt="Game Logo" height="60">
                    </div>
                    <div class="qr-code mb-3">
                        <img src="" id="qrCodeImage" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    </div>
                    <div class="price-info">
                        <h3 class="payment-amount mb-2">$<span id="paymentAmount">0.00</span></h3>
                        <h4 class="game-title text-uppercase">JX2</h4>
                    </div>
                </div>

                <div class="payment-banks mt-4">
                    <div class="secure-text text-danger mb-2">Secure Payments By:</div>
                    <div class="bank-logos p-3 border rounded-3">
                        <div class="row align-items-center g-3">
                            <div class="col"><img src="{{ asset('images/banks/aba.jpg') }}" alt="ABA" class="img-fluid">
                            </div>
                            <div class="col"><img src="{{ asset('images/banks/wing.jpg') }}" alt="Wing"
                                    class="img-fluid"></div>
                            <div class="col"><img src="{{ asset('images/banks/pipay.jpg') }}" alt="PiPay"
                                    class="img-fluid"></div>
                            <div class="col"><img src="{{ asset('images/banks/true-money.jpg') }}" alt="True Money"
                                    class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary w-100" id="sendOrderBtn">Send Order</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                <h4 class="mt-3">Payment Successful!</h4>
                <p class="text-muted">Your order has been processed successfully.</p>
                <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
