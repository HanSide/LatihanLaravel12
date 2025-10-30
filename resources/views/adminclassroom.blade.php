<x-admin.layout>
 <x-slot:judul>{{$title}}</x-slot:judul>
    <div class="flex justify-center">
        <table class="table-auto border-collapse border border-gray-400 shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classrooms as $classroom)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-400 px-4 py-2">{{$loop->iteration}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$classroom['name']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>