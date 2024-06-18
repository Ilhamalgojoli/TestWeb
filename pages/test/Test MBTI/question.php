<?php
    
    function question($question) {
        return [
            'question' => $question,
            'option_a' => 'Setuju',
            'option_b' => 'Tidak Setuju'
        ];
    }

    if (isset($_POST['question_number'])) {
        $questions = [
            
            ["1.Kamu cenderung menghindari acara yang ramai."],
            ["2.Kamu tidak suka menarik perhatian dan tetap berada di belakang."],
            ["3.kamu berbicara dengan banyak orang yang berbeda di pesta."],
            ["4.kamu cenderung menjaga jarak dengan orang lain dan sulit untuk di kenal."],
            ["5.kamu cenderung memulai percakapan dan mempertahankannya dari pada bergantung pada orang lain."],
            ["6.kamu akan bosan jika menghabiskan akhir pekan sendirian."],
            ["7.Kamu kehilangan minat dalam percakapan menjadi filosofis."],
            ["8.Kamu cenderung melamun dan tenggelam dalam pikiran mu."],
            ["9.Kamu sering berpikir tentang arti hidup."],
            ["10.Kamu melihat hal-hal secara realistis dari pada membayangkan seperti apa mereka nantinya."],
            ["11.Kamu sering menghabiskan waktu untuk mengeksplorasi ide-ide menarik meskipun tidak realistis."],
            ["12.Kamu melihat dirimu lebih realistis daripada visioner."],
            ["13.Kamu lebih suka bersikap diplomatis untuk melindungi perasaan seseorang daripada mengecewakan mereka dengan kebenaran."],
            ["14.Jika temanmu sedih tentang sesuatu, insting pertamamu adalah mendukungnya secara emosional, bukan mencoba menyelesaikan masalahnya."],
            ["15.Kamu percaya bahwa bersikap terus terang lebih penting daripada melindungi perasaan seseorang."],   
            ["16.Kamu lebih suka membuat jadwal yang terstruktur dan mengikuti rencana yang sudah direncanakan dengan baik."],
            ["17.kamu cenderung fleksibel dan terbuka terhadap perubahan rencana yang bisa terjadi kapan saja."],
            ["18.Kamu lebih suka menyelesaikan tugas-tugas secepat mungkin agar tidak ada yang tertinggal."],
            ["19.Kamu lebih suka menunggu dan melihat bagaimana situasi berkembang sebelum mengambil langkah berikutnya."],
            ["20.Kamu cenderung memiliki daftar prioritas yang jelas dan menyelesaikan satu pekerjaan pada satu waktu."]

        ];

        $question_number = intval($_POST['question_number']) - 1;
        
        if ($question_number >= 0 && $question_number < count($questions)) {
            echo json_encode(question($questions[$question_number]));
        } else {
            echo json_encode(['question' => null]);
        }
        
        if(isset($_POST['answer'])){
            $question_number = intval($_POST['question_number']) - 1;
            $_SESSION['answers'][$question_number] = $_POST['answer'];
        }
    }
?>
