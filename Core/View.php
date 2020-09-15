<?php

namespace Core;

/**
 * View
 *
 * PHP version 7.0
 */
class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        $view .= '.php';
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/App/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        $template .= '.php';
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\Filesystemloader(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig\Environment($loader);
        }

        echo $twig->render($template, $args);
    }

    public static function renderLayout($view, $layoutName , $args = [])
    {
        $layout = Layout::getLayout($layoutName);

        /* Layout's Before Area */
        foreach ($layout['before'] as $before)
        {
            if (!empty($before))
            {
                $file = dirname(__DIR__) . "/App/Views/Layouts/$layoutName/$before";
                if (is_readable($file))
                {
                    require $file;
                }
            }
        }

        /* Layouts Content Area */
        $view .= '.php';
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/App/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }


        /* Layout's After Area */
        foreach ($layout['after'] as $after)
        {
            if (!empty($after))
            {
                $file = dirname(__DIR__) . "/App/Views/Layouts/$layoutName/$after";
                if (is_readable($file))
                {
                    require $file;
                }
            }
        }




    }
}
