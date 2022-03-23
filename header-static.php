<?php $id = get_the_ID(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(''); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '462004920991894');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=462004920991894&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84644090-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-84644090-1');
    </script>
    <!-- Google Analytics Code -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WDQS6ZZ');</script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
</head>
<body>
<header id="header" class="header static">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">
                <a href="<?php echo home_url();?>">
                    <?php the_custom_logo();?>
                </a>
            </div>
            <div class="col-xxl-11 col-xl-11 col-lg-11 col-md-11  col-sm-11 col-11 d-flex justify-content-end align-items-center big-header">
                <?php wp_nav_menu([
                    'theme_location' => 'top',
                    'container'            => false,
                    'menu_class'           => 'menu',

                ]);?>
                <div class="d-flex">
                    <?php $soc = carbon_get_theme_option( 'setting_block');
                    foreach ($soc as $item):?>
                        <div class="s-icon text-center">
                            <a href="<?php echo $item['s_link'];?>">
                                <?php echo wp_get_attachment_image(
                                    $item['s_icon'],
                                    'full',
                                    false,
                                    [
                                        'class'=>'img-fluid icon',
                                        'alt'=> ""
                                    ]
                                );?>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="phone"><a href="tel:<?php echo carbon_get_theme_option( 'phone-gen');?>" class="phone-header"><?php echo carbon_get_theme_option( 'phone-gen');?></a></div>
                <div class="lang-block d-flex">
                    <ul class="list-unstyled lang">
                        <?php if(function_exists('pll_the_languages')){
                            pll_the_languages(array('show_names'=>1));
                        } ?>
                    </ul>
                </div>
                <a href="#form"><div class="button header-button"><?php echo esc_attr( pll__( 'Замовити дзвінок' ) ) ?></div></a>
                <div>
                    <img src="<?php echo get_template_directory_uri();?>/img/more.png" alt="" class="burger-menu">
                </div>

                <!--                    mobile menu-->
                <div class="mobile-menu">
                    <a class="burger-menu" href="#"></a>
                    <div class="menu-popup">
                        <div class="set-margin">
                            <a class="menu-close" href="#"><img class="close-icon" src="<?php echo get_template_directory_uri();?>/img/close.png" alt=""></a>
                            <div class="footer-contact-block">
                                <h4 class="white"><?php echo esc_attr( pll__( 'Розділи сайту' ) ) ?></h4>
                                <?php wp_nav_menu([
                                    'theme_location' => 'top',
                                    'container'            => false,
                                    'menu_class'           => '',
                                ]);?>
                            </div>
                            <div class="footer-contact-block">
                                <h4 class="white"><?php echo esc_attr( pll__( 'Студія Fillsites' ) ) ?></h4>
                                <div>
                                    <a href="tel:<?php echo carbon_get_theme_option( 'phone-gen');?>" class="footer-link"><img src="<?php echo get_template_directory_uri();?>/img/phone-call.png" alt="" class="footer-icon"><?php echo carbon_get_theme_option( 'phone-gen');?></a><br>
                                    <a href="tel:<?php echo carbon_get_theme_option( 'phone-ex');?>" class="footer-link"><img src="<?php echo get_template_directory_uri();?>/img/phone-call.png" alt="" class="footer-icon"><?php echo carbon_get_theme_option( 'phone-ex');?></a><br>
                                    <a href="mailto:<?php echo carbon_get_theme_option( 'mail');?>" class="footer-link"><img src="<?php echo get_template_directory_uri();?>/img/mail.png" alt="" class="footer-icon"><?php echo carbon_get_theme_option( 'mail');?></a>
                                </div>
                            </div>
                            <div class="footer-contact-block">
                                <h4 class="white"><?php echo esc_attr( pll__( 'Ми в соціальних мережах' ) ) ?></h4>
                                <div class="d-flex justify-content-center">
                                    <?php $soc = carbon_get_theme_option( 'setting_block');
                                    foreach ($soc as $item):?>
                                        <div class="s-icon text-center">
                                            <a href="<?php echo $item['s_link'];?>">
                                                <?php echo wp_get_attachment_image(
                                                    $item['s_icon'],
                                                    'full',
                                                    false,
                                                    [
                                                        'class'=>'img-fluid icon',
                                                        'alt'=> ""
                                                    ]
                                                );?>
                                            </a>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="footer-contact-block">
                                <h4 class="white"><?php echo esc_attr( pll__( 'Наші ресурси' ) ) ?></h4>
                                <?php $logo = carbon_get_theme_option( 'sites_block');
                                foreach ($logo as $item):?>
                                    <a href="<?php echo $item['site_link'];?>">
                                        <?php echo wp_get_attachment_image(
                                            $item['site_logo'],
                                            'full',
                                            false,
                                            [
                                                'class'=>'footer-img',
                                                'alt'=> ""
                                            ]
                                        );?>
                                    </a>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>