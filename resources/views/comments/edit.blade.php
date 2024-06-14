<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">編集画面</h1>
        <div class="content">
            <form action="/comments/{{ $comment->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title mb-4'>
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">投稿</h2>
                    <input 
                        type='text' 
                        name='comment[body]' 
                        value="{{ $comment->body }}" 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
                <div class='content__body mb-4'>
                    <h2 class="text-xl font-semibold text-gray-700 mb-2" placeholder="1">評価</h2>
                    <input 
                        type="number" 
                        name="comments[stars]" 
                        value="{{ $comment->stars }}" 
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
                <div class="text-right">
                    <input 
                        type="submit" 
                        value="保存" 
                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
