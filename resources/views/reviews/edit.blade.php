<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/reviews/{{ $review->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>投稿</h2>
                <input type='text' name='review[body]' value="{{ $review->body }}">
            </div>
            <div class='content__body'>
                <h2>評価</h2>
                <input type="number" name="reviews[stars]" value="{{ $review->stars }}">
            </div>
            <input type="submit" value="保存"/>
        </form>
    </div>
</x-app-layout>