<?php
    require_once 'includes/owner-header-sidebar.php'; // Includes header and sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Dispute Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin-left: 260px; /* Matches the sidebar width */
            padding: 80px 20px; /* Adjust padding for header spacing */
            background: #f8f9fa;
            min-height: 100vh;
        }
        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .action-icons i {
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="container">
        <h2 class="mb-4">Dispute Management</h2>

        <!-- Search and Sort -->
        <div class="d-flex justify-content-between mb-3">
            <input type="text" class="form-control w-50" placeholder="Search">
            <div class="d-flex">
                <select class="form-select me-2" style="width: auto;">
                    <option selected>Sort by</option>
                    <option value="1">Rental ID</option>
                    <option value="2">Gadget</option>
                </select>
                <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button>
            </div>
        </div>

        <!-- Disputes Table -->
        <div class="table-container">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Rental ID</th>
                        <th>Gadgets</th>
                        <th>Owners</th>
                        <th>Renters</th>
                        <th>Applied on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>RENT-562389</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/ps5.jpg" alt="Gadget">
                                <span class="ms-3">Playstation 5</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user1.jpg" alt="Owner" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">Gustavo Xavier</p>
                                    <small>gustavoxavier@gmail.com</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user2.jpg" alt="Renter" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">Juan dela Cruz</p>
                                    <small>juandelacruz@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td>24 Oct, 2024</td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-trash text-danger"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>RENT-829174</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/printer.jpg" alt="Gadget">
                                <span class="ms-3">Printer</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user3.jpg" alt="Owner" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">David Wagner</p>
                                    <small>windler.warren@runte.net</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="includes/user4.jpg" alt="Renter" class="rounded-circle me-2" width="40" height="40">
                                <div>
                                    <p class="mb-0 fw-bold">Cora Medina</p>
                                    <small>hagenes.isai@hotmail.com</small>
                                </div>
                            </div>
                        </td>
                        <td>24 Oct, 2024</td>
                        <td class="action-icons">
                            <i class="fas fa-eye text-primary"></i>
                            <i class="fas fa-trash text-danger"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small>Items per page:</small>
            <select class="form-select w-auto">
                <option>4</option>
                <option>8</option>
                <option>12</option>
            </select>
            <nav aria-label="Page navigation">
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>