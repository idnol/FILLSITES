<?php $id = get_the_ID(); ?>
<footer id="footer" class="footer">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer-contacts">
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
                </div>
                <div class="footer-contact-block">
                    <h4 class="white"><?php echo esc_attr( pll__( 'Наші ресурси' ) ) ?></h4>
                </div>
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
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <h4 class="white"><?php echo esc_attr( pll__( 'Загальна інформація' ) ) ?></h4>
                <?php wp_nav_menu([
                    'theme_location' => 'bottom_fourth',
                    'container'            => false,
                    'menu_class'           => 'footer-ul',
                ]);?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <h4 class="white"><?php echo esc_attr( pll__( 'Розробка сайтів' ) ) ?></h4>
                <?php wp_nav_menu([
                    'theme_location' => 'bottom_first',
                    'container'            => false,
                    'menu_class'           => 'footer-ul',
                ]);?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
<!--                <h4 class="white">--><?php //echo esc_attr( pll__( 'Просування' ) ) ?><!--</h4>-->
<!--                --><?php //wp_nav_menu([
//                    'theme_location' => 'bottom_second',
//                    'container'            => false,
//                    'menu_class'           => 'footer-ul',
//                ]);?>
                <h4 class="white"><?php echo esc_attr( pll__( 'інші послуги' ) ) ?></h4>
                <?php wp_nav_menu([
                    'theme_location' => 'bottom_third',
                    'container'            => false,
                    'menu_class'           => 'footer-ul',
                ]);?>
            </div>
        </div>
    </div>
</footer>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDQS6ZZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_footer(); ?>
<!--    wow-->
<script>
    new WOW().init();
</script>

</body>
</html>
