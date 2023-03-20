@extends('layouts.headerpdf')
@section('container')

<center><u><b>ORTHOPAEDIC ASSESSMENT FORM</b></u></center>
<br><br>
<table class="table">
 <tbody>
   <tr>
     <td width="5%" class="noBorderTop">Name:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ $userdiagnose->fullname_patients }}</td>
     <td width="5%" class="noBorderTop">Age:</td>
     <td width="10%" class="noBorderTop borderBtmBlack">{{ $userdiagnose->age }}</td>
     <td width="5%" class="noBorderTop">Sex:</td>
     <td width="5%" class="noBorderTop">{{  $userdiagnose->gender }}</td>
     <td width="5%" class="noBorderTop">R/N</td>
     <td width="5%" class="noBorderTop borderBtmBlack">{{ $refdiagnose->reference_no }}</td>
     <td width="5%" class="noBorderTop">Date:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ date('d-m-Y', strtotime(now()))  }}</td>
   </tr>
 </tbody>
</table>
@foreach( $data as $list )
<table class="table table-bordered">
 <tr>
   <td width="50%" class="noBorderBottom text-bold">Doctor's Diagnosis</td>
   <td width="50%" rowspan="10" style="padding: 0px !important">
    <div>
    <center>
      <img style="height: 8cm;width: 8cm;margin-top: 10px;" src="{{ public_path('images/body.jpg') }}" />
      </center>
    </div>
   </td>
 </tr>
 <tr>
   <td class="noBorderTop">{{ $list->doctor_diagnose }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom">Doctor's Management</td>
 </tr>
 <tr>
   <td class="noBorderTop">{{ $list->doctor_management }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom">Problem</td>
 </tr>
 <tr>
   <td rowspan="2" class="noBorderTop">{{ $list->problem }}</td>
 </tr>
 <tr></tr>
 <tr>
   <td class="noBorderBottom">Pain Scale</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Area {{ $list->area }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Nature {{ $list->nature }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Agg {{ $list->agg }}</td>
   <td class="noBorderBottom">Current History</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Ease {{ $list->ease }}</td>
   <td rowspan="2" class="noBorderTop">{{ $list->current_history }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">24hrs {{ $list->hours }}</td>
 </tr>
 <tr>
   <td class="noBorderTop">Irritability {{ $list->irrirability_id }}</td>
   <td class="noBorderBottom">PAST HISTORY (relating to current problem)</td>
 </tr>
 <tr>
   <td class="noBorderBottom">SPECIAL QUESTION</td>
   <td rowspan="2" class="noBorderTop">{{ $list->past_history }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">General Health</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">{{ $list->general_health }}</td>
   <td class="noBorderBottom">OBSERVATION</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">PMHX / Surgery</td>
   <td rowspan="4" class="noBorderTop">{{ $list->observation }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">{{ $list->pmhx_surgery }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Ix / MRI / X-Ray</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">{{ $list->mri_xray }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Medication / Steroid</td>
   <td class="noBorderBottom">PALPATION</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">{{ $list->medication_steroid }}</td>
   <td rowspan="3" class="noBorderTop">{{ $list->palpation }}</td>
 </tr>
 <tr>
   <td class="noBorderBottom noBorderTop">Occupation / Recreation</td>
 </tr>
 <tr>
   <td class="noBorderTop">{{ $list->occupation_recreation }}</td>
 </tr>
</table>
<div class="page-break"></div>
<table class="table table-bordered">
 <tr>
   <td colspan="2" class="noBorderBottom">SPECIAL TEST</td>
   <td colspan="2" class="noBorderBottom">PHYSIOTHERAPIST'S IMPRESSION</td>
 </tr>
 <tr>
   <td colspan="2" rowspan="4" class="noBorderTop">{{ $list->special_test }}</td>
   <td colspan="2" rowspan="3" class="noBorderTop">{{ $list->physiotherapist_impression }}</td>
 </tr>
 <tr></tr>
 <tr></tr>
 <tr>
   <td colspan="2" class="noBorderBottom">SHORT TERM GOALS</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderBottom">NEUROLOGICAL</td>
   <td rowspan="4" colspan="2" class="noBorderTop">{{ $list->short_term_goals }}</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderBottom noBorderTop">Motor:</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderTop noBorderBottom">{{ $list->neurological_motor }}</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderTop noBorderBottom">Seasation:</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderTop noBorderBottom">{{ $list->neurological_seasation }}</td>
   <td colspan="2" class="noBorderBottom">LONG TERM GOALS</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderTop noBorderBottom">Reflexes:</td>
   <td colspan="2" rowspan="2" class="noBorderTop">{{ $list->long_term_goals }}</td>
 </tr>
 <tr>
   <td colspan="2" rowspan="2" class="noBorderTop">{{ $list->neurological_reflexes }}</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderBottom">PLAN OF TREATMENT</td>
 </tr>
 <tr>
   <td colspan="2" class="noBorderBottom">CLEARING TEST / OTHER JOINTS</td>
   <td colspan="2" rowspan="4" class="noBorderTop">{{ $list->plan_of_treatment }}</td>
 </tr>
 <tr>
   <td colspan="2" rowspan="3" class="noBorderTop">{{ $list->clearing_test_other_joins }}</td>
 </tr>
 <tr></tr>
 <tr></tr>

</table>
@endforeach

@endsection