<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function store(StoreDocumentRequest $request)
    {
        Documents::setProject($request->input('projectId'))
            ->store($request->input('documents'));
        return responseCreated();
    }

    public function index(Request $request)
    {
        return Documents::index($request->get('projectId'));
    }
}
