<x-app-layout>
    <h1>投稿画面</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="body">
                <h2>投稿</h2>
                <textarea name="reviews[body]" placeholder="仲間募集"></textarea>
            </div>
            <div class="stars">
                <h2>評価</h2>
                <input type="number" name="reviews[stars]" placeholder="1"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    
</x-app-layout>