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
        <h2>View Transactions</h2>
    </header>
    <main>
        <section>
            <div class="card orders-table flex-column">
                <div class="card-title flex justify-space-between">
                    <h3>All Recent Transactions</h3>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date and Time</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../php/db.php';
                            require_once '../php/filter-data.php';

                            $orders = fetchAllOrders($conn);

                            foreach ($orders as $order) {
                                echo "<tr>";
                                echo "<td class='order-id'>" . $order['OrderID'] . "</td>";
                                echo "<td class='date-time'>" . $order['CreatedAt'] . "</td>";
                                echo "<td class='total'>" . $order['TotalAmount'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>