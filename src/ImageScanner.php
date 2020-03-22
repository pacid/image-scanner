<?php

namespace TestExam;

class ImageScanner
{
    public static function fetch(string $url)
    {
        $htmlDocument = DocumentFetcher::fetch($url);
        $imageUrls = ImageUrlExtractor::extract($htmlDocument, $url);
        return ImageDetailsProvider::decorateWithDimensions($imageUrls);
    }
}
