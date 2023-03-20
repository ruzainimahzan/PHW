@extends('layouts.headerpdf')

@section('container')
<br>
<center>
    <h3>Roster</h4>
</center>
<table>
  <tr>
    <td  ></td>
</tr>
</table>
<table id="" class="table table-bordered table-striped display nowrap" style="table-layout: fixed">
  <thead>
    <tr>
      <th class="blackpdf"></th>
      <?php
         $i = $data->count();
      ?>
      @foreach($data as $dt)
      <th class="yellopdf">{{ date('d M', strtotime($dt->day)) }}</th>

      @endforeach
    </tr>
  </thead>
  <tbody>

  @foreach($dataAirie as $dt1)
  

    <tr>
      <td class="yellopdf" style="text-transform:uppercase;">  {{ $dt1->fullname_patients}}</td>

      <?php
      $idpatient = $dt1->id_patients;
   
      $dataStaff = \App\Models\Roaster::select('patients.fullname_patients' , 'patients.id_patients','roasters.day' , 'users.fullname','users.lastname')
      ->leftJoin('users','roasters.id_staff','=','users.id')
      ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
      ->Join('patients','roasters.id_patients','=','patients.id_patients')
      ->where('patients.id_patients',$idpatient)
      ->where('roaster_list.category_roaster',1)
      ->orderBy('roasters.day','ASC')
      // ->toSql();
       ->get();        
      // dd($dataStaff);
      ?>
     @foreach($dataStaff as $sdnew)
            @if($sdnew->lastname != "")
            <td>{{ $sdnew->lastname }}</td>
            @else
            <td class="redpdf">{{ 'Off Day' }}</td>
            @endif

     @endforeach
    </tr>
  @endforeach
  
  @if($center->count() > 0)
  <tr>
    <td colspan="<?php echo $i + 1;?>" style="background-color:black;"></td>
  </tr>
  @endif
 
  @foreach($center->groupBy('category_roaster.name') as $ct1)
  <tr>
      <td style="background-color:yellow !important;text-transform:uppercase;">{{ $ct1[0]['name'] }}</td>
      @foreach($ct1 as $item1)

       <td>
    
       <?php
          $day = $item1['day'];
          $data1 = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',2)
          ->where('roasters.day',$day)
          ->get();

          foreach($data1 as $dta){
            echo $dta->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach


    
  @foreach($events->groupBy('category_roaster.name') as $ev1)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $ev1[0]['name'] }}</td>
      @foreach($ev1 as $itemev1)

       <td>
    
       <?php
          $dayev = $itemev1['day'];
          $dataev1 = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',3)
          ->where('roasters.day',$dayev)
          ->get();

          foreach($dataev1 as $dtaev){
            echo $dtaev->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach

  @if($restday->count() > 0)
  <tr>
    <td colspan="<?php echo $i + 1;?>" style="background-color:black;"></td>
  </tr>
  @endif
  @foreach($restday->groupBy('category_roaster.name') as $rest)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $rest[0]['name'] }}</td>
      @foreach($rest as $itemer1)

       <td>
    
       <?php
          $dayrest = $itemer1['day'];
          $datare1 = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',4)
          ->where('roasters.day',$dayrest)
          ->get();

          foreach($datare1 as $dtare){
            echo $dtare->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach
  

  @foreach($rph->groupBy('category_roaster.name') as $rph)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $rph[0]['name'] }}</td>
      @foreach($rph as $itemerph1)

       <td>
    
       <?php
          $dayrph = $itemerph1['day'];
          $datarphe1 = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',5)
          ->where('roasters.day',$dayrph)
          ->get();

          foreach($datarphe1 as $dtarph){
            echo $dtarph->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach
  

  @foreach($annualleave->groupBy('category_roaster.name') as $al)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $al[0]['name'] }}</td>
      @foreach($al as $al1)

       <td>
    
       <?php
          $dayal = $al1['day'];
          $dataal = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',6)
          ->where('roasters.day',$dayal)
          ->get();

          foreach($dataal as $dtal){
            echo $dtal->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach

  @foreach($maternityleave->groupBy('category_roaster.name') as $ml)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $ml[0]['name'] }}</td>
      @foreach($ml as $ml1)

       <td>
    
       <?php
          $dayml = $ml1['day'];
          $dataml = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',7)
          ->where('roasters.day',$dayml)
          ->get();

          foreach($dataml as $dtml){
            echo $dtml->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach

  @foreach($emergencyleave->groupBy('category_roaster.name') as $el)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $el[0]['name'] }}</td>
      @foreach($el as $el1)

       <td>
    
       <?php
          $dayel = $el1['day'];
          $datael = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',8)
          ->where('roasters.day',$dayel)
          ->get();

          foreach($datael as $dtel){
            echo $dtel->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach

  @foreach($unpaidleave->groupBy('category_roaster.name') as $ul)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $ul[0]['name'] }}</td>
      @foreach($ul as $ul1)

       <td>
    
       <?php
          $dayul = $ul1['day'];
          $dataul = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',9)
          ->where('roasters.day',$dayul)
          ->get();

          foreach($dataul as $dtul){
            echo $dtul->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach


  @if($oncall->count() > 0)
  <tr>
    <td colspan="<?php echo $i + 1;?>" style="background-color:black;"></td>
  </tr>
  @endif

  @foreach($oncall->groupBy('category_roaster.name') as $oc)
  <tr>
      <td style="background-color:yellow;text-transform:uppercase;">{{ $oc[0]['name'] }}</td>
      @foreach($oc as $oc1)

       <td>
    
       <?php
          $dayoc = $oc1['day'];
          $dataoc = \App\Models\Roaster::select('fullname','lastname')
          ->join('users','users.id','=','roasters.id_staff')
          ->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
          ->where('roaster_list.category_roaster',10)
          ->where('roasters.day',$dayoc)
          ->get();

          foreach($dataoc as $dtoc){
            echo $dtoc->lastname.'<br>';
          }
       ?>
       </td>

      @endforeach
    </tr>
  
  @endforeach
    
   
 
  </tbody>
</table>

@endsection