<template>
    <card>
        <div class="px-6 py-4">
            <h1 class="text-lg text-90 font-light">Recent Posts</h1>
            <section class="mt-4">
                <template v-if="empty">
                    <p>No recent post to show.</p>
                </template>

                <template v-else>
                    <article class="py-2 border-b border-40"
                        v-for="post in posts"
                        :key="post.id"
                    >
                        <p>
                            <span class="text-80"><strong>{{ post.title }}</strong> --</span>
                            <span class="text-70">Pubished on <strong>{{ post.created_at }}</strong> by
                            <strong>{{ post.author }}</strong></span>
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
            empty: false
        }
    },

    mounted() {
        Nova.request().get('/nova-vendor/recent-posts/fetch-latest')
            .then(response => this.posts = response.data)
            .catch(() => this.empty = true)
    },
}
</script>
