<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Languages\MinifiedLanguageResource;
use App\Models\Language;
use Database\Factories\LanguageFactory;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return MinifiedLanguageResource::collection(Language::all());
    }
}
