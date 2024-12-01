<?php
include '../owner/includes/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'owner') {
    // Redirect to login page if not authenticated
    header("Location: ../owner/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_rental'])) {
}

$stmt = $pdo->prepare("
    SELECT 
        rentals.*, 
        users.name AS renter_name, 
        products.name AS product_name 
    FROM 
        rentals 
    LEFT JOIN 
        users ON rentals.renter_id = users.id 
    LEFT JOIN 
        products ON rentals.product_id = products.id 
    WHERE 
        rentals.owner_id = ?
    ORDER BY 
        rentals.created_at DESC
");
$owner_id = $_SESSION['user_id'];
$stmt->execute([$owner_id]);
$rentals = $stmt->fetchAll();


if (!$rentals) {
    echo "<div class='alert alert-warning'>No rentals found for Owner ID: " . htmlspecialchars($owner_id) . "</div>";
} else {
    echo "<div class='alert alert-success'>" . count($rentals) . " rentals found.</div>";

}


foreach ($rentals as &$rental) {
    if ($rental['rental_end_date']) {
        $due_date = new DateTime($rental['rental_end_date']);
        $current_date = new DateTime();
        $interval = $current_date->diff($due_date);
        $rental['remaining_days'] = (int)$interval->format('%r%a'); 
    } else {
        $rental['remaining_days'] = 'N/A';
    }
}
unset($rental);
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rentals Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<?php include '../owner/includes/owner-header-sidebar.php'; ?>
<body>
    <div class="main-content bg-secondary-subtle my-3">
        <div class="card rounded-3">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-2 mx-5">
                <h2 class="mb-0">Rentals Management</h2>
            </div>

            <hr class="mx-3 my-0">
            <div class="card-body rounded-5">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" style="width: 5%;">No.</th>
                                    <th scope="col" style="width: 15%;">Renter Name</th>
                                    <th scope="col" style="width: 20%;">Product Name</th>
                                    <th scope="col" style="width: 15%;">Start Date</th>
                                    <th scope="col" style="width: 10%;">Due Date</th>
                                    <th scope="col" style="width: 10%;">Days Remaining</th>
                                    <th scope="col" style="width: 10%;">Status</th>
                                    <th scope="col" style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rentals):
                                    foreach ($rentals as $index => $rental):
                                        $countdown_class = 'secondary';
                                        if ($rental['remaining_days'] !== 'N/A') {
                                            if ($rental['remaining_days'] > 0) {
                                                $countdown_class = 'positive';
                                            } elseif ($rental['remaining_days'] === 0) {
                                                $countdown_class = 'warning';
                                            } else {
                                                $countdown_class = 'countdown';
                                            }
                                        }
                                ?>
                                <tr class="align-middle">
                                    <th scope="row"><?= htmlspecialchars($index + 1) ?></th>
                                    <td><?= htmlspecialchars($rental['renter_name'] ?? 'Unknown') ?></td>
                                    <td><?= htmlspecialchars($rental['product_name'] ?? 'Unknown') ?></td>
                                    <td><?= htmlspecialchars($rental['rental_start_date'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($rental['rental_end_date'] ?? 'N/A') ?></td>
                                    <td>
                                        <?php
                                            if ($rental['remaining_days'] === 'N/A') {
                                                echo '<span class="badge bg-secondary">N/A</span>';
                                            } elseif ($rental['remaining_days'] > 0) {
                                                echo '<span class="badge bg-success">' . $rental['remaining_days'] . ' day(s) remaining</span>';
                                            } elseif ($rental['remaining_days'] === 0) {
                                                echo '<span class="badge bg-warning">Due Today</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">Overdue by ' . abs($rental['remaining_days']) . ' day(s)</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $status = $rental['status'];
                                            $badgeClass = 'secondary';
                                            switch ($status) {
                                                case 'pending_confirmation':
                                                    $badgeClass = 'warning';
                                                    break;
                                                case 'approved':
                                                    $badgeClass = 'success';
                                                    break;
                                                case 'completed':
                                                    $badgeClass = 'primary';
                                                    break;
                                                case 'cancelled':
                                                    $badgeClass = 'danger';
                                                    break;
                                                default:
                                                    $badgeClass = 'secondary';
                                            }
                                        ?>
                                        <span class="badge bg-<?= $badgeClass ?>"><?= htmlspecialchars($status) ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- View Button -->
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal<?= $rental['id'] ?>" title="View">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <!-- Update Status Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateStatusModal<?= $rental['id'] ?>" title="Update Status">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $rental['id'] ?>" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>  
                                    </td>
                                </tr>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewModal<?= $rental['id'] ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $rental['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel<?= $rental['id'] ?>">Rental Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <?php if ($rental['proof_of_transaction']): ?>
                                              <img src="../img/uploads/<?= htmlspecialchars($rental['proof_of_transaction']) ?>" alt="Proof of Transaction" class="img-fluid rounded mb-3">
                                              <a href="../img/uploads/<?= htmlspecialchars($rental['proof_of_transaction']) ?>" target="_blank" class="btn btn-outline-primary">View Proof</a>
                                            <?php else: ?>
                                              <img src="https://via.placeholder.com/400x300" alt="No Proof" class="img-fluid rounded mb-3">
                                              <p>No proof of transaction uploaded.</p>
                                            <?php endif; ?>
                                          </div>
                                          <div class="col-md-6">
                                            <h4>Rental ID: <?= htmlspecialchars($rental['id']) ?></h4>
                                            <p><strong>Renter Name:</strong> <?= htmlspecialchars($rental['renter_name'] ?? 'Unknown') ?></p>
                                            <p><strong>Product Name:</strong> <?= htmlspecialchars($rental['product_name'] ?? 'Unknown') ?></p>
                                            <p><strong>Rental Start Date:</strong> <?= htmlspecialchars($rental['rental_start_date'] ?? 'N/A') ?></p>
                                            <p><strong>Rental Due Date:</strong> <?= htmlspecialchars($rental['rental_end_date'] ?? 'N/A') ?></p>
                                            <p><strong>Actual End Date:</strong> <?= htmlspecialchars($rental['actual_end_date'] ?? 'N/A') ?></p>
                                            <p><strong>Rental Price:</strong> PHP <?= number_format($rental['rental_price'], 2) ?></p>
                                            <p><strong>Total Cost:</strong> PHP <?= number_format($rental['total_cost'] ?? 0, 2) ?></p>
                                            <p><strong>Status:</strong> <?= htmlspecialchars($rental['status']) ?></p>
                                            <p><strong>Rental Status:</strong> <?= htmlspecialchars($rental['rental_status']) ?></p>
                                            <p><strong>Proof of Transaction:</strong> 
                                                <?php if ($rental['proof_of_transaction']): ?>
                                                    <a href="../img/uploads/<?= htmlspecialchars($rental['proof_of_transaction']) ?>" target="_blank">View Proof</a>
                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                            </p>
                                            <p><strong>Created At:</strong> <?= htmlspecialchars($rental['created_at']) ?></p>
                                            <p><strong>Updated At:</strong> <?= htmlspecialchars($rental['updated_at']) ?></p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Update Status Modal -->
                                <div class="modal fade" id="updateStatusModal<?= $rental['id'] ?>" tabindex="-1" aria-labelledby="updateStatusModalLabel<?= $rental['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form action="rentals.php" method="POST" enctype="multipart/form-data">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="updateStatusModalLabel<?= $rental['id'] ?>">Update Rental Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <input type="hidden" name="rental_id" value="<?= $rental['id'] ?>">
                                            <div class="mb-3">
                                              <label for="statusSelect<?= $rental['id'] ?>" class="form-label">Select New Status</label>
                                              <select class="form-select" id="statusSelect<?= $rental['id'] ?>" name="status" required>
                                                <option value="pending_confirmation" <?= ($rental['status'] == 'pending_confirmation') ? 'selected' : '' ?>>Pending Confirmation</option>
                                                <option value="approved" <?= ($rental['status'] == 'approved') ? 'selected' : '' ?>>Approved</option>
                                                <option value="received" <?= ($rental['rental_status'] == 'received') ? 'selected' : '' ?>>Received</option>
                                                <option value="in_progress" <?= ($rental['rental_status'] == 'in_progress') ? 'selected' : '' ?>>In Progress</option>
                                                <option value="completed" <?= ($rental['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                                                <option value="cancelled" <?= ($rental['status'] == 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                                              </select>
                                            </div>
                                            <div class="mb-3">
                                              <label for="proofUpload<?= $rental['id'] ?>" class="form-label">Upload Proof of Transaction</label>
                                              <input class="form-control" type="file" id="proofUpload<?= $rental['id'] ?>" name="proof_of_transaction" accept="image/*,application/pdf">
                                              <?php if ($rental['proof_of_transaction']): ?>
                                                  <img src="../img/uploads/<?= htmlspecialchars($rental['proof_of_transaction']) ?>" alt="Proof of Transaction" class="img-thumbnail mt-2" style="max-width: 200px;">
                                              <?php endif; ?>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_status">Update Status</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?= $rental['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $rental['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form action="rentals.php" method="POST">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?= $rental['id'] ?>">Delete Rental</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Are you sure you want to delete Rental ID <strong><?= htmlspecialchars($rental['id']) ?></strong> for <strong><?= htmlspecialchars($rental['renter_name'] ?? 'Unknown') ?></strong>?
                                          </div>
                                          <div class="modal-footer">
                                            <input type="hidden" name="rental_id" value="<?= $rental['id'] ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" name="delete_rental">Delete</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <?php
                                    endforeach;
                                else:
                                ?>
                                <tr>
                                    <td colspan="8" class="text-center">No rentals found.</td>
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
        function displayCountdown(rentalId, dueDate) {
            const countdownElement = document.getElementById('daysRemaining' + rentalId);
            const targetDate = new Date(dueDate).getTime();

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = targetDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance > 0) {
                    countdownElement.innerHTML = `Due in ${days}d ${hours}h ${minutes}m ${seconds}s`;
                    countdownElement.classList.remove('countdown');
                    countdownElement.classList.add('positive');
                } else {
                    countdownElement.innerHTML = `Overdue by ${Math.abs(days)}d ${Math.abs(hours)}h ${Math.abs(minutes)}m ${Math.abs(seconds)}s`;
                    countdownElement.classList.remove('positive');
                    countdownElement.classList.add('countdown');
                    clearInterval(interval);
                }
            }, 1000);
        }
        <?php foreach ($rentals as $rental): ?>
            displayCountdown(<?= $rental['id'] ?>, '<?= $rental['rental_end_date'] ?>');
        <?php endforeach; ?>
    </script>
</body>
</html>