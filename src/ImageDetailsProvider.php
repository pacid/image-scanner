<?php

namespace TestExam;

use Exception;

class ImageDetailsProvider
{
    /**
     * @param array $imagesPaths
     * @return array
     * @throws Exception
     */
    public static function decorateWithDimensions(array $imagesPaths): array
    {
        $randomFileName = bin2hex(random_bytes(20));
        $newImagePaths = [];
        foreach ($imagesPaths as $imagesPath) {
            $newFilenameWithPath = '/tmp/' . $randomFileName;

            file_put_contents($newFilenameWithPath, file_get_contents($imagesPath));
            list($width, $height) = getimagesize($newFilenameWithPath);
            $newImagePaths[] = [$imagesPath, $width, $height];
            unlink($newFilenameWithPath);
        }
        return $newImagePaths;
    }
}
