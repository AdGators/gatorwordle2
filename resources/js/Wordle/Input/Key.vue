<template>
    <div class="text-gray-600 bg-gray-300 rounded-lg uppercase justify-center text-xl font-bold flex items-center p-3 m-1 min-w-12 cursor-pointer"
          @click="clicked">
        {{ letter }}
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: "Key",
    props: {
        letter: {
            type: String,
            default: null
        }
    },
    methods: {
        clicked() {
            if(this.letter === 'BACKSPACE') {
                this.undoLastCharacter()
            } else if(this.letter === 'ENTER') {
                this.submitGuess()
            } else {
                this.submitCharacter(this.letter)
            }
        },
        ...mapActions(['submitCharacter', 'undoLastCharacter', 'submitGuess'])
    }
}
</script>
