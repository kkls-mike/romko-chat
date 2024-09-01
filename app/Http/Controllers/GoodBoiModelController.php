<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GoodBoiModelController extends Controller
{

    public function getModel(): StreamedResponse
    {
        return Storage::disk('models')->download('model.json');
    }

    public function storeModel(Request $request): JsonResponse
    {
        $savedFilesCount = 0;

        /** @var UploadedFile $file */
        foreach ($request->files as $file) {
            Storage::disk('models')->put($file->getClientOriginalName(), $file->getContent());
            $savedFilesCount++;
        }

        return new JsonResponse(['msg' => "Saved $savedFilesCount files"]);
    }

    public function getWeightsFile(Request $request): StreamedResponse
    {
        return Storage::disk('models')->download($request->query('weightsFileName'));
    }
}
