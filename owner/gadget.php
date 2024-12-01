<?php
include '../owner/includes/db_connect.php';
session_start();
require_once 'functions.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'owner') {
    header("Location: ../owner/login.php");
    exit();
}
$allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
$max_file_size = 2 * 1024 * 1024;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    try {
        if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
            header("Location: gadget.php?error=1");
            exit();
        }
        $name = trim($_POST['name']);
        $brand = trim($_POST['brand']);
        $description = trim($_POST['description']);
        $rental_price = floatval($_POST['rental_price']);
        $rental_period = isset($_POST['rental_period']) ? trim($_POST['rental_period']) : null;
        $category = trim($_POST['category']);
        $quantity = intval($_POST['quantity']);
        if (empty($name) || empty($brand) || empty($description) || empty($rental_price) || empty($rental_period) || empty($category) || empty($quantity)) {
            header("Location: gadget.php?error=1");
            exit();
        }
        $image_filename = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $image_upload = handle_image_upload($_FILES['image'], $allowed_mime_types, $max_file_size);
            if ($image_upload['success']) {
                $image_filename = $image_upload['filename'];
            } else {
                log_error("Add Product Image Upload Error: " . $image_upload['message']);
                header("Location: gadget.php?error=1");
                exit();
            }
        }
        $owner_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("INSERT INTO products (owner_id, name, brand, description, rental_price, rental_period, status, created_at, updated_at, image, quantity, category) VALUES (?, ?, ?, ?, ?, ?, 'approved', NOW(), NOW(), ?, ?, ?)");
        $stmt->execute([$owner_id, $name, $brand, $description, $rental_price, $rental_period, $image_filename, $quantity, $category]);

        header("Location: gadget.php?success=1");
        exit();
    } catch (Exception $e) {
        log_error("Add Product Error: " . $e->getMessage());
        header("Location: gadget.php?error=1");
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {
    try {
        if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
            header("Location: gadget.php?error=1");
            exit();
        }
        $product_id = intval($_POST['product_id']);
        $name = trim($_POST['name']);
        $brand = trim($_POST['brand']);
        $description = trim($_POST['description']);
        $rental_price = floatval($_POST['rental_price']);
        $rental_period = isset($_POST['rental_period']) ? trim($_POST['rental_period']) : null;
        $category = trim($_POST['category']);
        $quantity = intval($_POST['quantity']);
        if (empty($name) || empty($brand) || empty($description) || empty($rental_price) || empty($rental_period) || empty($category) || empty($quantity)) {
            header("Location: gadget.php?error=1");
            exit();
        }
        $image_filename = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $image_upload = handle_image_upload($_FILES['image'], $allowed_mime_types, $max_file_size);
            if ($image_upload['success']) {
                $image_filename = $image_upload['filename'];
            } else {
                log_error("Edit Product Image Upload Error: " . $image_upload['message']);
                header("Location: gadget.php?error=1");
                exit();
            }
        }
        if ($image_filename) {
            $sql = "UPDATE products SET name = ?, brand = ?, description = ?, rental_price = ?, rental_period = ?, image = ?, quantity = ?, category = ?, updated_at = NOW() WHERE id = ? AND owner_id = ?";
            $params = [$name, $brand, $description, $rental_price, $rental_period, $image_filename, $quantity, $category, $product_id, $_SESSION['user_id']];
        } else {
            $sql = "UPDATE products SET name = ?, brand = ?, description = ?, rental_price = ?, rental_period = ?, quantity = ?, category = ?, updated_at = NOW() WHERE id = ? AND owner_id = ?";
            $params = [$name, $brand, $description, $rental_price, $rental_period, $quantity, $category, $product_id, $_SESSION['user_id']];
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        header("Location: gadget.php?success=2");
        exit();
    } catch (Exception $e) {
        log_error("Edit Product Error: " . $e->getMessage());
        header("Location: gadget.php?error=1");
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    try {
        if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
            header("Location: gadget.php?error=1");
            exit();
        }
        $product_id = intval($_POST['product_id']);

        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ? AND owner_id = ?");
        $stmt->execute([$product_id, $_SESSION['user_id']]);
        header("Location: gadget.php?success=3");
        exit();
    } catch (Exception $e) {
        log_error("Delete Product Error: " . $e->getMessage());
        header("Location: gadget.php?error=1");
        exit();
    }
}
$stmt = $pdo->prepare("SELECT * FROM products WHERE owner_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$products = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Gadgets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/gadget.css">
</head>
<body>

    <?php include __DIR__ . '/includes/owner-header-sidebar.php'; ?>
    <div class="main-content bg-secondary-subtle my-3">
        <div class="card rounded-3">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-2 mx-5">
                <h2 class="mb-0">My Gadgets</h2>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-lg"></i> Add Item
                </button>
            </div>
            <?php if (isset($_GET['success'])): ?>
                <?php
                    $success_msg = '';
                    switch ($_GET['success']) {
                        case '1':
                            $success_msg = 'Product added successfully!';
                            break;
                        case '2':
                            $success_msg = 'Product updated successfully!';
                            break;
                        case '3':
                            $success_msg = 'Product deleted successfully!';
                            break;
                        default:
                            $success_msg = '';
                    }
                ?>
                <?php if ($success_msg): ?>
                    <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                        <?= htmlspecialchars($success_msg) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
                <div class="alert alert-danger alert-dismissible fade show mx-5" role="alert">
                    There was an error processing your request. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php include __DIR__ . '/add-modal.html'; ?>

            <hr class="mx-3 my-0">

            <div class="card-body rounded-5">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" style="width: 5%;">No.</th>
                                    <th scope="col" style="width: 15%;">Name</th>
                                    <th scope="col" style="width: 15%;">Brand</th>
                                    <th scope="col" style="width: 25%;">Description</th>
                                    <th scope="col" style="width: 10%;">Price</th>
                                    <th scope="col" style="width: 10%;">Quantity</th>
                                    <th scope="col" style="width: 15%;">Category</th>
                                    <th scope="col" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($products): ?>
                                    <?php foreach ($products as $index => $product): ?>
                                        <tr class="align-middle">
                                            <th scope="row"><?= htmlspecialchars($index + 1) ?></th>
                                            <td><?= htmlspecialchars($product['name']) ?></td>
                                            <td><?= htmlspecialchars($product['brand']) ?></td>
                                            <td><?= nl2br(htmlspecialchars($product['description'])) ?></td>
                                            <td>
                                                PHP <?= number_format($product['rental_price'], 2) ?>
                                                <?php if (isset($product['rental_period'])): ?>
                                                    per <?= htmlspecialchars($product['rental_period']) ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= htmlspecialchars($product['quantity']) ?></td>
                                            <td><?= htmlspecialchars($product['category']) ?></td>
                                            <td>  
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal<?= $product['id'] ?>" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $product['id'] ?>" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $product['id'] ?>" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>  
                                            </td>
                                        </tr>
                                        <?php include __DIR__ . '/view-modal.html'; ?>
                                        <?php include __DIR__ . '/edit-modal.html'; ?>

                                        <?php include __DIR__ . '/delete-modal.html'; ?>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No gadgets found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        var addModal = document.getElementById('addModal');
        if (addModal) {
            addModal.addEventListener('shown.bs.modal', function () {
                document.getElementById('productName').focus();
            });
        }
        <?php foreach ($products as $product): ?>
            var editModal<?= $product['id'] ?> = document.getElementById('editModal<?= $product['id'] ?>');
            if (editModal<?= $product['id'] ?>) {
                editModal<?= $product['id'] ?>.addEventListener('shown.bs.modal', function () {
                    document.getElementById('editName<?= $product['id'] ?>').focus();
                });
            }
        <?php endforeach; ?>
    </script>
</body>
</html>