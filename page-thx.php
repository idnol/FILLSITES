<?php
/**
 * Главная (page-main.php)
 * Template Name: Страница благодарности
 * Template Post Type: page
 * @package WordPress
 */
get_header('static'); ?>
<section class="section-404 padding-block d-flex align-items-center">
    <div class="container">
        <div class="row width-content">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 wow fadeInLeft page-contacts d-flex justify-content-center content-404">
                <img src="<?php echo get_template_directory_uri();?>/img/thx.webp" alt="" class="thx">
                <h2>
                    <?php echo esc_attr( pll__( 'Дякуємо' ) ) ?>
                </h2>
                <p>
                    <?php echo esc_attr( pll__( 'Менеджери' ) ) ?>
                </p>
                <a href="/">
                    <div class="button">
                        <?php echo esc_attr( pll__( 'Повернутись на головну' ) ) ?>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

