<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Layers</title>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Layers
        </h1>

        <a
            href="{{ route('layers.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Add Layer
        </a>

    </div>

    @foreach($layers as $layer)

        <div class="border p-4 rounded mb-4">

            <h2 class="text-xl font-semibold">
                Layer Order: {{ $layer->layer_order }}
            </h2>

            <p>
                Layup:
                {{ $layer->layup->name }}
            </p>

            <p>
                Thickness:
                {{ $layer->thickness }}
            </p>

            <p>
                Width:
                {{ $layer->width }}
            </p>

            <p>
                Angle:
                {{ $layer->angle }}
            </p>

            <div class="mt-4 flex gap-2">

                <a
                    href="{{ route('layers.edit', $layer) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded"
                >
                    Edit
                </a>

                <form
                    action="{{ route('layers.destroy', $layer) }}"
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