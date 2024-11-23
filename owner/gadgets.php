<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gadgets</title>
    <link href="../vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <style>
    </style>
</head>
<body class="container-fluid d-flex bg-secondary-subtle ms-0">
    <?php require_once 'side.html'; ?>
    <div class="container-fluid bg-secondary-subtle my-3">
        <div class="card rounded-3">
            <!-- Title -->
          <div class="d-flex justify-content-between mt-4 mb-2 mx-5">
            <h2 class="align-self-end mb-0">My Gadgets</h2>
            <button type="button" class="btn btn-success align-self-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Item
            </button>
            <?php 
            require_once 'add-modal.html';
            ?>

          </div>

          <hr class="mx-3 my-0">

            <!-- Card  -->
            <div class="card-body rounded-5">
                <div class="table-container">
                  <!-- Table  -->
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">No.</th>
                                <th scope="col" style="width: 200px;">Table Head</th>
                                <th scope="col" style="width: 200px;">Table Head</th>
                                <th scope="col" style="width: 200px;">Table Head</th>
                                <th scope="col" style="width: 200px;">Table Head</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="mb-0">
                            <tr class="align-middle" >
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td class="d-flex">  
                                  <div class="btn-group m-0 p-0 dropdown mt-0">
                                    <button class="btn text-success rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-list text-success"></i>
                                    </button>
                                    <ul class="dropdown-menu text-small shadow dropdown-menu-end">
                                      <li><a class="dropdown-item" href="#">Delete</a></li>
                                      <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                  </div>  
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js">
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>
</html>