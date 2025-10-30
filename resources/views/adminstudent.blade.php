<x-admin.layout>
<x-slot:judul>{{$title}}</x-slot:judul>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <div>
            <x-admin.buttonadd target="addStudentModal" toggle="addStudentModal">
                + Add Student
            </x-admin.buttonadd>
        </div>
    </div>

    <table class="table-auto border-collapse border border-gray-400 shadow-lg rounded-lg w-full">
        <thead>
            <tr class="bg-gray-700 text-white">
                <th class="border border-gray-400 px-4 py-2">No</th>
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">Class</th>
                <th class="border border-gray-400 px-4 py-2">Email</th>
                <th class="border border-gray-400 px-4 py-2">Address</th>
                <th class="border border-gray-400 px-4 py-2">Gender</th>
                <th class="border border-gray-400 px-4 py-2">Birthday</th>
                <th class="border border-gray-400 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-400 px-4 py-2">{{$loop->iteration}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->name}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->classroom->name}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->email}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->address}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->gender}}</td>
                <td class="border border-gray-400 px-4 py-2">{{$student->birthday}}</td>
                <td class="border border-gray-400 px-4 py-2 flex gap-2">
                    <button type="button" 
                        data-modal-target="editStudentModal-{{ $student->id }}" 
                        data-modal-toggle="editStudentModal-{{ $student->id }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </button>
                    <button type="button"
                        data-modal-target="deleteStudentModal-{{ $student->id }}"
                        data-modal-toggle="deleteStudentModal-{{ $student->id }}"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Edit Student Modal for each student -->
            <x-admin.modal id="editStudentModal-{{ $student->id }}" title="Edit Student">
                <form action="{{ route('adminstudent.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="edit_name_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="edit_name_{{ $student->id }}" value="{{ $student->name }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edit_classroom_id_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Classroom</label>
                        <select name="classroom_id" id="edit_classroom_id_{{ $student->id }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Classroom</option>
                            @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('classroom_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edit_email_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="edit_email_{{ $student->id }}" value="{{ $student->email }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edit_address_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="edit_address_{{ $student->id }}" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $student->address }}</textarea>
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edit_gender_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="edit_gender_{{ $student->id }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edit_birthday_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Birthday</label>
                        <input type="date" name="birthday" id="edit_birthday_{{ $student->id }}" value="{{ $student->birthday }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('birthday')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" data-modal-hide="editStudentModal-{{ $student->id }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Update Student
                        </button>
                    </div>
                </form>
            </x-admin.modal>

            <!-- Delete Confirmation Modal for each student -->
            <x-admin.modal id="deleteStudentModal-{{ $student->id }}" title="Delete Student">
                <div class="p-4">
                    <p class="text-gray-700 mb-4">Are you sure you want to delete <strong>{{ $student->name }}</strong>?</p>
                    <p class="text-sm text-gray-500 mb-6">This action cannot be undone.</p>
                    
                    <form action="{{ route('adminstudent.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="flex justify-end gap-2">
                            <button type="button" data-modal-hide="deleteStudentModal-{{ $student->id }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                Yes, Delete
                            </button>
                        </div>
                    </form>
                </div>
            </x-admin.modal>
            @endforeach
        </tbody>
    </table>

    <!-- Add Student Modal -->
    <x-admin.modal id="addStudentModal" title="Add New Student">
        <form action="{{ route('adminstudent.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="classroom_id" class="block text-sm font-medium text-gray-700">Classroom</label>
                <select name="classroom_id" id="classroom_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select Classroom</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
                @error('classroom_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" rows="3" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address') }}</textarea>
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select name="gender" id="gender" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('birthday')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" data-modal-hide="addStudentModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Student
                </button>
            </div>
        </form>
    </x-admin.modal>
</x-admin.layout>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>