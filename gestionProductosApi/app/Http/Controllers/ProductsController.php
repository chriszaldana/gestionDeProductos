<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todos los productos
        $products = Products::all();
        return response()->json([
            'message' => 'Listado de productos',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos los datos que se van a insertar
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        //Insertamos los datos en la tabla
        $products = Products:: create($request->all());

        //Retornamos un mensaje de éxito
        return response()->json([
            'message' => 'Producto creado correctamente',
            'product' => $products

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
        


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Actualizamos los datos de un producto
        //Validamos los datos que se van a actualizar
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        //Actualizamos los datos en la tabla
        $products = Products::findOrFail($id);
        $products->update($request->all());

        //Retornamos un mensaje de éxito
        return response()->json([
            'message' => 'Producto actualizado correctamente',
            'product' => $products
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products, $id)
    {
        //Eliminar productos
        $products = Products::findOrFail($id);
        $products->delete();
        return response()->json([
            'message' => 'Producto eliminado correctamente'
        ]);
    }
}
