<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    @if(session('success'))
        <div class="bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="flex justify-between items-center mb-4 gap-2">
    <form method="GET" action="{{ route('adminclassroom.index') }}" class="flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search classroom name..."
            class="bg-gray-800 border border-gray-700 text-gray-200 text-sm rounded-lg px-3 py-2 focus:ring-blue-600 focus:border-blue-600"
        >

        <button
            type="submit"
            class="px-4 py-2 bg-blue-700 text-white text-sm rounded-lg hover:bg-blue-600 transition">
            Search
        </button>

        <a href="{{ route('adminclassroom.index') }}"
           class="px-4 py-2 bg-gray-700 text-gray-200 text-sm rounded-lg hover:bg-gray-600 transition">
            Reset
        </a>
    </form>

    <x-admin.buttonadd modalTarget="addClassroomModal">
        Add Classroom
    </x-admin.buttonadd>
</div>


    <div cl ass="overflow-x-auto">
        <table class="table-auto border-collapse w-full shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-gray-100">
                    <th class="border border-gray-700 px-4 py-3">No</th>
                    <th class="border border-gray-700 px-4 py-3">Name</th>
                    <th class="border border-gray-700 px-4 py-3">Actions</th>
            </thead>
            <tbody class="bg-gray-900">
                @foreach($classrooms as $classroom)
                <tr class="hover:bg-gray-800 transition-colors">
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $classrooms->firstItem() + $loop->index }}
</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-200">{{ $classroom->name }}</td>
                    <td class="border border-gray-700 px-4 py-3">
                        <div class="flex gap-2 justify-center">
                            <x-admin.editbutton modalTarget="editClassroomModal-{{ $classroom->id }}" />
                        </div>
                    </td>
                </tr>

                <x-admin.editmodal
                    modalId="editClassroomModal-{{ $classroom->id }}"
                    title="Edit Classroom"
                    :route="route('adminclassroom.update', $classroom->id)"
                    buttonText="Save Changes">
                    
                  <div class="sm:col-span-2">
                            <label for="name-{{ $classroom->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="name" name="name" id="name-{{ $classroom->id }}" value="{{ $classroom->name }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                </x-admin.editmodal>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.createmodal
        modalId="addClassroomModal"
        title="Add New Classroom"
        :route="route('adminclassroom.store')"
        buttonText="Add new Classroom">
        
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" 
                    class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white "required>
            </div>
        </div>
    </x-admin.createmodal>
<div class="mt-4">
    {{ $classrooms->links() }}
</div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</x-admin.layout>