<?php
/**
 * Plugin Name: Brewery
 */


function brewery_init()
{
    register_post_type('brewery', [
        array(
            'label'               => 'Brasseries',
            'description'         => 'Brasseries participantes',
            'labels'              => array(
                'name'                => __('Brasseries', 'brewery'),
                'singular_name'       => __('Brasserie', 'brewery'),
                'menu_name'           => __('Brasseries', 'brewery'),
                'all_items'           => __('Toutes les brasseries', 'brewery'),
                'view_item'           => __('Voir la brasserie', 'brewery'),
                'add_new_item'        => __('Ajouter une brasserie', 'brewery'),
                'add_new'             => __('Ajouter', 'brewery'),
                'edit_item'           => __('Modifier la brasserie', 'brewery'),
                'update_item'         => __('Mettre à jour la brasserie', 'brewery'),
                'search_items'        => __('Rechercher une brasserie', 'brewery'),
                'not_found'           => __('Aucune brasserie', 'brewery'),
                'not_found_in_trash'  => __('Aucune brasserie dans la corbeille', 'brewery'),
            )
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
    ]);
}

function brewery_show()
{
    $query = array(
        'post_type' => 'image',
        'posts_per_page' => intval(20),
        'order_by' => 'date',
        'order' => 'DESC'
    );
    $request = new WP_query($query);
    echo '<div class="listing">';
    while ($request->have_posts()) {
        $request->the_post();
        echo '<article>';
        echo get_url_by_slug('brasseries');
        echo '<a href="' . get_permalink() . '">';
        the_post_thumbnail();
        echo '</a>';
        echo '</article>';
    }
    echo '</div>';

}
add_action('init', 'brewery_init');

function get_url_by_slug($slug) {
    $page_url_id = get_page_by_path($slug);
    $page_url_link = get_permalink($page_url_id);
    return $page_url_link;
}

?>

