@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-3xl font-bold mb-6">
        Edit Supplier
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
        action="{{ route('suppliers.update', $supplier) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Supplier Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $supplier->name) }}"
                class="w-full border rounded px-4 py-2"
            >
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-semibold">
                Address
            </label>

            <textarea
                name="address"
                rows="4"
                class="w-full border rounded px-4 py-2"
            >{{ old('address', $supplier->address) }}</textarea>
        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-2 rounded"
            >
                Update
            </button>

            <a
                href="{{ route('suppliers.index') }}"
                class="bg-gray-500 text-white px-5 py-2 rounded"
            >
                Back
            </a>

        </div>

    </form>

</div>

@endsection