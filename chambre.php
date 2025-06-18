<?php
require "header.php";
require "navbar.php";

// Définir les lieux
$lieux = [
    'grau-du-roi' => [
        'label' => 'Grau-du-Roi',
        'images' => [
            './images/grau-du-roi.jpg',
            './images/grau-du-roi-2.jpg',
            './images/grau-du-roi-3.jpg'
        ],
        'alt' => [
            'Grau du Roi 1',
            'Grau du Roi 2',
            'Grau du Roi 3'
        ],
        'description' => [
            'Profitez des plages méditerranéennes au Grau-du-Roi, destination parfaite pour se détendre au soleil.',
            'Découvrez les activités nautiques et les promenades en bord de mer au Grau-du-Roi.',
            'Venez savourer la gastronomie locale et l\'ambiance conviviale de cette station balnéaire.'
        ]
    ],
    'meribel' => [
        'label' => 'Méribel',
        'images' => [
            './images/meribel.jpg',
            './images/meribel-2.jpg',
            './images/meribel-3.jpg'
        ],
        'alt' => [
            'Méribel 1',
            'Méribel 2',
            'Méribel 3'
        ],
        'description' => [
            'Découvrez les pistes de ski de Méribel et les paysages alpins magnifiques en toutes saisons.',
            'Méribel offre des activités pour toute la famille, du ski aux randonnées en montagne.',
            'Venez savourer l\'ambiance chaleureuse de cette station de ski emblématique.'
        ]
    ],
    'montpellier' => [
        'label' => 'Montpellier',
        'images' => [
            './images/montpellier.jpg',
            './images/montpellier-2.jpg',
            './images/montpellier-3.jpg'
        ],
        'alt' => [
            'Montpellier 1',
            'Montpellier 2',
            'Montpellier 3'
        ],
        'description' => [
            'Explorez Montpellier, une ville dynamique mêlant histoire, culture et ambiance méditerranéenne.',
            'Ne manquez pas ses festivals, ses musées et sa gastronomie locale.',
            'Promenez-vous dans ses ruelles pittoresques et découvrez son architecture unique.'
        ]
    ]
];

$lieuKey = $_GET['lieu'] ?? null;

// Affichage de la page de détail si ?lieu est défini
if ($lieuKey && isset($lieux[$lieuKey])) {
    $lieu = $lieux[$lieuKey];

    include "slider.php";

} else {
    // Affichage du sélecteur de lieux
    echo "<h2>Choisissez votre lieu de réservation</h2>";
    echo '<div class="chambre-container">';
    foreach ($lieux as $ville => $lieu) {
        echo '<div class="chambre">';
        echo '<h3>' . $lieu['label'] . '</h3>';
        echo '<img src="' . $lieu['images'][0] . '" alt="' . $lieu['alt'][0] . '">';
        echo '<p>' . $lieu['description'][0] . '</p>';
        echo '<a href="chambre.php?lieu=' . $ville . '" class="btn">Découvrir</a>';
        echo '</div>';
    }
    echo '</div>';
}

include "footer.php";
