<?php
require "header.php";
?>

<body>

    <?php
    require "navbar.php";
            $slides = [
            [
                'img' => 'images/grau-du-roi.jpg',
                'alt' => 'Grau du Roi',
                'title' => 'Grau du Roi',
                'desc' => 'Découvrez le Grau du Roi, une station balnéaire familiale et conviviale.',
                'link' => './lieu.php?lieu=grau-du-roi'
            ],
            [
                'img' => 'images/meribel.jpg',
                'alt' => 'Méribel',
                'title' => 'Méribel',
                'desc' => 'Découvrez Méribel, une station de ski familiale au cœur des Alpes.',
                'link' => './lieu.php?lieu=meribel'
            ],
            [
                'img' => 'images/montpellier.jpg',
                'alt' => 'Montpellier',
                'title' => 'Montpellier',
                'desc' => 'Découvrez Montpellier, une ville dynamique et ensoleillée du sud de la France.',
                'link' => './lieu.php?lieu=montpellier'
            ]
        ];
    require "slider.php";
    ?>

</body>

<?php
require "footer.php";
?>