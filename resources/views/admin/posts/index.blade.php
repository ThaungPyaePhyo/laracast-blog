<x-layout>
    <x-Setting heading="Manage Posts">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                @foreach($posts as $post)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/posts/{{$post->id}}">
                            {{ $post->title }}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="/admin/posts/{{$post->id}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="/admin/posts/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </x-Setting>
</x-layout>
