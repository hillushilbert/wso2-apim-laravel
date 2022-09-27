<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TreinamentoController extends Controller
{

    //
    public function __construct()
    {
        
    }

    public function index(Request $index)
    {
        
        $tags = Treinamento::paginate(25);

        return response()->json($tags,200);
    }

    public function show(Request $request,$id)
    {
        
        $tag = Treinamento::findOrFail($id); 
        $tag->studies;
        return response()->json(['data'=>$tag],200);
    }

    public function store(Request $request)
    {
        
        try
		{
			$this->validate($request, [
                'name'       => 'required|max:255',
            ]);

            
            $find = $request->only(['name']);
            $tag = Treinamento::firstOrNew($find);

            $requestData = $request->only(['name']);
            
            $tag->fill($requestData);
            $tag->save();

            
            return response()->json(['data'=>$tag], 201);
		}
        catch(\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
			return response()->json(['errors'=>$e->getMessage()], 400);
		}
        catch(\Illuminate\Validation\ValidationException $e)
        {
        	return response()->json(['errors'=>$e->errors()], 422);
		}
        catch (\Exception $e)
        {
            DB::rollBack();
		    return response()->json(['errors'=>$e->getMessage()], 400);
        }
    }

    public function update(Request $request,$id)
    {
        
        try
		{
            $this->validate($request, [
                'name'       => 'required|max:255',
            ]);

            DB::beginTransaction();

            
            $tag = Treinamento::findOrFail($id);

            // verifica se já existe uma tag com mesmo nome
            $tagOriginal = Treinamento::where('name',$request->name)->first();

            //Estudos 
            $estudos = [];
            foreach($tag->studies as $estudo)
            {
                $estudos[] = $estudo->id;
            }
            
            if($tagOriginal)
            {
                $tag->studies()->detach($estudos);
                $tag->delete();
                foreach($estudos as $estudo)
                {
                    if($tagOriginal->studies()->where('studies_tags.study_id',$estudo)->count() > 0)
                    continue;

                    $tagOriginal->studies()->attach($estudo);
                }
                $tag = $tagOriginal;   
            }
            else
            {
                $requestData = $request->only(['name']);
            
                $tag->update($requestData);    
            }

            DB::commit();
            
            return response()->json(['data'=>$tag], 200);
		}
        catch(\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
			return response()->json(['errors'=>$e->getMessage()], 400);
		}
        catch(\Illuminate\Validation\ValidationException $e)
        {
        	return response()->json(['errors'=>$e->errors()], 422);
		}
        catch (\Exception $e)
        {
            DB::rollBack();
		    return response()->json(['errors'=>$e->getMessage()], 400);
        }
    }

    public function destroy(Request $request,$id)
    {
        
        try
		{
            DB::beginTransaction();
            
            $tag = Treinamento::findOrFail($id);

            $tag->studies()->detach();
            Treinamento::destroy($id);

            DB::commit();
            return response(null,204);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
			return response()->json(['errors'=>$e->getMessage()], 400);
		}
        catch(\Illuminate\Validation\ValidationException $e)
        {
        	return response()->json(['errors'=>$e->errors()], 422);
		}
        catch (\Exception $e)
        {
            DB::rollBack();
		    return response()->json(['errors'=>$e->getMessage()], 400);
        }
    } 
}
