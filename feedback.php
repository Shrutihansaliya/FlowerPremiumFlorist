<?php
//include 'headerindex.php';
//$itemid=$_REQUEST['itemid'];
//$uname=$_REQUEST['uname'];
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "dbphpprojechflower";
//
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
////$uname=$_SESSION['UNAME'];
////echo $uname;
//
//
//// Handle form submission
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $rating = $_POST['rating'] ?? null; // Fetch the rating value
//    $comment = trim($_POST['comment']); // Fetch and sanitize the comment
//
//    if ($rating && $comment) {
//        // Prepare and execute SQL query to insert data into the feedback table
//        $sql = "INSERT INTO tblfeedback (UNAME,P_ID,RATING,COMMENT) VALUES ('$uname',$itemid,?, ?)";
//        $stmt = $conn->prepare($sql);
//        $stmt->bind_param('is', $rating, $comment);
//
//        if ($stmt->execute()) {
//            $message = "Feedback submitted successfully.";
//        } else {
//            $message = "Error: Could not save your feedback. Please try again.";
//        }
//    } else {
//        $message = "Please provide both a rating and a comment.";
//    }
//}
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page with Star Rating</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .feedback-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        textarea, button, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            /*border: 1px solid #ccc;*/
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h1>Feedback Form</h1>-->
        <?php //if (!empty($message)): ?>
            <!--<p style="color: green; text-align: center;"><?php echo $message; ?></p>-->
        <?php //endif; ?>
<!--        <form method="POST" action="">
            <label for="rating">Rate us:</label>
            <select id="rating" name="rating" required>
                <option value="">-- Select Rating --</option>
                <option value="5">5 ★ - Excellent</option>
                <option value="4">4 ★ - Good</option>
                <option value="3">3 ★ - Average</option>
                <option value="2">2 ★ - Poor</option>
                <option value="1">1 ★ - Very Poor</option>
            </select>

            <label for="comment">Your Comment:</label>
            <textarea id="comment" name="comment" placeholder="Enter your feedback here..." required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>

        <h2>Feedback Table</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Rating</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>-->
                <?php
                // Fetch all feedback records from the database and display them
//                $result = $conn->query("SELECT RATING, COMMENT FROM tblfeedback where UNAME='$uname'");
//                if ($result->num_rows > 0) {
//                    while ($row = $result->fetch_assoc()) {
//                        echo "<tr>";
//                        echo "<td>{$row['RATING']} ★</td>";
//                        echo "<td>" . htmlspecialchars($row['COMMENT']) . "</td>";
//                        echo "</tr>";
//                    }
//                } else {
//                    echo "<tr><td colspan='2'>No feedback yet.</td></tr>";
//                }
                ?>
<!--            </tbody>
        </table>
    </div>
    <br><br>
</body>
</html>-->
<?php
//include 'aboutusfooter.php';
?>



<?php
include 'headerindex.php';

$itemid = $_REQUEST['itemid'];
//$uname = $_REQUEST['uname'];
if(isset($_SESSION['UNAME'])){
    $uname=$_SESSION['UNAME'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbphpprojechflower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'] ?? null; // Fetch the rating value
    $comment = trim($_POST['comment']); // Fetch and sanitize the comment

    if ($rating && $comment) {
        // Prepare and execute SQL query to insert data into the feedback table
        $sql = "INSERT INTO tblfeedback (UNAME, P_ID, RATING, COMMENT) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('siis', $uname, $itemid, $rating, $comment);

        if ($stmt->execute()) {
            $message = "Feedback submitted successfully.";
        } else {
            $message = "Error: Could not save your feedback. Please try again.";
        }
    } else {
        $message = "Please provide both a rating and a comment.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page with Star Rating</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .feedback-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            margin: 10px 0;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            color: #ccc;
            cursor: pointer;
            margin-left: 10px;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: #ffc107;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        .table th{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h1>Feedback Form</h1>
        <?php if (!empty($message)): ?>
            <p style="color: green; text-align: center;"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="rating">Rate us:</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" required />
                <label for="star5" title="5 stars">★</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="4 stars">★</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="3 stars">★</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="2 stars">★</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="1 star">★</label>
            </div>

            <label for="comment">Your Comment:</label>
            <textarea id="comment" name="comment" placeholder="Enter your feedback here..." required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>

        <h2>Feedback Table</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Rating</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all feedback records from the database and display them
                $result = $conn->query("SELECT RATING, COMMENT FROM tblfeedback WHERE UNAME='$uname'");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['RATING']} ★</td>";
                        echo "<td>" . htmlspecialchars($row['COMMENT']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No feedback yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br><br>
</body>
</html>
<?php
include 'aboutusfooter.php';
?>

