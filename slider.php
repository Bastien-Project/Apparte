<!-- slider -->

<div class="div-slider">
    <div class="img-slider">
        <div class="slide active">
            <img src="images/1.jpg" alt="Expositions de sucreries">
            <div class="info">
                <h2>Heure d'ouverture</h2>
                <p>Nos services sont à votre entiere disposition à partir de 12h et ceux jusqu'a 21h30 ! </p>
                <a href="#footer" style="color:white; margin-left: 10px;">EN SAVOIR PLUS</a>
            </div>
        </div>
        <div class="slide">
            <img src="images/2.jpg" alt="Expositions de sucreries">
            <div class="info">
                <h2>Espace de repos exterieur</h2>
                <p>De nombreux Services sont à votre disposition : Restaurant, buffet à volonté, espace de repos exterieurs, piscine.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/3.jpg" alt="Expositions de chocolats">
            <div class="info">
                <h2>Acceuil chaleureux</h2>
                <p>Nos employés seront ravis de vous accompagner le long de votre séjour afin que vous ne manquiez de rien.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/4.jpg" alt="sacs de bonbons">
            <div class="info">
                <h2>Conford des chambres</h2>
                <p>Profitez dès maintenants de suites confortables adaptées à tout vos besoins pour seulement 80euros</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/5.jpg" alt="concours haribo">
            <div class="info">
                <h2>Visite de la region</h2>
                <p>Profitez d'une visite guidée de la region avec activité ludique pour toute la famille</p>
            </div>
        </div>
        <div class="navigation">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;

    // Javascript for image slider manual navigation
    var manualNav = function(manual) {
        slides.forEach((slide) => {
            slide.classList.remove('active');

            btns.forEach((btn) => {
                btn.classList.remove('active');
            });
        });

        slides[manual].classList.add('active');
        btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            manualNav(i);
            currentSlide = i;
        });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass) {
        let active = document.getElementsByClassName('active');
        let i = 1;

        var repeater = () => {
            setTimeout(function() {
                [...active].forEach((activeSlide) => {
                    activeSlide.classList.remove('active');
                });

                slides[i].classList.add('active');
                btns[i].classList.add('active');
                i++;

                if (slides.length == i) {
                    i = 0;
                }
                if (i >= slides.length) {
                    return;
                }
                repeater();
            }, 10000);
        }
        repeater();
    }
    repeat();
</script>


<!-- fin slider -->