<?php
/**
 * Главная (page-main.php)
 * Template Name: Статическая страница
 * Template Post Type: page
 * @package WordPress
 */
get_header('static');
$id = get_the_ID();
?>
<section class="section-services margin-block">
    <div class="container">
        <div class="row width-content">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="block-description wow fadeInLeft">
                    <h2><?php the_title();?></h2>
                    <p><?php the_content();?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-clients padding-block">
    <div class="container">
        <div class="row width-content">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="block-description  wow flipInX">
                    <h2>
                        <?php
                        if (get_locale()=='uk') {
                            echo carbon_get_theme_option( 'client_title_ua');
                        } else {
                            echo carbon_get_theme_option( 'client_title_ru');
                        }
                        ?>
                    </h2>
                    <h3>
                        <?php
                        if (get_locale()=='uk') {
                            echo carbon_get_theme_option( 'client_desc_ua');
                        } else {
                            echo carbon_get_theme_option( 'client_desc_ru');
                        }
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row align-items-center width-content wow fadeInUp" data-wow-delay="0.2s">
            <?php $clients = carbon_get_theme_option( 'client_block');
            foreach ($clients as $client):?>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
                    <div class="client">
                        <?php echo wp_get_attachment_image(
                            $client['client_logo'],
                            'full',
                            false,
                            [
                                'class'=>'case-img',
                                'alt'=> ""
                            ]
                        );?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<section class="section-contacts padding-block" id="form">
        <div class="container">
            <div class="row width-content white">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInLeft">
                    <h2 class="content-section-contact">
                        <?php
                        if (get_locale()=='uk') {
                            echo carbon_get_theme_option( 'contact_title_ua');
                        } else {
                            echo carbon_get_theme_option( 'contact_title_ru');
                        }
                        ?>
                    </h2>
                    <p class="content-section-contact">
                        <?php
                        if (get_locale() == 'uk') {
                            echo carbon_get_theme_option('contact_desc_first_ua');
                        } else {
                            echo carbon_get_theme_option('contact_desc_first_ru');
                        }
                        ?>
                    </p>
                    <div class="phone-link">
                        <a href="tel:<?php echo carbon_get_theme_option( 'phone-gen');?>" class="contact-link"><?php echo carbon_get_theme_option( 'phone-gen');?></a><br>
                        <a href="tel:<?php echo carbon_get_theme_option( 'phone-ex');?>" class="contact-link"><?php echo carbon_get_theme_option( 'phone-ex');?></a>
                    </div>
                    <a href="mailto:<?php echo carbon_get_theme_option( 'mail');?>" class="contact-link mail-link"><?php echo carbon_get_theme_option( 'mail');?></a>
                    <p class="content-section-contact">
                        <?php
                        if (get_locale() == 'uk') {
                            echo carbon_get_theme_option('contact_desc_second_ua');
                        } else {
                            echo carbon_get_theme_option('contact_desc_second_ru');
                        }
                        ?>
                    </p>
                    <div class="d-flex social_block">
                        <?php $soc = carbon_get_theme_option( 'setting_block');
                        foreach ($soc as $item):?>
                            <div class="s-icon text-center white-icon">
                                <a href="<?php echo $item['s_link'];?>">
                                    <?php echo wp_get_attachment_image(
                                        $item['s_icon'],
                                        'full',
                                        false,
                                        [
                                            'class'=>'contact-icon img-fluid',
                                            'alt'=> ""
                                        ]
                                    );?>
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow fadeInRight">
                    <h2 class="content-section-contact">
                        <?php
                        if (get_locale() == 'uk') {
                            echo carbon_get_theme_option('form_title_ua');
                        } else {
                            echo carbon_get_theme_option('form_title_ru');
                        }
                        ?>
                    </h2>
                    <p class="content-section-contact">
                        <?php
                        if (get_locale() == 'uk') {
                            echo carbon_get_theme_option('form_desc_ua');
                        } else {
                            echo carbon_get_theme_option('form_desc_ru');
                        }
                        ?>
                    </p>
                        <?php
                        if (get_locale() == 'uk') {
                            echo do_shortcode('[contact-form-7 id="172" title="contact_form_ua"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="175" title="contact_form_ru"]');
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>