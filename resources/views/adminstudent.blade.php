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

    <div class="flex justify-between items-center mb-4">
        <x-admin.buttonadd target="addStudentModal" toggle="addStudentModal">
            + Add Student
        </x-admin.buttonadd>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto border-collapse w-full shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-gray-100">
                    <th class="border border-gray-700 px-4 py-3">No</th>
                    <th class="border border-gray-700 px-4 py-3">Name</th>
                    <th class="border border-gray-700 px-4 py-3">Class</th>
                    <th class="border border-gray-700 px-4 py-3">Email</th>
                    <th class="border border-gray-700 px-4 py-3">Address</th>
                    <th class="border border-gray-700 px-4 py-3">Gender</th>
                    <th class="border border-gray-700 px-4 py-3">Birthday</th>
                    <th class="border border-gray-700 px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900">
                @foreach($students as $student)
                <tr class="hover:bg-gray-800 transition-colors">
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $loop->iteration }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-200">{{ $student->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->classroom->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->email }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->address }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->gender }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->birthday }}</td>
                    <td class="border border-gray-700 px-4 py-3">
                        <div class="flex gap-2 justify-center">
                            <x-admin.editbutton target="editStudentModal-{{ $student->id }}" />
                            <x-admin.deletebutton target="deleteStudentModal-{{ $student->id }}" />
                        </div>
                    </td>
                </tr>

                <x-admin.editmodal :student="$student" :classrooms="$classrooms" />
                <x-admin.deletemodal :student="$student" />
                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.createmodal :classrooms="$classrooms" />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</x-admin.layout>