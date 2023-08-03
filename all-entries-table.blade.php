<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

</head>

<body class="p-2 m-auto">
    <div class="p-2 w-90 mx-auto">
        {{-- session message start --}}
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

{{-- session message end --}}
        <h2 class="text-gray-600 mb-1 p-1 font-bold text-center">Entries</h2>
        <div class="flex justify-items-start  w-full m-auto">
            <a href="/entries/create" title="Add New Entry"
                class="flex mr-1 text-sm align-middle bg-green-600 hover:bg-green-800 text-white mb-2 py-1 px-3 no-underline rounded"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor" class="w-5 h-5 my-auto">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>Add New</a>
            <a href="/index" title="Home"
                class="flex text-sm bg-green-600 hover:bg-green-800 text-white mb-2 py-1 px-3 no-underline rounded"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor" class="w-5 h-5 my-auto">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>Home</a>
        </div>
        <div>
        <table class="border mx-auto w-full table-auto border-black shadow-lg">
            <thead class="border bg-black text-sm text-white border-black">
                <tr>
                    <th class="p-1 m-2 border text-sm border-black">S.No</th>
                    <th class="p-2 m-2 text-sm border border-black">Product Name</th>
                    <th class="p-2 m-2 text-sm border border-black">Type <small>( In / Out )</small></th>
                    <th class="p-2 m-2 text-sm border border-black">Quantity</th>
                    <th class="p-2 m-2 text-sm border border-black">Value</th>
                    <th class="p-2 m-2 text-sm border border-black">Description</th>
                    <th class="p-2 m-2 text-sm border border-black">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($entries as $entry)
                        <td class="p-2 m-2 text-sm border border-black">{{ $entry->id ?? 'None' }}</td>
                        <td class="p-2 m-2 border  text-sm border-black">{{ $entry->product->name ?? 'None' }}</td>
                        <td class="p-2 m-2 border text-sm border-black">{{ $entry->type }}</td>
                        <td class="p-2 m-2 border text-sm border-black">{{ $entry->product->stock }}</td>
                        <td class="p-2 m-2 border text-sm border-black">{{ $entry->value }}</td>
                        <td class="p-2 m-2 border text-sm border-black">{{ $entry->description }}</td>
                        <td class="p-2 m-2 border text-sm border-black">{{ $entry->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-2 mb-3">
            {{ $entries->links() }}
        </div>
    </div>

</div>

</body>
