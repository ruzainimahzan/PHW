
@extends('layouts.pagecalendar')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Roster
            <small>nursing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="active">Roster</a></li>
        </ol>
        </section>
        <section class="content">
  
            <roaster-main></roaster-main>
 
    </section>
    </div>
    @stop