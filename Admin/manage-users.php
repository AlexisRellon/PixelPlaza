<style>
    @import url('../css/dashboard-card-style.css');

    /* Base Table Style */
    tbody tr {
        height: 90px
    }

    td {
        text-align: center;

        svg {
            width: 1.5rem;
        }

        button {
            padding: 0;
        }
    }

    /* Base Delete Modal Style */
    #deleteModal .form-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-group {

        display: flex;
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
        <h2>Manage Users</h2>
    </header>
    <main>
        <section>
            <div class="card orders-table flex-column">
                <div class="card-title flex justify-space-between">
                    <h3>Products</h3>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Role</th>
                                <th>Attempts</th>
                                <th>User Status</th>
                                <th>Account Creation</th>
                                <th>Online Status</th>
                                <th>Account Locked</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../php/db.php';
                            require_once '../php/filter-data.php';

                            $users = fetchAllUsers($conn);

                            foreach ($users as $user) {
                                $userType = $user['UserTypeID'] == 1 ? 'Admin' : 'Customer';
                                $userStatus = '';
                                $accountLocked = $user['Locked'] == 1 ? 'Yes' : 'No';

                                switch ($user['UserStatusID']) {
                                    case 1:
                                        $userStatus = 'Pending';
                                        break;
                                    case 2:
                                        $userStatus = 'Verified';
                                        break;
                                    case 3:
                                        $userStatus = 'Blocked';
                                        break;
                                }
                                $onlineStatus = $user['OnlineStatus'] == 1 ? 'Online' : 'Offline';

                                echo "<tr>";
                                echo "<td class='id'>" . $user['UserID'] . "</td>";
                                echo "<td class='email'>" . $user['Email'] . "</td>";
                                echo "<td class='first-name'>" . $user['FirstName'] . "</td>";
                                echo "<td class='last-name'>" . $user['LastName'] . "</td>";
                                echo "<td class='user-type'>" . $userType . "</td>";
                                echo "<td class='attempts'>" . $user['attempts'] . "</td>";
                                echo "<td class='user-status'>" . $userStatus . "</td>";
                                echo "<td class='account-creation'>" . $user['CreatedAt'] . "</td>";
                                echo "<td class='online-status'>" . $onlineStatus . "</td>";
                                echo "<td class='locked'>" . $accountLocked . "</td>";
                                echo "<td class='actions'>";
                                echo "<div class='btn-group'>";
                                echo "<button class='btn edit-item'
                                        data-email='" . $user['Email'] . "'
                                        data-first-name='" . $user['FirstName'] . "'
                                        data-last-name='" . $user['LastName'] . "'
                                        data-user-type='" . $user['UserTypeID'] . "'
                                        data-user-status='" . $user['UserStatusID'] . "'
                                        data-locked='" . $user['Locked'] . "'
                                        onclick='showModal(true)'>
                                        <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                        </svg>
                                    </button>";
                                echo "<button class='btn btn-danger'
                                        data-id='" . $user['UserID'] . "'
                                        onclick='showDeleteModal(true)'>
                                        <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0' />
                                        </svg>
                                    </button>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <dialog id="editModalAccount">
            <form action="" method="POST">
                <h4 class="modal-title">Edit User Data</h4>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">

                    <label for="first-name">First Name</label>
                    <input type="text" name="first-name" id="first-name">

                    <label for="last-name">Last Name</label>
                    <input type="text" name="last-name" id="last-name">

                    <label for="user-type">User Type</label>
                    <select name="user-type" id="user-type">
                        <option value="1">Admin</option>
                        <option value="2">Customer</option>
                    </select>

                    <label for="user-status">User Status</label>
                    <select name="user-status" id="user-status">
                        <option value="1">Pending</option>
                        <option value="2">Verified</option>
                        <option value="3">Blocked</option>
                    </select>

                    <label for="locked">Account Locked</label>
                    <select name="locked" id="locked">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                    <button type="submit" name="update" class="btn cta-update">Update</button>
                    <button type="button" class="btn cta-cancel" onclick="showModal(false)">Cancel</button>
                </div>
        </dialog>
        <dialog id="deleteModal">
            <form action="" method="POST">
                <h4 class="modal-title">Delete User</h4>
                <div class="form-group">
                    <input type="hidden" name="UserID" id="deleteUserID">
                    <p>Are you sure you want to delete this user?</p>
                    <button type="submit" name="delete" class="btn cta-delete">Delete</button>
                    <button type="button" class="btn cta-cancel" onclick="showDeleteModal(false)">Cancel</button>
                </div>
            </form>
        </dialog>
    </main>
</body>
<script>
    // Modal for editing user data
    const editModalAccount = document.getElementById('editModalAccount');

    const editButtons = document.querySelectorAll('.edit-item');

    // Data
    /* const userID = document.getElementById('userID'); */
    const email = document.getElementById('email');
    const firstName = document.getElementById('first-name');
    const lastName = document.getElementById('last-name');
    const userType = document.getElementById('user-type');
    const userStatus = document.getElementById('user-status');
    const locked = document.getElementById('locked');

    editButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            email.value = button.dataset.email;
            firstName.value = button.dataset.firstName;
            lastName.value = button.dataset.lastName;
            userType.value = button.dataset.userType;
            userStatus.value = button.dataset.userStatus;
            locked.value = button.dataset.locked;
            editModalAccount.showModal();
        });
    });

    // Modal for deleting user
    const deleteModal = document.getElementById('deleteModal');
    const deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            document.getElementById('deleteUserID').value = button.dataset.id;
            deleteModal.showModal();
        });
    });

    const showModal = (show) => show ? editModalAccount.showModal() : editModalAccount.close();
    const showDeleteModal = (show) => show ? deleteModal.showModal() : deleteModal.close();

    editModalAccount.addEventListener('click', (e) => !e.target.closest('form') && showModal(false));
    deleteModal.addEventListener('click', (e) => !e.target.closest('form') && deleteModal.close());
</script>

<!-- Handle data -->
<?php
require_once '../php/db.php';
require_once '../php/filter-data.php';

if (isset($_POST['update'])) {
    
    // Get the user ID
    $sql = "SELECT UserID FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userID);

    if ($stmt->fetch()) {
        $userID = $userID;
    }

    $email = $_POST['email'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $userType = $_POST['user-type'];
    $userStatus = $_POST['user-status'];
    $locked = $_POST['locked'];

    // Prepare the SQL statement with placeholders
    $sql = "UPDATE users SET Email = ?, FirstName = ?, LastName = ?, UserTypeID = ?, UserStatusID = ?, Locked = ? WHERE UserID = ?";

    // Debugging store as a string
    $debug = "UPDATE users SET Email = $email, FirstName = $firstName, LastName = $lastName, UserTypeID = $userType, UserStatusID = $userStatus, Locked = $locked WHERE UserID = $userID";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("sssiiii", $email, $firstName, $lastName, $userType, $userStatus, $locked, $userID);

    if ($stmt->execute()) {
        $_SESSION['Success Message'] = 'User data updated successfully.';
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=manage-users');
        exit(); // Add this line to stop executing the rest of the code
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

if (isset($_POST['delete'])) {
    $userID = $_POST['UserID'];

    $sql = "DELETE FROM users WHERE UserID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        $sql = "SELECT MAX(UserID) FROM users";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $ResetID = $row['MAX(UserID)'];
        $sql = "ALTER TABLE users AUTO_INCREMENT = $ResetID";
        $conn->query($sql);

        $_SESSION['Success Message'] = 'User deleted successfully.';
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=manage-users');
        exit(); // Add this line to stop executing the rest of the code
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
