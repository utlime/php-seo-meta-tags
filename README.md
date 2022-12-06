# utlime/seo-meta-tags
Library for building seo tags

Supported social meta tags, such Open Graph Tags, Facebook, Twitter, LinkedIn, Google+, Pinterest and etc

## Specifications and helpful links
http://ogp.me/
https://dev.twitter.com/cards/markup
https://moz.com/blog/seo-meta-tags

## Installation
You can install directly via Composer:
```bash
$ composer require "utlime/seo-meta-tags":"^2.0"
```

## Basic usage
```php
$builder = new BuilderDelegate(
   new CommonBuilder(),
   new TwitterBuilder(),
   new OpenGraphBuilder()
);

$header_chunk = $builder
    ->add('title', 'your title')
    ->add('description', 'your description')
    ->add('language', 'your language')
    ->add('canonical', 'your canonical url')
    ->add('image', 'your image url')
    ->build();
```
As result you will have the follow
```html
<title>your title</title>
<meta name="description" content="your description"/>
<link rel="canonical" href="your canonical url"/>
<meta name="twitter:title" content="your title"/>
<meta name="twitter:description" content="your description"/>
<meta name="twitter:image" content="your image url"/>
<meta property="og:title" content="your title"/>
<meta property="og:description" content="your description"/>
<meta property="og:locale" content="your language"/>
<meta property="og:url" content="your canonical url"/>
<meta property="og:image" content="your image url"/>
```

## Extending
For extending or modifying you just need to implement interface
```php
<?php namespace Utlime\SeoMetaTags;

/**
 * Interface BuilderInterface
 * @package Utlime\SeoMetaTags
 */
interface BuilderInterface
{
    /**
     * Add property to builder
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function add($name, $value);

    /**
     * Build content which based on properties
     * @return string
     */
    public function build();
}
```

## Supported tags
you can check all supported tags in classes:
- \Utlime\SeoMetaTags\CommonBuilder
- \Utlime\SeoMetaTags\OpenGraphBuilder
- \Utlime\SeoMetaTags\TwitterBuilder
