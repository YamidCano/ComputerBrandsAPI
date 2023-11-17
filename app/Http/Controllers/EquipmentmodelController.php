<?php

namespace App\Http\Controllers;

use App\Models\equipmentmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipmentmodels = equipmentmodel::all();

        return Response()->json([
            'status' => true,
            'data' => $equipmentmodels ?? [],
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'El campo Item es obligatorio'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $equipmentmodel = equipmentmodel::create([
            'id_brand' => $request->idBrand,
            'id_brand' => $request->idBrand,
            'name' => $request->name
        ]);

        $equipmentmodel->save();

        return Response()->json([
            'status' => true,
            'data' => $equipmentmodel ?? []
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
        $equipmentmodel = equipmentmodel::find($id);

        if (!$equipmentmodel) {
            return response()->json(['message' => 'Item no encontrada'], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $equipmentmodel
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(equipmentmodel $equipmentmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $equipmentmodel = equipmentmodel::find($id);

        if (!$equipmentmodel) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'El campo Item es obligatorio'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $equipmentmodel->name = $request->name;
        $equipmentmodel->id_brand = $request->idBrand;
        $equipmentmodel->save();

        return response()->json([
            'status' => true,
            'data' => $equipmentmodel,
            'message' => 'Item actualizado exitosamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipmentmodel = equipmentmodel::find($id);

        if (!$equipmentmodel) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $equipmentmodel->delete();

        return response()->json([
            'status' => true,
            'data' => $equipmentmodel,
            'message' => 'Item eliminado exitosamente'
        ], 200);
    }
}
