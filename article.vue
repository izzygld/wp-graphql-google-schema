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
			var SeoTitle = this.post.seo_title ? he.decode(striptags(this.post.seo_title)).substring(0, 109) : he.decode(striptags(this.post.title)).substring(0, 109);
			var SeoContent = this.post.seo_metadesc ? he.decode(striptags(this.post.seo_metadesc)).substring(0, 109) : he.decode(striptags(this.post.content)).substring(0, 109);
			var SeoUrl = this.post.seo_canonical ? this.post.seo_canonical : this.post.slug;
			var SeoImage = this.post.seo_title ? this.post.seo_title : (this.post.featuredImage ? this.post.featuredImage.sourceUrl : '');

			const publishers = this.post.publisher.map(a => {
				return {
					"@type" : "Organization",
					"name" : this.post.publisher.name,
					"url" : this.post.publisher.website ? this.post.publisher.website  : this.post.seo.canonical,
					"logo" : {
						"@type" : "ImageObject",
						"url" : this.post.publisher.image ? this.post.publisher.image : this.post.seo.image,
						"width" : "400",
						"height" : "55"
					}
				}
			})
			const tags = this.post.tags.map(a => {
				return {
					"name" : name,
				}
			})
			const authors = this.post.author.map(a => {
				return {
					"@type" : "Person",
					"name" : a.firstName + a.lastName,
					"image": a.url
				}
			})
			return {
				"@context" : "http://schema.org",
				"@type" : "BlogPosting",
				"image" : [
					SeoImage
				],
				"url" : SeoUrl,
				"headline" : SeoTitle,
				"alternativeHeadline" : SeoTitle,
				"dateCreated" : this.post.dateGmt,
				"datePublished" : this.post.dateGmt,
				"dateModified" :  this.post.updatedAt,
				"inLanguage" : "generalSettingsLanguage",
				"isFamilyFriendly" : "true",
				"copyrightYear" : "2019",
				"copyrightHolder" : "",
				"author" : authors,
				"publisher" : publishers,
				"mainEntityOfPage" : "True",
				"genre" : ["SEO","JSON-LD"],
				"articleSection" : tags,
				"articleBody" : SeoContent
			}
		}
  }
}
</script>