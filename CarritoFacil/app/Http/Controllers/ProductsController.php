<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request);
        $options = [
            'titulo' => $request->title, //form.blade.php
            'descripcion' => $request->descripcion,
            'imagen_url' => $request->title,
            'precio' => $request->precio
        ];
        if(Producto::create($options)){
            return redirect('/');
        }else{
            return redirect('products.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }







    public function import(){
        return view('products.import');
    }


    // ------------- [ Import Products ] ----------------
    public function importProducts(Request $request) {

        $data = array();

        //  file validation
        $request->validate(["csv_file" => "required",]);
        $file = $request->file("csv_file");
        $csvData = file_get_contents($file);

        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (isset($row[0])) {
                if ($row[0] != "") {
                    $row = array_combine($header, $row);

                    // master lead data
                    $leadData = array(
                        'titulo' => $row["title"],
                        'descripcion' => $row["descripcion"],
                        'imagen_url' => $row["imagen_url"],
                        'precio' => $row["precio"]
                    );

                    // ----------- check if lead already exists ----------------
                    //$checkLead = Producto::where("email", "=", $row["email"])->first();

                    /*if (!is_null($checkLead)) {
                        $updateLead = Producto::where("email", "=", $row["email"])->update($leadData);
                        if($updateLead == true) {
                            $data["status"] = "failed";
                            $data["message"] = "Leads updated successfully";
                        }
                    }

                    else {*/
                    $lead = Producto::create($leadData);
                    if(!is_null($lead)) {
                        $data["status"] = "success";
                        $data["message"] = "Se importo chulada!!";
                    }
                    //}
                }
            }else{
                $data["status"] = "failed";
                $data["message"] = ":(";
            }
        }

        return back()->with($data["status"], $data["message"]);
    }

}
