@extends('layouts.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Crud Classroom</title>
</head>
<body>

     <!-- Modal toggle -->
     <button data-modal-target="tambahdata" data-modal-toggle="tambahdata"
     class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
     type="button">
     Tambah Data Ekstra
    </button>

                   <!-- Main modal -->
                   <div id="tambahdata" tabindex="-1" aria-hidden="true"
                   class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                   <div class="relative p-4 w-full max-w-md max-h-full">
                       <!-- Modal content -->
                       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                           <!-- Modal header -->
                           <div
                               class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                   Tambah data Ekstra
                               </h3>
                               <button type="button"
                                   class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                   data-modal-toggle="tambahdata">
                                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                       fill="none" viewBox="0 0 14 14">
                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                           stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                   </svg>
                                   <span class="sr-only">Tutup modal</span>
                               </button>
                           </div>
                           <!-- Modal body -->
                           <form class="p-4 md:p-5" action="{{ route('ekstra.store') }}" method="post">
                               @csrf
                               <div class="grid gap-4 mb-4 grid-cols-2">
                                   <div class="col-span-2">
                                       <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kelas: </label>
                                       <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Nama Siswa" value="{{ old('name') }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           placeholder="Type product name">
                                       @error('name')
                                           <span class="invalid-feedback" role="alert" style="color: red;">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>
                                   
                               </div>
                               <button type="submit"
                                   class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                           d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                           clip-rule="evenodd"></path>
                                   </svg>
                                   Simpan
                               </button>
                           </form>
                       </div>
                   </div>
               </div>




    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>

        </thead>
        <tbody>
        @foreach($classrooms as $classroom)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $classroom->name }}</td>
            <td>

                <!-- Edit Modal toggle -->
                <button data-modal-target="editdata{{ $classroom->id }}"
                    data-modal-toggle="editdata{{ $classroom->id }}"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
                    </svg>
                </button>


                <!-- Edit Modal -->
                <div id="editdata{{ $classroom->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit data kategori
                                </h3>
                                <button type="button" data-modal-hide="editdata{{ $classroom->id }}"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Tutup modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5"
                                action="{{ route('classroom.update', $classroom->id) }}"
                                method="post">
                                @method('put')
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="classroom"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Kategori Destinasi"
                                            value="{{ old('classroom', $classroom->name) }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Type product name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"
                                                style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <form action="/classroom/{{ $classroom->id }}" method="post" onsubmit="return confirm('Yakin Akan menghapus data?')" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                </form>
                

            </td>
        </tr>
        @endforeach
        </tbody>
        
        
    </table>
</body>
</html>


@endsection
