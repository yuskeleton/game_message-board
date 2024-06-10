<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <a href="/reviews/{{ $review->id }}/edit" class="text-blue-500 hover:underline">編集</a>
            <form action="/reviews/{{ $review->id }}" id="form_review_{{ $review->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletereview({{ $review->id }})" class="text-red-500 hover:underline">削除</button> 
            </form>
        </div>
        <h1 class="text-3xl font-bold mb-4">
            {{ $review->title }}
        </h1>
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h3 class="text-2xl font-semibold mb-4">募集要項</h3>
            <p class="mb-6">{{ $review->body }}</p>
            <div class="space-y-6">
                @foreach ($review->comments as $comment)
                    <div class="relative bg-gray-100 rounded-lg p-4">
                        <strong class="block text-lg">{{ $comment->user->name }}</strong>
                        <p class="mb-2">{{ $comment->body }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @if (auth()->user()->likes->contains($comment->id))
                                    <form action="{{ route('unlikeComment', $comment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 text-2xl mr-2">
                                            <i class="fas fa-heart"></i> <!-- filled heart for unlike -->
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('likeComment', $comment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-gray-500 text-2xl mr-2">
                                            <i class="far fa-heart"></i> <!-- empty heart for like -->
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <a href="/comments/{{$comment->id}}/edit" class="text-blue-500 hover:underline">編集</a>
                        </div>
                        <form action="/reviews/{{ $review->id }}/comments/{{ $comment->id }}" id="form_comment_{{ $comment->id }}" method="post" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletecomment({{ $comment->id }})" class="text-red-500 hover:underline">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>
            @if (Auth::check())
            <form action="{{ route('comments.store', $review) }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <textarea name="body" rows="3" required class="w-full p-2 border border-gray-300 rounded-lg" placeholder="コメントを追加..."></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">コメントを追加</button>
                </div>
            </form>
            @else
                <p class="mt-6">コメントするには<a href="{{ route('login') }}" class="text-blue-500 hover:underline">ログイン</a>してください。</p>
            @endif
        </div>
        <div class="mt-8">
            <a href="/" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
    <script>
        function deletereview(id) {
            'use strict'
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_review_${id}`).submit();
            }
        }
        
        function deletecomment(id) {
            'use strict'
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_comment_${id}`).submit();
            }
        }
    </script>
</x-app-layout>

