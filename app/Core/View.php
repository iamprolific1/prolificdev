<?php

declare(strict_types=1);
namespace ProlificDev\Core;

use RuntimeException;

final class View
{
    public function __construct(
        private readonly string $viewsPath
    ){}

    public function render(
        string $view,
        array $data = [],
        ?string $layout = 'app'
    ) : string
    {
        $viewPath = $this->viewsPath . '/' . str_replace('.', '/', $view) . '.php';

        if(!is_file($viewPath)) {
            throw new RuntimeException("View file not found: {$view}");
        }

        // make data available to the view
        extract($data, EXTR_SKIP);
        //Render the page inside its layout
        ob_start();

        require $viewPath;

        $content = ob_get_clean();

        // Return only the page content if no layout is requested.
        if ($layout === null) {
            return $content;
        }

        $layoutPath = $this->viewsPath
            . '/layouts/' . $layout . '.php';

        if (!is_file($layoutPath)) {
            throw new RuntimeException(
                "Layout not found: {$layout}"
            );
        }

        // Render the page inside its layout.
        ob_start();

        require $layoutPath;

        return ob_get_clean();
    }
}

