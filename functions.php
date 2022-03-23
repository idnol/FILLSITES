<?php
register_nav_menu('top','header-menu');
register_nav_menu('top_mobile','header-menu-mobile');
register_nav_menu('bottom_first','bottom-menu_first');
register_nav_menu('bottom_second','bottom-menu_second');
register_nav_menu('bottom_third','bottom-menu_third');
register_nav_menu('bottom_fourth','bottom-menu_fourth');
add_action( 'after_setup_theme', 'add_features' );
function add_features() {
    add_theme_support( 'custom-logo', [
        'height'      => 31,
        'width'       => 25,
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
        'unlink-homepage-logo' => false, // WP 5.5
    ] );
}

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_action( 'wp_print_styles', 'add_styles' );
if ( ! function_exists( 'add_styles' ) ) {
    function add_styles() {
        if ( is_admin() ) {
            return false;
        }

        wp_enqueue_style( 'boot', get_template_directory_uri() . '/css/bootstrap.css', array(), '12.02.2021');
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '12.02.2021');
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '12.02.2021');
        wp_enqueue_style( 'awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css','', '5.15.4');
        wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', array(), '12.02.2021');
    }
}
add_action( 'wp_footer', 'add_scripts' );
if ( ! function_exists( 'add_scripts' ) ) {
    function add_scripts() {
        if ( is_admin() ) {
            return false;
        }
        wp_enqueue_script( 'bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', '', '', true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', '', '', true );
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', '', '', true );
        wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', '', '', true );

    }
}

function my_scripts_method() {
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js' ) );
        wp_enqueue_script( 'jquery' );
    }
}
add_action( 'init', 'my_scripts_method' );

add_action('init', 'fillsites_polylang_strings' );

function fillsites_polylang_strings() {

    if( ! function_exists( 'pll_register_string' ) ) {
        return;
    }

    pll_register_string(
        'fillsites_button_header_name',
        'Замовити дзвінок',
        'Buttons',
        false
    );
    pll_register_string(
        'fillsites_button_name',
        'Замовити сайт',
        'Buttons',
        false
    );
    pll_register_string(
        'fillsites_button_name',
        'Замовити',
        'Buttons',
        false
    );
    pll_register_string(
        'fillsites_button_more',
        'детальніше',
        'Buttons',
        false
    );
    pll_register_string(
        'fillsites_button_more',
        'Повернутись на головну',
        'Buttons',
        false
    );
    pll_register_string(
        'fillsites_button_more',
        'Сторінка не знайдена',
        '404',
        false
    );
    pll_register_string(
        'fillsites_button_more',
        'Дякуємо',
        'thx',
        false
    );
    pll_register_string(
        'fillsites_button_more',
        'Менеджери',
        'thx',
        false
    );
    pll_register_string(
        'fillsites_footer_name_studio',
        'Студія Fillsites',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_social',
        'Ми в соціальних мережах',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_resources',
        'Наші ресурси',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_development',
        'Розробка сайтів',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_seo',
        'Просування',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_other',
        'інші послуги',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_general',
        'Загальна інформація',
        'Footer',
        false
    );
    pll_register_string(
        'fillsites_footer_items',
        'Розділи сайту',
        'Footer',
        false
    );

}



use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'post_meta', 2, __( 'Контент главной страницы', 'crb_index' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page-main.php' )
        ->add_tab( 'Баннер', array(
            Field::make( 'text', 'slider_title', 'Заголовок' ),
            Field::make( 'textarea', 'slider_desc', 'Описание' ),
            Field::make( 'image', 'slider_background', 'Фон' ),
            Field::make( 'image', 'slider_img', 'Изображение' ),
        ) )
        ->add_tab( 'Тарифы', array(
            Field::make( 'text', 'price_title', 'Заголовок' ),
            Field::make( 'textarea', 'price_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'price_block', 'Тарифы' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('price_block', 'Тариф',array(
                    Field::make( 'image', 'icon_img', 'Иконка пакета' ),
                    Field::make( 'text', 'pac_title', 'Заголовок пакета' ),
                    Field::make( 'text', 'pac_desc', 'Описание пакета' ),
                    Field::make( 'text', 'pac_link', 'Ссылка на страницу' ),
                )),
        ) )
        ->add_tab( 'Текстовый блок', array(
            Field::make( 'text', 'seo_title', 'Заголовок' ),
        ) )
    ;
    Container::make( 'post_meta', 3, __( 'Контент страницы направления услуг', 'crb_index' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page-services-main.php' )
        ->add_tab( 'Баннер', array(
            Field::make( 'text', 'services_slider_title', 'Заголовок' ),
            Field::make( 'textarea', 'services_slider_desc', 'Описание' ),
            Field::make( 'image', 'services_slider_background', 'Фон' ),
            Field::make( 'image', 'services_slider_img', 'Изображение' ),
            Field::make( 'set', 'services_main_set_road', __( 'Направление' ) )
                ->set_options( array(
                    '1' => 'Разработка сайтов',
                    '2' => 'Продвижение',
                ) ),
        ) )
        ->add_tab( 'Тарифы', array(
            Field::make( 'text', 'services_main_price_title', 'Заголовок' ),
            Field::make( 'textarea', 'services_main_price_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'services_main_price_block', 'Тарифы' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('services_main_price_block', 'Тариф',array(
                    Field::make( 'image', 'services_main_icon_img', 'Иконка пакета' ),
                    Field::make( 'text', 'services_main_pac_title', 'Заголовок пакета' ),
                    Field::make( 'text', 'services_main_pac_desc', 'Описание пакета' ),
                    Field::make( 'text', 'services_main_pac_link', 'Ссылка на страницу' ),
                    Field::make( 'text', 'services_main_pac_btn', 'Кнопка' ),
                    Field::make( 'text', 'services_main_pac_price', 'Ценa' ),
                )),
        ) )
        ->add_tab( 'Технологии', array(
            Field::make( 'text', 'services_technology_title', 'Заголовок' ),
            Field::make( 'complex', 'services_technology_block', 'Технология' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('services_technology_block', 'Технология',array(
                    Field::make( 'image', 'services_technology_img', 'Логотип технологии' ),
                )),
        ) )
    ;
    Container::make( 'post_meta', 4, __( 'Контент страницы виды услуг', 'crb_index' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page-services.php' )
        ->add_tab( 'Баннер', array(
            Field::make( 'text', 'page_services_slider_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_services_slider_desc', 'Описание' ),
            Field::make( 'image', 'page_services_slider_background', 'Фон' ),
            Field::make( 'image', 'page_services_slider_img', 'Изображение' ),
            Field::make( 'set', 'services_set_road', __( 'Направление' ) )
                ->set_options( array(
                    '1' => 'Разработка сайтов',
                    '2' => 'Продвижение',
                ) ),
            Field::make( 'set', 'services_set_type', __( 'Направление' ) )
                ->set_options( array(
                    '1' => 'Landing page',
                    '2' => 'Интернет-магазин',
                    '3' => 'Корпоративный сайт',
                    '4' => 'Google',
                    '5' => 'Facebook / Instagram',
                ) ),
        ) )
        ->add_tab( 'Про лендинги', array(
            Field::make( 'text', 'page_services_about_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_services_about_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'page_services_about_block', 'Список' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_about_block', 'Пункт',array(
                    Field::make( 'textarea', 'page_li', 'пункт' ),
                )),
            Field::make( 'image', 'page_services_about_img', 'Изображение' ),
        ) )
        ->add_tab( 'Тарифы', array(
            Field::make( 'text', 'page_services_price_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_services_price_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'page_services_price_block', 'Тарифы' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_price_block', 'Тариф',array(
                    Field::make( 'image', 'page_icon_img', 'Иконка пакета' ),
                    Field::make( 'text', 'page_pac_title', 'Заголовок пакета' ),
                    Field::make( 'text', 'page_pac_desc', 'Описание пакета' ),
                    Field::make( 'text', 'page_pac_link', 'Ссылка на страницу' ),
                    Field::make( 'text', 'page_pac_btn', 'Кнопка' ),
                    Field::make( 'text', 'page_pac_price', 'Ценa' ),
                )),
        ) )
        ->add_tab( 'Таблица', array(
            Field::make( 'text', 'page_services_table_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_services_table_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'page_services_th_block', 'Заголовки колонок таблицы' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_th_block', 'Логотип пакета',array(
                    Field::make( 'image', 'page_services_th_img', 'Иконка пакета' ),
                )),
            Field::make( 'complex', 'page_services_table_block', 'Таблица сравнений' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_table_block', 'Сравнение',array(
                    Field::make( 'text', 'text', 'Описание' ),
                    Field::make( 'complex', 'table_option', 'Отметки' )
                        ->set_layout( 'tabbed-horizontal' )
                        ->add_fields('page_services_th_block', 'Наличие в пакете',array(
                            Field::make( 'select', 'box_select', __( '' ) )
                                ->set_options( array(
                                    'positive' => 'Да',
                                    'negative' => 'Нет',
                                ) ),
                        )),
                )),
        ) )
        ->add_tab( 'Преимущества', array(
            Field::make( 'text', 'page_services_benefits_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_services_benefits_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'page_services_benefits_block', 'Преимущества' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_benefits_block', 'Преимущество',array(
                    Field::make( 'image', 'page_benefits_img', 'Иконка пакета' ),
                    Field::make( 'text', 'page_benefits_title', 'Заголовок пакета' ),
                    Field::make( 'text', 'page_benefits_desc', 'Описание пакета' ),
                )),
        ) )
        ->add_tab( 'Технологии', array(
            Field::make( 'text', 'page_services_technology_title', 'Заголовок' ),
            Field::make( 'complex', 'page_services_technology_block', 'Технология' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_technology_block', 'Технология',array(
                    Field::make( 'image', 'page_services_technology_img', 'Логотип технологии' ),
                )),
        ) )
    ;

    Container::make( 'post_meta', 4, __( 'Контент страницы виды услуг', 'crb_index' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page-service.php' )
        ->add_tab( 'Баннер', array(
            Field::make( 'text', 'page_service_slider_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_service_slider_desc', 'Описание' ),
            Field::make( 'image', 'page_service_slider_background', 'Фон' ),
            Field::make( 'image', 'page_service_slider_img', 'Изображение' ),
            Field::make( 'set', 'service_set_road', __( 'Направление' ) )
                ->set_options( array(
                    '1' => 'Разработка сайтов',
                    '2' => 'Продвижение',
                ) ),
            Field::make( 'set', 'service_set_type', __( 'Направление' ) )
                ->set_options( array(
                    '1' => 'Landing page',
                    '2' => 'Интернет-магазин',
                    '3' => 'Корпоративный сайт',
                    '4' => 'Google',
                    '5' => 'Facebook / Instagram',
                ) ),
            Field::make( 'set', 'service_set_technology', __( 'Технология' ) )
                ->set_options( array(
                    '1' => 'Tilda',
                    '2' => 'Wordpress',
                    '3' => 'Opencart',
                ) )

        ) )
        ->add_tab( 'Про лендинги', array(
            Field::make( 'textarea', 'page_service_about_desc', 'Подзаголовок' ),
        ) )
        ->add_tab( 'Преимущества', array(
            Field::make( 'text', 'page_service_benefits_title', 'Заголовок' ),
            Field::make( 'textarea', 'page_service_benefits_desc', 'Подзаголовок' ),
            Field::make( 'complex', 'page_service_benefits_block', 'Преимущества' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_service_benefits_block', 'Преимущество',array(
                    Field::make( 'image', 'page_service_benefits_img', 'Иконка пакета' ),
                    Field::make( 'text', 'page_service_benefits_title', 'Заголовок пакета' ),
                    Field::make( 'text', 'page_service_benefits_desc', 'Описание пакета' ),
                )),
        ) )
        ->add_tab( 'Технологии', array(
            Field::make( 'text', 'page_services_technology_title', 'Заголовок' ),
            Field::make( 'complex', 'page_services_technology_block', 'Технология' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('page_services_technology_block', 'Технология',array(
                    Field::make( 'image', 'page_services_technology_img', 'Логотип технологии' ),
                )),
        ) )
        ->add_tab( 'SEO текст', array(
            Field::make( 'text', 'page_services_seo_title', 'Заголовок' ),
            Field::make( 'rich_text', 'page_services_seo_description', 'Заголовок' ),
        ) )
    ;

    Container::make( 'theme_options', 7,__( 'Общие значения' ) )
        ->add_fields( array(
            Field::make( 'text', 'phone-gen', 'Основной номер телефона' ),
            Field::make( 'text', 'phone-ex', 'Дополнительный номер телефона' ),
            Field::make( 'text', 'mail', 'Почта' ),
            Field::make( 'complex', 'setting_block', 'Иконки социальных сетей' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('soc_block', 'Социальные сети',array(
                    Field::make( 'image', 's_icon', 'Иконка социальной сети' ),
                    Field::make( 'text', 's_link', 'Ссылка социальной сети' ),
                )),
            Field::make( 'complex', 'setting_block_black', 'Иконки социальных сетей черные значки' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('soc_block_black', 'Социальные сети черные значки',array(
                    Field::make( 'image', 's_icon_black', 'Иконка социальной сети' ),
                    Field::make( 'text', 's_link_black', 'Ссылка социальной сети' ),
                )),
            Field::make( 'complex', 'sites_block', 'Наши ресурсы' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('sites_block', 'Сайт',array(
                    Field::make( 'image', 'site_logo', 'Логотип' ),
                    Field::make( 'text', 'site_link', 'Ссылка' ),
                )),
        ) )
        ->add_tab( 'Блок с формой', array(
            Field::make( 'text', 'contact_title_ua', 'Заголовок || Українська' ),
            Field::make( 'text', 'contact_title_ru', 'Заголовок || Русский' ),
            Field::make( 'textarea', 'contact_desc_first_ua', 'Опис (1 строка) || Українська' ),
            Field::make( 'textarea', 'contact_desc_first_ru', 'Описание (1 строка) || Русский' ),
            Field::make( 'textarea', 'contact_desc_second_ua', 'Опис (2 строка) || Українська' ),
            Field::make( 'textarea', 'contact_desc_second_ru', 'Описание (2 строка) || Русский' ),
            Field::make( 'text', 'form_title_ua', 'Заголовок форми || Українська' ),
            Field::make( 'text', 'form_title_ru', 'Заголовок формы || Русский' ),
            Field::make( 'textarea', 'form_desc_ua', 'Опис форми || Українська' ),
            Field::make( 'textarea', 'form_desc_ru', 'Описание формы || Русский' ),
        ) )
        ->add_tab( 'Клиенты', array(
            Field::make( 'text', 'client_title_ua', 'Заголовок || Українська' ),
            Field::make( 'text', 'client_title_ru', 'Заголовок || Русский' ),
            Field::make( 'textarea', 'client_desc_ua', 'Опис || Українська' ),
            Field::make( 'textarea', 'client_desc_ru', 'Описание || Русский' ),
            Field::make( 'complex', 'client_block', 'Клиенты' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('client_block', 'Клиент',array(
                    Field::make( 'image', 'client_logo', 'Логотип' ),
                )),
        ) )
        ->add_tab( 'Портфолио', array(
            Field::make( 'text', 'portfolio_title_ua', 'Заголовок || Українська' ),
            Field::make( 'text', 'portfolio_title_ru', 'Заголовок || Русский' ),
            Field::make( 'textarea', 'portfolio_desc_ua', 'Опис || Українська' ),
            Field::make( 'textarea', 'portfolio_desc_ru', 'Описание || Русский' ),
            Field::make( 'complex', 'portfolio_block', 'Клиенты' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields('portfolio', 'Кейс',array(
                    Field::make( 'image', 'case_img', 'Изображение' ),
                    Field::make( 'text', 'case_title', 'Заголовок' ),
                    Field::make( 'textarea', 'case_desc_ua', 'Опис || Українська' ),
                    Field::make( 'textarea', 'case_desc_ru', 'Описание || Русский' ),
                    Field::make( 'text', 'case_link', 'Ссылка' ),
                    Field::make( 'set', 'case_set_road', __( 'Направление' ) )
                        ->set_options( array(
                            '1' => 'Разработка сайтов',
                            '2' => 'Продвижение',
                        ) ),
                    Field::make( 'set', 'case_set_type', __( 'Тип' ) )
                        ->set_options( array(
                            '1' => 'Landing page',
                            '2' => 'Интернет-магазин',
                            '3' => 'Корпоративный сайт',
                            '4' => 'Google',
                            '5' => 'Facebook / Instagram',
                        ) ),
                    Field::make( 'set', 'case_set_technology', __( 'Технология' ) )
                        ->set_options( array(
                            '1' => 'Tilda',
                            '2' => 'Wordpress',
                            '3' => 'Opencart',
                        ) )
                )),
        ) )
    ;


}

//-------------------connect bitrix24---------------------------------

function telegram_send($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );

function your_wpcf7_mail_sent_function( $contact_form ) {
    $submission = WPCF7_Submission::get_instance();
    $posted_data = $submission->get_posted_data();
    $message =  "Запрос с сайта landing.fillsites.net%0A";
    $message .= "*Имя:* {$posted_data['name-620']}%0A";
    $message .= "*Телефон:* [{$posted_data['tel-705']}](http://{$posted_data['tel-705']})%0A%0A";
    $message .= "*Форма вызова:* $contact_form->title%0A";

    $api_key = '845159232:AAEbTvrbaQZbMg-OQKS4t74l89DicZeb-s4';
    $chat_id = '-1001263685134';
    $url = "https://api.telegram.org/bot" . $api_key . "/sendMessage?chat_id=" . $chat_id . "&text=" . $message . "&parse_mode=Markdown";
    telegram_send($url);



    $queryData = http_build_query(array(
        'fields' => array(
            'TITLE' 	=> $contact_form->title,
            'NAME' 		=> $posted_data['name-620'],
            'PHONE' 	=> array(
                array("VALUE" => $posted_data['tel-705'])
            ),
        ),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));
    bitrix_push_wpcf7_mail_sent_function($queryData);



}


// Bitrix24
function bitrix_push_wpcf7_mail_sent_function($data){
    $queryUrl = 'https://coloring.bitrix24.ua/rest/32/ou4rtbs1yxi416s4/crm.lead.add.json';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $data,
    ));
    $result = curl_exec($curl);
    curl_close($curl);
}