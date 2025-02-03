<template>
    <Head title="GatorWordle" />

    <app-layout>
        <div class="py-12">
            <wordle :solution="answer" />
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import Wordle from '../Wordle/Wordle.vue'

export default {
    components: {
        AppLayout,
        Wordle,
        Head,
    },
    props: {
        answer: {
            type: String,
            required: true
        }
    }
}
</script>

