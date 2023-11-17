<?php

namespace App\Http\Controllers;

use App\Models\typeequipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeequipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeequipments = typeequipment::all();

        return Response()->json([
            'status' => true,
            'data' => $typeequipments ?? [],
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

        $typeequipment = typeequipment::create([
            'name' => $request->name
        ]);

        $typeequipment->save();

        return Response()->json([
            'status' => true,
            'data' => $typeequipment ?? []
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
        $typeequipment = typeequipment::find($id);

        if (!$typeequipment) {
            return response()->json(['message' => 'Item no encontrada'], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $typeequipment
        ], 200);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(typeequipment $typeequipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $typeequipment = typeequipment::find($id);

        if (!$typeequipment) {
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

        $typeequipment->name = $request->name;
        $typeequipment->save();

        return response()->json([
            'status' => true,
            'data' => $typeequipment,
            'message' => 'Item actualizado exitosamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $typeequipment = typeequipment::find($id);

        if (!$typeequipment) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $typeequipment->delete();

        return response()->json([
            'status' => true,
            'data' => $typeequipment,
            'message' => 'Item eliminado exitosamente'
        ], 200);
    }
}
