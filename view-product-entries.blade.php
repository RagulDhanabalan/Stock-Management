<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section class="p-3 m-2 bg-gray-100 rounded">
        <h3 class="text-green-700 text-center">All Entries : <strong> {{ $entries->product->name }} </strong></h3>
        <button class="flex">
            <a href="/products" title="Add New Product"
                class="mr-1 bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>

                Back</a>

            <a href="/index" title="Home"
                class="bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                Home</a>
        </button>
        <table class="border my-2 p-2 w-full border-black">

            <thead class="px-2 mx-2 py-2 my-2 bg-black text-white border text-sm border-black">
                <tr class="px-2 mx-2 py-2 my-2 border border-black">
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Id</th>
                    {{-- <th class="px-2 mx-2 py-2 my-2 border border-black">Name</th> --}}
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Stock</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Status</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Price <small>( &#8377 )</small></th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">SKU <small>( Stock Keeping Unit )</small>
                    </th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Last Entry Date</th>
                </tr>
            </thead>
            <tbody class="px-2 mx-2 py-2 my-2 border text-sm border-black">

                {{-- @foreach ($entries as $entry) --}}
                    <tr class="px-2 mx-2 py-2 my-2">
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->id ?? 'None' }}</td>
                        {{-- <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->product->name ?? 'None' }}</td> --}}
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->quantity ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->product->status ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->value ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->product->s_k_u ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-center border-black">{{ $entries->date ?? 'None' }}</td>
                    </tr>
                {{-- @endforeach --}}

            </tbody>
        </table>
{{-- {{ $products->links() }} --}}
    </section>
</body>

</html>
