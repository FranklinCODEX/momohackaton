<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Application de don en ligne",
 *     version="1.0.0",
 *     description="API du projet de don en ligne ",
 *     @OA\Contact(
 *         email="zinmonsesylvie@gmail.com",
 *         name="ZINMONSE Sylvie"
 *     ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
