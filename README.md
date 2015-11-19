# GovRight Corpus Embedded App Helper

Plugin to help you to embed a GovRight application into your site.
Provides easy app setup and automates some things like authentication callback and social sharing.

# Functionality

1. Handling the `/auth/success` callback, making users able to login in the app right from your site
2. Proxying social robots requests to the original app so the embedded app is sharable on Facebook and others
3. Providing a settings page for easy app setup
4. Providing the `[corpus-app]` shortcode for easy app embedding

# Quick start

0. Install and activate the plugin
1. Go to "GovRight" > "Embedded App" in the admin
2. Select an application
3. Set up the law slug
4. Insert the `[corpus-app]` shortcode where you want to see the app

# Inserting the app

There are two ways to insert the app into your site

1. In a post/page text using the `[corpus-app]` shortcode
2. In a template using this snippet `<?php corpus_app(); ?>`
