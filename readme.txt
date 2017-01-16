## What does this plugin do?
It makes iframes (embedded webpages) automatically show up as their natural height, rather than scrolling.

## Who can use it?
For this to work, you must be able to add JavaScript code to the "child page" (the page on the other site that you wish to embed in your WordPress site).

## How do I set it up?
1. Install the plugin. Move or paste the entire responsive-iframes folder into your wp-content/plugins directory. Go to Plugins from your WordPress Admin dashboard and activate the Responsive iFrames plugin.
2. Upload iframes-child.js to a public directory in your child website. Copy the public file path or link.
3. Add the following code to your child website (in the header, footer, or a "Global JavaScript" section).
`<script src="[file path you copied for iframes-child.js]"></script>`

## How do I add an iframe to a page on my website?
Once you've installed everything:
1. Copy the URL for the page you want to embed (the child page).
2. In your WordPress page or post, go to the text editor (not the visual edior) ad paste the following code:
`<iframe class="iframe" src="[URL OF CHILD PAGE]"></iframe>`
