<h1>{{$heading}}</h1>

@unless (count($listings)==0)
    


@foreach($listings as $list)
<a href="/list/{{$list['id']}}">{{$list['title']}}</a> 
    <p>{{$list['desc']}}</p>
@endforeach

@else
<p>No Listings</p>

@endunless