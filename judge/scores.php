<?php
session_start();
include '../includes/dbcon.php';

// Retrieve current judge's information
$current_judge = $_SESSION['username'];
$query = "SELECT * FROM admin_users WHERE username = '$current_judge'";
if ($result = $con->query($query)) {
    $row = $result->fetch_assoc();
    $firstname = $row ? $row['first_name'] : ''; // Handle case where no row is found
} else {
    $firstname = ''; // Handle query failure
}

// Retrieve current event category
$query = "SELECT * FROM `event_category` WHERE isTabulated ='Ready' ORDER BY order_number ASC LIMIT 1";
if ($result = $con->query($query)) {
    $row = $result->fetch_assoc();
    $category_id = $row ? $row['id'] : null; // Handle case where no row is found
} else {
    $category_id = null; // Handle query failure
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pageant Tabulation System-PaTaS</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
        table tr td {
            padding: 0.1rem !important;
        }

        td a.btn {
            font-size: 0.7rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(240,158,65)">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <p style="font-size: 24px; color: white;">Pageant Tabulation System-PaTaS</p>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-primary" style="background-color: rgb(46,18,35);">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
                <img src="../asset/img/seait.png" alt="DSMS Logo" width="200">
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <img src="../asset/img/dashboard.png" width="30">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="contestant-profile.php" class="nav-link">
                                <img src="../asset/img/contestant.png" width="30">
                                <p>Contestants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="scores.php" class="nav-link">
                                <img src="../asset/img/score.png" width="30">
                                <p>Score Sheets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="scores_top_five.php" class="nav-link">
                                <img src="../asset/img/score.png" width="30">
                                <p>Top 5 Finalist</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="yourscores.php" class="nav-link">
                                <img src="../asset/img/score.png" width="30">
                                <p>Your Scorings</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><img src="../asset/img/score.png" width="40"> Score Sheets</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Score Sheets</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info elevation-2">
                        <br>
                        <div class="col-md-12">
                        <div class="row">
    <?php
    // Verify that category_id is available
    if ($category_id !== null) {
        $query2 = "SELECT * FROM contestants ORDER BY contestant_no ASC";
        if ($result2 = $con->query($query2)) {
            while ($row2 = $result2->fetch_assoc()) {
                echo '
                <div class="col-lg-6 mb-4">
                    <form onSubmit="return confirm(\'Do you want to submit?\')" action="backend/add_score.php" method="POST">
                        <div class="info-box bg-warning content-header mb-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p style="font-size: 22px;">' . $row2['firstname'] . ' ' . $row2['middlename'] . ' ' . $row2['lastname'] . '</p>
                                    <p style="font-size: 18px;" class="badge bg-white text-dark">' . $row2['gender'] . ' Candidate # ' . $row2['contestant_no'] . '</p>
                                </div>
                                <a href="../images/' . $row2['image'] . '" target="_blank">
                                    <img src="../images/' . $row2['image'] . '" style="height: 100px; width: 80px; border-radius: 50%; border: 2px solid #555;">
                                </a>
                            </div>
                        </div>
                        <div class="info-box">
                            <table class="table">
                                <thead class="bg-warning text-white">
                                    <tr>
                                        <th>Criteria</th>
                                        <th class="text-center">Score</th>
                                    </tr>
                                </thead>
                                <tbody>';

                $query1 = "SELECT criteria_archive.id AS criteria_id, criteria_archive.criteria_name AS criteria_name, criteria_informations.percentage AS percentage 
                            FROM criteria_informations 
                            LEFT JOIN criteria_archive ON criteria_informations.criteria_id = criteria_archive.id 
                            LEFT JOIN scores ON scores.criteria_id = criteria_archive.id 
                            WHERE criteria_informations.event_id = '$category_id' 
                            AND criteria_informations.criteria_id NOT IN (
                                SELECT scores.criteria_id 
                                FROM scores 
                                WHERE scores.judge = '$_SESSION[username]' 
                                AND scores.contestant = '$row2[id]' 
                                AND scores.category = '$category_id'
                            ) 
                            GROUP BY criteria_informations.criteria_id";

                if ($result1 = $con->query($query1)) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $max = $row1['percentage'];

                        echo '
                        <tr>
                            <td>
                                <p style="font-size: 22px;">' . $row1['criteria_name'] . ' <span class="badge bg-yellow">' . $row1['percentage'] . '%</span></p>
                            </td>
                            <td>
                            <br>
                                <input type="number" min="0" max="' . $max . '" class="form-control" name="score[]" value="' . (isset($row1['score']) ? $row1['score'] : '') . '" required>
                                <input type="hidden" name="criteria_id[]" value="' . $row1['criteria_id'] . '">
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">No criteria found for this event.</td></tr>';
                }

                echo '</tbody>
                            </table>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-success btn-lg" type="submit" name="submit">Submit</button>
                            </div>
                </div>';
            }
        } else {
            echo '<div class="col-lg-12"><p>No contestants found.</p></div>';
        }
    } else {
        echo '<p>No event category ready for tabulation.</p>';
    }
    ?>
</div>

                        </div>
                        <br>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>&copy; 2024 Pageant Tabulation System-PaTaS</strong>
            All rights reserved.
        </footer>
    </div>
</body>
</html>
