<div class="div-slider">
    <?php if (isset($lieu['images'])) { ?>
        <div class="lieu-detail-top">
            <h2><?php echo $lieu['label']; ?></h2>
        </div>
    <?php } ?>
    <div class="img-slider">
        <?php
        // Cas 1 : Slides générales (avec 'img', 'title', etc.)
        if (isset($slides[0])) {

            foreach ($slides as $index => $slide) {
                echo '<div class="slide' . ($index === 0 ? ' active' : '') . '">';
                echo '<img src="' . $slide['img'] . '" alt="' . $slide['alt'] . '">';
                echo '<div class="info">';
                if (isset($slide['title'])) {
                    echo '<h2>' . $slide['title'] . '</h2>';
                }
                if (isset($slide['desc'])) {
                    echo '<p>' . $slide['desc'] . '</p>';
                }
                if (isset($slide['link'])) {
                    echo '<a href="' . $slide['link'] . '" style="color:white; margin-left: 10px;">EN SAVOIR PLUS</a>';
                }
                echo '</div></div>';
            }
        }
        // Cas 2 : Slides pour un lieu
        elseif (isset($lieu['images']) && is_array($lieu['images'])) {
            foreach ($lieu['images'] as $index => $img) {
                echo '<div class="slide' . ($index === 0 ? ' active' : '') . '">';
                echo '<img src="' . $img . '" alt="' . $lieu['label'] . '">';
                echo '<div class="info">';
                if (isset($lieu['alt'][$index])) {
                    echo '<h2>' . $lieu['alt'][$index] . '</h2>';
                }
                if (isset($lieu['description'][$index])) {
                    echo '<p>' . $lieu['description'][$index] . '</p>';
                }
                echo '</div>';

                echo '</div>';
            }
        }
        ?>

        <div class="navigation">
            <?php
            $count = isset($slides[0]) ? count($slides) : (isset($lieu['images']) ? count($lieu['images']) : 0);
            for ($i = 0; $i < $count; $i++) {
                echo '<div class="btn' . ($i === 0 ? ' active' : '') . '"></div>';
            }
            ?>
        </div>
    </div>
    <?php if (isset($lieu['images'])) { ?>
        <div class="lieu-detail">
            <a href="chambre.php" class="btn">← Retour à la sélection</a>
        </div>
    <?php } ?>
</div>