<x-app-layout>
    <h1>投稿画面</h1>
        <form action="/comments" method="POST">
            @csrf
            <div class="body">
                <h2>コメント</h2>
                <textarea name="comments[body]" placeholder="一緒にやろう"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    
</x-app-layout>