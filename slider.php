<div class="div-slider">
    <div class="img-slider">
        <?php

        foreach ($slides as $index => $slide) {
            echo '<div class="slide' . ($index === 0 ? ' active' : '') . '">';
            echo '<img src="' . $slide['img'] . '" alt="' . $slide['alt'] . '">';
            echo '<div class="info">';
            echo '<h2>' . $slide['title'] . '</h2>';
            echo '<p>' . $slide['desc'] . '</p>';
            if (isset($slide['link'])) {
                echo '<a href="' . $slide['link'] . '" style="color:white; margin-left: 10px;">EN SAVOIR PLUS</a>';
            }
            echo '</div></div>';
        }
        ?>
        <div class="navigation">
            <?php foreach ($slides as $index => $_): ?>
                <div class="btn<?= $index === 0 ? ' active' : '' ?>"></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>