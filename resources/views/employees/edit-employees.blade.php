<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24"
                    >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit Employee
                            </h2>
                            <p class="mb-4">Edit: {{$employee->fname}}</p>
                        </header>
    
                        <form method="POST" action="/employees/{{$employee->id}}">
                            {{-- @csrf prevents cross site scripting --}}
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="fname"
                                    class="inline-block text-lg mb-2"
                                    >First Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="fname" value="{{$employee->fname}}"
                                />
    
                                {{-- error message alert --}}
                                @error('fname')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                    for="lname"
                                    class="inline-block text-lg mb-2"
                                    >Last Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="lname" value="{{$employee->lname}}"
                                />
    
                                {{-- error message alert --}}
                                @error('lname')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                    for="companyID"
                                    class="inline-block text-lg mb-2"
                                    >Company ID</label
                                >
                                <input
                                    type="number"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="companyID" value="{{$employee->companyID}}"
                                />
    
                                {{-- error message alert --}}
                                @error('companyID')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="email" class="inline-block text-lg mb-2"
                                    >Contact Email</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="email" value="{{$employee->email}}"
                                />
                                @error('email')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label
                                    for="phone"
                                    class="inline-block text-lg mb-2"
                                    >Phone Number</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="phone" value="{{$employee->phone}}"
                                />
    
                                {{-- error message alert --}}
                                @error('phone')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-teal-400 text-black rounded py-2 px-4 hover:bg-teal-800 hover:text-white"
                                >
                                    Update
                                </button>
    
                                <a href="/listings" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
    </x-card>
    </x-layout>