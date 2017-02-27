<header>
  <h1>KMF Responsive iFrames</h1>
  <p><a href="https://github.com/KatieMFritz/kmf-responsive-iframes" target="_blank">Current version and documentation</a></p>
</header>
<section>
  <h2>How to set up the "child" site</h2>
  <p>The child site is the site that will be displayed <em>inside</em> your iframes.</p>
  <ol>
    <li>Upload <a href="https://github.com/KatieMFritz/kmf-responsive-iframes/blob/master/iframes-child.js" target="_blank"><code>iframes-child.js</code></a> to a public directory in your <em>child</em> website.</li>
    <li>Copy the public file path or link.</li>
    <li>Add the following code to your child website (in the header, footer, or a "Global JavaScript" section):
      <pre><code>&lt;script src="[file path you copied for iframes-child.js]"&gt;&lt;/script&gt;</code></pre></li>
  </ol>
</section>
<section>
  <h2>How to add an iframe to a page or post</h2>
  <p>Once you've installed everything:</p>
  <ol>
    <li>Copy the URL for the page you want to embed (the child page).</li>
    <li>In your WordPress page or post, go to the text editor (<em>not</em>the visual editor) and paste the following code:
      <pre><code>&lt;iframe class="iframe" src="[URL OF CHILD PAGE]"&gt;&lt;/iframe&gt;</code></pre></li>
  </ol>
</section>
