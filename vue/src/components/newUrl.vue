<template>
    <div class="m-5 text-xl border p-3 inline-block md:w-1/2 relative w-3/4 rounded" :class="copied ? 'border-green-500': ''">
        <a :href="store.baseUrl + '/' + url" target="_blank">
            {{store.baseUrl + '/' + url }}
        </a>
       
        <div class="absolute top-0 right-0 hover:cursor-pointer" @click="copyClipboard">
            <i class="fa-regular fa-copy"></i>
        </div>
        
    </div>
</template>

<script>
    import {store} from '../store'

    export default {
        name: 'newUrl',
        props: {
            url: String,
            copied: Boolean,
            copyClipboard: Function
        },
        setup() {

            return {
                store
            }
        }
    }
</script>

