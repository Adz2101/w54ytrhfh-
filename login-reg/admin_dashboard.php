<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

// You can retrieve admin information from the session if needed
$admin = $_SESSION["admin"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Risk Management System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Add this style to remove white border */
        .wrapper {
            border: none; /* Remove border */
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Risk Management System</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <!-- <li><a href="#"><i class="fas fa-bahai"></i>Overview</a></li> -->
            <li><a href="#" onclick="viewSubmittedRisks()"><i class="fab fa-expeditedssl"></i> Submitted Risks</a></li>
            <li><a href="#" onclick="loadControls()"><i class="fas fa-atom"></i>Controls</a></li>
            <li><a href="#" onclick="viewreviews()" id="nav-reviews"><i class="fas fa-comments"></i> Reviews</a></li>
            <li><a href="#" onclick="usermanagement()" id="nav-user-management"><i class="fas fa-users-cog"></i>User Management</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="header">
            <div>Welcome, <?php echo $admin["username"]; ?></div>
            <!-- Other header content -->
        </div>
        <div class="info" id="content-container">
            <!-- Content will be loaded here -->
        </div>
        <div id="user-management-content">
             <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<script>
    // JavaScript to handle opening/closing the submitted risks
    function viewSubmittedRisks() {
        // Load submitted risks content using jQuery
        $("#content-container").load("view-submitted-risks.php");
    }

    // Function to load controls.php content
    function loadControls() {
        // Load controls.php content using jQuery
        $("#content-container").load("controls.php");
    }
// JavaScript to handle opening/closing the submitted risks
function viewreviews() {
        // Load submitted risks content using jQuery
        $("#content-container").load("display-reviews.php");
    }

// JavaScript to handle opening/closing the submitted risks
function usermanagement() {
        // Load submitted risks content using jQuery
        $("#content-container").load("user-management.php");
    }
    // JavaScript to handle loading User Management content
/*$(document).ready(function () {
    // Event listener for the User Management link click
    $("#nav-user-management").click(function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Load User Management content using AJAX
        $("#user-management-content").load("user-management.php");
    });
});*/

</script>

<script>
    $(document).ready(function () {
        // Event handler for the "Approve Mitigation" button click
        $(document).on("click", ".btn-approve-mitigation", function () {
            // Get the risk ID associated with the clicked button
            var riskId = $(this).data("risk-id");

            // Send an AJAX request to approve-mitigation.php
            $.ajax({
                url: "approve-mitigation.php?risk_id=" + riskId,
                type: "GET",
                success: function (response) {
                    // Display the response message (if needed)
                    alert(response);
                    // Optionally, you can refresh the submitted risks section
                    viewSubmittedRisks();
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>
