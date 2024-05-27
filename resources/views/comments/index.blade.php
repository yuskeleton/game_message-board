<x-app-layout>
    <a href="/comments/create"> コメント</a>
    <h1>返信</h1>
    <div class='comments'>
        @foreach ($comments as $comment)
            <div class='comment'>
            <a href="/comments/{{ $comment->id }}">{{ $comment->body }}</a>
            </div>
        @endforeach
    </div>
        <div class='paginate'>
            {{ $comments->links() }}
    </div>
</x-app-layout>

