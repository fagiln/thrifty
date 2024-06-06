<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\slider\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderStoreReq;
use App\Http\Requests\Slider\SliderUpdateReq;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('seller.slider.sliderlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showadd()
    {
        return view('seller.slider.addslider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreReq $request)
    {
        $image = $request->file('file');
        $data = $request->validated();
        $image_name = 'slider-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $image_name);
        Slider::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image_path' => $image_name,
        ]);
        return redirect('seller/slider-list')->with(['status'=>'Slider berhasil di buat']);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        return view('seller.slider.editslider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateReq $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file')) {
            if ($slider->image_path && file_exists(public_path('uploads/' . $slider->image_path))) {
                unlink(public_path('uploads/' . $slider->image_path));
            }

            // Upload new image
            $image = $request->file('file');
            $image_name = 'slider-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);

            // Update the image path in the data array
            $data['image_path'] = $image_name;
        }
        $slider->update($data);
        return redirect('seller/slider-list')->with(['status'=>'Update Slider berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        unlink(public_path('uploads/' . $slider->image_path));
        return with(['status'=>'Slider berhasil di hapus']);

    }
}
