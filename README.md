
# wp-graphql-google-schema

  

Google Search works hard to understand the content of a page. You can help us by providing explicit clues about the meaning of a page to Google by including structured data on the page. Structured data is a standardized format for providing information about a page and classifying the page content; for example, on a recipe page, what are the ingredients, the cooking time and temperature, the calories, and so on.

Google uses structured data that it finds on the web to understand the content of the page, as well as to gather information about the web and the world in general.



As recommended by google - [Article](https://developers.google.com/search/docs/data-types/article)


## Pre-req's
Using this schema requires having the <a href="https://github.com/wp-graphql/wp-graphql" target="_blank">WPGraphQL plugin</a> installed 
and activated. (version 0.0.15 or newer)




### Structure

  

* [Meta.php] - Regsitering and hooking up the Yoast SEO

* [article.vue] - Here's an example of JSON-LD code for an Article object.

* [audio.vue] - Here's an example of JSON-LD code for an Post format Audio object.

* [video.vue] - Here's an example of JSON-LD code for an Post format Audio object.

* [postQuery.ggl] - graphql query to reproduce the sample data.

* [exampleData] - data example.

  
  
  

### Todos

  

- Add more schema fields

- Add Date fields

- Add Language fields

- Add, Video, Audio, Recipes Schemas.

  

**Free Software, Hell Yeah!**

![Article Google Preview](https://res.cloudinary.com/orthodox-union/image/upload/f_auto,q_auto/v1576505886/OU/about/services/Screen_Shot_2019-12-16_at_16.15.40.png)


## Upcoming Releases
<details>
<summary><strong>Using Google Tag Manager to Dynamically Generate Schema/JSON-LD Tags</strong> (Learn more)</summary>
<p></p>
 <p>Use <a href="https://www.google.com/analytics/tag-manager/">Google Tag Manager</a> to insert the code with the "Custom HTML" tag. (See screenshot below.) Why Tag Manager? Because Tag Manager can dynamically change the Structured Data based on the content of the page! (eg: Blog posts) See <a href="https://presencemedia.io/schema-markup-structured-data-2018-guide/#dynamicallyaddschema">this article</a> and <a href="https://moz.com/blog/using-google-tag-manager-to-dynamically-generate-schema-org-json-ld-tags">this older Moz article</a> for more information on how to do that.</p>
 
 <p><strong>UPDATE:</strong> Google changed something. Now, in order to have the Structured Data Testing tool detect inserted Structured Data properly, it must be inserted programatically. Pasting your desired Structured Data within this snippet below will allow it to be detected properly by the testing tool.</p>
 
````html
<!-- GOOGLE TAG MANAGER VERSION -->
<!-- Credit: https://twitter.com/SimoAhava/status/1001397355403468802 -->
<!-- Source: https://github.com/JayHoltslander/Structured-Data-JSON-LD -->
<script>
(function() {
   var jsonData =

// PASTE THE JSON THAT YOU WANT TO USE, HERE.
// Only paste what's within the <script> block.
// Your pasted content should start with a { and end with a }

; var el = document.createElement('script');
el.type = 'application/ld+json';
el.innerHTML = JSON.stringify(jsonData);
document.head.appendChild(el);
})();
</script>
````
 
 <p><strong>See also:</strong></p>
 <ul>
  <li><a href="https://yoast.com/structured-data-google-tag-manager/">Adding JSON-LD structured data with Google Tag Manager</a></li>
 </ul>

 <p></p>
 <hr>
</details> 