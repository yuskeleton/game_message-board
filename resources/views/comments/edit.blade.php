<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/comments/{{ $comment->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>投稿</h2>
                <input type='text' name='comment[body]' value="{{ $comment->body }}">
            </div>
            <div class='content__body'>
                <h2>評価</h2>
                <input type="number" name="comments[stars]" value="{{ $comment->stars }}">
            </div>
            <input type="submit" value="保存"/>
        </form>
    </div>
</x-app-layout>