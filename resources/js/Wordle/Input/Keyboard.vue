<template>
<div class="">
    <div v-for="row in layout"
         class="flex justify-center" >
        <key v-for="letter in row"
             :key="letter"
             :letter="letter" />
    </div>
</div>
</template>

<script>
import Key from './Key.vue'

export default {
    name: "Keyboard",
    components: {
        Key
    },
    data() {
        return {
            layout: [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'],
                ['ENTER', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', 'BACKSPACE']
            ]
        }
    }
}
</script>
