<?php
$testImage = Image::canvas(100, 100, '#ff0000'); // Create a 100x100 red square
Storage::disk('public')->put('logos/test_image.jpg', $testImage->encode());

?>
