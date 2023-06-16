<?php

namespace App\Http\Controllers\Admin;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Type;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::paginate(4);
        return view('admin.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $languages = Language::all();
        return view('admin.create', compact('types', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $newWork = Work::create($data);
        if($request->has('languages')){
            $newWork->languages()->attach($request->languages);
            dd($newWork);
        }
        return redirect()->route('admin.works.show', $newWork->slug)->with('message', "Il lavoro: \"$newWork->name\" è stato creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('admin.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $types = Type::all();
        $languages = Language::all();
        return view('admin.edit', compact('work', 'types', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $data = $request->all();
        $work->update($data);
        if($request->has('languages')){
            $work->languages()->sync($request->languages);
        } else {
            $work->languages()->sync([]);
        }
        return redirect()->route('admin.works.show', $work->slug)->with('message', "Il lavoro: \"$work->name\" è stato modificato con successo");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.works.index')->with('message', "Il lavoro: \"$work->name\" è stato eliminato con successo!");
    }
}
