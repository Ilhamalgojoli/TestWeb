<?php
$userId = $_SESSION['userid'];
$mbti_sql = "SELECT mbti_type FROM mbti_results WHERE user_id = '$userId'
            ORDER BY id DESC
            LIMIT 1";
$mbti_result = mysqli_query($conn, $mbti_sql);

if ($mbti_result && mysqli_num_rows($mbti_result) > 0) {
    $row = mysqli_fetch_assoc($mbti_result);
    $mbti_type = $row['mbti_type'];
} else {
    $mbti_type = 'N/A';
}

$recommendations = [
    'ESTJ' => ['HIPMI PT', 'Marketing Crew'],
    'ESFJ' => ['Al-Fath', 'Student English Society'],
    'ISTJ' => ['CCI', 'SEARCH'],
    'ISFJ' => ['Al-Fath', 'AKSARA'],
    'ESTP' => ['Tel-U Esports', 'Archatel'],
    'ESFP' => ['Tel-U Esports', 'Marketing Crew'],
    'ISTP' => ['CCI', 'Metalabs'],
    'ISFP' => ['Fotografi Telkom', 'Archatel'],
    'ENTJ' => ['HIPMI PT', 'SEARCH'],
    'ENTP' => ['Student English Society', 'Metalabs'],
    'INTJ' => ['SEARCH', 'Chevalier Lab'],
    'INTP' => ['CCI', 'Chevalier Lab'],
    'ENFJ' => ['Al-Fath', 'Marketing Crew'],
    'ENFP' => ['Student English Society', 'Metalabs'],
    'INFJ' => ['Al-Fath', 'Aksara'],
    'INFP' => ['Fotografi Telkom', 'Metalabs']
];

if (array_key_exists($mbti_type, $recommendations)) {
    $r1 = $recommendations[$mbti_type][0];
    $r2 = $recommendations[$mbti_type][1];
} else {
    $r1 = 'N/A';
    $r2 = 'N/A';
}
?>
