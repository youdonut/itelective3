<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php' ?>
  <title>Mang Inasal | Dashboard</title>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">Simple Full Width Table</h3> -->

              <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  Add Product
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <?php
              // Include config file
              require_once "config.php";

              // Attempt select query execution
              $sql = "SELECT * FROM product";
              if ($result = $pdo->query($sql)) {
                if ($result->rowCount() > 0) {
                  echo '<table class="table table-bordered table-striped">';
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th>#</th>";
                  echo "<th>Product Name</th>";
                  echo "<th>Product Description</th>";
                  echo "<th>Product Price</th>";
                  echo "<th>Product Image</th>";
                  echo "<th>Product Rating</th>";
                  echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                  while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['product_desc'] . "</td>";
                    echo "<td>" . $row['product_price'] . "</td>";
                    echo "<td>" . $row['product_image'] . "</td>";
                    echo "<td>" . $row['product_rating'] . "</td>";
                    echo "<td>";
                    echo '<div class="d-flex flex-row">';
                    echo '<button class="btn btn-primary mr-2" title="View Record" data-toggle="modal" data-target="#productDetailsModal" data-id="' . $row['product_id'] . '">View</button>';
                    echo '<button class="btn btn-info mr-2" data-id="' . $row['product_id'] . '" title="Edit" data-toggle="modal" data-target="#productUpdateModal">Edit</button>';
                    echo '<button class="btn btn-danger delete-product" data-id="' . $row['product_id'] . '">Delete</button>';
                    //echo '<a href="#" class="mr-3" title="View Record" data-toggle="modal" data-target="#productDetailsModal" data-id="' . $row['product_id'] . '"><span class="fa fa-eye"></span></a>';
                    //echo '<button class="btn btn-danger delete-product" data-id="' . $row['product_id'] . '"><span class="fa fa-trash"></span></button>';
                    echo '</div>';
                    echo "</td>";
                    echo "</tr>";
                  }
                  echo "</tbody>";
                  echo "</table>";
                  // Free result set
                  unset($result);
                } else {
                  echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
              } else {
                echo "Oops! Something went wrong. Please try again later.";
              }

              // Close connection
              unset($pdo);
              ?>
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>

          </div>
          <!-- /.card -->

          <!-- Modal -->
          <div class="modal fade" id="productUpdateModal" tabindex="-1" aria-labelledby="productUpdateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="updateProductForm" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div id="productImage" class="text-center mb-3"></div>
                    <div class="form-group">
                      <input type="hidden" name="productId" id="productId" />
                      <label for="productName">Product Name</label>
                      <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="form-group">
                      <label for="productDesc">Product Description</label>
                      <textarea class="form-control" id="productDesc" name="productDesc" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="productPrice">Product Price</label>
                      <input type="text" class="form-control" id="productPrice" name="productPrice" required>
                    </div>
                    <div class="form-group">
                      <label for="productImageUpdate">Product Image</label>
                      <input type="file" class="form-control-file" id="productImageUpdate" name="productImageUpdate">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <!-- Modal for displaying product details -->
          <div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog"
            aria-labelledby="productDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="productName"></div>
                  <div id="productDesc"></div>
                  <div id="productPrice"></div>
                  <div id="productImage"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>




          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method='post' action='addProduct.php' enctype="multipart/form-data">

                  <div class="modal-body">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input name="productName" type="text" class="form-control" id="productName"
                          placeholder="Enter product name">
                      </div>
                      <div class="form-group">
                        <label for="productDesc">Product Description</label>
                        <textarea name="productDesc" class="form-control" id="productDesc" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="productPrice">Product Price</label>
                        <input name="productPrice" type="text" class="form-control" id="productPrice"
                          placeholder="Enter product price">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Product Image</label>
                        <input name="productImage" type="file" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Listen for the modal open event and fetch product details
        $('#productDetailsModal').on('show.bs.modal', function (event) {
          let button = $(event.relatedTarget); // Button that triggered the modal
          let productId = button.data('id'); // Extract product ID from data-id attribute
          let modal = $(this); // Modal element

          // Clear previous image
          modal.find('#productImage').empty();

          // Fetch product details using product ID
          fetch('viewProduct.php?id=' + productId)
            .then(response => response.json())
            .then(data => {
              // Update the modal content with product details
              modal.find('#productName').text('Product Name: ' + data.product_name);
              modal.find('#productDesc').text('Product Description: ' + data.product_desc);
              modal.find('#productPrice').text('Product Price: ' + data.product_price);

              // Display the product image
              let imageElement = document.createElement('img');
              imageElement.src = data.product_image;
              imageElement.alt = 'Product Image';

              // Set CSS styles to resize the image
              imageElement.style.maxWidth = '100%'; // Adjust this value as needed
              imageElement.style.height = 'auto';

              modal.find('#productImage').append(imageElement);
            })
            .catch(error => {
              console.error('Error:', error);
            });
        });

        $('#productUpdateModal').on('show.bs.modal', function (event) {
          let button = $(event.relatedTarget); // Button that triggered the modal
          let productId = button.data('id'); // Extract product ID from data attribute

          // Fetch product details using product ID
          fetch('viewProduct.php?id=' + productId)
            .then(response => response.json())
            .then(data => {
              //let product = data.product;

              // Update the modal with the retrieved product details
              let modal = $(this);
              modal.find('#productId').val(data.product_id);
              modal.find('#productName').val(data.product_name);
              modal.find('#productDesc').val(data.product_desc);
              modal.find('#productPrice').val(data.product_price);
              modal.find('#productImage').html('<img src="' + data.product_image + '" class="img-fluid" alt="Product Image">');
            })
            .catch(error => {
              console.error('Error:', error);
            });
        });

        // Listen for form submission event and handle the update
        $('#updateProductForm').submit(function (event) {
          event.preventDefault(); // Prevent default form submission

          let form = $(this);
          let modal = $('#productDetailsModal');
          let productId = form.find('#productId').val();

          // Create a FormData object to store form data
          let formData = new FormData(form[0]);

          // Send the form data using fetch
          fetch('updateProduct.php', {
            method: 'POST',
            body: formData
          })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'success') {
                // Display success message
                modal.modal('hide'); // Hide the modal
                alert(data.message); // Show success message to the user
                location.reload();
                // You can perform additional actions like refreshing the product list, etc.
              } else {
                // Display error message
                alert(data.message); // Show error message to the user
              }
            })
            .catch(error => {
              console.error('Error:', error);
            });
        });
        // Listen for delete button click event
        $('.delete-product').on('click', function (event) {
          event.preventDefault();
          let productId = $(this).data('id'); // Extract product ID from data-id attribute

          // Display SweetAlert confirmation modal
          Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
          }).then((result) => {
            if (result.isConfirmed) {
              // If user clicks "Yes" on the confirmation modal, proceed with deletion
              deleteProduct(productId);
            }
          });
        });

        function deleteProduct(productId) {
          // Show a confirmation dialog
          Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to delete this product?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
          }).then((result) => {
            if (result.isConfirmed) {
              // If confirmed, send a request to delete the product
              fetch('deleteProduct.php?id=' + productId)
                .then(response => response.json())
                .then(data => {
                  if (data.status === 'success') {
                    // Display success message
                    Swal.fire('Success', data.message, 'success').then(() => {
                      // Reload the page to update the product list
                      location.reload();
                    });
                  } else {
                    // Display error message
                    Swal.fire('Error', data.message, 'error');
                  }
                })
                .catch(error => {
                  console.error('Error:', error);
                  // Display error message
                  Swal.fire('Error', 'An error occurred while deleting the product', 'error');
                });
            }
          });
        }
      });
    </script>



    <?php include 'includes/footer.php' ?>
</body>

</html>