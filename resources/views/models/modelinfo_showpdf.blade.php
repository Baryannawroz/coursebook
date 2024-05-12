<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Descriptor</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" defer></script>

    <script>
        async function generatePDF() {
            try {
                const input = document.getElementById("contentToConvert");

                // Use higher resolution for better PDF quality
                const options = { scale: 2, useCORS: true };
                const canvas = await html2canvas(input, options);

                const pdf = new jspdf.jsPDF('p', 'pt', 'a4');
                const imgProps = pdf.getImageProperties(canvas.toDataURL('image/png'));
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("module_descriptor.pdf");
            } catch (error) {
                console.error("Error generating PDF:", error);
          
            }
        }
    </script>
</head>

<body>
<x-app-layout>
    <div id="contentToConvert">
    <table class="flex justify-center items-center">

<tr class=" ">
  <td colspan="4">
    <div class="flex  ">
      <div class="border-2 border-black p-8">
      <img src="{{ URL::asset('/image/koya.png') }}" alt="" height="200" width="200">
    </div>
    <div class="col-span-2 text-center border-y-2 border-black p-8">
      <div class=" text-lg font-bold">Kurdistan Region - Iraq</div>
      <div class="text-gray-600 font-bold">Ministry of Higher Education and Scientific Research</div>
      <div class="mt-2 font-bold">Koya University</div>
      <div class="text-red-500 font-bold">Dept. of Software Engineering</div>
    </div>
    <div class="flex items-center justify-center border-2 border-black p-8">
      <img src="{{ URL::asset('/image/high.png') }}" alt="" height="200" width="200">
    </div>
  </div>
</td>
</tr>
</table>



<div class="  p-4 ">
  <h1 class="text-blue-900 text-2xl font-bold text-center">MODULE DESCRIPTOR FORM </h1>
</div>
<div class="flex items-center justify-center ">
  <div class="bg-white p-6 rounded-lg  w-3/4">
    <table class=" w-full">
      <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Module Information</h1>
      </div>
      <tr class="w-full ">

        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl ">Module Title</td>
        <td class="border-2 border-black py-2 px-3 text-red-600">{{ $model->module_title }}</td>


        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl  ">Module Type</td>
        <td class="border-2 border-black py-2 px-3 text-red-600">{{ $model->module_type }}</td>


      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Code</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_code }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Credit</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->credits }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Level</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_level }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Semester of Delivery</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->semester_of_delivery }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Leader Name</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_leader }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Leader Email</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_leader_email }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Leader Academic Title</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_leader_academic_title }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Leader Qualification</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_leader_qualification }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Tutor Name</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_tutor_name }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Tutor Email</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->module_tutor_email }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Peer Reviewer Name</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->peer_reviewer_name }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Peer Reviewer Email</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->peer_reviewer_email }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Approval Date</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->approval_date }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Version Number</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->version_number }}</td>
      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Subject</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->subject->name }}</td>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Stage</td>
        <td class="border-2 border-black py-2 px-3">{{ $model->stage->department->name }} {{ $model->stage->name }}</td>
      </tr>
    </table>
  </div>
</div>





<div class="flex items-center justify-center ">
  <div class="bg-white p-6 rounded-lg  w-3/4">
    <table class=" w-full">
      <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Relation With Other Modules</h1>
      </div>
      <tr class="w-full ">

        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl w-1/4 ">Pre-requisites</td>
        <td class="border-2 border-black py-2 px-3  w-full"> {!! $model->co_requisites !!}
        </td>

      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Co-requisites</td>
        <td class="border-2 border-black py-2 px-3">{!! $model->pre_requisites !!}</td>

      </tr>


    </table>

    <table class=" w-full">
      <div class="bg-orange-200  p-4 border-2 border-black border-b-0 border-t-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Module Aims, Learning Outcomes and Indicative Contents
        </h1>
      </div>
      <tr class="w-full ">

        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl w-1/4 ">Module Aims</td>
        <td class="border-2 border-black py-2 px-3  w-full"> {!! $model->module_aims !!}
        </td>

      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Module Learning
          Outcomes
        </td>
        <td class="border-2 border-black py-2 px-3"> {!!$model->module_learning_outcomes !!}</td>

      </tr>
      <tr>
        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl">Indicative Contents
        </td>
        <td class="border-2 border-black py-2 px-3"> {!! $model->indicative_contents !!}</td>

      </tr>


    </table>

    </table>

    <table class=" w-full">
      <div class="bg-orange-200  p-4 border-2 border-black border-b-0 border-t-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Learning and Teaching Strategies

        </h1>
      </div>
      <tr class="w-full ">

        <td class="bg-blue-100 border-2 border-black py-2 px-3 font-bold text-xl w-1/4 ">Strategies</td>
        <td class="border-2 border-black py-2 px-3  w-full"> {!! $model->strategies !!}
        </td>

      </tr>



    </table>
  </div>
</div>




<div class="flex items-center justify-center ">
  <div class="bg-white p-6 rounded-lg  w-3/4">
    <table class=" w-full">
  <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Learning and Teaching Resources

        </h1>
      </div>
  <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase  border-2 border-black"></th>
      <th scope="col" class="px-6 py-3 text-center text-2xl font-bold bg-blue-100 text-black  border-2 border-black">Text</th>
      <th scope="col" class="px-6 py-3 text-center text-2xl font-bold  bg-blue-100 text-black  border-2 border-black">Available in the Library?</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200 ">
    <tr>
      <td class="px-6 py-4  text-2xl font-bold bg-blue-100 text-gray-900 border-2 border-black">Required Texts</td>
      <td class="px-6 py-4  text-sm text-black border-2 border-black">
      {!! $model->required_texts !!}
      </td>
      <td class="px-6 py-4  text-sm text-red-600 border-2 border-black">No</td>
    </tr>
    <tr>
      <td class="px-6 py-4 text-2xl font-bold bg-blue-100 text-gray-900 border-2 border-black">Recommended Texts</td>
      <td class="px-6 py-4  text-sm text-black border-2 border-black">
      {!! $model->recommended_texts !!}
      </td>
      <td class="px-6 py-4  text-sm text-red-600 border-2 border-black">No</td>
    </tr>
    <tr>
      <td class="px-6 py-4  text-2xl font-bold bg-blue-100 text-gray-900 border-2 border-black">Websites</td>
      <td class="px-6 py-4  text-sm text-black border-2 border-black">
      {!! $model->websites !!}
      </td>
      <td class="px-6 py-4  text-sm text-red-600 border-2 border-black">No</td>
    </tr>

  </tbody>
</table>

</div>

</div>



<div class="flex items-center justify-center ">
  <div class="bg-white p-6 rounded-lg  w-3/4">
    <table class=" w-full">
  <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
        <h1 class="text-blue-900 text-2xl font-bold text-center">Delivery Plan (Weekly Syllabus)


        </h1>
      </div>
  <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase  border-2 border-black"></th>
      <th scope="col" class="px-6 py-3 text-left text-2xl font-bold bg-blue-100 text-black  border-2 border-black">Material Covered</th>
    </tr>
  </thead>
  <tbody class="divide-y">
  <?php $count = 1; ?>
  @foreach ($subjectContents as $content)
      <tr class="">
          <td class="border-2 border-black bg-blue-100 py-4 px-6 text-xl font-bold text-black whitespace-nowrap">
            
                  Week {{ $count }}
          
          </td>
          <td class="border-2 border-black py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
          @if($count == 8)
          <div class="font-bold text-xl">
            
            Midterm Exam
          </div>
              @else
              {{ $content->material_covered }}
              @endif
            
          </td>
      </tr>
      <?php $count++; ?>
      @if($count > 15) @break @endif
  @endforeach
</tbody>

</table>

</div>
</div>
<div class="flex items-center justify-center mt-8">
  <button onclick="generatePDF()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Generate PDF
  </button>
  <div id="spinner" class="hidden ml-4">
    <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
  </div>
</div>


</x-app-layout>



</body>
</html>
