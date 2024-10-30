<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\GetDocumentsRequest;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Resources\Document\DocumentResource;
use App\Models\Document;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{

    public function store(StoreDocumentRequest $request)
    {
        Documents::setProject($request->input('projectId'))
            ->store($request->input('documents'));
        return responseCreated();
    }

    public function index(GetDocumentsRequest $request)
    {
        return DocumentResource::collection(Documents::setProject($request->get('projectId'))->index());
    }

    public function destroy(Document $document): JsonResponse
    {
        $document->delete();
        return responseOk();
    }
}
