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
    <form method="GET" action="{{ route('adminstudent.index') }}" class="flex gap-2">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}"
            placeholder="Search name, email, or class..."
            class="bg-gray-800 border border-gray-700 text-gray-200 text-sm rounded-lg px-3 py-2 focus:ring-blue-600 focus:border-blue-600"
        >

        <button 
            type="submit"
            class="px-4 py-2 bg-blue-700 text-white text-sm rounded-lg hover:bg-blue-600 transition">
            Search
        </button>
    </form>

    <x-admin.buttonadd modalTarget="addStudentModal">
        Add Student
    </x-admin.buttonadd>
</div>

    <div cl ass="overflow-x-auto">
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
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $students->firstItem() + $loop->index }}
</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-200">{{ $student->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->classroom->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->email }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->address }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->gender }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $student->birthday }}</td>
                    <td class="border border-gray-700 px-4 py-3">
                        <div class="flex gap-2 justify-center">
                            <x-admin.editbutton modalTarget="editStudentModal-{{ $student->id }}" />
                            <x-admin.deletebutton modalTarget="deleteStudentModal-{{ $student->id }}" />
                        </div>
                    </td>
                </tr>

                <x-admin.editmodal
                    modalId="editStudentModal-{{ $student->id }}"
                    title="Edit Student"
                    :route="route('adminstudent.update', $student->id)"
                    buttonText="Save Changes">
                    
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name-{{ $student->id }}" value="{{ $student->name }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>

                        <div>
                            <label for="classroom_id-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                            <select name="classroom_id" id="classroom_id-{{ $student->id }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}" @selected($student->classroom_id == $classroom->id)>
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email-{{ $student->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email-{{ $student->id }}" value="{{ $student->email }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                    </div>
                </x-admin.editmodal>

                <x-admin.deletemodal
                    modalId="deleteStudentModal-{{ $student->id }}"
                    :itemName="$student->name"
                    :route="route('adminstudent.destroy', $student->id)" />
                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.createmodal
        modalId="addStudentModal"
        title="Add New Student"
        :route="route('adminstudent.store')"
        buttonText="Add new student">
        
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="Enter student name" required>
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="student@example.com" required>
            </div>

            <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                <select name="gender" id="gender" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="" selected>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div>
                <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                <input type="date" name="birthday" id="birthday" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            </div>

            <div>
                <label for="classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                <select name="classroom_id" id="classroom_id" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="" selected>Select class</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea name="address" id="address" rows="4" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="Write student address here" required></textarea>                    
            </div>
        </div>
    </x-admin.createmodal>
<div class="mt-4">
    {{ $students->links() }}
</div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</x-admin.layout>