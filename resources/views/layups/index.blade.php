@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Layups
        </h1>

        <p class="text-gray-500 mt-1">
            Manage CLT layup configurations.
        </p>

    </div>

    <a
        href="{{ route('layups.create') }}"
        class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-lg font-medium transition"
    >
        + Add Layup
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
                    Name
                </th>

                <th class="text-left px-6 py-4">
                    Supplier
                </th>

                <th class="text-left px-6 py-4">
                    Total Layers
                </th>

                <th class="text-left px-6 py-4">
                    Created At
                </th>

                <th class="text-left px-6 py-4">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($layups as $layup)

                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <td class="px-6 py-5">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">

                                {{ strtoupper(substr($layup->name, 0, 2)) }}

                            </div>

                            <div>

                                <p class="font-semibold text-gray-800">

                                    {{ $layup->name }}

                                </p>

                                <p class="text-sm text-gray-500">

                                    ID: LAY-{{ str_pad($layup->id, 4, '0', STR_PAD_LEFT) }}

                                </p>

                            </div>

                        </div>

                    </td>

                    <td class="px-6 py-5 text-gray-600">

                        {{ $layup->supplier->name }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $layup->layers->count() }}

                    </td>

                    <td class="px-6 py-5 text-gray-600">

                        {{ $layup->created_at->format('M d, Y') }}

                    </td>

                    <td class="px-6 py-5">

                        <div class="flex flex-wrap gap-2">

                            <a
                                href="{{ route('layups.edit', $layup) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('layups.destroy', $layup) }}"
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

                    <td colspan="5" class="text-center py-10 text-gray-500">

                        No layups found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection