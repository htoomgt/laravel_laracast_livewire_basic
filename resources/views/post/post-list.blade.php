@include('layouts.header')
<h2 class="text-4xl">Livewire Blog Post w/ Comments</h2>
<hr/>
<ul class="list-disc mt-4">
@foreach($posts as $post)
    <li class="my-3">
        <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
        <a class="font-bold py-2 px-4 rounded bg-blue-500 text-white hover:bg-blue-700" href="{{route('post.edit',$post->id)}}"> Edit </a>
    </li>
@endforeach
</ul>

@include('layouts.footer')

