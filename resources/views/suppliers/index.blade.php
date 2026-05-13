@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            Suppliers
        </h1>

        <p class="text-gray-500 mt-1">
            Manage timber suppliers and material sourcing.
        </p>

    </div>

    <a
        href="{{ route('suppliers.create') }}"
        class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-lg font-medium transition"
    >
        + Add Supplier
    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-6">

        {{ session('success') }}

    </div>

@endif

<!-- IMPORT -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">

    <h2 class="text-xl font-semibold mb-4">
        Import Supplier JSON
    </h2>

    <form
        action="{{ route('suppliers.import') }}"
        method="POST"
        enctype="multipart/form-data"
        class="flex items-center gap-4"
    >

        @csrf

        <input
            type="file"
            name="json_file"
            required
            class="border border-gray-300 rounded-lg px-4 py-2 bg-white"
        >

        <button
            type="submit"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg transition"
        >
            Import JSON
        </button>

    </form>

</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-50 text-gray-500 text-sm uppercase">

            <tr>

                <th class="text-left px-6 py-4">
                    Name
                </th>

                <th class="text-left px-6 py-4">
                    Address
                </th>

                <th class="text-left px-6 py-4">
                    Total Layups
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

            @forelse($suppliers as $supplier)

                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <td class="px-6 py-5">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold">

                                {{ strtoupper(substr($supplier->name, 0, 2)) }}

                            </div>

                            <div>

                                <p class="font-semibold text-gray-800">

                                    {{ $supplier->name }}

                                </p>

                                <p class="text-sm text-gray-500">

                                    ID: SUP-{{ str_pad($supplier->id, 4, '0', STR_PAD_LEFT) }}

                                </p>

                            </div>

                        </div>

                    </td>

                    <td class="px-6 py-5 text-gray-600">

                        {{ $supplier->address }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $supplier->layups->count() }}

                    </td>

                    <td class="px-6 py-5 text-gray-600">

                        {{ $supplier->created_at->format('M d, Y') }}

                    </td>

                    <td class="px-6 py-5">

                        <div class="flex flex-wrap gap-2">

                            <a
                                href="{{ route('suppliers.edit', $supplier) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm"
                            >
                                Edit
                            </a>

                            <a
                                href="{{ route('suppliers.export', $supplier) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm"
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

                        No suppliers found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection