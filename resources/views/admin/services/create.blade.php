@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('subtitle', 'Create a new service')

@section('content')
<div class="max-w-3xl">
    <form method="POST"
          action="{{ route('admin.services.store') }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf

        <div x-data="{ galleryCount: 3 }" class="admin-card p-6 space-y-6">

            <!-- TITLE -->
            <div>
                <label class="form-label">
                    Service Title <span class="text-red-400">*</span>
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       required
                       class="form-input"
                       placeholder="e.g., Web Development">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="form-label">
                    Description <span class="text-red-400">*</span>
                </label>
                <textarea name="description"
                          rows="4"
                          required
                          class="form-input"
                          placeholder="Describe the service...">{{ old('description') }}</textarea>
            </div>

            <!-- ICON + SORT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Icon Name</label>
                    <input type="text"
                           name="icon"
                           value="{{ old('icon') }}"
                           class="form-input"
                           placeholder="code, palette, cloud">
                </div>

                <div>
                    <label class="form-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', 0) }}"
                           class="form-input">
                </div>
            </div>

            <!-- MAIN IMAGE -->
            <div>
                <label class="form-label">Main Image</label>
                <input type="file"
                       name="image"
                       accept="image/*"
                       class="form-input">
            </div>

            <!-- GALLERY IMAGES -->
            <div>
                <label class="form-label">
                    Gallery Images <span class="text-white/40">(Max 10)</span>
                </label>

                <!-- JUMLAH INPUT -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-sm text-white/60">
                        Jumlah gambar
                    </span>
                    <input type="number"
                           min="1"
                           max="10"
                           x-model.number="galleryCount"
                           @input="if(galleryCount > 10) galleryCount = 10"
                           class="form-input w-24">
                </div>

                <!-- INPUT FILE LOOP -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <template x-for="i in galleryCount" :key="i">
                        <input type="file"
                               name="images[]"
                               accept="image/*"
                               class="form-input">
                    </template>
                </div>

                <p class="text-xs text-white/40 mt-2">
                    Maksimal 10 gambar. Akan ditampilkan sebagai slider di halaman service.
                </p>
            </div>

            <!-- YOUTUBE -->
            <div>
                <label class="form-label">YouTube Video URL</label>
                <input type="url"
                       name="youtube_url"
                       value="{{ old('youtube_url') }}"
                       class="form-input"
                       placeholder="https://www.youtube.com/watch?v=xxxx">
                <p class="text-xs text-white/40 mt-1">
                    Optional – video proses / demo service
                </p>
            </div>

            <!-- FEATURES -->
            <div>
                <label class="form-label">Features</label>

                <div x-data="{ features: [''] }" class="space-y-2">
                    <template x-for="(feature, index) in features" :key="index">
                        <div class="flex gap-2">
                            <input type="text"
                                   :name="'features[' + index + ']'"
                                   x-model="features[index]"
                                   class="form-input flex-1"
                                   placeholder="Feature item">

                            <button type="button"
                                    x-show="features.length > 1"
                                    @click="features.splice(index, 1)"
                                    class="px-3 py-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30">
                                ✕
                            </button>
                        </div>
                    </template>

                    <button type="button"
                            @click="features.push('')"
                            class="text-primary-400 hover:text-primary-300 text-sm">
                        + Add another feature
                    </button>
                </div>
            </div>

            <!-- STATUS -->
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <span class="text-sm text-white/80">Featured Service</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', true) ? 'checked' : '' }}>
                    <span class="text-sm text-white/80">Active</span>
                </label>
            </div>

        </div>

        <!-- ACTION -->
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="px-6 py-3 rounded-lg btn-primary text-white font-medium">
                Create Service
            </button>

            <a href="{{ route('admin.services.index') }}"
               class="px-6 py-3 rounded-lg bg-white/5 text-white/70 hover:bg-white/10">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection
