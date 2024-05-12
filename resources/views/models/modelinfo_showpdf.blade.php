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

        const options = {
            scale: 3, // Set your desired zooming ratio here
            useCORS: true,
            logging: true, // Enable logging for debugging
        };
        const canvas = await html2canvas(input, options);

        const pdf = new jspdf.jsPDF('p', 'pt', 'a4');

        // Dynamically determine image size based on content
        const imgRatio = canvas.height / canvas.width;
        const pageWidth = pdf.internal.pageSize.getWidth();
        const imageHeight = pageWidth * imgRatio;

        // Split tables if they span across pages
        const ctx = canvas.getContext('2d');
        const tableElements = input.querySelectorAll("table");
        tableElements.forEach(table => {
            const tableBounds = table.getBoundingClientRect();
            const tablePageStart = Math.floor((tableBounds.top - input.getBoundingClientRect().top) / pdf.internal.pageSize.getHeight());
            const tablePageEnd = Math.floor((tableBounds.bottom - input.getBoundingClientRect().top) / pdf.internal.pageSize.getHeight());
            if (tablePageEnd > tablePageStart) {
                const tableTop = tablePageStart * pdf.internal.pageSize.getHeight() + pdf.internal.pageSize.getHeight() - tableBounds.top % pdf.internal.pageSize.getHeight();
                ctx.beginPath();
                ctx.rect(0, tableTop, canvas.width, tableBounds.bottom - tableTop);
                ctx.clip();
            }
        });

        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pageWidth, imageHeight);

        // Check if content is longer than one page, and add pages if needed.
        let remainingHeight = imageHeight - pdf.internal.pageSize.getHeight();
        while (remainingHeight > 0) {
            pdf.addPage();
            pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, -pdf.internal.pageSize.getHeight(), pageWidth, imageHeight);
            remainingHeight -= pdf.internal.pageSize.getHeight();
        }

        pdf.save("descriptor.pdf");
    } catch (error) {
        console.error("Error generating PDF:", error);
    }
}


  </script>
</head>

<body>
  <x-app-layout>
    <div id="contentToConvert" class="mt-8">
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
          <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
            <h1 class="text-blue-900 text-2xl font-bold text-center">Module Delivery

            </h1>
          </div>

          <table class="w-full ">
            <thead>
              <tr>
                <th class=" p-2 text-left bg-blue-200 border-2 border-black"> Lecture (hr/w)</th>
                <th class="border-2 border-black p-2 text-left relative">3<span class="border-1 border-black  bg-blue-200 py-2.5 ml-4 ">Lab (hr/w)</span> </th>
                <th class="border-2 border-black p-2 text-left">2 <span class="border-1 border-black bg-blue-200 py-2.5 ml-4 ">Practical (hr/w)</span></th>
                <th class="border-2 border-black p-2 text-left"> <span class="border-1 border-black bg-blue-200 py-2.5 ml-4 ">Tutorial (hr/w)</span></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td class="border-2 border-black p-2 bg-blue-200 ">SSWL (hr/sem)</td>
                <td colspan="3" class="border-2 border-black p-2 text-left">70</td>
              </tr>
              <tr class="">
                <td class="border-2 border-black p-2 bg-blue-200">USSWL (hr/sem)</td>
                <td colspan="3" class="border-2 border-black p-2 text-left">42</td>
              </tr>
              <tr class="">
                <td class="border-2 border-black p-2 bg-blue-200">Total workload (hr/sem)</td>
                <td colspan="3" class="border-2 border-black p-2 text-left">112</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


      <div class="flex items-center justify-center ">
        <div class="bg-white p-6 rounded-lg  w-3/4">
          <div class="bg-orange-200  p-4 border-2 border-black border-b-0">
            <h1 class="text-blue-900 text-2xl font-bold text-center">Module Evaluation


            </h1>
          </div>

          <table class="w-full">
            <thead>
              <tr class="">
                <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black"></th>
                <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Number/Time</th>
                <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Weight (Marks)</th>
                <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Week Due</th>
                <th scope="col" class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Relevant Learning Outcome</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Quizzes</td>
                <td class="px-6 py-4 border-2 border-black">2</td>
                <td class="px-6 py-4 border-2 border-black">10% (10)</td>
                <td class="px-6 py-4 border-2 border-black">3, 5, 10</td>
                <td class="px-6 py-4 border-2 border-black"></td>
              </tr>
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Assignments</td>
                <td class="px-6 py-4 border-2 border-black">1</td>
                <td class="px-6 py-4 border-2 border-black">10% (10)</td>
                <td class="px-6 py-4 border-2 border-black">8</td>
                <td class="px-6 py-4 border-2 border-black"></td>
              </tr>
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Project/Lab</td>
                <td class="px-6 py-4 border-2 border-black">10</td>
                <td class="px-6 py-4 border-2 border-black">10% (10)</td>
                <td class="px-6 py-4 border-2 border-black">7</td>
                <td class="px-6 py-4 border-2 border-black"></td>
              </tr>
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black">Midterm Exam</td>
                <td class="px-6 py-4 border-2 border-black">1.5 hr</td>
                <td class="px-6 py-4 border-2 border-black">25% (25)</td>
                <td class="px-6 py-4 border-2 border-black">7</td>
                <td class="px-6 py-4 border-2 border-black"></td>
              </tr>
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black ">Final Exam</td>
                <td class="px-6 py-4 border-2 border-black">2 hr</td>
                <td class="px-6 py-4 border-2 border-black">50% (50)</td>
                <td class="px-6 py-4 border-2 border-black">16</td>
                <td class="px-6 py-4 border-2 border-black">All</td>
              </tr>
              <tr class="">
                <td class="px-6 py-3 text-left text-xl font-medium text-black border-2 border-black ">total</td>
                <td class="px-6 py-4 border-2 border-black" colspan="4">100% (100 Marks)
                </td>

              </tr>

            </tbody>
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
            <thead class="bg-blue-50">
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

                  {{ $content->material_covered }}


                </td>
              </tr>
              <?php $count++; ?>

              @endforeach
            </tbody>

          </table>

        </div>
      </div>






      <div class="flex items-center justify-center ">

        <div class="bg-white p-6 rounded-lg  w-3/4">
          <h1 class="text-2xl font-semibold mb-4 text-center">APPENDIX:</h1>
          <table class="w-full table-auto border-collapse border">
            <div class="bg-yellow-200  p-4 border-2 border-black border-b-0">
              <h1 class="text-black text-2xl font-bold text-center">Koya University

              </h1>
            </div>
            <div class="bg-yellow-200  p-4 border-2 border-black border-b-0">
              <h1 class="text-black text-2xl font-bold text-center">Grading Scheme

              </h1>
            </div>
            <thead>
              <tr class="">
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">Group</th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">ECTS Grade</th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">% of Marks</th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">Definition</th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">IRQ System</th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-black ">GPA</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border-2 border-black " rowspan="5">Success Group (50-100)</td>
                <td class="px-4 py-2 border-2 border-black ">A - Excellent</td>
                <td class="px-4 py-2 border-2 border-black">Best 10%</td>
                <td class="px-4 py-2 border-2 border-black">Outstanding Performance</td>
                <td class="px-4 py-2 border-2 border-black">90-100</td>
                <td class="px-4 py-2 border-2 border-black">5</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border-2 border-black">B - Very Good</td>
                <td class="px-4 py-2 border-2 border-black">Next 25%</td>
                <td class="px-4 py-2 border-2 border-black">Above average with some errors</td>
                <td class="px-4 py-2 border-2 border-black">80-89</td>
                <td class="px-4 py-2 border-2 border-black">4</td>
              </tr>

              <tr>
                <td class="px-4 py-2 border-2 border-black">C - Good</td>
                <td class="px-4 py-2 border-2 border-black">Next 30%</td>
                <td class="px-4 py-2 border-2 border-black">Sound work with notable errors</td>
                <td class="px-4 py-2 border-2 border-black">70-79</td>
                <td class="px-4 py-2 border-2 border-black">3</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border-2 border-black">D - Satisfactory</td>
                <td class="px-4 py-2 border-2 border-black">Next 25%</td>
                <td class="px-4 py-2 -2 border-black">Fair but with major shortcomings</td>
                <td class="px-4 py-2 border-2 border-black">60-69</td>
                <td class="px-4 py-2 border-2 border-black">2</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border-2 border-black">E - Sufficient</td>
                <td class="px-4 py-2 border-2 border-black">Next 10%</td>
                <td class="px-4 py-2 border-2 border-black">Work meets minimum criteria</td>
                <td class="px-4 py-2 border-2 border-black">50-59</td>
                <td class="px-4 py-2 border-2 border-black">1</td>
              </tr>
              <tr class="">
                <td class="px-4 py-2 border-2 border-black" rowspan="3">Fail Group (0-49)</td>
                <td class="px-4 py-2 border-2 border-black">FX - Fail</td>
                <td class="px-4 py-2 border-2 border-black">(45-49)</td>
                <td class="px-4 py-2 border-2 border-black">More work required but credit awarded</td>
                <td class="px-4 py-2 border-2 border-black">40-49</td>
                <td class="px-4 py-2 border-2 border-black"></td>
              </tr>
              <tr class="">
                <td class="px-4 py-2 border-2 border-black">F - Fail</td>
                <td class="px-4 py-2 border-2 border-black">(0-44)</td>
                <td class="px-4 py-2 border-2 border-black">Considerable amount of work required</td>
                <td class="px-4 py-2 border-2 border-black">0-44</td>
                <td class="px-4 py-2 border-2 border-black"></td>
              </tr>
            </tbody>

          </table>
          <p class="text-md bg-red-200 balck-gray-600 border-2 border-black border-t-0 ">NB Decimal places above or below 0.5 will be rounded to the higher or lower full mark (for example a mark of 54.5 will be rounded to 55, whereas a mark of 54.4 will be rounded to 54. KOU has a policy NOT to condone "near-pass fails" so the only adjustment to marks awarded by the original marker(s) will be the automatic rounding outlined above.</p>
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