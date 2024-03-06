<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-5">
    <div class="grid grid-cols-1">
        <div class="col-span-1">
            <div class="card">
                <div class="card-header bg-gray-200 py-3 px-4">
                    <h4 class="text-lg font-semibold">Categories
                        <a href="{{ url('categories/create') }}" class="btn btn-primary float-right bg-blue-500 text-white px-3 py-1 rounded-md">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td class="border px-4 py-2">{{$item->id}}</td>
                                <td class="border px-4 py-2">{{$item->name}}</td>
                                <td class="border px-4 py-2">{{$item->description}}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ url('categories/'.$item->id.'/edit') }}" class="btn btn-success mx-2 bg-green-500 text-white px-3 py-1 rounded-md">Edit</a>
                                    <a href="{{ url('categories/'.$item->id.'/delete') }}" class="btn btn-danger mx-1 bg-red-500 text-white px-3 py-1 rounded-md" onclick="return confirm('Are you sure ?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
