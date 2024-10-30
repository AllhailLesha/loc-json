<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\Document\GetDocumentsRequest;
use App\Http\Requests\Document\ImportTranslationsRequest;
use App\Http\Requests\Document\StoreDocumentRequest;
use App\Http\Resources\Document\DocumentResource;
use App\Models\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DocumentController extends Controller
{

    public function store(StoreDocumentRequest $request): JsonResponse
    {
        Documents::setProject($request->input('projectId'))
            ->store($request->input('documents'));
        return responseCreated();
    }

    public function index(GetDocumentsRequest $request): AnonymousResourceCollection
    {
        return DocumentResource::collection(Documents::setProject($request->get('projectId'))->index());
    }

    public function destroy(Document $document): JsonResponse
    {
        $document->delete();
        return responseOk();
    }

    public function import(ImportTranslationsRequest $request, Document $document)
    {
        Documents::setDocument($document)
            ->import($request->input('lang') ,$request->input('data'));
        return responseOk();
    }
}
