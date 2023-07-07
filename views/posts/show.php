<div class="flex justify-center items-start pt-20">
  <div class="bg-white p-8 rounded-lg shadow-md text-center">
    <h1 class="text-2xl font-bold mb-4"><?php echo $post->title ?></h1>

    <p class="mb-4">Dit is de gevraagde post:</p>
    <p class="mb-2"><strong>Dit is de Auteur:</strong> <?php echo $post->author; ?></p>
    <p class="mb-2"><strong>Dit is de inhoud:</strong> <?php echo $post->content; ?></p>
    <p class="mb-2"><strong>Dit is de slug:</strong> <?php echo $post->slug; ?></p>
    <p class="mb-2"><strong>Dit is de titel:</strong> <?php echo $post->title; ?></p>
    <p class="mb-2"><strong>Dit is de datum waarop deze post is gemaakt:</strong> <?php echo $post->created; ?></p>
        
    <div class="mx-auto">
      <a href="?controller=posts&action=index" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
        Ga terug
      </a>
      <a href="?controller=posts&action=update&id=<?php echo $post->id; ?>" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-4">
        Bewerken
      </a>
      <a href="?controller=posts&action=delete&id=<?php echo $post->id; ?>" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
    Verwijderen
  </a>
    </div>
  </div>
</div>
