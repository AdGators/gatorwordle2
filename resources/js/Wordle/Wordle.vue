<template>
    <div class="flex justify-center mx-auto sm:px-6 lg:px-8">
        <div>
            <row v-for="(n, rowIndex) in gameGrid.length"
                   :key="rowIndex"
                   :row-index="rowIndex"
                   class="justify-center" />
            <keyboard class="mt-8" />
        </div>
    </div>
</template>

<script>
import Row from './Grid/Row.vue'
import Keyboard from './Input/Keyboard.vue'
import axios from 'axios'
import { mapState, mapMutations } from 'vuex'

export default {
    name: "Wordle",
    components: {
        Row,
        Keyboard
    },
    props: {
        solution: {
            type: String,
            required: true
        }
    },
    computed: {
        ...mapState(['answer', 'gameGrid', 'gameStatus', 'evaluations'])
    },
    watch: {
      gameStatus(newVal) {
          if(newVal === 'WIN' || newVal === 'LOSE') {
              this.saveGame()
          }
      }
    },
    mounted() {
        this.setAnswer(this.solution)
    },
    methods: {
        ...mapMutations(['setAnswer', 'resetGame']),
        saveGame() {
            axios.post(route('api.games.store'), {
                'answer': this.answer,
                'game_grid': this.gameGrid,
                'evaluations': this.evaluations,
                'status': this.gameStatus
            }).then(r => {
                alert(r.data.status === 'WIN' ? '🎉 Congratulations, you won! Your game has been saved.'
                    : '🙁 Sorry, you lost. Your game has been saved. Try again!')
                this.resetGame()
            }).catch(err => {
                alert('An error occurred saving your game. See the console.')
                console.log(err)
            })
        }
    }
}
</script>
