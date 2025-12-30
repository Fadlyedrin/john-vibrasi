<div x-data="{ count: {{ isset($product) ? count($product->images ?? []) : 3 }} }"
     class="admin-card p-6 space-y-6">

    <div>
        <label class="form-label">Product Name</label>
        <input name="name"
               value="{{ old('name', $product->name ?? '') }}"
               class="form-input"
               required>
    </div>

    <div>
        <label class="form-label">Description</label>
        <textarea name="description"
                  class="form-input">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="form-label">Main Image</label>
        @isset($product)
            <img src="{{ $product->image_url }}" class="w-32 h-32 rounded-xl mb-3">
        @endisset
        <input type="file" name="image" class="form-input">
    </div>

    <div>
        <label class="form-label">Gallery Images (Max 10)</label>

        <input type="number"
               min="1"
               max="10"
               x-model.number="count"
               class="form-input w-24 mb-4">

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            <template x-for="i in count" :key="i">
                <input type="file" name="images[]" class="form-input">
            </template>
        </div>
    </div>

    @isset($product)
        @if($product->images_url->count())
            <div class="grid grid-cols-3 gap-3">
                @foreach($product->images_url as $img)
                    <img src="{{ $img }}" class="h-24 rounded-xl object-cover">
                @endforeach
            </div>
        @endif
    @endisset

    <label class="flex gap-2 items-center">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
        Active
    </label>

</div>
