@extends('layout.admin')
@section('content')
    <div class="mx-4 flex">
        <div class="text-black text-lg justify-center items-center bg-blue-100 rounded-lg shadow-2xl p-10 w-[200px]">
            <h5 class="flex ">Barang
                {{ $barangs }}
            </h5>
        </div>
        <div class="text-black text-lg justify-center items-center bg-blue-100 rounded-lg shadow-2xl p-10 w-[200px] ml-3">
         <h5 class="flex ">Barang
             {{ $barangs }}
         </h5>
     </div>
    </div>
@endsection
