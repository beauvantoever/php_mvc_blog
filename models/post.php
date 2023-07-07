<?php
class Post {
    public $id;
    public $title;
    public $slug;
    public $created;
    public $author;
    public $content;

    public function __construct($id, $title, $slug, $created, $author, $content) {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->created = $created;
        $this->author = $author;
        $this->content = $content;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['slug'], $post['created'], $post['author'], $post['content']);
        }

        return $list;
    }

    public static function find($id) {

        // Maak een database-instantie aan
        $db = Db::getInstance();

        $id = intval($id);

        // Bereid de SQL-query voor om het bericht met het opgegeven id te selecteren
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');

        // Voer de query uit met het opgegeven id als parameter
        $req->execute(array('id' => $id));

        // Haalt het resultaat van de query op
        $post = $req->fetch();

        if ($post) {
            return new Post($post['id'], $post['title'], $post['slug'], $post['created'], $post['author'], $post['content']);
        }

        return false;
    }

    public static function create($author, $content, $slug, $title){
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO posts (author, content, slug, title) VALUES (:author, :content, :slug, :title)');
        $req->execute(array(
            'author' => $author,
            'content' => $content,
            'slug' => $slug,
            'title' => $title
        ));
        return $db->lastInsertId();
    }  
    public static function delete($id) {
        $db = Db::getInstance();
        $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
        public function update() {
        $db = Db::getInstance();
        $stmt = $db->prepare("UPDATE posts SET author = :author, content = :content, slug = :slug, title = :title WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':slug', $this->slug);
        $stmt->bindParam(':title', $this->title);
        return $stmt->execute();
    }

    
    

    
}