<?php
include '../../../php/login_check.php';
include '../../../php/koneksi.php';

$sql = "SELECT username FROM users";
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MBTI.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <title>Plorars | MBTI</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="image/Vector.png" alt="Plorars Logo">
            <nav>
                <ul>
                    <li class="home-text"><a href="../../../pages/homepage.php">Home</a></li>
                    <li class="discover-text"><a href="../../../pages/search.php">Discover</a></li>
                    <li class="test-text"><a href="../PemilihanTest/pemilihan.php">Test</a></li>
                </ul>
            </nav>
            <div class="profile">
                <img src="../../../images/<?php echo $_SESSION['pfp'] ?>" alt="" onclick="toggleMenu()">
                <a href="../../profile/profile.php"><?php echo $username ?></a>
                <?php if ($_SESSION['username'] === 'Plorars') { ?>
                    <a href="../../../admin/kegiatan_management.php" style="color: blue;">Atur Kegiatan</a>
                <?php } ?>
            </div>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="view-profile">
                        <img src="../../../images/<?php echo $_SESSION['pfp'] ?>" alt="">
                        <a href="../../profile/profile.php">View Profile</a>
                        <span>></span>
                    </div>
                    <div class="log-out">
                        <img src="../../../images/log_out.png" alt="">
                        <a href="../../../php/log_out.php">Log Out</a>
                        <span>></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="img-title">
            <img src="image/Group111.png" class="img">
        </div>
        <div class="layer-container">
            <div class="container-quiz">
                <button class="back-btn" id="back-button">Back</button>
                <div class="form-container">
                    <div id="quiz-container">
                        <p id="question"></p>
                        <div class="input-container">
                            <input type="radio" id="option_a" name="option" value="A">
                            <div class="radio-tile">
                                <label for="option_a" id="label_option_a"></label>
                                <i class="em em-smile" aria-role="presentation" aria-label="SMILING FACE WITH OPEN MOUTH AND SMILING EYES"></i>
                            </div>
                        </div>
                        <div class="input-container">
                            <input type="radio" id="option_b" name="option" value="B">
                            <div class="radio-tile">
                                <label for="option_b" id="label_option_b"></label>
                                <i class="em em-sweat" aria-role="presentation" aria-label="FACE WITH COLD SWEAT"></i>
                            </div>
                        </div>
                    </div>
                    <div class = "link">
                        <a href = "https://boo.world/id/16-personality-test">https://boo.world/id/16-personality-test</a>
                        <p>Source Refrences</p>
                    </div>
                </div>

                <button class="next-btn" id="next-button">Next</button>
            </div>
        </div>
        <div class="footer">
            <div class="footer-img">
                <img src="../../../images/plorars_footer.png">
            </div>
            <p>Copyright © 2024 Plorars</p>
            <div class="contact-us">
                <h3>Contact Us</h3>
                <div class="socials">
                    <img src="../../../images/email.png" alt="">
                    <img src="../../../images/whatsapp.png" alt="">
                    <img src="../../../images/instagram.png" alt="">
                </div>
            </div>
        </div>
        <script>
            const subMenu = document.getElementById("subMenu");

            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            };

            $(document).ready(function() {
                let current = 1;
                let answers = [];
                let category = {
                    E: 0,
                    I: 0,
                    S: 0,
                    N: 0,
                    T: 0,
                    F: 0,
                    J: 0,
                    P: 0
                };

                function loadQuestion(questionId) {
                    $.ajax({
                        type: 'POST',
                        url: 'question.php',
                        data: {
                            question_number: questionId
                        },
                        success: function(response) {
                            let data = JSON.parse(response);

                            if (data.question) {
                                $('#question').text(data.question);
                                $('#label_option_a').text(data.option_a);
                                $('#label_option_b').text(data.option_b);
                            } else {
                                let result = calculateResult();
                                alert('Your MBTI type is: ' + result);
                                saveResult(result);
                            }
                            if (answers[questionId]) {
                                $(`#option_${answers[questionId].toLowerCase()}`).prop('checked', true);
                            } else {
                                $('input[name="option"]').prop('checked', false);
                            }
                            if (current > 1) {
                                $('#back-button').show();
                            } else {
                                $('#back-button').hide();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error loading question:', error);
                        }
                    });
                }

                function saveResult(result) {
                    $.ajax({
                        type: 'POST',
                        url: 'save_result.php',
                        data: {
                            mbti_result: result
                        },
                        success: function(response) {
                            window.location.href = '../../../pages/profile/profile.php';
                        }
                    });
                }

                function calculateResult() {
                    let result = '';

                    result += (category.E >= category.I) ? 'E' : 'I';
                    result += (category.S >= category.N) ? 'S' : 'N';
                    result += (category.T >= category.F) ? 'T' : 'F';
                    result += (category.J >= category.P) ? 'J' : 'P';

                    return result;
                }

                $('input[name="option"]').change(function() {
                    const selectedOption = $('input[name="option"]:checked').val();
                    answers[current] = selectedOption;

                    switch (current) {
                        case 1:
                            category[selectedOption === 'A' ? 'I' : 'E']++;
                            break;
                        case 2:
                            category[selectedOption === 'A' ? 'I' : 'E']++;
                            break;
                        case 3:
                            category[selectedOption === 'A' ? 'E' : 'I']++;
                            break;
                        case 4:
                            category[selectedOption === 'A' ? 'I' : 'E']++;
                            break;
                        case 5:
                            category[selectedOption === 'A' ? 'E' : 'I']++;
                            break;
                        case 6:
                            category[selectedOption === 'A' ? 'E' : 'I']++;
                            break;
                        case 7:
                            category[selectedOption === 'A' ? 'S' : 'I']++;
                            break;
                        case 8:
                            category[selectedOption === 'A' ? 'I' : 'S']++;
                            break;
                        case 9:
                            category[selectedOption === 'A' ? 'I' : 'S']++;
                            break;
                        case 10:
                            category[selectedOption === 'A' ? 'S' : 'I']++;
                            break;
                        case 11:
                            category[selectedOption === 'A' ? 'N' : 'S']++;
                            break;
                        case 12:
                            category[selectedOption === 'A' ? 'S' : 'N']++;
                            break;
                        case 13:
                            category[selectedOption === 'A' ? 'F' : 'T']++;
                            break;
                        case 14:
                            category[selectedOption === 'A' ? 'F' : 't']++;
                            break;
                        case 15:
                            category[selectedOption === 'A' ? 'T' : 'F']++;
                            break;
                        case 16:
                            category[selectedOption === 'A' ? 'J' : 'P']++;
                            break;
                        case 17:
                            category[selectedOption === 'A' ? 'P' : 'J']++;
                            break;
                        case 18:
                            category[selectedOption === 'A' ? 'J' : 'P']++;
                            break;
                        case 19:
                            category[selectedOption === 'A' ? 'P' : 'J']++;
                            break;
                        case 20:
                            category[selectedOption === 'A' ? 'J' : 'P']++;
                            break;
                        default:
                            break;
                    }
                });

                $('#next-button').click(function() {
                    if (!$('input[name="option"]:checked').val()) {
                        alert('Please select an option');
                        return;
                    } else {
                        current++;
                        loadQuestion(current);
                    }
                });

                $('#back-button').click(function() {
                    if (current > 1) {
                        current--;
                        loadQuestion(current);
                    }
                });

                loadQuestion(current);
            });
        </script>
</body>

</html>