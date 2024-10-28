<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreDocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function store(StoreDocumentRequest $request)
    {
        Documents::setProject($request->input('projectId'))
            ->store($request->input('documents'));
        return responseCreated();
    }
}
