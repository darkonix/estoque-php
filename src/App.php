<?php

namespace Abril;

/**
 * View-specific wrapper.
 * Limits the accessible scope available to templates.
 */
class App {
    /**
     * Returns menu content
     * @return Returns the menu content.
     */
    static public function menu($current) {
        $menu = array(
            'pedidos' => array(
                'url' => BASE_URL . 'pedidos/list',
                'text' => 'Pedidos',
                'active' => '',
            ),
            'produtos' => array(
                'url' => BASE_URL . 'produtos/list',
                'text' => 'Produtos',
                'active' => '',
            ),
            'clientes' => array(
                'url' => BASE_URL . 'clientes/list',
                'text' => 'Clientes',
                'active' => '',
            ),
        );

        $menu[$current]['active'] = "class='active'";

        return $menu;
    }

    /**
     * Render the template, returning it's content.
     * @param string $template The HTML template file path.
     * @param array $data Data made available to the view.
     * @return string The rendered template.
     */
    static public function render($template, Array $data = array()) {
        extract($data);

        ob_start();
        include( APP_PATH . DIRECTORY_SEPARATOR . $template);
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
}

?>