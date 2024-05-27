<x-app-layout>
    <div class="edit"><a href="/comments/{{ $comment->id }}/edit">編集</a></div>
    <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" onclick="deletecomment({{ $comment->id }})">delete</button> 
</form>
    <h1 class="title">
            {{ $comment->title }}
        </h1>
        <div class="content">
            <div class="content__comment">
                <h3>コメント要項</h3>
                <p>{{ $comment->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
    function deletecomment(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
</x-app-layout>