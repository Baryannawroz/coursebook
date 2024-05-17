<x-app-layout>


    <div>

        <div class="flex flex-wrap mt-6 pointer">

            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 first-section rounded-lg shadow transition duration-300 ease-in-out text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Subject</h5>
                    <p class="font-normal text-white">{{ $totalSubject }}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow secound-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Module
                    </h5>
                    <p class="font-normal text-white">{{ $totalModelinfos}}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow third-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Lecturer</h5>
                    {{-- <p class="font-normal text-white">{{ $model->module_leader}}</p> --}}
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
<style>
.first-section {


background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%);
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
text-transform: uppercase;
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
text-transform: uppercase;
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
