<?php
class Article
{
    private $id;
    private $title;
    private $body;
    private $date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    public function __construct($id, $title, $body, $date){

        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->date = $date;
    }
}

/**
 * @return Article[]
 * @throws Exception
 */
function getArticles(): array
{
    $articles = fopen("articles.txt", "r");
    $allArticles = [];
    if ($articles !== false) {
        do {
            $article = fgetcsv($articles,null, ";");
            if (is_array($article)){
                $article = new Article($article[0], $article[1], $article[2], $article[3]);
                $allArticles[] = $article;
            }
        } while ($article !== false);
        fclose($articles);
    } else {
        throw new Exception("Can't read file");
    }
    return $allArticles;
}

function findArticleById($id): Article
{
    $articles = getArticles();
    foreach ($articles as $article) {
        if ($article->getId() == $id) {
            return $article;
        }
    }
    throw new Exception("Not found");
}

function putArticle(array $articleData): void
{
    $articles = getArticles();
    $id = $articleData["id"];
    if (isset ($articles[$id])){
        $articles[$id] = $articleData;
        $fileArticles = fopen("articles.txt", "w");
        foreach ($articles as $fields) {
            fputcsv($fileArticles, $fields, ";");
        }
    } else {
        throw new Exception("Can't find article");
    }
}