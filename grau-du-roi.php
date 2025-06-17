<?php include "header.php";
include "navbar.php";

//présenatation du Grau du Roi avec les 3 photos en slider
        $slides = [
            [
                'img' => 'images/grau-du-roi.jpg',
                'alt' => 'Grau du Roi',
                'title' => 'Grau du Roi',
                'desc' => 'Découvrez le Grau du Roi, une station balnéaire familiale et conviviale.',
            ],
            [
                'img' => 'images/grau-du-roi-2.jpg',
                'alt' => 'Grau du Roi 2',
                'title' => 'Grau du Roi 2',
                'desc' => 'Profitez des plages de sable fin et des activités nautiques au Grau du Roi.',
            ],
            [
                'img' => 'images/grau-du-roi-3.jpg',
                'alt' => 'Grau du Roi 3',
                'title' => 'Grau du Roi 3',
                'desc' => 'Explorez les canaux et le port du Grau du Roi, un lieu idéal pour les familles.',
            ]
        ];

include "slider.php";
 include "footer.php"; ?>