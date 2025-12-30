<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

 public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'images' => 'nullable|array|max:10',
        'images.*' => 'image|max:2048',
        'features' => 'nullable|array',
        'youtube_url' => 'nullable|url',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('services', 'public');
    }

    if ($request->hasFile('images')) {
        $paths = [];
        foreach ($request->file('images') as $img) {
            $paths[] = $img->store('services', 'public');
        }
        $data['images'] = $paths;
    }

    Service::create($data);

    return redirect()->route('admin.services.index')->with('success', 'Service created');
}


    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

public function update(Request $request, Service $service)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'images' => 'nullable|array|max:10',
        'images.*' => 'image|max:2048',
        'features' => 'nullable|array',
        'youtube_url' => 'nullable|url',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        if ($service->image) {
            \Storage::disk('public')->delete($service->image);
        }
        $data['image'] = $request->file('image')->store('services', 'public');
    }

    if ($request->hasFile('images')) {
        if ($service->images) {
            foreach ($service->images as $old) {
                \Storage::disk('public')->delete($old);
            }
        }

        $paths = [];
        foreach ($request->file('images') as $img) {
            $paths[] = $img->store('services', 'public');
        }
        $data['images'] = $paths;
    }

    $service->update($data);

    return redirect()->route('admin.services.index')->with('success', 'Service updated');
}

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return back()->with('success', 'Service deleted');
    }
}
