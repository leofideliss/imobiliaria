@foreach ($posts as $post)

    <div class="card">
        <div class="card-header">
            <h3>{{$post->category}}</h3>
        </div>
    </div>

@endforeach