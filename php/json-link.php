<?php
/**
 * $url:(required) UTF-8 encoded string to resource to play
 * $aspect:(required), blank string to use default width/height, or pass in one of the following
 *  "a3_2" = 3:2 (35 MM)
 *  "a4_3" = 4:3 (OLD TV)
 *  "a16_9" = 16:9 (HDTV)
 *  "a16_10" = 16:10 (COMPUTER MONITORS)
 *  "a1.43_1" = 1.43:1 (IMAX)
 *  "a1.85_1" = 1.85:1 (OLD CIMENA)
 *  "a2.35_1" = 2.35:1 (CURRENT CINEMA)
 *  "a2.39_1" = 2.39:1 (CURRENT CINEMA)
 *  "a1_1" = 1:1 (Square)
 * $playbacktype: (required) one of the following
 *  For 2D Content
 *      "2d" = 2D
 *      "2d.180" = 2D 180 Dome</option>
 *      "2d.360" = 2D 360</option>
 *      "2d.ffd" = 2D Front Full Dome</option>
 *  For 3D Left/Right Content
 *      "sbs" = 3D Left/Right
 *      "sbs.180" = 3D 180 Dome Left/Right
 *      "sbs.360" = 3D 360 Left/Right
 *      "sbs.ffd" = 3D Front Full Dome Left/Right
 *  For 3D Top/Bottom
 *      "sbs" = 3D Over Under
 *      "sbs.360" = 3D 360 Over Under
 * $limits: (required) set to 0 to ignore, 255 to limit everything, or add the following to limit features together
 *  1: Playback Types
 *  2: Presets
 *  4: Favorite Playback Type
 *  8: Navigation
 *  16: Content Browser
 *  32: Switch User
 *  64: Move Position
 *  128: More Options
 */
function linkToMVRS($url, $aspect, $playbacktype, $limits) {
    $map =array();
    $map['url']  = $url;
    if (strlen($aspect) > 0) {
        $map['aspect']  = $aspect;
    }
    $map['type'] = $playbacktype;
    if ($limits > 0) {
        $map['limit']  = $limits;
    }
    $result = base64_encode(json_encode($map, JSON_FORCE_OBJECT));
    $result = str_replace("=","", $result);
    return "http://webvr.mobilevrstation.com/j/".$result;
}

// Examples

// Example to 2D
//echo linkToMVRS('http://videourl.mp4', "", '2d', 0);
// Example to 2D With Firced 16:9 Aspect
//echo linkToMVRS('http://videourl.mp4', "a16_9", '2d', 0);
// Example to 2D With Limited UI
//echo linkToMVRS('http://videourl.mp4', "", '2d', 255);

// Example to 3D Front Full Dome
//echo linkToMVRS('http://videourl.mp4', "", 'sbs.ffd', 0);
// Example to 3D Front Full Dome With Limited UI
//echo linkToMVRS('http://videourl.mp4', "", 'sbs.ffd', 255);

// Example to 3D Dome
//echo linkToMVRS('http://videourl.mp4', "", 'sbs.180', 0);
// Example to 3D Dome With Limited UI
//echo linkToMVRS('http://videourl.mp4', "", 'sbs.180', 255);
?>