<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

/**
 * Class FaqController
 * @package App\Http\Controllers
 */
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate();

        return view('faq.index', compact('faqs'))
            ->with('i', (request()->input('page', 1) - 1) * $faqs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faq = new Faq();
        return view('faq.create', compact('faq'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Faq::$rules);

        $faq = Faq::create($request->all());

        return redirect()->route('faqs.index')
            ->with('success', 'Faq created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);

        return view('faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);

        return view('faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        request()->validate(Faq::$rules);

        $faq->update($request->all());

        return redirect()->route('faqs.index')
            ->with('success', 'Faq updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $faq = Faq::find($id)->delete();

        return redirect()->route('faqs.index')
            ->with('success', 'Faq deleted successfully');
    }
}
