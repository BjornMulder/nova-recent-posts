<template>
    <card>
        <div class="px-6 py-4">
            <h1 class="text-lg text-90 font-light">Activiteiten</h1>
            <section class="mt-4">
                <template v-if="errorMessage">
                    <p class="text-80">{{ errorMessage }}</p>
                </template>

                <template v-else>
                    <article class="py-2 border-b border-40"
                        v-for="post in posts"
                        :key="post.id"
                    >
                        <p class="text-80">
                            <span>
                                <router-link :to="`/resources/${post.postsUriKey}/${post.id}`" class="no-underline font-bold dim text-primary">
                                    <strong>{{ post.title }}</strong>
                                </router-link>
                            </span>
                        </p>
                    </article>
                </template>
            </section>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
            posts: [],
            errorMessage: null
        }
    },

    mounted() {
        Nova.request().get('/nova-vendor/recent-posts/fetch-latest')
            .then(response => this.posts = response.data)
            .catch(error => {
                this.errorMessage = error.response.data.message
            })
    },
}
</script>
