<?php

namespace TestExam;

class DocumentFetcher
{
    /**
     * @param string $url
     * @return bool|string
     */
    public static function fetch(string $url)
    {
        $curl = curl_init();

        if (!$curl) {
            die("Couldn't initialize a cURL handle");
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.2 (+http://www.google.com/bot.html)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $html = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Error from cURL : ' . curl_error($curl);
        }

        curl_close($curl);

        return $html;
    }
}
