<template>
    <Head title="Game History" />
    <app-layout>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div v-for="game in games" class="my-3 bg-white shadow-md p-4">
                <game-status-badge class="mr-2" :status="game.status" />
                {{ formatDate(game.created_at) }}
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import GameStatusBadge from '@/Components/GameStatusBadge.vue'

export default {
    name: "GameHistory",
    components: {
        GameStatusBadge,
        AppLayout,
        Head
    },
    props: {
        games: {
            type: Array,
            required: true
        }
    },
    methods: {
        formatDate(isoString) {
            return (new Date(isoString)).toLocaleString('en-US')
        }
    }
}
</script>
