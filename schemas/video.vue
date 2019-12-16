<template>
  <script type="application/ld+json" v-html="JSON.stringify(jsonld)"></script>
</template>

<script>
import striptags from 'striptags'
import he from 'he'

export default {
  props: ['post'],
  computed: {
    jsonld () {
      const authors = this.post.author.map(a => {
				return {
					"@type" : "Person",
					"name" : a.name,
					"image": a.image
				}
      })
			var SeoTitle = this.post.seo_title ? he.decode(striptags(this.post.seo_title)).substring(0, 109) : he.decode(striptags(this.post.title)).substring(0, 109);
			var SeoContent = this.post.seo_metadesc ? he.decode(striptags(this.post.seo_metadesc)).substring(0, 109) : he.decode(striptags(this.post.content)).substring(0, 109);
			var SeoUrl = this.post.seo_canonical ? this.post.seo_canonical : this.post.slug;
			var SeoImage = this.post.seo_title ? this.post.seo_title : (this.post.featuredImage ? this.post.featuredImage.sourceUrl : '');	      
      var playerId
      var contentUrl
      if(this.post.videoType === 'JwPlayer'){
          contentUrl = `https://content.jwplatform.com/videos/${this.post.mediaId}.mp4`;
          playerId =  `https://content.jwplatform.com/videos/${this.post.mediaId}.mp4`;
      }else{
        contentUrl = `https://www.youtube.com/embed/${this.post.mediaId}`;
        playerId = `https://www.youtube.com/embed/${this.post.mediaId}`;
      }
      return {
        "@context" : "https://schema.org/",
        "@type" : "VideoObject",
        "name" : SeoTitle,
        "@id" : playerId,
        "datePublished" : this.post.dateGmt,
        "contentUrl" : contentUrl,
        "description" : he.decode(striptags(this.post.seo.description)).substring(0, 109),
        "thumbnailURL" : SeoImage,
        "thumbnail" : SeoImage,
        "duration" : this.post.duration,
        "uploadDate" : this.post.createdAt,
        "author" : authors
      }
    }
  }
}
</script>