<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto">
        <h2 class="font-bold  text-center">Edit Product</h2>
        <form action="{{url('products/'. $product->id .'/update')}}" id="products-form" method="post"
            class="max-w-md mx-auto bg-white p-3 rounded shadow-md">
            @csrf
            <div class="mb-1">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" autofocus name="name" class="w-full border border-gray-300 p-2 rounded"
                    value="{{ $product->name }}" />
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                    <span class="text-red-500">{{ $errors->first('name.alphanumeric') }}</span>
                    <span class="text-red-500">{{ $errors->first('name.regex') }}</span>
                    <span class="text-red-500">{{ $errors->first('name.unique') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="stock" class="block text-gray-700 font-bold mb-2">Stock:</label>
                <input type="stock" id="stock" name="stock" class="w-full border border-gray-300 p-2 rounded"
                    value="{{ $product->stock }}" />
                @if ($errors->has('stock'))
                    <span class="text-red-500">{{ $errors->first('stock') }}</span>
                    <span class="text-red-500">{{ $errors->first('stock.integer') }}</span>
                @endif
            </div>

            <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
            <div class="mb-1">
                <input type="radio" name="status" id="status" value="Active" {{ $product->status === "Active" ? 'checked' : '' }} />
                <label for="status">Active</label>
                <input type="radio" name="status" id="status" value="In-Active" {{ $product->status === "In-Active" ? 'checked' : '' }} />
                <label for="status">In-Active</label></br>
                @if ($errors->has('status'))
                    <span class="text-red-500">{{ $errors->first('stock') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
                <input id="price" name="price" rows="4" class="w-full border border-gray-300 p-2 rounded" value="{{ $product->price }}" />
                @if ($errors->has('price'))
                    <span class="text-red-500">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="s_k_u" class="block text-gray-700 font-bold mb-2">SKU ( Stock Keeping Unit ):</label>
                <select name="s_k_u" id="s_k_u" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value = "{{ $product->s_k_u }}">
                    <option>Select SKU type</option>
                    <option value="kilo grams"{{ $product->s_k_u === "Kilo grams" ? 'selected' : '' }}>Kilo grams</option>
                    <option value="Litres"{{ $product->s_k_u === "Litres" ? 'selected' : ''}}>Litres</option>
                    <option value="Bunches"{{ $product->s_k_u === "Bunches" ? 'selected' : ''}}>Bunches</option>
                    <option value="Pieces"{{ $product->s_k_u === "Pieces" ? 'selected' : ''}}>Pieces</option>
                    <option value="grams"{{ $product->s_k_u === "Grams" ? 'selected' : ''}}>Grams</option>
                    <option value="Boxes"{{ $product->s_k_u === "Boxes" ? 'selected' : ''}}>Boxes</option>
                    <option value="No."{{ $product->s_k_u === "No." ? 'selected' : ''}}>No.</option>
                    <option value="Packets"{{ $product->s_k_u === "Packets" ? 'selected' : ''}}>Packets</option>
                </select></br>
                @if ($errors->has('s_k_u'))
                    <span class="text-red-500">{{ $errors->first('s_k_u') }}</span>
                @endif
            </div>

            <div class="mb-1 text-center">
                <button type="submit" class="bg-green-600 hover:bg-green-400 text-white py-1 px-3 border-b-4 border-green-700 hover:border-green-500 rounded">Update</button>
            </a>
                <a href="/products"
                    class="bg-blue-500 hover:bg-blue-400 text-white py-1 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Back</a>
                <a href="/index"
                    class="bg-blue-500 hover:bg-blue-400 text-white py-1 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Home</a>
            </div>
        </form>
    </div>

</body>
</html>
