<h1>{{$heading}}</h1>

@unless (count($listings)==0)
    


@foreach($listings as $list)
<a href="/list/{{$list['id']}}">{{$list['title']}}</a> 
    <p>{{$list['description']}}</p>
@endforeach

@else
<p>No Listings</p>

@endunless