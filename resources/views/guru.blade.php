<x-layout>
    <x-slot:judul>{{$title}}</x-slot:judul>

    <h2 class="text-center text-2xl font-bold my-4">Teacher List</h2>

    <div class="flex justify-center">
        <table class="table-auto border-collapse border border-gray-400 shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Name</th>
                    <th class="border border-gray-400 px-4 py-2">Subject</th>
                    <th class="border border-gray-400 px-4 py-2">Email</th>
                    <th class="border border-gray-400 px-4 py-2">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-400 px-4 py-2">{{$loop->iteration}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$teacher['name']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$teacher->subject->name}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$teacher['email']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$teacher['address']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
