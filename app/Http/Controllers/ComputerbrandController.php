<?php

namespace App\Http\Controllers;

use App\Models\computerbrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ComputerbrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computerbrands = computerbrand::all();

        return Response()->json([
            'status' => true,
            'data' => $computerbrands ?? [],
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:computerbrands',
        ], [
            'name.required' => 'El campo Item es obligatorio',
            'name.unique' => 'El Item ya se encuentra registrado'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $computerbrand = computerbrand::create([
            'name' => $request->name
        ]);

        $computerbrand->save();

        return Response()->json([
            'status' => true,
            'data' => $computerbrand ?? []
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $computerbrand = computerbrand::find($id);

        if (!$computerbrand) {
            return response()->json(['message' => 'Item no encontrada'], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $computerbrand
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(computerbrand $computerbrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $computerbrand = computerbrand::find($id);

        if (!$computerbrand) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:computerbrands,name,' . $id,
        ], [
            'name.required' => 'El campo Item es obligatorio',
            'name.unique' => 'El Item ya se encuentra registrado'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $computerbrand->name = $request->name;
        $computerbrand->save();

        return response()->json([
            'status' => true,
            'data' => $computerbrand,
            'message' => 'Item actualizado exitosamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $computerbrand = computerbrand::find($id);

        if (!$computerbrand) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $computerbrand->delete();

        return response()->json([
            'status' => true,
            'data' => $computerbrand,
            'message' => 'Item eliminado exitosamente'
        ], 200);
    }
}
