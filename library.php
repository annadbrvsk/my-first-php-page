<?php
function getArticles(): array
{
    $articles = fopen("articles.txt", "r");
    $allArticles = [];
    if ($articles !== false) {
        do {
            $article = fgetcsv($articles, null, ";");
            if (is_array($article)){
                $allArticles[] = $article;
            }
        } while ($article !== false);
        fclose($articles);
    } else {
        throw new Exception("Can't read file");
    }
    return $allArticles;
}

function findArticleById($id): array
{
    $articles = getArticles();
    foreach ($articles as $article) {
        if ($article[0] == $id) {
            return $article;
        }
    }
    throw new Exception("Not found");
}

function putArticle($articleData): void
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