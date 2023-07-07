<template>
    <div class="flex justify-center items-center h-screen">
        <div class="container text-center bg-white">
            <h2 class="m-5 text-3xl font-medium">Url Shortener</h2>
            <div>
                <input type="text" class="border px-2 py-2 rounded-lg focus-ring" v-model="longUrl" />
                <button class="text-white bg-blue-700 hover:bg-blue-800  focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-2.5" @click="generateLink">
                    Shorten
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {ref} from 'vue'
    import {store} from './store'
    import axios from 'axios'

    export default {
        setup() {
            const longUrl = ref('');

            const generateLink = () => {
                axios.post(`${store.baseUrl}/generate-key`, {longUrl: longUrl.value}).then(res => {
                    console.log(res.data);
                });
                longUrl.value = ''
            }

            return {
                longUrl,
                generateLink
            }
        }
    }

</script>

<style lang="scss">
.container {
    
    max-width: 758px;
    height: 200px;
    box-shadow: 9px 19px 34px -13px rgba(0,0,0,0.1);
}
</style>
