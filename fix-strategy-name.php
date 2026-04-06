<?php
/**
 * Scratch script to force update page titles and menu items.
 * Run this by visiting the site once.
 */
require_once('../../../wp-load.php');

function force_rename_strategy_to_consulting() {
    // 1. Rename the page
    $page = get_page_by_title('Strategy');
    if ($page) {
        wp_update_post(array(
            'ID'         => $page->ID,
            'post_title' => 'Consulting & Strategy',
            'post_name'  => 'consulting-strategy'
        ));
        echo "Renamed page ID {$page->ID}\n";
    } else {
        echo "Page 'Strategy' not found.\n";
    }

    // 2. Rename menu items
    $menu_items = wp_get_nav_menu_items('primary'); // Assuming 'primary' is the slug, or adjust if needed
    if ($menu_items) {
        foreach ($menu_items as $item) {
            if ($item->title === 'Strategy') {
                wp_update_nav_menu_item(0, $item->ID, array(
                    'menu-item-title' => 'Consulting & Strategy'
                ));
                echo "Updated menu item ID {$item->ID}\n";
            }
        }
    } else {
        // Try to find all menu items if 'primary' is not the slug
        $menus = wp_get_nav_menus();
        foreach ($menus as $menu) {
            $items = wp_get_nav_menu_items($menu->term_id);
            foreach ($items as $item) {
                if ($item->title === 'Strategy') {
                    wp_update_nav_menu_item($menu->term_id, $item->ID, array(
                        'menu-item-title' => 'Consulting & Strategy'
                    ));
                    echo "Updated menu item ID {$item->ID} in menu {$menu->name}\n";
                }
            }
        }
    }
}

force_rename_strategy_to_consulting();
