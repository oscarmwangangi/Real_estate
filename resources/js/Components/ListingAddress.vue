<template>
    <div>
        
        <div>{{ listing.street_nr }} ,{{ listing.street }}</div>
        <div>{{ listing.city }}, for ${{ listing.price }} {{ listing.code }}</div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
defineProps({
    listing: Object
});
</script>