<?php

function an_news_block_render($block_attributes, $block_content)
{
    $block_classes = isset($block_attributes['className']) ? $block_attributes['className'] . 'wp-block-an-news' : 'wp-block-an-news';

    $args = array(
        'posts_per_page' => -1,
    );

    if (isset($block_attritubes['category'])) {
        $args['category'] = $block_attritubes['category'];
    }

    $news = get_posts($args);
    $render = '';
    if (0 < count($news)) {
        $render .= '<div class="' . esc_attr($block_classes) . '">';
        $render .= '<h3>Learn more about this</h3>';
        $render .= '<ul>';
        foreach ($news as $new) {
            $render .= '<li><a href="' . esc_url(get_permalink($new->ID)) . '">' . esc_html($new->post_title) . '</a></li>';
        }
        $render .= '</ul>';
        $render .= '</div>';
    }

    return $render;
}

function an_news_block_init()
{
    register_block_type(
        __DIR__,
        array(
            'render_callback' => 'an_news_block_render',
        )
    );
}

add_action('init', 'an_news_block_init');
