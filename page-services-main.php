<?php
/**
 * Главная (page-main.php)
 * Template Name: Направление услуг
 * Template Post Type: page
 * @package WordPress
 */
get_header();
$id = get_the_ID(); ?>
<section class="section-banner" style="background: url('<?php echo wp_get_attachment_image_url(carbon_get_post_meta($id,'services_slider_background'),'full');?>') no-repeat center;background-size: cover;">
    <div class="container">
        <div class="row align-items-center width-content">
            <div class="col-xl-7 col-lg-7 wow flipInX">
                <h1><?php echo carbon_get_post_meta($id,'services_slider_title');?></h1>
                <p class="description-b"><?php echo carbon_get_post_meta($id,'services_slider_desc');?></p>
                <a href="#form"><div class="button"><?php echo esc_attr( pll__( 'Замовити сайт' ) ) ?></div></a>
            </div>
            <div class="col-xl-5 col-lg-5 d-flex justify-content-end banner-img  wow fadeInRight">
                <?php echo wp_get_attachment_image(
                    carbon_get_post_meta($id,'services_slider_img'),
                    'full',
                    false,
                    [
                        'class'=>'img-fluid',
                        'alt'=>carbon_get_post_meta($id,'services_slider_title')
                    ]
                );?>
            </div>
        </div>
    </div>
</section>
<section class="section-services margin-block">
    <div class="container">
        <div class="row width-content">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="block-description wow flipInX">
                    <h2><?php echo carbon_get_post_meta($id,'services_main_price_title');?></h2>
                    <h3><?php echo carbon_get_post_meta($id,'services_main_price_desc');?></h3>
                </div>
            </div>
        </div>
        <div class="row align-items-center width-content">
            <?php $prices = carbon_get_post_meta( $id,'services_main_price_block');
            foreach ($prices as $price):?>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="service wow fadeInLeft" data-wow-delay="0.2s">
                        <?php echo wp_get_attachment_image(
                            $price['services_main_icon_img'],
                            'full',
                            false,
                            [
                                'class'=>'service-icon',
                                'alt'=> ""
                            ]
                        );?>
                        <h3><?php echo $price['services_main_pac_title'];?></h3>
                        <p class="service-description"><?php echo $price['services_main_pac_desc'];?></p>
                        <p class="service-price"><?php echo $price['services_main_pac_price'];?></p>
<!--                        <a href="--><?php //echo $price['services_main_pac_link'];?><!--" class="service-link">--><?php //echo esc_attr( pll__( 'детальніше' ) ) ?><!--</a>-->
                        <a href="<?php echo $price['services_main_pac_link'];?>" class="service-link"><?php echo $price['services_main_pac_btn']; ?></a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<section class="section-cases padding-block">
    <div class="container">
        <div class="row width-content">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
                <div class="block-description wow flipInX">
                    <h2>
                        <?php
                        if (get_locale()=='uk') {
                            echo carbon_get_theme_option( 'portfolio_title_ua');
                        } else {
                            echo carbon_get_theme_option( 'portfolio_title_ru');
                        }
                        ?>
                    </h2>
                    <h3>
                        <?php
                        if (get_locale()=='uk') {
                            echo carbon_get_theme_option( 'portfolio_desc_ua');
                        } else {
                            echo carbon_get_theme_option( 'portfolio_desc_ru');
                        }
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row align-items-center width-content">
            <div class="col-xl-12 col-lg-12 slider-item wow fadeInUp" data-wow-delay="0.2s">
                <?php $cases = carbon_get_theme_option( 'portfolio_block');
                $i=carbon_get_post_meta($id, 'services_main_set_road');
                foreach ($cases as $case):
                    if ($case['case_set_road'][0]===$i[0]) { ?>
                        <a href="<?php echo $case['case_link'];?>" class="case-link"  target="_blank">
                            <div class="case">
                                <?php echo wp_get_attachment_image(
                                    $case['case_img'],
                                    'full',
                                    false,
                                    [
                                        'class'=>'case-img',
                                        'alt'=> ""
                                    ]
                                );?>
                                <h3 class="case-content"><?php echo $case['case_title'];?></h3>
                                <p class="case-content">
                                    <?php
                                    if (get_locale()=='uk') {
                                        echo $case['case_desc_ua'];
                                    } else {
                                        echo $case['case_desc_ru'];
                                    }
                                    ?>
                                </p>
                            </div>
                        </a>
                    <?php };?>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<section class="technology padding-block">
    <div class="container">
        <div class="row align-items-center width-content">
            <div class="block-description wow flipInX">
                <h2 class="white"><?php echo carbon_get_post_meta($id,'services_technology_title');?></h2>
                <?php $technologies = carbon_get_post_meta( $id,'services_technology_block');
                foreach ($technologies as $technology):?>
                            <?php echo wp_get_attachment_image(
                                $technology['services_technology_img'],
                                'full',
                                false,
                                [
                                    'class'=>'technology-logo',
                                    'alt'=> ""
                                ]
                            );?>
                <?php endforeach;?>
            </div>
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
    </div>
</section>
<section class="section-text padding-block">
    <div class="container">
        <div class="row width-content white">
            <div class="col-xl-12 col-lg-12  wow fadeInUp">
                <h2 class="content-section-contact"><?php the_title();?></h2>
                <div class="white seo_block"><?php the_content();?></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
