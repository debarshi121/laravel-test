<template>
    <div class="w-full h-screen">
        <input v-model="videoUrl" type="text" />
        <button @click="download()">Download</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            videoUrl: "",
        };
    },
    methods: {
        download() {
            if (this.videoUrl) {
                console.log('Downloading...')
                axios.post(`/webapi/download`, {
                    videoUrl: this.videoUrl
                }).then((res) => {
                    console.log(res.data);
                });
            }
        },
    },
    mounted() {
        //this.fetchData()
    },
};
</script>
