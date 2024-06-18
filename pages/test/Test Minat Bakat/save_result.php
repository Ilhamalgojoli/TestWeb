    <?php
    include '../../../php/login_check.php';
    include 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result1 = isset($_POST['result1']) ? $_POST['result1'] : '';
        $result2 = isset($_POST['result2']) ? $_POST['result2'] : '';
        $result3 = isset($_POST['result3']) ? $_POST['result3'] : '';

        $userId = $_SESSION['userid'];

        $sql = "INSERT INTO minat_bakat_results (result1, result2, result3, user_id) VALUES ('$result1', '$result2', '$result3', '$userId')";

        if (mysqli_query($conn, $sql)) {
            echo "Data saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>