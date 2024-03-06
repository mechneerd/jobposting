@props(['list'])
<x-card >

    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$list->logo ? asset('storage/'.$list->logo) : asset('/image/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/list/{{$list->id}}">{{$list->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$list->company}}</div>
<x-listing-tags :tags="$list->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$list->loacation}}
            </div>
        </div>
    </div>
</x-card>