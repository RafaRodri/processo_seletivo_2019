<?php

namespace App\Services;

class NoticiaService
{

    public function search($page, $search = null)
    {
        $url = env('URL_NOTICIAS');

        $params = array('page' => $page);

        if (trim($search)) {
            $params['pesquisa'] = $search;
        }

        $url = $url . '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);

        $noticias = json_decode($data);
        if ($noticias->total_noticias === 0) {
            return (object)[
                'total_noticias' => 0,
                'noticias' => [],
            ];
        }

        $qtd_paginas = intval(ceil($noticias->total_noticias / 15));
        $noticias->qtd_paginas = $qtd_paginas;

        $noticias->first_page = 1;
        $noticias->last_page = $qtd_paginas;
        $noticias->page = $page;
        $noticias->first = $page == 1;
        $noticias->last = $page == $qtd_paginas;

        return $noticias;
    }
}
