<template>
    <span class="px-2 py-1 rounded-md" :class="classes">
        {{ status }}
    </span>
</template>
<script>
export default {
    props: {
        status: {
            type: String,
            required: true
        }
    },
    computed: {
        classes() {
            return {
                'bg-green-500 text-white': this.status === 'WIN',
                'bg-red-500 text-white': this.status === 'LOSE'
            }
        }
    }
}
</script>
