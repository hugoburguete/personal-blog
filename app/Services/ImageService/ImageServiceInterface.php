<?php

namespace ProgrammingBlog\Services\ImageService;

interface ImageServiceInterface
{
	/**
	 * Stores a specific image
	 * 
	 * @param  mixed $asset The asset
	 * @return array        New asset destination information
	 */
	public function store($asset);

	/**
	 * Resizes an asset
	 *
	 * @param  string $imageSize The image size to be regenerated
	 * @return void
	 */
	public function resize(string $assetPath, ?string $imageSize = null);
}