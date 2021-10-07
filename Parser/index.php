<?php
    include_once('lib/simple_html_dom.php');

    function curlGetPage($url, $referer = 'http://google.com'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    urlGet($page1 = curlGetPage('https://drugchoice.vrachirf.ru/almagel-r'));
    urlGet($page1 = curlGetPage('https://drugchoice.vrachirf.ru/konkor-r'));

    function urlGet($urlMed){
        $html = str_get_html($urlMed);
        foreach($html->find('.b-preparation__content') as $post){
            $a = $post->find('.b-preparation-name', 0);
            $div = $post->find('.b-preparation-resume__count', 0);
            echo $a . " - ";
            echo $div . ";ah; ";
             
        }
    }
    echo "yes";