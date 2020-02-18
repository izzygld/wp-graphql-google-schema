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
			return {
				"@context": "http://www.schema.org",
				"@type": "Person",
				"@id": this.author.url + "#person",
				"name": this.author.firstName + this.author.lastName,
				"alternateName": this.author.nickname ? this.author.nickname : this.author.nicename,
				"Description": this.author.description,
				"url": this.author.url,
				"image": this.author.avatar.url
				}				
			}
		}
  }
</script>