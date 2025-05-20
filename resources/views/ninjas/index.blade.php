<x-layout>

<h2>Currently Available Ninjas</h2>
<ul>
    @foreach($ninjas as $ninja)
        <?php $cardUrl = "/ninjas/" . $ninja['id']; ?>
        <li>
            <x-card href="{{ url($cardUrl) }}" :highlight="$ninja['skill'] > 70">
                <h3>{{ $ninja['name'] }}</h3>
            </x-card>
        </li>
    @endforeach
</ul>

</x-layout>
