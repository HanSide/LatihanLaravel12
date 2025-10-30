<x-admin.layout>
    <x-slot:judul>{{$title}}</x-slot:judul>
    <div class="flex justify-center">
        <table class="table-auto border-collapse border border-gray-400 shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-gray-400 px-4 py-2">No</th>
                    <th class="border border-gray-400 px-4 py-2">Name</th>
                    <th class="border border-gray-400 px-4 py-2">Job</th>
                    <th class="border border-gray-400 px-4 py-2">Email</th>
                    <th class="border border-gray-400 px-4 py-2">Address</th>
                    <th class="border border-gray-400 px-4 py-2">Gender</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guardians as $guardian)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-400 px-4 py-2">{{$loop->iteration}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$guardian['name']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$guardian['job']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$guardian['email']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$guardian['address']}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$guardian['gender']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>