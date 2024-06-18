<?php
function display_bakat($category) {
    $categories = [
        'Enterprising' => [
            'Perumahan',
            'Perdagangan',
            'Hukum',
            'Bisnis',
            'Ilmu Politik',
            'Perdagangan Internasional',
            'Perbankan / Keuangan'
        ],
        'Conventional' => [
            'Akuntansi',
            'Pelaporan Pengandilan',
            'Pertanggungan',
            'Administrasi',
            'Manajemen',
            'Perbankan',
            'Pengolah data'
        ],
        'Social' => [
            'Konseling',
            'Perawatan',
            'Terapi Fisik',
            'Pendidikan',
            'Pariwisata',
            'Pelayan Masyarakat'
        ],
        'Realistic' => [
            'Pertanian',
            'Asisten Kesehatan',
            'Komputer',
            'Konstruksi',
            'Mekanik / Masinis',
            'Teknik',
            'Makanan dan perhotelan'
        ],
        'Investigative' => [
            'Biologi Kelautan',
            'Teknik',
            'Kimia',
            'Ilmu Kehewanan',
            'Kedokteran / Bedah',
            'Ekonomi',
            'Psikologi'
        ],
        'Artistic' => [
            'Seni Rupa dan Pertunjukan',
            'Komunikasi',
            'Tata rias',
            'Fotografi',
            'Radio dan TV',
            'Desain Interior',
            'Humoria',
            'Penyanyi',
            'Arsitektur'
        ]
    ];
    
    if (array_key_exists($category, $categories)) {
        echo "<h1>" . htmlspecialchars($category) . "</h1>";
        echo "<ul>";
        foreach ($categories[$category] as $subCategory) {
            echo "<li>" . htmlspecialchars($subCategory) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Category not found.";
    }
}
?>