<?php

namespace App\Http\Controllers\Backend\Transformer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Transformer\TransformerRepository;
use App\Repositories\Backend\Street\StreetRepository;
use App\Models\Street\Street;
use App\Models\Transformer\Transformer;
use App\Http\Requests\Backend\Transformer\StoreTransformerRequest;
use App\Http\Requests\Backend\Transformer\ManageTransformerRequest;
use App\Http\Requests\Backend\Transformer\UpdateTransformerRequest;

class TransformerController extends Controller
{
    protected $transformer;

    /**
     * @param TransformerRepository $transformer
     */
    public function __construct(TransformerRepository $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.transformer.index')->withTransformer($this->transformer->getForDataTable()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streets = Street::all();
       
        return view('backend.transformer.create', compact('streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransformerRequest $request)
    {
        $this->transformer->create([
            'data' => $request->except('_token','_method'),
        ]);

        return redirect()->route('admin.transformer.index')->withFlashSuccess(trans('alerts.backend.transformer.created'));
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
    public function edit(Transformer $transformer)
    {
        $streets = Street::all();
        return view('backend.transformer.edit', compact('streets'))
            ->withTransformer($transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Transformer $transformer, UpdateTransformerRequest $request)
    {
        $this->transformer->update($transformer,
            [
                'data' => $request->except('_token','_method'),
            ]);

        return redirect()->route('admin.transformer.index')->withFlashSuccess(trans('alerts.backend.transformer.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transformer $transformer)
    {
        $this->transformer->delete($transformer);

        return redirect()->route('admin.transformer.index')->withFlashSuccess(trans('alerts.backend.transformer.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTransformer($id)
    {
        $transformer = Transformer::find($id);
        
        $this->transformer->delete($transformer);

        return redirect()->route('admin.transformer.index')->withFlashSuccess(trans('alerts.backend.transformer.deleted'));
    }
}