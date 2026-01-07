<template>
    <h1>index page</h1>
   
    </template>

<script setup>
import { Link } from '@inertiajs/vue3';


   

defineProps([
    'message'
])
</script>
<script>
import MainLayouts from '../../Layouts/MainLayouts.vue';

export default{
 layout: MainLayouts
}

</script>