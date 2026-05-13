<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Layup</title>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">
        Edit Layup
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('layups.update', $layup) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Supplier
            </label>

            <select
                name="supplier_id"
                class="w-full border rounded px-4 py-2"
            >

                @foreach($suppliers as $supplier)

                    <option
                        value="{{ $supplier->id }}"
                        {{ $layup->supplier_id == $supplier->id ? 'selected' : '' }}
                    >
                        {{ $supplier->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Layup Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $layup->name) }}"
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="w-full border rounded px-4 py-2"
            >{{ old('description', $layup->description) }}</textarea>

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-2 rounded"
            >
                Update
            </button>

            <a
                href="{{ route('layups.index') }}"
                class="bg-gray-500 text-white px-5 py-2 rounded"
            >
                Back
            </a>

        </div>

    </form>

</div>

</body>
</html>