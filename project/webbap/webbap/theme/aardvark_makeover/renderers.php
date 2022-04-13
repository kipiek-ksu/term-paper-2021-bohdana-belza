<?php

class theme_aardvark_makeover_core_renderer extends core_renderer {

     /**
     * Renders a custom menu object (located in outputcomponents.php)
     *
     * The custom menu this method override the render_custom_menu function
     * in outputrenderers.php
     * @staticvar int $menucount
     * @param custom_menu $menu
     * @return string
     */
        protected function render_custom_menu(custom_menu $menu) {

        //Adds custom branches before custom menu items

            $branchlabel = "";
            $branchurl   = new moodle_url('/index.php');
            $branchtitle = get_string('home');
            $branchsort  = -2;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);

        if (isloggedin()) {

            $branchlabel = get_string('logout');
            $branchurl   = new moodle_url('/login/logout.php');
            $branchtitle = $branchlabel;
            $branchsort  = -1;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);

        }else{

            $branchlabel = get_string('login');
            $branchurl   = new moodle_url('/login/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = -1;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        }

            $branchlabel = strftime("%A, %d %B %Y");
            $branchurl   = new moodle_url('/calendar/view.php');
            $branchtitle = get_string('today');
            $branchsort  = 999999;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);


        // If the menu has no children return an empty string
            if (!$menu->has_children()) {
              return '';
            }
        // Initialise this custom menu
            $content = html_writer::start_tag('ul', array('class'=>'dropdown dropdown-horizontal'));
        // Render each child
            foreach ($menu->get_children() as $item) {
                $content .= $this->render_custom_menu_item($item);
            }
        // Close the open tags
           $content .= html_writer::end_tag('ul');
        // Return the custom menu
           return $content;

    }

    /**
      * Renders a custom menu node as part of a submenu
      *
      * The custom menu this method override the render_custom_menu_item function
      * in outputrenderers.php
      *
      * @see render_custom_menu()
      *
      * @staticvar int $submenucount
      * @param custom_menu_item $menunode
      * @return string
      */

      protected function render_custom_menu_item(custom_menu_item $menunode) {
         // Required to ensure we get unique trackable id's
         static $submenucount = 0;
         $content = html_writer::start_tag('li');
         if ($menunode->has_children()) {
             // If the child has menus render it as a sub menu
             $submenucount++;
             if ($menunode->get_url() !== null) {
                 $url = $menunode->get_url();
             } else {
                 $url = '#cm_submenu_'.$submenucount;
             }
             $content .= html_writer::start_tag('span', array('class'=>'customitem'));
             $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
             $content .= html_writer::end_tag('span');
             $content .= html_writer::start_tag('ul');
             foreach ($menunode->get_children() as $menunode) {
                 $content .= $this->render_custom_menu_item($menunode);
             }
             $content .= html_writer::end_tag('ul');
         } else {
             // The node doesn't have children so produce a final menuitem

             if ($menunode->get_url() !== null) {
                 $url = $menunode->get_url();
             } else {
                 $url = '#';
             }
             $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
         }
         $content .= html_writer::end_tag('li');
         // Return the sub menu
         return $content;
     }

     // Copied from core_renderer with one minor change - changed $this->output->render() call to $this->render()
     protected function render_navigation_node(navigation_node $item) {
         $content = $item->get_content();
         $title = $item->get_title();
         if ($item->icon instanceof renderable && !$item->hideicon) {
             $icon = $this->render($item->icon);
             $content = $icon.$content; // use CSS for spacing of icons
         }
         if ($item->helpbutton !== null) {
             $content = trim($item->helpbutton).html_writer::tag('span', $content, array('class'=>'clearhelpbutton'));
         }
         if ($content === '') {
             return '';
         }
         if ($item->action instanceof action_link) {
             //TODO: to be replaced with something else
             $link = $item->action;
             if ($item->hidden) {
                 $link->add_class('dimmed');
             }
             $content = $this->render($link);
         } else if ($item->action instanceof moodle_url) {
             $attributes = array();
             if ($title !== '') {
                 $attributes['title'] = $title;
             }
             if ($item->hidden) {
                 $attributes['class'] = 'dimmed_text';
             }
             $content = html_writer::link($item->action, $content, $attributes);

         } else if (is_string($item->action) || empty($item->action)) {
             $attributes = array();
             if ($title !== '') {
                 $attributes['title'] = $title;
             }
             if ($item->hidden) {
                 $attributes['class'] = 'dimmed_text';
             }
             $content = html_writer::tag('span', $content, $attributes);
         }
         return $content;
     }
  }
?>