@if(session()->has('message'))
        <div class=".fiex top-0 lef 1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
     <p>
        {{session('message')}}
     </p>   
    </div>
@endif