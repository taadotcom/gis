<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        error_log($request);
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '.' . $file->getClientOriginalName();
                error_log($fileName);
                if ($request->file('file')->storeAs('docs', $fileName)) {
                    return response()->json([
                        'message' => 'File uplpaded successfully!'
                    ]);
                } else {
                    throw new \Exception("Error Processing Request", 1);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fileName)
    {
        $file = storage_path('app/docs/') . $fileName;
        error_log($file);
        $headers = [
            'Content-Type' => 'application/pdf'
        ];
        if (file_exists($file)) {
            return response()->file($file, $headers);
        } else {
            abort(404, 'File not found!');
        }
    }

    public function download($fileName)
    {
        error_log($fileName);
        if (isset($fileName)) {
            return Storage::download('/docs/' . $fileName);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileName)
    {
        //
    }

    public function delete(Request $request)
    {
        error_log($request->filename);
        if (isset($request->filename)) {
            $deleted =  Storage::delete('/docs/' . $request->filename);
            if ($deleted) {
                response()->json(['status' => 'success'], 200);
            } else {
                response()->json(['status' => 'fail'], 500);
            }
        }
    }
}
