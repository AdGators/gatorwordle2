<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'" class="flex flex-col font-logo items-center">
        <img src="/adgators.png" alt="adgators logo" class="block w-32" />
        <span class="text-logo text-2xl">
            ad<span class="text-[#B6DB3D]">gators</span>
        </span>
    </Link>
</template>
