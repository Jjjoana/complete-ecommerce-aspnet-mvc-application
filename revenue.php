<?php
    include("connection.php");
    include("queries.php");
    include("alerts.php");
    
// handling dateForm submission and processing orders

    if (isset($_REQUEST['weekly_tab'])) {
        // Display Weekly Revenue
        $start_date = date('Y-m-d', strtotime('last Monday'));
        $end_date = date('Y-m-d', strtotime('this Sunday'));
        $weekly_revenue = get_weekly_revenue($start_date, $end_date);
    } elseif (isset($_REQUEST['monthly_tab'])) {
        // Display Monthly Revenue
        $month = date('m');
        $year = date('Y');
        $monthly_revenue = get_monthly_revenue($month, $year);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Page</title>
    <script src="helper_function.js"></script>
</head>
<body>

    <!-- Tabs for Weekly and Monthly Revenue -->
    <ul>
        <li><a href="?weekly_tab">Weekly Revenue</a></li>
        <li><a href="?monthly_tab">Monthly Revenue</a></li>
    </ul>

    <!-- Display Weekly Revenue -->
    <?php if (isset($weekly_revenue)): ?>
        <div id="weekly_revenue">
            <!-- Weekly revenue report content -->
        </div>
    <?php endif; ?>

    <!-- Display Monthly Revenue -->
    <?php if (isset($monthly_revenue)): ?>
        <div id="monthly_revenue">
            <!-- Monthly revenue report content -->
        </div>
    <?php endif; ?>
    
    <script src="helper_functions.js"></script>

</body>
</html>
