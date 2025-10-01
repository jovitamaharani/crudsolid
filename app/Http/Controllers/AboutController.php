<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\AboutInterface;
use App\Http\Requests\AboutRequest;
use Illuminate\Http\RedirectResponse;

class AboutController extends Controller
{
    private AboutInterface $about;
    
    // construct berfungsi untuk menjadikan model menjadi sebuah object
    public function __construct(AboutInterface $about)
    {
        $this->about = $about;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = $this->about->get();
        return view('student.about', compact('abouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request, About $about)
    {
        $store = $this->service->store($request);

        $this->about->store($request->validated());

        return back()->with('success', 'berhasil menambah data!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about): RedirectResponse
    {
        $store = $this->service->update($request, $about);
        $this->about->update($about->id, $request->validated());
        return back()->with('success', 'berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about): RedirectResponse
    {
        $this->about->delete($about->id);
        $this->service->remove($about->photo);
        return back()->with('success', 'berhasil menghapus data');
    }
}