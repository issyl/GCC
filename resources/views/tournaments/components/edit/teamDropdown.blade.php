<!-- <div class="flex flex-wrap p-5 bg-gray-700">
    <div class="w-full flex flex-wrap lg:w-6/12 p-5"> -->
<!-- <div class="w-full md:w-1/3 flex flex-wrap mb-4 pr-0 md:pr-4"> -->
<div class="relative w-full border-none">
    <select name="team_id" class="bg-white-600 text-black-400 appearance-none border inline-block py-3 pl-3 pr-8 rounded leading-tight w-full">
        @forelse ($team as $item)
        <option value="{{ $item->id}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">{{ $item->team }}</option>

        @empty
        <option class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" disabled>there is no team</option>

        @endforelse
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
        <i class="fas fa-chevron-down text-gray-400"></i>
    </div>
</div>
<!-- </div> -->
<!-- </div>
</div> -->