<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">投稿画面</h1>
        <form action="/comments" method="POST" class="space-y-4">
            @csrf
            <div class="body">
                <h2 class="text-xl font-semibold mb-2" placeholder="1">コメント</h2>
                <textarea 
                    name="comments[body]" 
                    placeholder="一緒にやろう" 
                    class="w-full h-32 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <input 
                type="submit" 
                value="保存" 
                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 cursor-pointer"
            />
        </form>
        <div class="footer mt-6">
            <a href="/" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
</x-app-layout>
