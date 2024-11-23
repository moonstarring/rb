<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Shopping Cart</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .cart-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .product-card {
            margin: 15px 0;
        }
        .total-price {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <!-- Navigation-->
        <?php
        require_once 'navbar.html';
        ?>

        <div class="row">
            <div class="col-md-8">
                <div class="product-card card">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">Description of the product.</p>
                        <p class="card-text">Price: $49.99</p>
                        <input type="number" class="form-control" value="1" min="1">
                        <button class="btn btn-danger mt-2">Remove</button>
                    </div>
                </div>
                <!-- Repeat product-card for more items -->
            </div>

            <div class="col-md-4">
                <h4>Summary</h4>
                <p>Total Items: 1</p>
                <p class="total-price">Total Price: $49.99</p>
                <button class="btn btn-success">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>