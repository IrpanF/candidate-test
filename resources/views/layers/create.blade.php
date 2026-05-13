@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">
        Create Layer
    </h1>

    <form action="{{ route('layers.store') }}" method="POST">

        @csrf

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Layup
            </label>

            <select
                name="layup_id"
                class="w-full border rounded px-4 py-2"
            >

                @foreach($layups as $layup)

                    <option value="{{ $layup->id }}">
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
                class="w-full border rounded px-4 py-2"
            >

        </div>

        <button
            type="submit"
            class="bg-blue-500 text-white px-5 py-2 rounded"
        >
            Save
        </button>

    </form>

</div>

@endsection