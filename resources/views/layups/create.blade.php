@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">
        Create Layup
    </h1>

    <form action="{{ route('layups.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Supplier
            </label>

            <select
                name="supplier_id"
                class="w-full border rounded px-4 py-2"
            >
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
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
            ></textarea>
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