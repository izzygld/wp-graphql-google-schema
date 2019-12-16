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
			return {
				"@context" : "http://schema.org",
				"@type" : "AudioObject",
				"datePublished" : this.post.createdAt,
				"contentUrl" : `https://content.jwplatform.com/videos/${this.post.mediaId}.mp3`,
				"description" : SeoContent,
				"thumbnailURL" : SeoImage,
				"duration" : this.post.duration,
				"encodingFormat" : "audio/mpeg",
				"name" : SeoTitle,
				"uploadDate" : this.post.dateGmt,
				"author" : authors
			}
		}
  }
}
</script>