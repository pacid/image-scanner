<?php

namespace TestExam;

class ImageUrlExtractor
{
    public static function extract(string $document, $url): array
    {
        $pattern = '/< *img[^>]*src *= *["\']?([^"\']*)/i';

        preg_match_all($pattern, $document, $matches);
        return array_unique(self::makeCompleteUrls($matches[1], $url));
    }

    /**
     * Because the image tags
     *
     * @param array $imageUrls
     * @param string $fullUrl
     * @return array
     */
    private function makeCompleteUrls(array &$imageUrls, string $fullUrl)
    {
        foreach ($imageUrls as $key => $imageUrl) {
            $newImageUrl = $imageUrl;

            if ($cleanUrl = substr($imageUrl, 0, 2) === '//') {
                $urlInfo = parse_url($fullUrl);
                $newImageUrl = $urlInfo['scheme'] . '://' ;
                $newImageUrl = $newImageUrl . substr($imageUrl, 2);
            } elseif ($cleanUrl = substr($imageUrl, 0, 1) === '/') {
                $urlInfo = parse_url($fullUrl);
                $newImageUrl = $urlInfo['scheme'] . '://' . $urlInfo['host'] . '/';
                $newImageUrl = $newImageUrl . substr($imageUrl, 1);
            }

            $imageUrls[$key] = $newImageUrl;
        }

        return $imageUrls;
    }
}
