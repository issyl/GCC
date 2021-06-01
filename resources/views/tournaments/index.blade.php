<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tournaments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10">
                <a href="{{ route('tournaments.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create Tournaments
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Name</th>
                            <th class="border px-6 py-4">Team</th>
                            <th class="border px-6 py-4">Game</th>
                            <th class="border px-6 py-4">Region</th>
                            <th class="border px-6 py-4">Date</th>
                            <th class="border px-6 py-4">Status</th>
                            <th class="border px-6 py-4">prize</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tournament as $item)
                        <tr>
                            <td class="border px-6 py-4 text-center">{{ $item->id }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->name }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->team }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->game }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->region }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->date }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->status }}</td>
                            <td class="border px-6 py-4 text-center">{{ $item->prize }}</td>
                            <td class="border px-6 py-4 text-center">
                                <a href="{{ route('tournaments.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('tournaments.destroy',$item->id) }}" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="border text-center p-5">
                                Data Not Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-centre mt-5">
                {{ $tournament->links() }}
            </div>
        </div>
    </div>
</x-app-layout>