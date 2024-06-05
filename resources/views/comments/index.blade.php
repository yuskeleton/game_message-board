<x-app-layout>
    <h1>返信</h1>
    <div class='comments'>
        @foreach ($comments as $comment)
        <div class='comment'>
            <a href="/comments/{{ $comment->id }}">{{ $comment->body }}</a>
        </div>
        @endforeach
                <form action="{{ route('comments.store', $review) }}" method="POST">
                @csrf
                    <div>
                        <textarea name="body" rows="3" required></textarea>
                    </div>
                    <div>
                        <button type="submit">コメントを追加</button>
                    </div>
                </form>
    </div>
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
</x-app-layout>

