<?php
    
    function getQuestions(){
        return [
            ['1. Apa yang biasanya Anda lakukan saat memiliki waktu luang ?'],
            ['2. Apa yang biasanya Anda nikmati dalam menghadapi masalah ?'],
            ['3. Apa hobi Anda yang paling disukai ?'],
            ['4. Apa yang Anda sukai dalam konteks akademik ?'],
            ['5. Apa jenis aktivitas sosial yang paling Anda nikmati ?'],
            ['6. Manakah dari berikut ini yang paling sesuai dengan kepribadian Anda ?'],
            ['7. Bidang mana yang paling menarik bagi Anda?'],
            ['8. Apa jenis buku yang paling Anda sukai ?'],
            ['9. Jenis pekerjaan apa yang menurut Anda paling memuaskan ?'],
            ['10. Bagaimana cara Anda mengatasi masalah ?'],
        ];
    }

    function getOptions(){
        return [
            [
                'option_a' => 'Membaca buku atau menulis.',
                'option_b' => 'Menonton film atau TV.',            
                'option_c' => 'Melakukan aktivitas fisik atau olahraga.',
                'option_d' => 'Bersosialisasi dengan teman-teman.'
            ],
            [
                'option_a' => 'Menemukan solusi kreatif.',
                'option_b' => 'Mencari bantuan dari orang lain',
                'option_c' => 'Menganalisis masalah secara logis',
                'option_d' => 'Mencoba berbagai pendekatan'
            ],
            [
                'option_a' => 'Seni atau kerajinan tangan.',
                'option_b' => 'Bermain musik atau menyanyi.',
                'option_c' => 'Berolahraga atau aktivitas luar ruangan.',
                'option_d' => 'Membaca atau menulis.'
            ],
            [
                'option_a' => 'Ilmu alam dan matematika.',
                'option_b' => 'Bahasa dan sastra.',
                'option_c' => 'Seni dan humaniora.',
                'option_d' => 'Ilmu sosial dan kemanusiaan.'
            ],
            [
                'option_a' => 'Menyanyi atau membaca buku.',
                'option_b' => 'Bermain game atau bermain komputer.',
                'option_c' => 'Bersantai dengan teman dekat',
                'option_d' => 'Terlibat dalam kegiatan amal atau sosial.'
            ],
            [
                'option_a' => 'Analitis',
                'option_b' => 'Sosial',
                'option_c' => 'Artistik',
                'option_d' => 'Praktis'
            ],
            [
                'option_a' => 'Teknologi',
                'option_b' => 'Pendidikan',
                'option_c' => 'Seni',
                'option_d' => 'Bisnis'
            ],
            [
                'option_a' => 'Fiksi',
                'option_b' => 'Non-fiksi',
                'option_c' => 'Biografi',
                'option_d' => 'Panduan'
            ],
            [
                'option_a' => 'Pekerjaan kreatif',
                'option_b' => 'Pekerjaan teknis',
                'option_c' => 'Pekerjaan sosial',
                'option_d' => 'Pekerjaan manajerial'
            ],
            [
                'option_a' => 'Analisis mendalam',
                'option_b' => 'Bekerja sama dengan tim',
                'option_c' => 'Mencari solusi kreatif',
                'option_d' => 'Mengambil tindakan langsung'
            ],
        ];
    }

    $questions = getQuestions();
    $options = getOptions();

    function getOpsiQuest($question,$options){
        return [
            'question' => $question,
            'options' => $options
        ];
    }

    if(isset($_POST['question_number'])){
        $question_number = intval($_POST['question_number']) - 1;
        if($question_number >= 0 && $question_number < count($questions)){
            $question = $questions[$question_number];
            $options = $options[$question_number];
            echo json_encode(getOpsiQuest($question,$options));
        } else {
            echo json_encode(['question' => null]);
        }
    }
?>



