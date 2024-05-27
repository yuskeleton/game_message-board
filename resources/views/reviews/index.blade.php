<x-app-layout>
    <a href="/reviews/create"> 作成画面</a>
    <h1>投稿</h1>
    <div class='reviews'>
        @foreach ($reviews as $review)
            <div class='review'>
                <h2 class='title'>{{ $review->title }}</h2>
                    <a href="/reviews/{{ $review->id }}">{{ $review->body }}</a>
                    <a href="/comments"> コメント</a>
            </div>
        @endforeach
    </div>
        <div class='paginate'>
            {{ $reviews->links() }}
    </div>
</x-app-layout>

