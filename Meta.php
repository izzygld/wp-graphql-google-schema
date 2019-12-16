<?php
add_action( 'wp_loaded', 'wpse290170_wp_loaded' );

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
function wpse290170_wp_loaded() {
	$blog_id = get_current_blog_id();
	$types = get_post_types( [
        'public'   => true  ] );
        
  foreach ( $types as $type ){
    add_action( "graphql_" . $type . "_fields", function($fields) {


        $fields['seo_title'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Title'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_title', true);
                }
        ];

    $fields['seo_metadesc'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Dscription'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
                }
    ];

        $fields['seo_noindex'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('No Index'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_meta-robots-noindex', true);
                }
        ];

    $fields['seo_nofollow'] = [
                'type' => \WPGraphQL\Types::boolean(),
                'description' => __('The persons email address'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_meta-robots-nofollow', true);
                }
    ];

    $fields['opengraph_title'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Facebook Title'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_opengraph-title', true);
                }
    ];

    $fields['opengraph_description'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Facebook Description'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_opengraph-description', true);
                }
    ];

    $fields['opengraph_image'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Facebook Image'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_opengraph-image', true);
                }
        ];



        $fields['seo_twitter_title'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Twitter Title'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_twitter-title', true);
                }
        ];
        $fields['seo_twitter_card'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Twitter Description'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_twitter-card', true);
                }
        ];
        $fields['seo_twitter_description'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Twitter Description'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_twitter-description', true);
                }
        ];

        $fields['seo_twitter_image'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('Twitter Image'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_twitter-image', true);
                }
        ];

    $fields['seo_canonical'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Canonical url'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_canonical', true);
                }
    ];

        $fields['seo_redirect'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Redirect'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, '_yoast_wpseo_redirect', true);
                }
    ];

    $fields['gos_simple_redirect'] = [
                'type' => \WPGraphQL\Types::string(),
                'description' => __('SEO Redirect'),
                'resolve' => function(\WPGraphQL\Model\Post $post) {
                return get_post_meta($post->ID, 'gos_simple_redirect', true);
                }
    ];
      return $fields;
},99 );

}


}
