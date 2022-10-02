<template>

<div class="m-auto" v-if="flashtype === 'regular'">
    <div class="m-auto" v-if="message && showNotification">
        <div class="bg-slate-100 border border-slate-400 text-slate-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">SUCCESS! </strong>
            <span class="block sm:inline">{{ message }}</span>
        </div>
    </div>
</div>
<div class="m-auto" v-if="flashtype === 'success'">
    <div class="m-auto" v-if="message && showNotification">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-10 z-50" role="alert">
            <strong class="font-bold">SUCCESS! </strong>
            <span class="block sm:inline">{{ message }}</span>
        </div>
    </div>
</div>
<div class="m-auto" v-if="flashtype === 'warning'">
    <div class="m-auto" v-if="message && showNotification">
        <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">ERROR! </strong>
            <span class="block sm:inline">{{ message }}</span>
        </div>
    </div>
</div>
<div class="m-auto" v-if="flashtype === 'error'">
    <div class="m-auto" v-if="message && showNotification">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">ERROR! </strong>
            <span class="block sm:inline">{{ message }}</span>
        </div>
    </div>
</div>

</template>

<script setup>  

    import {ref, onMounted} from 'vue';

    const props = defineProps({
        message: String,
        flashtype: String,
    });



    const showNotification = ref(false);

    onMounted(() => {

        console.log(props)

        showNotification.value = true;
        setTimeout(() => (showNotification.value = false), 2000);
    })

</script>