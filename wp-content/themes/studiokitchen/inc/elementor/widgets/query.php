<?php

//namespace Elementor;

class Elementor_Query extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'studio-kitchen-query';
    }

    public function get_title()
    {
        return esc_html__('Query', 'studio-kitchen');
    }

    public function get_icon()
    {
        return 'icon-quotes-carousel';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select',
            [
                'label' => __('Select Query', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => [
                    // 'default' => esc_html__('Default', 'textdomain'),
                    'post' => esc_html__('Post', 'textdomain'),
                    'recipes' => esc_html__('Recipes', 'textdomain'),
                    'courses' => esc_html__('Courses', 'textdomain'),
                    'stories' => esc_html__('Stories', 'textdomain'),
                    'events' => esc_html__('Events', 'textdomain'),
                    'blogs' => esc_html__('Blogs', 'textdomain'),
                    'podcasts' => esc_html__('Podcasts', 'textdomain'),
                ],
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order By', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    // 'default' => esc_html__('Default', 'textdomain'),
                    'DESC' => esc_html__('Newest First', 'textdomain'),
                    'ASC' => esc_html__('Oldest First', 'textdomain'),
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="query">
            <?php
            // The Query.
            $args = array(
                'post_type' => $settings['select'],
                'order' => $settings['order_by'],
            );
            $the_query = new WP_Query($args);

            // The Loop.
            if ($the_query->have_posts()) :
                $i = 0;
                echo '<div class="cards">';
                while ($the_query->have_posts()) : $the_query->the_post();
                    $i++;
                    echo '<div class="card">';
                    echo '<figure>';
                    echo '<a class="" href="' . esc_html(get_permalink()) . '">';
                    echo '<img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="img">';
                    echo '</a>';
                    echo '</figure>';
                    if (($i === 1) && ($args['post_type'] === 'courses')) {
                        echo '<a class="play-button" href="' . esc_html("https://youtu.be/HpX0hHis1_g?si=zmptvmHF3YdA0yjf") . '">' . '<img src="' . esc_url("/studiokitchen/wp-content/themes/studiokitchen/assets/images/Icons/play.png") . '" alt="img">' . '</a>';
                    }
                    $date = esc_html(get_the_date('M j'));
                    $dates = explode(" ", $date);
                    echo '<div class="content">';
                    echo '<div class="short-date body lg poppins-regular">';
                    echo '<p class="month">' . $dates[0] . '</p>';
                    echo '<h4 class="day poppins-semibold ">' . $dates[1] . '</h4>';
                    echo '</div>';
                    echo '<div class="text">';
                    if (($i !== 1) && ($args['post_type'] === 'courses')) {
                        echo '<p class="cooking-guide">' . 'Cooking guide' . '</p>';
                    }
                    echo '<a class="title poppins-semibold" href="' . esc_html(get_permalink()) . '">' . esc_html(get_the_title()) . '</a>';
                    echo '<p class="summary body md poppins-regular">';
                    echo esc_html(get_the_content());
                    if (($i === 1) && ($args['post_type'] === 'stories')) {
                        echo '<span class="read-more"><a href="' . esc_html(get_permalink()) . '">' . 'read more' . '</a></span>';
                    }
                    echo '</p>';
                    echo '<a class="" href="' . 'http://localhost/studiokitchen/author/admin/' . '">';
                    echo '<p class="author body md poppins-regular">' . esc_html(get_the_author()) . '</p>';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="save">';

                    // Giả sử get_the_date() trả về ngày giờ dưới dạng chuỗi
                    $postedAt = new DateTime(get_the_date());
                    $now = new DateTime();
                    $postedAtDiff = $postedAt->diff($now);

                    // Lấy các giá trị của sự khác biệt
                    $days = $postedAtDiff->days;
                    $hours = $postedAtDiff->h;
                    $minutes = $postedAtDiff->i;
                    $seconds = $postedAtDiff->s;

                    // Xây dựng chuỗi hiển thị dựa trên sự chênh lệch
                    if ($days > 0) {
                        $postedAtString = $days . ' days ago';
                    } elseif ($hours > 0) {
                        $postedAtString = $hours . ' hours ago';
                    } elseif ($minutes > 0) {
                        $postedAtString = $minutes . ' minutes ago';
                    } else {
                        $postedAtString = $seconds . ' seconds ago';
                    }

                    echo '<p class="after month">' . $postedAtString . '</p>';
                    // echo '<p class="after date body md poppins-regular">' . esc_html(get_the_date()) . '</p>';
                    echo '<figure class="after save-icon">';
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/Icons/save.png" alt="img">';
                    echo '</figure>';
                    echo '<figure class="after play">';
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/Icons/play.png" alt="img">';
                    echo '</figure>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
            ?>
            <?php
                endwhile;
                echo '</div>';
            else :
                esc_html_e('Sorry, no posts matched your criteria.');
            endif;
            // Restore original Post Data.
            wp_reset_postdata();
            ?>
        </section>

<?php
    }
}
