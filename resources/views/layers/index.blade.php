@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Layers
        </h1>

        <p class="text-gray-500 mt-1">
            Manage CLT layer configurations.
        </p>

    </div>

    <a
        href="{{ route('layers.create') }}"
        class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-lg font-medium transition"
    >
        + Add Layer
    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">

        {{ session('success') }}

    </div>

@endif

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 text-gray-500 text-sm uppercase">

            <tr>

                <th class="text-left px-6 py-4">
                    Order
                </th>

                <th class="text-left px-6 py-4">
                    Layup
                </th>

                <th class="text-left px-6 py-4">
                    Thickness
                </th>

                <th class="text-left px-6 py-4">
                    Width
                </th>

                <th class="text-left px-6 py-4">
                    Angle
                </th>

                <th class="text-left px-6 py-4">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($layers as $layer)

                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <td class="px-6 py-5 font-semibold">

                        #{{ $layer->layer_order }}

                    </td>

                    <td class="px-6 py-5 text-gray-600">

                        {{ $layer->layup->name }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $layer->thickness }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $layer->width }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $layer->angle }}°

                    </td>

                    <td class="px-6 py-5">

                        <div class="flex flex-wrap gap-2">

                            <a
                                href="{{ route('layers.edit', $layer) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm"
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
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-10 text-gray-500">

                        No layers found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection