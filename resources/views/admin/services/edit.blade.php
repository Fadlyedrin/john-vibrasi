@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('subtitle', 'Update service details')

@section('content')
<div class="max-w-3xl">

    {{-- DELETE MAIN IMAGE --}}
    @if($service->image)
        <form id="delete-image-form"
              method="POST"
              action="{{ route('admin.services.delete-image', $service) }}"
              class="hidden">
            @csrf
        </form>
    @endif

    <form method="POST"
          action="{{ route('admin.services.update', $service) }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        <div
            x-data="{ galleryCount: {{ max(1, count($service->images ?? [])) }} }"
            class="admin-card p-6 space-y-6">

            <!-- TITLE -->
            <div>
                <label class="form-label">
                    Service Title <span class="text-red-400">*</span>
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $service->title) }}"
                       required
                       class="form-input">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="form-label">
                    Description <span class="text-red-400">*</span>
                </label>
                <textarea name="description"
                          rows="4"
                          required
                          class="form-input">{{ old('description', $service->description) }}</textarea>
            </div>

            <!-- SORT -->
            <div>
                <label class="form-label">Sort Order</label>
                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $service->sort_order) }}"
                       class="form-input">
            </div>

            <!-- MAIN IMAGE -->
            <div>
                <label class="form-label">Main Image</label>

                @if($service->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ $service->image_url }}"
                             class="w-32 h-32 rounded-xl object-cover">

                        <button type="button"
                                onclick="if(confirm('Delete this image?')) document.getElementById('delete-image-form').submit()"
                                class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30">
                            Delete
                        </button>
                    </div>
                @endif

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="form-input">
            </div>

            <!-- GALLERY -->
            <div>
                <label class="form-label">
                    Gallery Images <span class="text-white/40">(Max 10)</span>
                </label>

                <!-- JUMLAH -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-sm text-white/60">Jumlah gambar</span>
                    <input type="number"
                           min="1"
                           max="10"
                           x-model.number="galleryCount"
                           @input="if(galleryCount > 10) galleryCount = 10"
                           class="form-input w-24">
                </div>

                <!-- INPUT FILE -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <template x-for="i in galleryCount" :key="i">
                        <input type="file"
                               name="images[]"
                               accept="image/*"
                               class="form-input">
                    </template>
                </div>

                <!-- EXISTING IMAGES -->
                @if(!empty($service->images))
                    <div class="mt-4">
                        <label class="form-label">Current Images</label>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach($service->images as $img)
                                <img src="{{ asset('storage/'.$img) }}"
                                     class="h-24 rounded-xl object-cover">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- YOUTUBE -->
            <div>
                <label class="form-label">YouTube Video URL</label>
                <input type="url"
                       name="youtube_url"
                       value="{{ old('youtube_url', $service->youtube_url) }}"
                       class="form-input"
                       placeholder="https://www.youtube.com/watch?v=xxxx">
            </div>

            <!-- FEATURES -->
            <div>
                <label class="form-label">Features</label>

                @php $features = old('features', $service->features ?? ['']); @endphp

                <div x-data="{ features: @js($features ?: ['']) }" class="space-y-2">
                    <template x-for="(feature, index) in features" :key="index">
                        <div class="flex gap-2">
                            <input type="text"
                                   :name="'features[' + index + ']'"
                                   x-model="features[index]"
                                   class="form-input flex-1">

                            <button type="button"
                                    x-show="features.length > 1"
                                    @click="features.splice(index, 1)"
                                    class="px-3 py-2 rounded-lg bg-red-500/20 text-red-400">
                                ✕
                            </button>
                        </div>
                    </template>

                    <button type="button"
                            @click="features.push('')"
                            class="text-primary-400 text-sm">
                        + Add another feature
                    </button>
                </div>
            </div>

            <!-- STATUS -->
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}>
                    Featured
                </label>

                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                    Active
                </label>
            </div>

        </div>

        <!-- ACTION -->
        <div class="flex gap-4">
            <button class="btn-primary px-6 py-3">
                Update Service
            </button>

            <a href="{{ route('admin.services.index') }}"
               class="px-6 py-3 rounded-lg bg-white/5 text-white/70">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection
