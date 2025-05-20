<x-layout>

<h2>Currently Available Ninjas</h2>
<ul>
    @foreach($ninjas as $ninja)
    <li>
        <p>{{$ninja["name"]}}</p>
        <a href="{{url('/ninjas/' . $ninja["id"])}}">
            View Details
        </a>
    </li>
    @endforeach
</ul>

</x-layout>
