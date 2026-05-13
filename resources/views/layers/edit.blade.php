@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">
        Edit Layer
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
        action="{{ route('layers.update', $layer) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Layup
            </label>

            <select
                name="layup_id"
                class="w-full border rounded px-4 py-2"
            >

                @foreach($layups as $layup)

                    <option
                        value="{{ $layup->id }}"
                        {{ $layer->layup_id == $layup->id ? 'selected' : '' }}
                    >
                        {{ $layup->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Layer Order
            </label>

            <input
                type="number"
                name="layer_order"
                value="{{ old('layer_order', $layer->layer_order) }}"
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Thickness
            </label>

            <input
                type="number"
                step="0.01"
                name="thickness"
                value="{{ old('thickness', $layer->thickness) }}"
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Width
            </label>

            <input
                type="number"
                step="0.01"
                name="width"
                value="{{ old('width', $layer->width) }}"
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Angle
            </label>

            <input
                type="number"
                step="0.01"
                name="angle"
                value="{{ old('angle', $layer->angle) }}"
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-2 rounded"
            >
                Update
            </button>

            <a
                href="{{ route('layers.index') }}"
                class="bg-gray-500 text-white px-5 py-2 rounded"
            >
                Back
            </a>

        </div>

    </form>

</div>

@endsection