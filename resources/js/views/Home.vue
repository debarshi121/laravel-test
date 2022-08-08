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
            videoUrl: "https://youtu.be/SmaY7RfBgas",
        };
    },
    methods: {
        download() {
            if (this.videoUrl) {
                console.log('Downloading...')
                axios.post(`/webapi/download`, {
                    videoUrl: this.videoUrl
                }).then((res) => {
                    console.log("Downloaded")
                    console.log(res.data);
                }).catch(err => {
                    console.log(err.response.data)
                });
            }
        },
    },
};
</script>
