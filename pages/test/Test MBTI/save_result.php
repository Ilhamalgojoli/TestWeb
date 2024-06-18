<?php
    include '../../../php/login_check.php';
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mbti_result = isset($_POST['mbti_result']) ? $_POST['mbti_result'] : '';

        $userId = $_SESSION['userid'];

        $sql = "INSERT INTO mbti_results (mbti_type, user_id) VALUES ('$mbti_result', '$userId')";

        if (mysqli_query($conn, $sql)) {
            echo "Data saved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        // $mbti_result = isset($_POST['mbti_result']) ? $_POST['mbti_result'] : '';

        //     $image_path = [

        //         'ESTJ' => 'estj.png',
        //         'ESFJ' => 'esfj.png',
        //         'ISTJ' => 'istj.png',
        //         'ISFJ' => 'isfj.png',
        //         'ESTP' => 'estp.png',
        //         'ESFP' => 'esfp.png',
        //         'ISTP' => 'istp.png',
        //         'ISFP' => 'isfp.png',
        //         'ENTJ' => 'entj.png',
        //         'ENTP' => 'entp.png',
        //         'INTJ' => 'intj.png',
        //         'INTP' => 'intp.png',
        //         'ENFJ' => 'enfj.png',
        //         'ENFP' => 'enfp.png',
        //         'INFJ' => 'infj.png',
        //         'INFP' => 'infp.png',
                
        //     ];

        //     $nama_mbti = [
        //         'ESTJ' => 'The Supervisor',
        //         'ESFJ' => 'The Provider',
        //         'ISTJ' => 'The Inspector',
        //         'ISFJ' => 'The Protector',
        //         'ESTP' => 'The Dynamo',
        //         'ESFP' => 'The Performer',
        //         'ISTP' => 'The Craftsman',
        //         'ISFP' => 'The Composer',
        //         'ENTJ' => 'The Commander',
        //         'ENTP' => 'The Visionary',
        //         'INTJ' => 'The Mastermind',
        //         'INTP' => 'The Architect',
        //         'ENFJ' => 'The Teacher',
        //         'ENFP' => 'The Champion',
        //         'INFJ' => 'The Counselor',
        //         'INFP' => 'The Healer',
        //     ];

        //     $rekomendasi_kegiatan = [

        //         'ESTJ' => 'No recommendation',
        //         'ESFJ' => 'No recommendation',
        //         'ISTJ' => 'No recommendation',
        //         'ISFJ' => 'No recommendation',
        //         'ESTP' => 'No recommendation',
        //         'ESFP' => 'No recommendation',
        //         'ISTP' => 'No recommendation',
        //         'ISFP' => 'No recommendation',
        //         'ENTJ' => 'No recommendation',
        //         'ENTP' => 'No recommendation',
        //         'INTJ' => 'No recommendation',
        //         'INTP' => 'No recommendation',
        //         'ENFJ' => 'No recommendation',
        //         'ENFP' => 'No recommendation',
        //         'INFJ' => 'No recommendation',
        //         'INFP' => 'No recommendation',

        //     ];

        //     $deskripsi_mbti = [

        //         'ESTJ' => 'ESTJs are reliable, organized, and practical. They excel in managing people and projects. They are decisive and enjoy creating order and efficiency. However, they can be seen as rigid and may struggle with emotions.',
        //         'ESFJ' => 'ESFJs are warm-hearted and cooperative. They value harmony and are attentive to others’ needs. They are excellent team players but can be overly concerned with others’ opinions.',
        //         'ISTJ' => 'ISTJs are serious, responsible, and detail-oriented. They value tradition and order. They are dependable but may struggle with flexibility and emotional expression.',
        //         'ISFJ' => 'ISFJs are kind, conscientious, and reliable. They have a strong sense of duty and are good at remembering details about people. They may take criticism personally and can be resistant to change.',
        //         'ESTP' => 'ESTPs are energetic, resourceful, and enjoy living in the moment. They are good at solving immediate problems but can be impulsive and struggle with long-term planning.',
        //         'ESFP' => 'ESFPs are outgoing, friendly, and enjoy being the center of attention. They are practical and spontaneous but may struggle with organization and long-term planning.',
        //         'ISTP' => 'ISTPs are analytical, practical, and enjoy understanding how things work. They are resourceful in solving problems but may struggle with emotions and long-term commitments.',
        //         'ISFP' => 'ISFPs are sensitive, kind, and enjoy living in the moment. They are artistic and value personal expression. They may struggle with assertiveness and long-term planning.',
        //         'ENTJ' => 'ENTJs are natural leaders, strategic, and efficient. They enjoy long-term planning and achieving goals. They can be seen as intimidating and may struggle with emotions.',
        //         'ENTP' => 'ENTPs are innovative, enthusiastic, and enjoy debating ideas. They are quick thinkers but may struggle with follow-through and can be seen as argumentative.',
        //         'INTJ' => 'INTJs are strategic, independent, and enjoy complex problem-solving. They are confident and analytical but may struggle with emotions and be seen as arrogant.',
        //         'INTP' => 'INTPs are logical, independent, and enjoy theoretical and abstract thinking. They are innovative but may struggle with follow-through and emotional expression.',
        //         'ENFJ' => 'ENFJs are charismatic, empathetic, and excellent at managing people. They are altruistic but may struggle with making tough decisions and can be overly sensitive to criticism.',
        //         'ENFP' => 'ENFPs are enthusiastic, creative, and enjoy exploring possibilities. They are good at motivating others but may struggle with follow-through and can be overly emotional.',
        //         'INFJ' => 'INFJs are insightful, empathetic, and driven by their values. They are good at understanding others but may struggle with practical matters and be overly idealistic.',
        //         'INFP' => 'INFPs are idealistic, empathetic, and driven by their values. They are creative and loyal but may struggle with practical matters and be overly perfectionistic.',
                
        //     ];

        //     $image = isset($image_path[$mbti_result]) ? $image_path[$mbti_result] : "No image";
        //     $description = isset($deskripsi_mbti[$mbti_result]) ? $deskripsi_mbti[$mbti_result] : "No description";
        //     $name = isset($nama_mbti[$mbti_result]) ? $nama_mbti[$mbti_result] : "No MBTI name";
        //     $recommendation = isset($rekomendasi_kegiatan[$mbti_result]) ? $rekomendasi_kegiatan[$mbti_result] : "No recommendation";

        //     $sql = "INSERT INTO mbti_results (mbti_type, image_path, nama_mbti, deskripsi, rekomendasi_kegiatan) VALUES ('$mbti_result', '$image', '$name', '$description', '$recommendation')";
        //     mysqli_query($conn, $sql) === TRUE;
    } 
?>
