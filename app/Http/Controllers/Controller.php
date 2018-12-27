<?php

namespace ProgrammingBlog\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use ProgrammingBlog\Repositories\PostRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function reply($template, $data = [])
    {
    	$baseData = $this->getBaseData();

    	return view($template, array_merge($baseData, $data));
    }

    public function getBaseData()
    {
        // Atm, I don't need it but leaving it as it may be useful in the future
    	return [];
    }
}
