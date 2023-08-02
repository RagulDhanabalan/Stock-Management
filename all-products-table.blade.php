<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    
</head>

<body class="text-gray-700 p-2 w-full mx-auto rounded">
    
    <div class="container p-6 w-80 mx-auto">
        {{-- session message start --}}
        <div>
            @if (Session::has('message'))
                <div class="container mx-auto mt-10 space-y-5">
                    <!-- Alert Success  -->
                    <div class="flex justify-between bg-green-500 shadow-inner rounded p-3">
                        <p class="self-center text-white">
                        {{ Session::get('message') }}
                        </p>
                        <strong class="text-xl align-center text-white cursor-pointer alert-del">&times;</strong>
                    </div>
                    <script>
                        var alert_del = document.querySelectorAll('.alert-del');
                        alert_del.forEach((x) =>
                            x.addEventListener('click', function() {
                                x.parentElement.classList.add('hidden');
                            })
                        );
                    </script>
                    </div>
            @endif
        </div>
        
        {{-- session message end --}}
        <h2 class="text-gray-600 mb-3 font-bold text-center">Products</h2>
        <button class="flex items-center w-full mx-auto">
            <a href="/products/create" title="Add New Product"
                class="mr-1 bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Add
                New</a>

            <a href="/index" title="Home"
                class="bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                Home</a>
        </button>
        <table class="border my-2 w-full table-fixed border-black shadow-lg">

            <thead class="p-2 m-2 border bg-black text-white border-black">
                <tr class="p-2 m-2 border border-black">
                    <th class="p-2 m-2 border border-black">Id</th>
                    <th class="p-2 m-2 border border-black">Name</th>
                    <th class="p-2 m-2 border border-black">Stock</th>
                    <th class="p-2 m-2 border border-black">Status</th>
                    <th class="p-2 m-2 border border-black">Price <small>( &#8377 )</small></th>
                    <th class="p-2 m-2 border border-black">SKU <small class="font-thin">( Stock Keeping Unit )</small>
                    </th>
                    <th class="p-2 m-2 border border-black">Actions</th>
                </tr>
            </thead>
            <tbody class="p-2 m-2 border border-black">
                <tr class="p-2 m-2">
                    @foreach ($products as $product)
                        <td class="m-2 p-2 border border-black">{{ $product->id }}</td>
                        <td class="p-2 m-2 border border-black">{{ $product->name }}</td>
                        <td class="p-2 m-2 border border-black">{{ $product->stock }}</td>
                        <td class="p-2 m-2 border border-black">{{ $product->status }}</td>
                        <td class="p-2 m-2 border border-black">{{ $product->price }}</td>
                        <td class="p-2 m-2 border border-black">{{ $product->s_k_u }}</td>
                        <td class="p-2 m-2 border border-black"><a
                                href="{{ url('/products/' . $product->id . '/view-entries') }}"
                                class="text-pink font-normal border w-2 bg-pink-200 border-pink-200 hover:bg-pink-300 hover:text-white px-1 mx-1 py-1 my-1 rounded">
                                View
                                Entries</a>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                class="text-pink font-normal border w-2 bg-pink-200 border-pink-200 hover:bg-pink-300 hover:text-white px-1 mx-1 py-1 my-1 rounded">Edit
                            </a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</body>

</html>
