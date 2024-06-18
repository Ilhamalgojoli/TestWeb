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
    <link rel="stylesheet" href="MinatBakat.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <title>Plorars | Minat Bakat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="../../../images/navbar_logo.svg" alt="Plorars Logo">
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
        <div class="img-tittle">
            <img src="image/minat_bakat_bg.png" class="img">
        </div>
        <div class="main-container">
            <div class="layer-container">
                <div class="container-quiz">
                    <button id="back" class="back-btn">Back</button>
                    <div class="form-container">
                        <div class="question-container">
                            <div id="quiz-container">
                                <p id="question">
                                    <!-- Tempat Generate soal nya jangan di ganggu gugat -->
                                </p>
                                <div class="input-container">
                                    <input type="radio" id="option_a" name="option" value="A">
                                    <div class="radio-tile">
                                        <label for="option_a" id="label_option_a"></label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" id="option_b" name="option" value="B">
                                    <div class="radio-tile">
                                        <label for="option_b" id="label_option_b"></label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" id="option_c" name="option" value="C">
                                    <div class="radio-tile">
                                        <label for="option_c" id="label_option_c"></label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" id="option_d" name="option" value="D">
                                    <div class="radio-tile">
                                        <label for="option_d" id="label_option_d"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="link">
                                <a
                                    href="https://kumparan.com/berita-terkini/10-contoh-soal-tes-minat-dan-bakat-beserta-jawabannya-21WyOlXaXBY/3">https://kumparan.com/berita-terkini/10-contoh-soal-tes-minat-dan-bakat-beserta-jawabannya-21WyOlXaXBY/3</a>
                                <p>Source Refrences</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button id="next" class="next-btn">Next</button>
                    </div>
                </div>
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

            $(document).ready(function () {
                let currentQuestion = 1;
                let answers = [];
                let category = {
                    'Realistic': 0,
                    'Investigative': 0,
                    'Artistic': 0,
                    'Social': 0,
                    'Enterprising': 0,
                    'Conventional': 0
                };

                function loadQuestion(questionId) {
                    $.ajax({
                        type: 'POST',
                        url: 'question.php',
                        data: {
                            question_number: questionId
                        },
                        success: function (response) {
                            let questionData = JSON.parse(response);
                            if (questionData.question) {
                                $('#question').text(questionData.question);
                                $('#label_option_a').text(questionData.options.option_a);
                                $('#label_option_b').text(questionData.options.option_b);
                                $('#label_option_c').text(questionData.options.option_c);
                                $('#label_option_d').text(questionData.options.option_d);
                                $('input[name="option"]').prop('checked', false);
                            } else {
                                let { result1, result2, result3 } = calculateResult();
                                alert("All questions are answered. Thank you!\n" + result1 + " " + result2 + " " + result3);
                                saveResult(result1, result2, result3);
                                // let hasilSkor = calculateScore(category);
                            }
                            if (answers[questionId]) {
                                $(`#option_${answers[questionId].toLowerCase()}`).prop('checked', true);
                            }
                            if (currentQuestion > 1) {
                                $('#back').show();
                            } else {
                                $('#back').hide();
                            }
                        }
                    });
                }

                $('input[name="option"]').change(function () {
                    const selectedOption = $('input[name="option"]:checked').val();
                    answers[currentQuestion] = selectedOption;

                    switch (currentQuestion) {
                        case 1:
                            switch (selectedOption) {
                                case 'A':
                                    category['Realistic']++;
                                    break;
                                case 'B':
                                    category['Enterprising']++;
                                    break;
                                case 'C':
                                    category['Conventional']++;
                                    break;
                                case 'D':
                                    category['Social']++;
                                    break;
                            }
                            break;
                        case 2:
                            switch (selectedOption) {
                                case 'A':
                                    category['Investigative']++;
                                    break;
                                case 'B':
                                    category['Realistic']++;
                                    break;
                                case 'C':
                                    category['Enterprising']++;
                                    break;
                                case 'D':
                                    category['Conventional']++;
                                    break;
                            }
                            break;
                        case 3:
                            switch (selectedOption) {
                                case 'A':
                                    category['Artistic']++;
                                    break;
                                case 'B':
                                    category['Investigative']++;
                                    break;
                                case 'C':
                                    category['Realistic']++;
                                    break;
                                case 'D':
                                    category['Social']++;
                                    break;
                            }
                            break;
                        case 4:
                            switch (selectedOption) {
                                case 'A':
                                    category['Social']++;
                                    break;
                                case 'B':
                                    category['Artistic']++;
                                    break;
                                case 'C':
                                    category['Investigative']++;
                                    break;
                                case 'D':
                                    category['Enterprising']++;
                                    break;
                            }
                            break;
                        case 5:
                            switch (selectedOption) {
                                case 'A':
                                    category['Enterprising']++;
                                    break;
                                case 'B':
                                    category['Social']++;
                                    break;
                                case 'C':
                                    category['Investigative']++;
                                    break;
                                case 'D':
                                    category['Artistic']++;
                                    break;
                            }
                            break;
                        case 6:
                            switch (selectedOption) {
                                case 'A':
                                    category['Conventional']++;
                                    break;
                                case 'B':
                                    category['Enterprising']++;
                                    break;
                                case 'C':
                                    category['Investigative']++;
                                    break;
                                case 'D':
                                    category['Social']++;
                                    break;
                            }
                            break;
                        case 7:
                            switch (selectedOption) {
                                case 'A':
                                    category['Social']++;
                                    break;
                                case 'B':
                                    category['Conventional']++;
                                    break;
                                case 'C':
                                    category['Investigative']++;
                                    break;
                                case 'D':
                                    category['Enterprising']++;
                                    break;
                            }
                            break;
                        case 8:
                            switch (selectedOption) {
                                case 'A':
                                    category['Enterprising']++;
                                    break;
                                case 'B':
                                    category['Social']++;
                                    break;
                                case 'C':
                                    category['Conventional']++;
                                    break;
                                case 'D':
                                    category['Investigative']++;
                                    break;
                            }
                            break;
                        case 9:
                            switch (selectedOption) {
                                case 'A':
                                    category['Investigative']++;
                                    break;
                                case 'B':
                                    category['Conventional']++;
                                    break;
                                case 'C':
                                    category['Enterprising']++;
                                    break;
                                case 'D':
                                    category['Social']++;
                                    break;
                            }
                            break;
                        case 10:
                            switch (selectedOption) {
                                case 'A':
                                    category['Social']++;
                                    break;
                                case 'B':
                                    category['Investigative']++;
                                    break;
                                case 'C':
                                    category['Enterprising']++;
                                    break;
                                case 'D':
                                    category['Conventional']++;
                                    break;
                            }
                            break;
                    }
                });

                function calculateResult() {
                    let result1 = (category['Realistic'] >= category['Enterprising']) ? 'Realistic' : 'Enterprising';
                    let result2 = (category['Investigative'] >= category['Conventional']) ? 'Investigative' : 'Conventional';
                    let result3 = (category['Artistic'] >= category['Social']) ? 'Artistic' : 'Social';

                    return { result1, result2, result3 };
                }

                function saveResult(result1, result2, result3) {
                    $.ajax({
                        type: 'POST',
                        url: 'save_result.php',
                        data: {
                            result1: result1,
                            result2: result2,
                            result3: result3
                        },
                        success: function (response) {
                            window.location.href = '../../../pages/profile/profile.php';
                        }
                    })
                }

                // function categoryUser(scores) {
                //     var maxScore = 0;
                //     var maxCategory = '';

                //     for (var category in scores) {
                //         if (scores[category] > maxScore) {
                //             maxScore = scores[category];
                //             maxCategory = category;
                //         }
                //     }

                //     return maxCategory;
                // }

                $('#next').click(function () {
                    if (!$('input[name="option"]:checked').val()) {
                        alert("Please select an option");
                        return;
                    } else {
                        currentQuestion++;
                        loadQuestion(currentQuestion);
                    }
                });

                $('#back').click(function () {
                    if (currentQuestion > 1) {
                        currentQuestion--;
                        loadQuestion(currentQuestion);
                    }
                });

                loadQuestion(currentQuestion);
            });
        </script>
</body>

</html>