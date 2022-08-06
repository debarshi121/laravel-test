<template>
    <div class="w-full h-screen">
        <input type="file">
    </div>
</template>

<script>
export default {
    methods: {
        fetchData(){
            axios.get(`/webapi/download`).then(res => {
                console.log(res.data)
            })
        }
    },
    mounted(){
        this.fetchData()
    }
}
</script>
