<?php

use App\Url;
use Illuminate\Support\Str;

if (!function_exists('findUrl')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function findUrl(string $link)
    {
        $short = (string) Str::of(parse_url($link, PHP_URL_PATH))->after('/');

        $url = Url::where('short_url', $short)->first();

        if (!$url) {
            return null;
        }

        return $url;
    }
}

if (!function_exists('getUrlMeta')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getUrlMeta($url)
    {
    $result = false;
   
    $contents = getUrlContents($url);

    if (isset($contents) && is_string($contents))
    {
        $title = null;
        $metaTags = null;
       
        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );

        if (isset($match) && is_array($match) && count($match) > 0)
        {
            $title = strip_tags($match[1]);
        }
       
        preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
       
        if (isset($match) && is_array($match) && count($match) == 3)
        {
            $originals = $match[0];
            $names = $match[1];
            $values = $match[2];
           
            if (count($originals) == count($names) && count($names) == count($values))
            {
                $metaTags = array();
               
                for ($i=0, $limiti=count($names); $i < $limiti; $i++)
                {
                    $metaTags[$names[$i]] = array (
                        'html' => htmlentities($originals[$i]),
                        'value' => $values[$i]
                    );
                }
            }
        }
       
        $result = array (
            'title' => $title,
            'metaTags' => $metaTags
        );
    }
   
    return $result;
    }
}

if (!function_exists('getUrlContents')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
    {
        $result = false;
    
        $contents = @file_get_contents($url);
    
        // Check if we need to go somewhere else
    
        if (isset($contents) && is_string($contents))
        {
            preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);
        
            if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1)
            {
                if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections)
                {
                    return getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
                }
            
                $result = false;
            }
            else
            {
                $result = $contents;
            }
        }
    
        return $contents;
    }
}
