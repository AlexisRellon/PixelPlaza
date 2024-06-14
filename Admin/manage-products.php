<style>
    @import url('../css/dashboard-card-style.css');

    /* Base Delete Modal Style */
    #deleteModal .form-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
</style>

<?php
if (isset($_SESSION['Success Message'])) {
    echo <<<HTML
    <div class="alert alert-success">
        <p>{$_SESSION['Success Message']}</p>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
HTML;
    unset($_SESSION['Success Message']);
}
?>

<body>
    <header style="margin-bottom: 2rem;">
        <h2>Manage Products</h2>
    </header>
    <main>

    </main>
    <section>
        <div class="card orders-table flex-column">
            <div class="card-title flex justify-space-between">
                <h3>Products</h3>
                <div class="buttons-wrapper">
                    <button class="btn btn-primary add-btn" data-title="Add Product" name="add" onclick="showAddModal(true)">
                        &plus; &ThickSpace; Add Product
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Retrieve data from Database -->
                            <?php
                            require_once '../php/db.php';
                            $products = fetchAllProducts($conn);

                            foreach ($products as $product) {
                                echo "<tr>";
                                echo "<td class='id'>" . $product['ProductID'] . "</td>";
                                echo "<td class='product'>" . $product['Name'] . "</td>";
                                echo "<td class='price'>₱ " . $product['Price'] . "</td>";
                                echo "<td class='stock'>" . $product['Stock'] . "</td>";
                                echo "<td class='actions'>";
                                echo "<button class='btn edit-item'
                                data-id='" . $product['ProductID'] . "'
                                data-product-name='" . $product['Name'] . "'
                                data-desc='" . $product['Description'] . "'
                                data-price='" . $product['Price'] . "'
                                data-sale-price='" . $product['SalePrice'] . "'
                                data-stock='" . $product['Stock'] . "'
                                data-category='" . $product['CategoryID'] . "'
                                data-brand='" . $product['BrandID'] . "'
                                onclick='showModal(true)'>
                                <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                </svg>
                                </button>";
                                echo "<button class='btn btn-danger'
                                data-id='" . $product['ProductID'] . "'
                                onclick='showDeleteModal(true)'>
                                <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0' />
                                </svg>
                                </button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <dialog id="editModal">
        <form action="" method="POST" enctype="multipart/form-data">
            <h4 class="modal-title">Edit Product</h4>
            <div class="form-group">
                <input type="hidden" name="productID" id="productID">

                <label for="productName">Product Name</label>
                <input type="text" name="productName" id="productName" class="form-control">

                <label for="productDesc">Description</label>
                <textarea name="productDesc" id="productDesc" class="form-control"></textarea>

                <label for="productPrice">Price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control">

                <label for="productSalePrice">Sale Price</label>
                <input type="text" name="productSalePrice" id="productSalePrice" class="form-control">

                <label for="productStock">Stock</label>
                <input type="text" name="productStock" id="productStock" class="form-control">

                <label for="productCategory">Category</label>
                <select name="productCategory" id="productCategory" class="form-control">
                    <option value="0">Select Category</option>
                    <option value="1">Keyboards</option>
                    <option value="2">Mouse</option>
                    <option value="3">Headsets</option>
                    <option value="4">Switch</option>
                </select>

                <label for="productBrand">Brand</label>
                <select name="productBrand" id="productBrand" class="form-control">
                    <option value="0">Select Brand</option>
                    <option value="1">Akko</option>
                    <option value="2">Rakk</option>
                    <option value="3">Red Dragon</option>
                </select>

                <label for="productImage">Image</label>
                <input type="file" name="productImage" id="productImage" class="form-control">

                <button type="submit" name="save" class="btn cta-save">
                    Save
                </button>
                <button type="button" class="btn cta-close" onclick="showModal(false)">
                    Close
                </button>
            </div>
        </form>
    </dialog>
    <dialog id="addModal">
        <form action="" method="POST" enctype="multipart/form-data">
            <h4 class="modal-title">Add Product</h4>
            <div class="form-group">
                <input type="hidden" name="productID" id="productID">

                <label for="productName">Product Name</label>
                <input type="text" name="productName" id="productName" class="form-control">

                <label for="productDesc">Description</label>
                <textarea name="productDesc" id="productDesc" class="form-control"></textarea>

                <label for="productPrice">Price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control">

                <label for="productSalePrice">Sale Price</label>
                <input type="text" name="productSalePrice" id="productSalePrice" class="form-control">

                <label for="productStock">Stock</label>
                <input type="text" name="productStock" id="productStock" class="form-control">

                <label for="productCategory">Category</label>
                <select name="productCategory" id="productCategory" class="form-control">
                    <option value="0">Select Category</option>
                    <option value="1">Keyboards</option>
                    <option value="2">Mouse</option>
                    <option value="3">Headsets</option>
                    <option value="4">Switch</option>
                </select>

                <label for="productBrand">Brand</label>
                <select name="productBrand" id="productBrand" class="form-control">
                    <option value="0">Select Brand</option>
                    <option value="1">Akko</option>
                    <option value="2">Rakk</option>
                    <option value="3">Red Dragon</option>
                </select>

                <label for="productImage">Image</label>
                <input type="file" name="productImage" id="productImage" class="form-control">

                <button type="submit" name="save-addBtn" class="btn cta-save">
                    Save
                </button>
                <button type="button" class="btn cta-close" onclick="showModal(false)">
                    Close
                </button>
            </div>
        </form>
    </dialog>
    <dialog id="deleteModal">
        <form action="" method="POST">
            <h4 class="modal-title">Delete Product</h4>
            <div class="form-group">
                <p>Are you sure you want to delete this product?</p>
                <form action="" method="POST">
                    <input type="hidden" name="productID" id="productIDDel">
                    <input type="submit" name="delete" value="Delete" class="btn cta-delete">
                    <button type="button" class="btn cta-close" onclick="showDeleteModal(false)">
                        Close
                    </button>
                </form>
            </div>
    </dialog>
</body>
<script>
    // Modal for editing products
    const editModal = document.getElementById('editModal');
    const addModal = document.getElementById('addModal');

    const addButton = document.querySelector('.add-btn');
    const editButtons = document.querySelectorAll('.edit-item');

    // Data
    const productID = document.getElementById('productID');
    const productIDDel = document.getElementById('productIDDel');
    const productName = document.getElementById('productName');
    const productDesc = document.getElementById('productDesc');
    const productPrice = document.getElementById('productPrice');
    const productSalePrice = document.getElementById('productSalePrice');
    const productStock = document.getElementById('productStock');
    const productCategory = document.getElementById('productCategory');
    const productBrand = document.getElementById('productBrand');

    // Data for edit
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            productID.value = button.dataset.id;
            productName.value = button.dataset.productName;
            productDesc.value = button.dataset.desc;
            productPrice.value = button.dataset.price;
            productSalePrice.value = button.dataset.salePrice;
            productStock.value = button.dataset.stock;
            productCategory.value = button.dataset.category;
            productBrand.value = button.dataset.brand;
        });
    });

    // Data for add
    addButton.addEventListener('click', () => {
        productID.value = '';
        productName.value = '';
        productDesc.value = '';
        productPrice.value = '';
        productSalePrice.value = '';
        productStock.value = '';
    });

    /* Delete Modal */
    const deleteModal = document.getElementById('deleteModal');
    const deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            deleteModal.showModal();
            productIDDel.value = button.dataset.id;
        });
    });

    const showModal = (show) => show ? editModal.showModal() : editModal.close();
    const showAddModal = (show) => show ? addModal.showModal() : addModal.close();
    const showDeleteModal = (show) => show ? deleteModal.showModal() : deleteModal.close();
    editModal.addEventListener('click', (e) => !e.target.closest('form') && showModal(false));
    addModal.addEventListener('click', (e) => !e.target.closest('form') && showAddModal(false));
    deleteModal.addEventListener('click', (e) => !e.target.closest('form') && deleteModal.close());
</script>

<!-- Process data from modal -->
<?php

require_once '../php/db.php';
require_once '../php/filter-data.php';

/*Edit Products */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $productID = filterData($_POST['productID']);
    $productName = filterData($_POST['productName']);
    $productDesc = filterData($_POST['productDesc']);
    $productPrice = filterData($_POST['productPrice']);
    $productSalePrice = filterData($_POST['productSalePrice']);
    $productStock = filterData($_POST['productStock']);
    $productCategory = filterData($_POST['productCategory']);
    $productBrand = filterData($_POST['productBrand']);

    $productImage = $_FILES['productImage']['name'];
    $targetDir = '../img/';

    if ($productImage) {
        switch ($_POST['productCategory']) {
            case 1:
                $targetDir = '../img/keyboards/';
                break;
            case 2:
                $targetDir = '../img/mouse/';
                break;
            case 3:
                $targetDir = '../img/headsets/';
                break;
            case 4:
                $targetDir = '../img/switch/';
                break;
        }

        $targetFile = $targetDir . basename($productImage);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    }

    $stmt = $conn->prepare("UPDATE products SET Name = ?, Description = ?, Price = ?, SalePrice = ?, Stock = ?, CategoryID = ?, BrandID = ?, ImageURL = ? WHERE ProductID = ?");
    $stmt->bind_param("ssddiissi", $productName, $productDesc, $productPrice, $productSalePrice, $productStock, $productCategory, $productBrand, $targetFile, $productID);

    if ($stmt->execute()) {
        $_SESSION['Success Message'] = 'Product updated successfully';
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=manage-products');
    } else {
        echo <<<HTML
            <div class="alert alert-danger">
                <p>Error: $conn->error</p>
                <span class="closebtn" onclick="this.parentElement.styledisplay='none'">&times;</span>
            </div>
        HTML;
    }
    $stmt->close();
}

/* Add Product */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save-addBtn'])) {
    $productName = filterData($_POST['productName']);
    $productDesc = filterData($_POST['productDesc']);
    $productPrice = filterData($_POST['productPrice']);
    $productSalePrice = filterData($_POST['productSalePrice']);
    $productStock = filterData($_POST['productStock']);
    $productCategory = filterData($_POST['productCategory']);
    $productBrand = filterData($_POST['productBrand']);

    $productImage = $_FILES['productImage']['name'];
    $targetDir = '../img/';

    if ($productImage) {
        switch ($_POST['productCategory']) {
            case 1:
                $targetDir = '../img/keyboards/';
                break;
            case 2:
                $targetDir = '../img/mouse/';
                break;
            case 3:
                $targetDir = '../img/headsets/';
                break;
            case 4:
                $targetDir = '../img/switch/';
                break;
        }

        $targetFile = $targetDir . basename($productImage);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    }

    $stmt = $conn->prepare("INSERT INTO products (Name, Description, Price, SalePrice, Stock, CategoryID, BrandID, ImageURL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddiiss", $productName, $productDesc, $productPrice, $productSalePrice, $productStock, $productCategory, $productBrand, $targetFile);

    if ($stmt->execute()) {
        $_SESSION['Success Message'] = 'Product added successfully';
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=manage-products');
    } else {
        echo <<<HTML
            <div class="alert alert-danger">
                <p>Error: $conn->error</p>
                <span class="closebtn" onclick="this.parentElement.styledisplay='none'">&times;</span>
            </div>
        HTML;
    }
    $stmt->close();
}

/* Delete Products */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $productID = filterData($_POST['productID']);

    $stmt = $conn->prepare("DELETE FROM products WHERE ProductID = ?");
    $stmt->bind_param("i", $productID);

    if ($stmt->execute()) {
        $sql = "SELECT MAX(ProductID) as ProductID FROM products";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $ID = $row['ProductID'];
        $productID = ($ID == 0 ? 1 : $productID); // Reset auto increment (if productID is 0, set to 1, else increment by 1
        $sql = "ALTER TABLE products AUTO_INCREMENT = $productID";
        $conn->query($sql);

        $_SESSION['Success Message'] = 'Product deleted successfully';;
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=manage-products');
    } else {
        echo <<<HTML
            <div class="alert alert-danger">
                <p>Error: $conn->error</p>
                <span class="closebtn" onclick="this.parentElement.styledisplay='none'">&times;</span>
            </div>
        HTML;
    }
    $stmt->close();
}

?>