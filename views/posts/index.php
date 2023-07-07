<!-- index.php -->
<?php require_once('connection.php'); ?>
<div class="flex justify-center items-start pt-20">
    <div class="w-3/4 sm:w-1/2">        
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-blue-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">Author</th>
                        <th class="py-2 px-4 border-b text-center">Title</th>
                        <th class="py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr class="border-b border-blue-200">
                            <td class="py-2 px-4 text-center"><?php echo $post->author; ?></td>
                            <td class="py-2 px-4 text-center"><?php echo $post->title; ?></td>
                            <td class="py-2 px-4 flex justify-center">
                                <a href="index.php?controller=posts&action=show&id=<?php echo $post->id; ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded text-sm mr-2">See content</a>
                                <a href="index.php?controller=posts&action=update&id=<?php echo $post->id; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded text-sm mr-2">Edit</a>
                                <a href="index.php?controller=posts&action=delete&id=<?php echo $post->id; ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded text-sm mr-2 delete-button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>