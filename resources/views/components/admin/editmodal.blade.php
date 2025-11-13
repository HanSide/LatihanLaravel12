<!-- Flowbite Edit Modal -->
<div id="editStudentModal-{{ $student->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 
           justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Student</h3>
                <button type="button" 
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" 
                    data-modal-toggle="editStudentModal-{{ $student->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 
                        111.414 1.414L11.414 10l4.293 4.293a1 1 0 
                        01-1.414 1.414L10 11.414l-4.293 
                        4.293a1 1 0 01-1.414-1.414L8.586 
                        10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('adminstudent.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button type="submit" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
                        Save Changes
                    </button>
                    <button type="button" data-modal-hide="editStudentModal-{{ $student->id }}"
                        class="text-gray-500 hover:text-white border border-gray-500 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
