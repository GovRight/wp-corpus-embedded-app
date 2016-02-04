# GovRight Corpus Embedded App Helper

A plugin to help you to embed a GovRight AngularJS app into your site.
Provides an easy app setup and automates some things like authentication callback and social sharing.

## Functionality

1. Handling the `/auth/success` callback, making users able to login in the app right from your site
2. Proxying social robots requests to the original app so the embedded app is sharable on Facebook and others
3. Providing a settings page for easy app setup
4. Providing the `[corpus-app]` shortcode for easy app embedding

## Quick start

0. Install and activate the plugin
1. Go to "GovRight" > "Embedded App" in the admin
2. Select an application
3. Set up the law slug
4. Insert the `[corpus-app]` shortcode where you want to see the app

## Inserting the app

There are two ways to insert the app into your site

1. In a post/page text using the shortcode: `[corpus-app]`
2. In a template using the snippet: `<?php corpus_app(); ?>`

## Shortcode attributes

* `data-locale` - locale code like `en`, `ru`, etc, to set initial app locale
* `data-app-port` - app port number like `9000`, for local development
* `data-law-slug` - law slug, overrides the law slug set in plugin options in wp admin

These can also be passed to the `corpus_app()` function as an array, like

```php
<?php corpus_app(array(
  'data-locale' => 'en',
  'data-app-port' => 9000
)); ?>
```

## Hooks

* `wpce_social_urls_white_list` | Filter | Is used to make changes to the social interceptor white list.
  Example:

```php
add_filter('wpce_social_urls_white_list', function() {
    return array('/', '/en', '/fr', '/ar');
});
```

## Local development

Most likely app urls in your local environment look like `localhost:9000`. You can override app urls and
any other config items adding a snippet like this to you local `wp-config.php`:

```php
$GLOBALS['WPCE_LOCAL_CONFIG'] = array(
    'rev-tracker' => array(
        'auth_post_url' => 'http://localhost:9000/auth/success'
        'loader_url' => 'http://localhost:9000/loader.js',
    )
);
```

Items from `$GLOBALS['WPCE_LOCAL_CONFIG']` override default plugin config, check `includes/config.php` for better
insight of the plugin config structure.
