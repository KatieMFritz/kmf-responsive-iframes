## What does this plugin do?
It makes iframes (embedded webpages) automatically show up as their natural height, rather than scrolling.

## Who can use it?
For this to work, you must be able to add JavaScript code to the "child page" (the page on the other site that you wish to embed in your WordPress site). It was specifically developed to support users of [Wild Apricot](https://wildapricot.com).

## How do I set it up?
1. **Install the plugin:** Move or paste the entire responsive-iframes folder into your wp-content/plugins directory of your _parent_ website. Go to Plugins from your WordPress Admin dashboard and activate the Responsive iFrames plugin.
2. Upload iframes-child.js to a public directory in your _child_ website. Copy the public file path or link.
3. Add the following code to your _child_ website (in the header, footer, or a "Global JavaScript" section).
```js
<script src="[file path you copied for iframes-child.js]"></script>
```

## How do I add an iframe to a page on my website?
Once you've installed everything:
1. Copy the URL for the page you want to embed (the child page).
2. In your WordPress page or post, go to the text editor (_not_ the visual editor) ad paste the following code:
```html
<iframe class="iframe" src="[URL OF CHILD PAGE]"></iframe>
```

## MIT License
Copyright 2017 Katie Fritz

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
