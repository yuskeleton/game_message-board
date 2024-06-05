<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">投稿画面</h1>
        <form action="/reviews" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-2">投稿</h2>
                <textarea name="reviews[body]" placeholder="仲間募集" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-2">評価</h2>
                <input type="number" name="reviews[stars]" placeholder="1" class="w-full p-2 border border-gray-300 rounded-md"/>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="保存" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"/>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="/" class="text-gray-500 hover:underline">戻る</a>
        </div>
    </div>
</x-app-layout>