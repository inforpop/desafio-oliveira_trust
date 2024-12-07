<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx'
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        if (Upload::where('file_name', $fileName)->exists()) {
            return response()->json(['message' => 'File already exists'], 400);
        }

        $filePath = $file->storeAs('uploads', $fileName);
        Upload::create(['file_name' => $fileName]);

        // Aqui você pode implementar a lógica para processar o arquivo
        
        return response()->json(['message' => 'File uploaded successfully'], 200);
    }

    public function history(Request $request)
    {
        $query = Upload::query();

        if ($request->has('file_name')) {
            $query->where('file_name', $request->input('file_name'));
        }

        if ($request->has('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        return response()->json($query->get());
    }

    public function search(Request $request)
    {
        $query = DB::table('uploads');

        if ($request->has('TckrSymb')) {
            $query->where('TckrSymb', $request->input('TckrSymb'));
        }

        if ($request->has('RptDt')) {
            $query->where('RptDt', $request->input('RptDt'));
        }

        if (!$request->has('TckrSymb') && !$request->has('RptDt')) {
            return response()->json($query->paginate(10));
        }

        return response()->json($query->get());
    }
    use Swagger\Annotations as SWG;

    /**
     * @SWG\Post(
     *     path="/api/upload",
     *     summary="Upload de arquivo",
     *     @SWG\Parameter(
     *         name="file",
     *         in="formData",
     *         required=true,
     *         type="file",
     *         description="Arquivo para upload (CSV ou XLSX)"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Sucesso",
     *         @SWG\Schema(
     *             @SWG\Property(property="message", type="string")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Erro"
     *     )
     * )
     */
    public function upload(Request $request)
    {
        // Implementação do método
    }
    
}
