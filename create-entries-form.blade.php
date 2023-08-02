<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Entries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="container m-auto bg-white my-4 h-auto p-3 w-1/3 rounded shadow-lg">
        <h3 class="text-center font-bold">Create Entries</h3>
        <form action="/insert-entries" method="post">
            @csrf
            <label for="product_id" class="block text-gray-700 font-bold mb-2">Product :</label>
            <select name="product_id" id="product_id" class="w-full border border-gray-300 p-2 rounded" autofocus>
                <option value="">Select Product Name</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('name'))
                <span class="text-red-500">{{ $errors->first('name') }}</span>
            @endif
            <label for="type" class="block text-gray-700 font-bold mb-2">Type :</label>
            <input type="radio" id="type" name="type"value="In" />
            <label for="in">In</label>
            <input type="radio" id="type" name="type" value="Out" />
            <label for="in">Out</label></br>
            @if ($errors->has('type'))
                <span class="text-red-500">{{ $errors->first('type') }}</span>
            @endif
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity :</label>
            <input type="number" id="quantity" name="quantity" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Enter Quantity" />
            @if ($errors->has('quantity'))
                <span class="text-red-500">{{ $errors->first('quantity') }}</span>
            @endif
            <label for="value" class="block text-gray-700 font-bold mb-2">Value :</label>
            <input type="number" id="value" name="value" class="w-full border border-gray-300 p-2 rounded"
                placeholder="Enter Value" />
            @if ($errors->has('value'))
                <span class="text-red-500">{{ $errors->first('value') }}</span>
            @endif
            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
            <textarea name="description" id="description" name="description" cols="30"
                class="w-full border border-gray-300 p-2 rounded" rows="2" placeholder="Give Entry Description"></textarea>
            @if ($errors->has('description'))
                <span class="text-red-500">{{ $errors->first('description') }}</span>
            @endif
            <label for="date" class="block text-gray-700 font-bold mb-2">Date :</label>
            <input type="date" id="date" name="date"
                class="w-full border border-gray-300 p-2 mb-2 rounded" />
            @if ($errors->has('date'))
                <span class="text-red-500">{{ $errors->first('date') }}</span>
            @endif


            <button type="submit"
            class="grid justify-items-center w-full mb-2 bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded">Submit</button>
            <div class="">
                <a href="/entries" class="bg-blue-600 hover:bg-blue-700 text-white rounded mr-2 px-3 py-1">Back</a>
                <a href="/index" class="bg-blue-600 hover:bg-blue-700 text-white rounded px-3 py-1">Home</a>
            </div>
        </form>
    </div>
</body>

</html>
