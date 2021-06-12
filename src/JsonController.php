<?php

namespace Vos;

class JsonController extends Controller
{
    private function respond($data, $success = true, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode([
            'status' => $success,
            'data' => $data,
        ]);
    }

    public function handle($uri)
    {
        $tokens = explode('/', $uri);

        if (count($tokens) < 5) {
            $this->respond(
                [
                    'error' => 'Usage: /' . $tokens[1] . '/[object]/[measure]/[value]/[unit] - e.g. /sun/width/1/m'
                ],
                false,
                400
            );
        } else {
            try {
                $this->respond(
                    $this->vos->get(
                        $tokens[2],
                        $tokens[3],
                        $tokens[4],
                        $tokens[5]
                    )
                );
            } catch (VosException $e) {
                $this->respond(
                    ['error' => $e->getMessage()],
                    false,
                    500
                );
            }
        }
    }
}
