<?php

namespace wokaextend\components\qrcode\lib;

/**
 * Class Image
 *
 */
class Image
{

    /**
     * @param $frame
     * @param bool $filename
     * @param int $pixelPerPoint
     * @param int $outerFrame
     * @param bool $saveAndPrint
     * @param RgbColor $fgColor
     * @param RgbColor $bgColor
     */
    public static function png(
        $frame,
        $filename = false,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $saveAndPrint = false,
        RgbColor $fgColor = null,
        RgbColor $bgColor = null
    ) {

        $image = static::image($frame, $pixelPerPoint, $outerFrame, $fgColor, $bgColor);

        if ($filename === false) {
            Header("Content-type: image/png");
            ImagePng($image);
        } else {
            ImagePng($image, $filename);
            if ($saveAndPrint === true) {
                header("Content-type: image/png");
                ImagePng($image);
            }
        }

        ImageDestroy($image);
    }

    /**
     * @param $frame
     * @param bool $filename
     * @param int $pixelPerPoint
     * @param int $outerFrame
     * @param bool $saveAndPrint
     * @param RgbColor $fgColor
     * @param RgbColor $bgColor
     * @param int $q
     */
    public static function jpg(
        $frame,
        $filename = false,
        $pixelPerPoint = 8,
        $outerFrame = 4,
        $saveAndPrint = false,
        RgbColor $fgColor = null,
        RgbColor $bgColor = null,
        $q = 85
    ) {

        $image = static::image($frame, $pixelPerPoint, $outerFrame, $fgColor, $bgColor);

        if ($filename === false) {
            Header("Content-type: image/jpeg");
            ImageJpeg($image, null, $q);
        } else {
            ImageJpeg($image, $filename, $q);

            if ($saveAndPrint === true) {
                Header("Content-type: image/jpeg");
                ImageJpeg($image, null, $q);
            }
        }


        ImageDestroy($image);
    }

    /**
     * @param $frame
     * @param int $pixelPerPoint
     * @param int $outerFrame
     * @param RgbColor $fgColor
     * @param RgbColor $bgColor
     *
     * @return resource
     */
    protected static function image(
        $frame,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        RgbColor $fgColor = null,
        RgbColor $bgColor = null
    ) {
        $h = count($frame);
        $w = strlen($frame[0]);

        $imgW = $w + 2 * $outerFrame;
        $imgH = $h + 2 * $outerFrame;

        $base_image = ImageCreate($imgW, $imgH);

        if ($fgColor === null)
            $fgColor = new RgbColor(0, 0, 0);
        if ($bgColor === null)
            $bgColor = new RgbColor ();

        $col[0] = ImageColorAllocate($base_image, $bgColor->red, $bgColor->green, $bgColor->blue);
        $col[1] = ImageColorAllocate($base_image, $fgColor->red, $fgColor->green, $fgColor->blue);

        imagefill($base_image, 0, 0, $col[0]);

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                if ($frame[$y][$x] == '1')
                    ImageSetPixel($base_image, $x + $outerFrame, $y + $outerFrame, $col[1]);
            }
        }

        $target_image = ImageCreate($imgW * $pixelPerPoint, $imgH * $pixelPerPoint);
        ImageCopyResized(
            $target_image,
            $base_image,
            0,
            0,
            0,
            0,
            $imgW * $pixelPerPoint,
            $imgH * $pixelPerPoint,
            $imgW,
            $imgH
        );
        ImageDestroy($base_image);

        return $target_image;
    }

}