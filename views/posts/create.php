
    <div class="max-w-md mx-auto mt-8 bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-6">Create New Post</h2>
        <form action="?controller=posts&action=createPost" method="POST">
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-medium mb-2">Author:</label>
                <input type="text" id="author" name="author" placeholder="Author" class="w-full border border-blue-300 p-2 rounded">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-2">Content:</label>
                <textarea id="content" name="content" rows="4" placeholder="Content" class="w-full border border-blue-300 p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700 font-medium mb-2">Slug:</label>
                <input type="text" id="slug" name="slug" placeholder="Slug" class="w-full border border-blue-300 p-2 rounded">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title" class="w-full border border-blue-300 p-2 rounded">
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                    Create
                </button>
            </div>
        </form>
