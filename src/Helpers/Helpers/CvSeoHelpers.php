<?php

function getTitle($title)
{
    $sulfix = ' ' . getSeparator() . ' ' . getLayoutData('company_name');

    if (!SEO::getTitle()) {
        if ($title !== null) {
            $title = "{$title} {$sulfix}";
        }
        SEO::setTitle($title);
    } else {
        SEO::setTitle(SEO::getTitle() . $sulfix);
    }
}

function getFavicons()
{
    return '<link rel="icon" href="/favicon/16.png" sizes="16x16">
    <link rel="icon" href="/favicon/32.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/72.png">
    <link rel="apple-touch-icon" href="/favicon/57.png">
    <link rel="apple-touch-icon-precomposed" href="/favicon/57.png">';
}

function getDescription()
{
    if (!SEO::metatags()->getDescription()) {
        $description = "Descrição do app";
        SEO::setDescription($description);
    } else {
        SEO::setDescription(SEO::metatags()->getDescription());
    }
}

function getKeywords()
{
    if (!SEO::metatags()->getKeywords()) {
        $keyWords = ['kew', 'words'];
        SEO::metatags()->setKeywords($keyWords);
    } else {
        SEO::metatags()->setKeywords(SEO::metatags()->getKeywords());
    }
}

function getSeparator()
{
    return '|';
}

function seoGenerete($title = null)
{
    getTitle($title);
    getDescription();
    getKeywords();
    SEO::opengraph()->addProperty('locale', 'pt-br');
    googleAnalytics();
    return SEO::generate();
}

function googleAnalytics($id = "UA-1203021") {
    echo "<script>(function (i, s, o, g, r, a, m) {i['GoogleAnalyticsObject'] = r;i[r] = i[r] || function () {(i[r].q = i[r].q || []).push(arguments)}, 
    i[r].l = 1 * new Date();a = s.createElement(o),m = s.getElementsByTagName(o)[0];a.async = 1;a.src = g;m.parentNode.insertBefore(a, m)})(window, document, 
    'script', '//www.google-analytics.com/analytics.js', 'ga');ga('create', '".$id."', 'auto');ga('send', 'pageview');</script>
    ";
}