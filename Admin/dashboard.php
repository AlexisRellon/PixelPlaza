<style>
    @import url('../css/dashboard-card-style.css');
</style>
<?php
require_once '../php/db.php';
require_once '../php/filter-data.php';

if (!isset($_SESSION['Role']) || $_SESSION['Role'] != 1) {
    header('Location: ../');
    exit('You are not allowed to access this page.');
}

$users = count(fetchAllUsers($conn));
$products = count(fetchAllProducts($conn));
$sales = count(fetchTotalSales($conn));
$orders = count(fetchAllOrders($conn));
?>

<body>
    <header style="margin-bottom: 2rem;">
        <h2>Dashboard</h2>
    </header>
    <main class="flex flex-column gap-5">
        <section class="grid grid-cols-4 gap-5">
            <div class="card">
                <div class="card-icon users self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                </div>
                <div class="card-details">
                    <p>Users</p>
                    <h3><?php echo $users ?></h3>
                </div>
            </div>
            <div class="card">
                <div class="card-icon products self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-archive-fill" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z" />
                    </svg>
                </div>
                <div class="card-details">
                    <p>Products</p>
                    <h3><?php echo $products ?></h3>
                </div>
            </div>
            <div class="card">
                <div class="card-icon sales self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-graph-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07" />
                    </svg>
                </div>
                <div class="card-details">
                    <p>Sales</p>
                    <h3><?php echo '₱ ' . $sales ?></h3>
                </div>
            </div>
            <div class="card">
                <div class="card-icon orders self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708" />
                    </svg>
                </div>
                <div class="card-details">
                    <p>Orders</p>
                    <h3><?php echo $orders ?></h3>
                </div>
            </div>
        </section>
        <main class="graphs">
            <div class="card products-chart">
                <div class="card-title">
                    <h3>Brand Popularity Statistics</h3>
                </div>
                <div class="card-body">
                    <canvas id="products-chart"></canvas>
                </div>
            </div>
            <div class="card daily-sales">
                <div class="card-title">
                    <h3>Daily Sales</h3>
                </div>
                <div class="card-body">
                    <canvas id="daily-sales"></canvas>
                </div>
            </div>
            <div class="card new-users">
                <div class="card-title">
                    <h3>New Users</h3>
                </div>
                <div class="card-body">
                    <!-- Fetch data from the database: table -->
                    <!-- Display the data in a table: Name | Role -->
                    <table>
                        <tbody>
                            <?php
                            $newUsers = fetchNewUsers($conn);
                            foreach ($newUsers as $user) {

                                $role = $user['UserTypeID'] == 1 ? 'Admin' : 'User';

                                echo '<tr>';
                                echo '<td>' . $user['FirstName'] . '</td>';
                                echo '<td>' . $role . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card order-lists">
                <div class="card-title">
                    <h3>Order List</h3>
                </div>
                <div class="card-body">
                    <!-- Fetch data from the database: table -->
                    <!-- Display the data in a table: OrderID | TotalAmount -->
                    <table>
                        <thead>
                            <tr>
                                <th class="id">Order ID</th>
                                <th class="date">Date & Time</th>
                                <th class="amount">Total Amount</th>
                                <th class="status">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = fetchAllOrders($conn);
                            foreach ($orders as $order) {
                                echo '<tr>';
                                echo '<td>' . $order['OrderID'] . '</td>';
                                echo '<td>' . $order['OrderDate'] . '</td>';
                                echo '<td>₱ ' . $order['TotalAmount'] . '</td>';
                                echo '<td>' . $order['Status'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </main>

    <script>
        /* User chart: area graph, curved. User online status from Jan-Dec */
        var ctx = document.getElementById('products-chart').getContext('2d');
        var userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        label: 'Akko',
                        data: [<?php echo implode(', ', array_map(function () {
                                    return rand(25, 100);
                                }, range(1, 12))); ?>],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        lineTension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Red Dragon',
                        data: [<?php echo implode(', ', array_map(function () {
                                    return rand(10, 100);
                                }, range(1, 12))); ?>],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        lineTension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Rakk',
                        data: [<?php echo implode(', ', array_map(function () {
                                    return rand(10, 100);
                                }, range(1, 12))); ?>],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        lineTension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                },
                layout: {
                    responsive: true,
                    padding: {
                        left: 20,
                        right: 30,
                        top: 16,
                        bottom: 16
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                },
                elements: {
                    point: {
                        radius: 0 // Set the radius to 0 to remove the circle
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        align: 'center',

                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                }
            }
        });

        /* Daily Sales: area graph, curved, no display only the line graph */
        var ctx = document.getElementById('daily-sales').getContext('2d');
        var dailySales = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Daily Sales',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 2,
                    lineTension: 0.4, // Add this line to make the line graph curved
                    fill: true // Add this line to fill the area under the line
                }]
            },
            options: {
                layout: {
                    responsive: true,
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                scales: {
                    y: {
                        display: false,
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        display: false,
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 0 // Set the radius to 0 to remove the circle
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: '₱ 1,000.00',
                        color: 'white',
                        font: {
                            size: 25
                        },
                        position: 'top',
                        align: 'center',
                        margin: {
                            bottom: 16,
                        },
                    }
                }
            }
        });
    </script>
</body>