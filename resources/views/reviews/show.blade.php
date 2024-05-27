<x-app-layout>
    <div class="edit"><a href="/reviews/{{ $review->id }}/edit">編集</a></div>
    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" onclick="deletereview({{ $review->id }})">delete</button> 
</form>
    <h1 class="title">
            {{ $review->title }}
        </h1>
        <div class="content">
            <div class="content__review">
                <h3>募集要項</h3>
                <p>{{ $review->body }}</p>
                <p>{{ $comment->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
    function deletereview(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</x-app-layout>