<?php

/**
 * Class CustomMenuWalker
 */
class CustomMenuWalker extends Walker_Nav_Menu
{
    /**
     * Phương thức start_lvl()
     * Được sử dụng để hiển thị các thẻ bắt đầu cấu trúc của một cấp độ mới trong menu. (ví dụ: <ul class="sub-menu">)
     * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
     * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
     * @param array $args | Các tham số trong hàm wp_nav_menu()
     **/
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    /**
     * Phương thức end_lvl()
     * Được sử dụng để hiển thị đoạn kết thúc của một cấp độ mới trong menu. (ví dụ: </ul> )
     * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
     * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
     * @param array $args | Các tham số trong hàm wp_nav_menu()
     **/
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;


        /*grab the default wp nav classes*/
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        /*if there aren't any class names, don't show class attribute*/
        $hasChildren = strpos($class_names, 'menu-item-has-children');
        $currentMenu = strpos($class_names, 'current_page_item')
            || strpos($class_names, 'current-menu-item')
            || strpos($class_names, 'current-post-item');
        $currentParent = strpos($class_names, 'current-post-ancestor')
            || strpos($class_names, 'current-page-ancestor')
            || strpos($class_names, 'current-menu-ancestor');

        $class_names = $hasChildren? 'has-child ' : '';
        $class_names .= $currentMenu || $currentParent ? 'active': '';
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';


        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->title) ? $item->title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';


        /*if the current menu item has children and it's the parent, set the dropdown attributes*/
        if ($args->has_children && $depth === 0) {
            $atts['href'] = '#';
            $atts['data-toggle'] = 'dropdown';
            $atts['class'] = 'dropdown-toggle';
        } else {
            $atts['href'] = !empty($item->url) ? $item->url : '';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $item_output .= '<a' . $attributes . '>';

        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        /*	if the current menu item has children and it's the parent item, append the fa-angle-down icon*/
        $item_output .= $hasChildren ? ' <i class="fa fa-chevron-down"></i></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}