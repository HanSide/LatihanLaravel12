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
    <form method="GET" action="{{ route('adminteacher.index') }}" class="flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search teacher / email / subject..."
            class="bg-gray-800 border border-gray-700 text-gray-200 text-sm rounded-lg px-3 py-2 focus:ring-blue-600 focus:border-blue-600"
        >

        <button
            type="submit"
            class="px-4 py-2 bg-blue-700 text-white text-sm rounded-lg hover:bg-blue-600 transition">
            Search
        </button>

        <a href="{{ route('adminteacher.index') }}"
           class="px-4 py-2 bg-gray-700 text-gray-200 text-sm rounded-lg hover:bg-gray-600 transition">
            Reset
        </a>
    </form>

    <x-admin.buttonadd modalTarget="addTeacherModal">
        Add Teacher
    </x-admin.buttonadd>
</div>


    <div class="overflow-x-auto">
        <table class="table-auto border-collapse w-full shadow-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-gray-100">
                    <th class="border border-gray-700 px-4 py-3">No</th>
                    <th class="border border-gray-700 px-4 py-3">Name</th>
                    <th class="border border-gray-700 px-4 py-3">Subject</th>
                    <th class="border border-gray-700 px-4 py-3">Email</th>
                    <th class="border border-gray-700 px-4 py-3">Phone</th>
                    <th class="border border-gray-700 px-4 py-3">Address</th>
                    <th class="border border-gray-700 px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900">
                @foreach($teachers as $teacher)
                <tr class="hover:bg-gray-800 transition-colors">
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $loop->iteration }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-200">{{ $teacher->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $teacher->subject->name }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $teacher->email }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $teacher->phone }}</td>
                    <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $teacher->address }}</td>
                    <td class="border border-gray-700 px-4 py-3">
                        <div class="flex gap-2 justify-center">
                            <x-admin.editbutton modalTarget="editTeacherModal-{{ $teacher->id }}" />
                            <x-admin.deletebutton modalTarget="deleteTeacherModal-{{ $teacher->id }}" />
                        </div>
                    </td>
                </tr>

                <x-admin.editmodal
                    modalId="editTeacherModal-{{ $teacher->id }}"
                    title="Edit Teacher"
                    :route="route('adminteacher.update', $teacher->id)"
                    buttonText="Save Changes">
                    
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name-{{ $teacher->id }}" value="{{ $teacher->name }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>

                        <div>
                            <label for="subject_id-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <select name="subject_id" id="subject_id-{{ $teacher->id }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected($teacher->subject_id == $subject->id)>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email-{{ $teacher->id }}" value="{{ $teacher->email }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="phone-{{ $teacher->id }}" value="{{ $teacher->phone }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address-{{ $teacher->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <textarea name="address" id="address-{{ $teacher->id }}" rows="4" 
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>{{ $teacher->address }}</textarea>
                        </div>
                    </div>
                </x-admin.editmodal>
                <x-admin.deletemodal
                    modalId="deleteTeacherModal-{{ $teacher->id }}"
                    :itemName="$teacher->name"
                    :route="route('adminteacher.destroy', $teacher->id)" />

                @endforeach
            </tbody>
        </table>
    </div>

    <x-admin.createmodal
        modalId="addTeacherModal"
        title="Add New Teacher"
        :route="route('adminteacher.store')"
        buttonText="Add new teacher">
        
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="Enter teacher name" required>
            </div> 

            <div>
                <label for="subject_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                <select name="subject_id" id="subject_id" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="" selected>Select subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="teacher@example.com" required>
            </div>

            <div class="sm:col-span-2">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                <input type="text" name="phone" id="phone" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="08123456789" required>
            </div>

            <div class="sm:col-span-2">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea name="address" id="address" rows="4" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                    placeholder="Write teacher address here" required></textarea>                    
            </div>
        </div>
    </x-admin.createmodal>
<div class="mt-4">
    {{ $teachers->links() }}
</div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</x-admin.layout>