<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-end mb-4">
            <a href="/reviews/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                作成画面
            </a>
        </div>
        <h1 class="text-3xl font-bold text-center mb-8">投稿</h1>
        <div class="space-y-6"> <!-- 縦に並べるために grid から space-y-6 に変更 -->
            @foreach ($reviews as $review)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $review->title }}</h2>
                    <a href="/reviews/{{ $review->id }}" class="text-blue-500 hover:underline block mb-4">
                        {{ $review->body }}
                    </a>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            @if (auth()->user()->likes->contains($review->id))
                                <form action="{{ route('unlikeReview', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 text-2xl mr-2">
                                        <i class="fas fa-heart"></i> <!-- filled heart for unlike -->
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('likeReview', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-gray-500 text-2xl mr-2">
                                        <i class="far fa-heart"></i> <!-- empty heart for like -->
                                    </button>
                                </form>
                            @endif
                            <span class="text-xl">{{ $review->likes->count() }}</span> <!-- Display like count -->
                        </div>
                        <a href="{{ route('comments.index', $review) }}" class="text-gray-500 hover:underline">
                            コメントを表示
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $reviews->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
