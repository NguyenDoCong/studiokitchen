<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav>
            <div class="upper-nav">
                <div class="empty">
                </div>
                <div class="logo">
                    <?php
                    if (function_exists('the_custom_logo')) :
                        the_custom_logo();
                    endif; ?>
                </div>
                <div class="cart">
                    <img src="<?php echo get_theme_file_uri("/assets/images/Icons/shopping-cart.png") ?>" alt="">
                    <a href="#">Login</a>
                </div>

            </div>
            <div class="lower-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu', // Tên vùng menu (cần phù hợp với tên đã đăng ký ở bước trước)
                        'menu_class' => 'menu', // Tên lớp CSS cho menu (tuỳ chọn)
                        'container_class' => 'container_class', // Tên lớp CSS cho container (tuỳ chọn)
                    )
                );
                ?>
                <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                    <fieldset>
                        <input type="text" name="s" placeholder="What would you like to cook?" value="<?php the_search_query(); ?>">
                    </fieldset>
                </form>
            </div>
        </nav>


    </header>
</body>