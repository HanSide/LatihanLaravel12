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
    <form method="GET" action="{{ route('adminguardian.index') }}" class="flex gap-2">
        <input 
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search name, email, phone, job..."
            class="bg-gray-800 border border-gray-700 text-gray-200 text-sm rounded-lg px-3 py-2 focus:ring-blue-600 focus:border-blue-600"
        >

        <button 
            type="submit"
            class="px-4 py-2 bg-blue-700 text-white text-sm rounded-lg hover:bg-blue-600 transition">
            Search
        </button>

        <a href="{{ route('adminguardian.index') }}"
           class="px-4 py-2 bg-gray-700 text-gray-200 text-sm rounded-lg hover:bg-gray-600 transition">
           Reset
        </a>
    </form>

    <x-admin.buttonadd modalTarget="addGuardianModal">
        Add Guardian
    </x-admin.buttonadd>
</div>


<div class="overflow-x-auto">
    <table class="table-auto border-collapse w-full shadow-lg rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-800 text-gray-100">
                <th class="border border-gray-700 px-4 py-3">No</th>
                <th class="border border-gray-700 px-4 py-3">Name</th>
                <th class="border border-gray-700 px-4 py-3">Job</th>
                <th class="border border-gray-700 px-4 py-3">Phone</th>
                <th class="border border-gray-700 px-4 py-3">Email</th>
                <th class="border border-gray-700 px-4 py-3">Address</th>
                <th class="border border-gray-700 px-4 py-3">Gender</th>
                <th class="border border-gray-700 px-4 py-3">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-gray-900">
            @foreach($guardians as $guardian)
            <tr class="hover:bg-gray-800 transition-colors">
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardians->firstItem() + $loop->index }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-200">{{ $guardian->name }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardian->job }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardian->phone }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardian->email }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardian->address }}</td>
                <td class="border border-gray-700 px-4 py-3 text-gray-300">{{ $guardian->gender }}</td>
                <td class="border border-gray-700 px-4 py-3">
                    <div class="flex gap-2 justify-center">
                        <x-admin.editbutton modalTarget="editGuardianModal-{{ $guardian->id }}" />
                        <x-admin.deletebutton modalTarget="deleteGuardianModal-{{ $guardian->id }}" />
                    </div>
                </td>
            </tr>

            <x-admin.editmodal
                modalId="editGuardianModal-{{ $guardian->id }}"
                title="Edit Guardian"
                :route="route('adminguardian.update', $guardian->id)"
                buttonText="Save Changes">

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Name</label>
                        <input type="text" name="name" value="{{ $guardian->name }}"
                               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Job</label>
                        <input type="text" name="job" value="{{ $guardian->job }}"
                               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                    </div>

                    <div class="sm:col-span-2">
    <label class="block mb-2 text-sm font-medium text-white">Phone</label>
    <input type="text" name="phone" value="{{ $guardian->phone }}"
           class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
</div>


                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" value="{{ $guardian->email }}"
                               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-white">Address</label>
                        <textarea name="address" rows="3"
                                  class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>{{ $guardian->address }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-white">Gender</label>
                        <select name="gender"
                                class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
                            <option value="Male"   {{ $guardian->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $guardian->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
            </x-admin.editmodal>

            <x-admin.deletemodal
                modalId="deleteGuardianModal-{{ $guardian->id }}"
                :itemName="$guardian->name"
                :route="route('adminguardian.destroy', $guardian->id)" />
            @endforeach
        </tbody>
    </table>
</div>


    <x-admin.createmodal
        modalId="addGuardianModal"
        title="Add New Guardian"
        :route="route('adminguardian.store')"   
        buttonText="Add New Guardian">
        
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
    <div>
        <label class="block mb-2 text-sm font-medium text-white">Name</label>
        <input type="text" name="name"
               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-white">Job</label>
        <input type="text" name="job"
               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
    </div>

<div class="sm:col-span-2">
    <label class="block mb-2 text-sm font-medium text-white">Phone</label>
    <input type="text" name="phone"
           class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
</div>


    <div class="sm:col-span-2">
        <label class="block mb-2 text-sm font-medium text-white">Email</label>
        <input type="email" name="email"
               class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
    </div>

    <div class="sm:col-span-2">
        <label class="block mb-2 text-sm font-medium text-white">Address</label>
        <textarea name="address" rows="3"
                  class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required></textarea>
    </div>

    <div class="sm:col-span-2">
        <label class="block mb-2 text-sm font-medium text-white">Gender</label>
        <select name="gender"
                class="bg-gray-700 border border-gray-600 text-white rounded-lg w-full p-2.5" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>
    </x-admin.createmodal>
<div class="mt-4">
    {{ $guardians->links() }}
</div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</x-admin.layout>
