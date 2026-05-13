@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">
            Layups
        </h1>

        <a
            href="{{ route('layups.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Add Layup
        </a>
    </div>

    @foreach($layups as $layup)

        <div class="border p-4 rounded mb-4">

            <h2 class="text-xl font-semibold">
                {{ $layup->name }}
            </h2>

            <p class="text-gray-600">
                Supplier:
                {{ $layup->supplier->name }}
            </p>

            <p class="mt-2">
                {{ $layup->description }}
            </p>

            <div class="mt-4 flex gap-2">

                <a
                    href="{{ route('layups.edit', $layup) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded"
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
                        class="bg-red-500 text-white px-3 py-1 rounded"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    @endforeach

</div>

@endsection