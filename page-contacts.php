<?php
/**
 * Главная (page-main.php)
 * Template Name: Контакты
 * Template Post Type: page
 * @package WordPress
 */
get_header('static');
$id = get_the_ID();
?>
    <section class="section-contacts page-contacts padding-block" id="form">
        <div class="container">
            <div class="row width-content white">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 wow fadeInLeft page-contacts">
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
                        <a href="tel:<?php echo carbon_get_theme_option( 'phone-gen');?>" class="contact-link page-contacts"><?php echo carbon_get_theme_option( 'phone-gen');?></a><br>
                        <a href="tel:<?php echo carbon_get_theme_option( 'phone-ex');?>" class="contact-link page-contacts"><?php echo carbon_get_theme_option( 'phone-ex');?></a>
                    </div>
                    <a href="mailto:<?php echo carbon_get_theme_option( 'mail');?>" class="contact-link mail-link page-contacts"><?php echo carbon_get_theme_option( 'mail');?></a>
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
                        <?php $soc = carbon_get_theme_option( 'setting_block_black');
                        foreach ($soc as $item):?>
                            <div class="s-icon text-center white-icon black_icon">
                                <a href="<?php echo $item['s_link_black'];?>">
                                    <?php echo wp_get_attachment_image(
                                        $item['s_icon_black'],
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
                    <h2 class="content-section-contact page-contacts">
                        <?php
                            if (get_locale() == 'uk') {
                                echo carbon_get_theme_option('form_title_ua');
                            } else {
                                echo carbon_get_theme_option('form_title_ru');
                            }
                        ?>
                    </h2>
                    <p class="content-section-contact page-contacts">
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
                            echo do_shortcode('[contact-form-7 id="176" title="contact_form_contacts_ua"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="177" title="contact_form_contacts_ru"]');
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>