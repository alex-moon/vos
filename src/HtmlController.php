<?php

namespace Vos;

class HtmlController extends Controller
{
    private $basePath = __DIR__ . '/../assets/html/';

    private function respond($template, $bindings)
    {
        if (empty($template)) {
            $template = 'index';
        }

        $path = $this->basePath . $template . '.html';
        if (!file_exists($path)) {
            http_response_code(404);
            require_once ($this->basePath . '404.html');
            return;
        }
        require_once($path);
    }

    /**
     * @param string $uri
     * @throws VosException
     */
    public function handle(string $uri): void
    {
        $tokens = explode('/', $uri);
        $root = $tokens[1];
        if ($root === 'app') {
            $this->app();
        }
        $this->respond($root, [
            'url' => $uri,
        ]);
    }

    /**
     * @throws VosException
     */
    private function app(): void
    {
        $targetObjects = $this->vos->get('sun', 'width', 1, 'm');
        usort($targetObjects, function($a, $b) {
            if ($a->name == $b->name) {
                return 0;
            }
            return ($a->name < $b->name) ? -1 : 1;
        });
        $targets = '';
        foreach ($targetObjects as $option) {
            $targets .= sprintf(
                '<option value="%s"%s>%s</option>',
                $option->id,
                $option->id === 'sun' ? ' selected="selected"' : '',
                $option->name
            ) . "\n";
        }
        $measures = '';
        foreach (MeasureEnum::all() as $measure) {
            $measures .= sprintf(
                '<option value="%s"%s>%s</option>',
                $measure,
                $measure === 'width' ? ' selected="selected"' : '',
                $measure
            ) . "\n";
        }
        $this->respond('app', [
            'targets' => $targets,
            'measures' => $measures,
        ]);
    }
}
