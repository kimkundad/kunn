@extends('layouts.template')

@section('title')
เกี่ยวกับเรา || Wealth Angels
@stop

@section('stylesheet')


@stop('stylesheet')

@section('content')


<div class="container">

	<!-- Row / Start -->
	<div class="row">

        
        <!-- Post Content -->
		<div class="col-lg-12">

<div class=" single-post">
    

    <div class="post-content">
        @if(isset($event))
        @foreach($event as $u)
        <a href="{{ url('events/'.$u->id) }}">
        <img src="{{ url('img/events/'.$u->image) }}" alt="{{$u->name}}" class="img-responsive center-block" />
		<br>
        <h3 class="text-danger">#March2021 Angular Meetup by CODIUM</h3>
        </a>
        <hr>
        @endforeach
        @endif
        
        
        
        
        
        
        
        <br><br><br>
        
        
        
        
        <div class="clearfix"></div>

    </div>
</div>
<!-- Blog Post / End -->
</div></div></div>


@endsection

@section('scripts')





@stop('scripts')