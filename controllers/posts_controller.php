<?php

class PostsController {
    public function index() {
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function show() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }

        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }

    public function create() {
        require_once('views/posts/create.php');
    }

    public function all() {
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    public function createPost(){
        $author = $_POST['author'];
        $content = $_POST['content'];
        $slug = $_POST['slug'];
        $title = $_POST['title'];
    
        // Valideer of alle velden zijn ingevuld
        if (empty($author) || empty($content) || empty($slug) || empty($title)) {
            echo "Vul alle velden in.";
            return;
        }
    
        // Alle velden zijn ingevuld, voer de rest van de code uit
        $postId = Post::create($author, $content, $slug, $title);
    
        header("Location: index.php?controller=posts&action=show&id=" . $postId);
        exit();
    }
    public function update() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
    
        $postId = $_GET['id'];
    
        // Controleren of het formulier is verzonden
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Controleren of alle velden zijn ingevuld
            if (empty($_POST['author']) || empty($_POST['content']) || empty($_POST['slug']) || empty($_POST['title'])) {
                echo "Vul alle velden in.";
                return;
            }
    
            // De waarden uit het formulier halen
            $author = $_POST['author'];
            $content = $_POST['content'];
            $slug = $_POST['slug'];
            $title = $_POST['title'];
    
            // Het bijbehorende Post-object ophalen uit de database
            $post = Post::find($postId);
    
            // Controleren of het Post-object is gevonden
            if (!$post) {
                echo "Post niet gevonden.";
                return;
            }
    
            // De waarden bijwerken in het Post-object
            $post->author = $author;
            $post->content = $content;
            $post->slug = $slug;
            $post->title = $title;
    
            // Het bijgewerkte Post-object opslaan in de database
            if ($post->update()) {
                // Doorsturen naar de weergavepagina voor de bijgewerkte post
                header("Location: index.php?controller=posts&action=show&id=" . $postId);
                exit();
            } else {
                echo "Fout bij het bijwerken van de post.";
                return;
            }
        }
    
        // Het Post-object ophalen uit de database
        $post = Post::find($postId);
    
        if (!$post) {
            echo "Post niet gevonden.";
            return;
        }
    
        require_once('views/posts/update.php');
    }
    
    

    public function delete() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
    
        $postId = $_GET['id'];
        Post::delete($postId);
    
        // Doorsturen naar de indexpagina
        header("Location: index.php?controller=posts&action=index");
        exit();
    }
    
    
    
}

?>

