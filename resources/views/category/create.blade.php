<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1">

            @if (session('status'))
                <div class="bg-green-200 text-green-800 px-4 py-2 mb-4">{{session('status')}}</div>
            @endif

            <div class="bg-white shadow-md rounded-md">
                <div class="bg-gray-200 px-4 py-3 border-b border-gray-300">
                    <h4 class="text-lg font-semibold">Add Categories
                        <a href="{{ url('categories') }}" class="btn btn-primary float-right text-white bg-blue-500 px-3 py-1 rounded-md">Back</a>
                    </h4>
                </div>
                <div class="px-4 py-3">
                    <form action="{{ url('categories/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block">Name</label>
                            <input type="text" id="name" name="name" class="form-input w-full rounded-md" value="{{ old('name') }}" />
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block">Description</label>
                            <textarea id="description" name="description" class="form-textarea w-full rounded-md" rows="3">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="is_active" class="inline-flex items-center">
                                <input type="checkbox" id="is_active" name="is_active" class="form-checkbox" {{ old('is_active') == true ? 'checked':'' }}>
                                <span class="ml-2">Is Active</span>
                            </label>
                            @error('is_active') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block">Upload File/Image</label>
                            <input type="file" id="image" name="image" class="form-input w-full rounded-md" />
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
