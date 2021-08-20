<?php

namespace Framework\Helpers\Renderer;

class Renderer
{
    private const PATH_TO_VIEW = "App/View/";

    public function render($layout, $params, $template): bool
    {
        ob_start();
        try {
            $template = self::PATH_TO_VIEW . 'Templates/' . $template;
            include(self::PATH_TO_VIEW . 'Layouts/' . $layout);
            ob_flush();
            return ob_end_clean();
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
    }
}
