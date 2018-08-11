<?php

namespace ProgrammingBlog\Services\ImageService;

/**
 * TODO: Read: http://php.net/manual/en/book.image.php
 */
class DefaultImageService extends BaseImageService
{
	/**
	 * Stores an uploaded asset
	 *
	 * @param  mixed $thumbnail The thumbnail
	 * @return string           The image path
	 */
	public function store($thumbnail)
	{
        if (!empty($thumbnail)) {
            $extension = $thumbnail->extension();
            $path = $thumbnail->storeAs(
                'public/thumbnails', 'thumbnail-' . $post->id . '.' .$extension
            );

            $post->thumbanil_url = $path;
        }
	}

	/**
	 * Resizes an asset
	 *
	 * @param  string $imageSize The image size to be regenerated
	 * @return void
	 */
	public function resize(string $assetPath, ?string $imageSize = null)
	{
		
	}

}