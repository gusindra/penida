<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--main-container-part-->
                    <div id="content">
                        <!--breadcrumbs-->
                        <div class="content-header flex">
                            <h1>Halaman</h1>
                            <a class="inline-flex items-center ml-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ route('add.karang') }}" >Tambah</a>
                        </div>
                        <!--End-breadcrumbs-->


                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
                            @foreach ($hal as $halaman)
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <img src="{{$halaman->gambar? cloud_image_url($halaman->gambar, 'res') : url('upload/'.$halaman->id.'.jpg')}}" />
                                    </div>

                                    <div>
                                        <h1>{{$halaman->judul}}</h1>
                                        <div class="mt-2 text-sm text-gray-500">
                                            #{{$halaman->order?$halaman->order.'.':''}}.
                                        </div>
                                        <span class="text-green-700">{{$halaman->status}}</span>
                                        <div class="flex items-center">
                                            <a class="mt-3 flex items-center text-sm font-semibold text-indigo-700" target="_blank" href="{{ route('page', $halaman->slug) }}" >Lihat</a>
                                            <a class="mt-3 ml-3 flex items-center text-sm font-semibold text-indigo-700" href="{{ route('edit.karang', $halaman->id) }}" >Ubah</a>
                                            <form method="POST" action="{{ route('hapus.karang', $halaman->id) }}" class="delete">
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
                <!--end-main-container-part-->
            </div>
        </div>
    </div>
</x-app-layout>


@section('js')
    <script src="{{ url('assets/js/backend/jquery.dataTables.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/backend/select2.css') }}" />
@endsection
