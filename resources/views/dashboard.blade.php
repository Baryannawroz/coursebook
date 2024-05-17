<x-app-layout>

    @if(auth()->user()->role == 0)
        {{-- Lecturer's dashboard --}}
        <div class="mt-24">
            <div class="flex justify-center items-center">
                <div class="btn-grad">
                    <h1 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>
                    <p class="text-lg">You are logged in as a lecturer.</p>
                    
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 1)
        {{-- Head of Department's dashboard --}}
        <div class="mt-24">
            <div class="flex justify-center items-center">
                <div class="btn-grad">
                    <h1 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>
                    <p class="text-lg">You are logged in as the head of department.</p>
                  
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 2)
        {{-- Admin's dashboard --}}
        <div class="mt-24">
            <div class="flex justify-center items-center">
                <div class="btn-grad">
                    <h1 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>
                    <p class="text-lg">You are logged in as an admin.</p>
                    <!-- Include specific content for Admin -->
                </div>
            </div>
        </div>
    @endif


    <div>

        <div class="flex flex-wrap mt-6 pointer">

            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 first-section rounded-lg shadow transition duration-300 ease-in-out text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Subject</h5>
                    <p class="font-normal text-white">Rich Knowledge Selection: {{ $totalSubject }}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow secound-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Module
                    </h5>
                    <p class="font-normal text-white">Comprehensive Learning Units: {{ $totalModelinfos}}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow third-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Lecturer</h5>
                    <p class="font-normal text-white">Expert Teaching Talent: {{ $totaluser}}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-col justify-center items-center mt-28">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">>
                    <tr>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">#</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">Lecturer
                        </th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">Subject
                        </th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">
                            Department</th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">Stage
                        </th>
                        <th class="px-6 py-5 text-left text-xs font-medium text-white uppercase tracking-wide">Actions
                        </th>
                    </tr>
                    </class=>
                <tbody class="divide-y divide-gray-200">
                    @php $count = 1; @endphp

                    @foreach($modelinfos as $model)

                    <tr class="{{ $count % 2 == 0 ? 'bg-blue-200' : 'bg-white' }}">
                        <td class="px-6 py-6 whitespace-nowrap">{{ $count++ }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">{{ $model->user->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">{{ $model->subject->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">{{ $model->stage->department->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">{{ $model->stage->name }}</td>
                        <td class="px-6 py-6 whitespace-nowrap">
                            <div class="flex items-center space-x-4">
                                <!-- Edit button -->
                                <a href="{{ route('model.edit', $model->id) }}" class="text-blue-500 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none"
                                        height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" width="24">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>


                                <!-- Show button -->
                                <a href="{{ route('model.show', $model->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                                        fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="miter">
                                        <path d="M2,12S5,4,12,4s10,8,10,8-2,8-10,8S2,12,2,12Z" />
                                        <circle cx="12" cy="12" r="4" stroke-width="0" fill="#059cf7" opacity="0.1" />
                                        <circle cx="12" cy="12" r="4" />
                                    </svg>
                                </a>
                                <a href="{{ route('model.sameshow', [$model->id, 'subject_id' => $model->subject_id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                                        fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="miter">
                                        <!-- Changed path to represent list -->
                                        <path d="M3,6h18M3,12h18M3,18h18" />
                                    </svg> </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
<style>





         
         
         
         
.btn-grad {
            background-image: linear-gradient(to right, #517fa4 0%, #243949  51%, #517fa4  100%);
            margin: 10px;
            padding: 20px 50px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         



.first-section {


background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;

transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;



}

.first-section:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}


.secound-section {
background-image: linear-gradient(to right, #4b6cb7 0%, #182848 51%, #4b6cb7 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.secound-section:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}




.third-section {
background-image: linear-gradient(to right, #134E5E 0%, #71B280 51%, #134E5E 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.third-section:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}




.test {
background-image: linear-gradient(to right, #f46b45 0%, #eea849 51%, #f46b45 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
text-transform: uppercase;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.test:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}

.test2 {
background-image: linear-gradient(to right, #76b852 0%, #8DC26F 51%, #76b852 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
text-transform: uppercase;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.test2:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}


.test3 {
background-image: linear-gradient(to right, #56CCF2 0%, #2F80ED 51%, #56CCF2 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
text-transform: uppercase;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.test3:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}



.test4 {
background-image: linear-gradient(to right, #cb2d3e 0%, #ef473a 51%, #cb2d3e 100%);
margin: 10px;
padding: 15px 45px;
text-align: center;
text-transform: uppercase;
transition: 0.5s;
background-size: 200% auto;
color: white;
box-shadow: 0 0 20px #eee;
border-radius: 10px;
display: block;
}

.test4:hover {
background-position: right center;
/* change the direction of the change here */
color: #fff;
text-decoration: none;
}
</style>
