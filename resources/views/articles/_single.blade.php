<article class="mb-5">
    <img src="{{ $article->image }}" alt="" class="w-100">
    <h3 class="h4 mt-2 text-truncate">{{ $article->name }} </h3>
    <p class="m-0"><small>Published at : {{ $article->published_at }}</small></p>
    <p class="m-0">
        <small>
            Created by :
            <a href="{{ route('users.show', $article->user) }}">{{ $article->user->name }}</a>
        </small>
    </p>
    <p class="mt-3">{{ Str::limit($article->body) }}</p>
</article>
