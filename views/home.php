<?php

?>


<h2 class="text-center m-5">Découvrez le Monde Secret des Loups</h2>

<section class="container home">

    <div class="row">
        <div class="col introHome">

            <div class="boxTextHome">
                <p class="pTextHome">
                    <span class="titleBlog"><?= NAME_BLOG ?></span>, vous invite à plonger dans l'univers fascinant de ces créatures emblématiques. Que vous soyez un passionné de la vie sauvage, un amateur de folklore ou simplement curieux de découvrir la beauté et la complexité des loups, vous êtes au bon endroit.
                </p>
        
                <p class="pTextHome">
                Mon blog propose une variété d'articles informatifs, d'histoires captivantes et d'images étonnantes, <span class="titleBlog" ><?= NAME_BLOG ?></span> explore les mystères, les réalités et les légendes qui entourent ces magnifiques créatures. 
                </p>

            </div>

            <div class="boxImgHome">

                <img class="img-fluid imgIntroHome" src="../assets/img/imgHome.avif" alt="Image de loups dans leur habitat naturel">

            </div>
            
        </div>
    </div>

</section>


<!-- Categories -->
    <?php
        require_once(dirname(__FILE__) . '/category/categories.php');
    ?>


<!-- Articles récents -->
<section>
    <h2>Articles Récents</h2>
</section>

