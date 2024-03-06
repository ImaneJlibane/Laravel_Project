<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1">

            @if (session('status'))
                <div class="bg-green-200 text-green-800 px-4 py-2 mb-4">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-200 px-4 py-3 border-b border-gray-300">
                    <h4 class="text-lg font-semibold">Edit Product
                        <a href="{{ route('products.index') }}" class="btn btn-primary float-right text-white bg-blue-500 px-3 py-1 rounded-md">Back</a>
                    </h4>
                </div>
                <div class="px-4 py-3">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block">Name</label>
                            <input type="text" id="name" name="name" class="form-input w-full rounded-md" value="{{ $product->name }}" />
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block">Description</label>
                            <textarea id="description" name="description" class="form-textarea w-full rounded-md" rows="3">{{ $product->description }}</textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block">Upload File/Image</label>
                            <input type="file" id="image" name="image" class="form-input w-full rounded-md" />
                            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                            <img src="{{ asset($product->image) }}" class="mt-2 h-20 w-20 object-cover" alt="Product Image" />
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block">Category</label>
                            <select name="category_id" id="category_id" class="form-select w-full rounded-md">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
