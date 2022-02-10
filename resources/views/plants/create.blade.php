@extends('layout')

@section('content')
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="/plant" enctype='multipart/form-data'>
                @csrf
                    @if(Session::has('success'))
                    <p class="text-green-400">{{ Session::get('success') }}</p>
                @elseif(Session::has('error'))
                    <p class="text-red-400">{{ Session::get('error') }}</p>
                @endif
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-fullsm:text-sm border border-gray-700 rounded-md">
                          @error('name')
                            <div class="text-red-300">{{ $message }}</div>
                          @enderror
                      </div>

                        <div class="col-span-6 sm:col-span-3">
                        <label for="species" class="block text-sm font-medium text-gray-700">Species</label>
                        <input type="text" name="species" id="species" class="mt-1 block w-fullsm:text-sm border border-gray-700">
                            @error('species')
                            <div class="text-red-300">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="watering_instructions">Watering Instructions</label>
                            <textarea name="watering_instructions" class="mt-1 block w-fullsm:text-sm border border-gray-700"></textarea>
                            @error('watering_instructions')
                            <div class="text-red-300">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="photo"  class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="photo" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    ">
                            @error('photo')
                            <div class="text-red-300">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <button type="submit">Add Entry</button>
                        </div>
                    </div>
                  </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

