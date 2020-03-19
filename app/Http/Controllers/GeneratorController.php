<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattyRad\NounProject;

class GeneratorController extends Controller
{
    private static $consumer_key = "ba48385341cb4a27a65300a42498b458";
    private static $consumer_secret = "bd7fabd73bb84f7d8cb96207e363031c";


    /**
     * @param $term
     * @param $page
     * @param $limit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIcons($term, $page, $limit)
    {

        $results = self::getApi($term, $page, $limit);
        
        $icons = [];

        foreach ($results as $key => $result) {
            $icons[] = [
                'id' => $key,
                'url' => $result['icon_url'],
            ];
        }

        return compact('icons');
    }

    private function getApi($term, $page, $limit)
    {
        $api = new NounProject\Client($key = self::$consumer_key, $secret = self::$consumer_secret);

        $result = $api->send(new NounProject\Request\Icons(
            $term = $term,
            $limit_to_public_domain = true,
            $offset = ($page * $limit),
            $page = $page,
            $limit = $limit,
        ));

        if (!$result->isSuccess()) {
            throw new \Exception($result->getReason());
        }

        return $result->getIcons();
    }
}
