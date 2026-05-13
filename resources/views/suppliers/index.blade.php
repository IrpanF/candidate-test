<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Suppliers</title>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">
            Suppliers
        </h1>

        <a
            href="{{ route('suppliers.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Add Supplier
        </a>
    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>

    @endif

    <div class="mb-6 bg-gray-100 p-4 rounded">

        <h2 class="text-xl font-bold mb-4">
            Import Supplier JSON
        </h2>

        <form
            action="{{ route('suppliers.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <input
                type="file"
                name="json_file"
                class="mb-4"
                required
            >

            <button
                type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded"
            >
                Import JSON
            </button>

        </form>

    </div>

    @foreach($suppliers as $supplier)

        <div class="border p-4 rounded mb-4">

            <h2 class="text-xl font-semibold">
                {{ $supplier->name }}
            </h2>

            <p class="text-gray-600">
                {{ $supplier->address }}
            </p>

            <div class="mt-4 flex gap-2">

                <a
                    href="{{ route('suppliers.edit', $supplier) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded"
                >
                    Edit
                </a>

                <a
                    href="{{ route('suppliers.export', $supplier) }}"
                    class="bg-green-500 text-white px-3 py-1 rounded"
                >
                    Export
                </a>

                <form
                    action="{{ route('suppliers.destroy', $supplier) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>