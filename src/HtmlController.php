<?php

namespace Vos;

class HtmlController extends Controller
{
    private function respond($template, $bindings)
    {
        require_once(__DIR__ . '/../assets/html/' . $template . '.html');
    }

    /**
     * @param $url
     * @throws VosException
     */
    public function handle(string $uri): void
    {
        $tokens = explode('/', $uri);
        if ($tokens[1] === 'app') {
            $this->app();
        }
        $this->respond('index', [
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
