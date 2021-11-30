<div>
    <a class="inline-flex items-center ml-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ route('add.gallery') }}" >Tambah</a>
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
        @foreach ($images as $image)
            <div class="p-6">
                <div class="flex items-center">
                    <img src="{{url($image->url)}}" />
                </div>

                <div>
                    <h1>{{$image->title}}</h1>
                    <div class="mt-2 text-sm text-gray-500">
                        #{{$image->tag}}.
                    </div>
                    <div class="flex items-center">
                        <a href="{{route('edit.gallery', $image->id)}}">
                            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Edit</div>
                            </div>
                        </a>
                        <form method="POST" action="{{ route('delete.gallery', $image->id) }}" class="delete">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="mt-3 ml-3 flex items-center text-sm font-semibold text-indigo-700" type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
