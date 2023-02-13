<x-layout>
@include('partials._search')
{{-- @if(count($listings) == 0)
<p>No listings found</p>
@endif --}}

{{-- <h2>{{$listing['title']}}</h2>
<p>{{$listing['description']}}</p> --}}

<a href="/listings" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>
            <div class="mx-4">
                <x-card class="p-24">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                            alt=""
                        />
                        <h4 class="text-2xl mb-2">Company ID: {{$listing->id}}</h4>
                        <h3 class="text-2xl mb-2 font-bold">{{$listing->name}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->email}}</div>

                        {{-- <x-listing-tags :tagsCsv="$listing->tags"/> --}}
                        {{-- <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div> --}}
                        <div class="border border-gray-200 w-full mb-6"></div>
                        

                            {{-- DIV TO SHOW ALL EMPLOYEES IN THAT COMPANY --}}
                            <div class="mb-4">
                            {{-- LOOP TO SHOW EMPLOYEES --}}
                            @foreach ($employees as $employee)
                                @if($employee->companyID == $listing->id)
                                   
                                    {{-- EDIT EMPLOYEES --}}
                                    <a href="/employees/{{$employee->id}}/edit-employees" class="inline float-left">
                                    <i class="fa-solid fa-pencil pr-2"></i>Edit</a>
                                    
                                    {{-- DELETE EMPLOYEES --}}
                                    <form method="POST" action="/employees/{{$employee->id}}" class="inline float-left pl-5">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500"><i class="fa-solid fa-trash pr-2"></i>Delete</button>
                                    </form>

                                {{-- DISPLAY EMPLOYEES --}}
                                {{-- <p class="inline float-left pl-5 font-bold text-xl"> --}}
                                <p class="font-bold text-xl inline pl-3">
                                    {{$employee->fname}}
                                </p> 
                                <p class="font-bold text-xl inline pl-1">
                                    {{$employee->lname}}
                                </p><br>
                            @endif
                            @endforeach
                            </div>
                            {{-- <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3> --}}
                            {{-- <div class="text-lg space-y-6">
                                {{$listing->description}}

                                <a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >
                            </div> --}}
                        
                            {{-- WEBSITE URL --}}
                            <a href="{{$listing->website}}"
                                    target="_blank"
                                    class="bg-black text-white py-2 px-5 mt-10 rounded-lg hover:bg-white hover:text-black hover:border border-black"
                                    ><i class="fa-solid fa-globe pr-2"></i> Visit
                                    Website
                            </a>

                        <x-card class="mt-4 p-2 flex space-x-6">    
                            {{-- ADD EMPLOYEES --}}
                            <a href="/employees/create-employees" class="bg-black text-white py-2 px-5 rounded-lg hover:bg-white hover:text-black hover:border border-black"><i class="fa-solid fa-plus pr-2"></i> Add Employees</a>

                            {{-- EDIT COMPANY --}}
                            <a href="/listings/{{$listing->id}}/edit" class="bg-black text-white py-2 px-5 rounded-lg hover:bg-white hover:text-black hover:border border-black">
                                <i class="fa-solid fa-pencil pr-2"></i> Edit Company
                            </a>
                            
                            {{-- DELETE COMPANY --}}
                            <form method="POST" action="/listings/{{$listing->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="content-center bg-red-500 text-white py-2 px-5 rounded-lg hover:bg-white hover:text-red-500 hover:border border-red-500"><i class="fa-solid fa-trash pr-2 "></i> Delete Company</button>
                            </form>
                         </x-card>
                    </div>
                </x-card>
            </div>

            {{-- <x-card class="mt-4 p-2 flex space-x-6">
                <a href="/employees/employeecreate">
                    <i class="fa-solid fa-pencil"></i> Create
                </a>
            </x-card> --}}
</x-layout>