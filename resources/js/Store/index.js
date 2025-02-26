import { createStore } from 'vuex'

const evaluateRow = (row, answer) => {
    let evaluation = []
    for(let i = 0; i < answer.length; i++) {
        if(!row[i]) {
            evaluation.push('Empty')
        }
        else if(row[i] === answer[i]) {
            evaluation.push('Correct')
        }
        else if(answer.includes(row[i])) {
            evaluation.push('Present')
        }
        else {
            evaluation.push('Absent')
        }
    }
    return evaluation
}

const getDefaultState = () => {
    return {
        answer: '',
        gameStatus: 'IN-PROGRESS',
        gameGrid: [
            ['', '', '', '', ''],
            ['', '', '', '', ''],
            ['', '', '', '', ''],
            ['', '', '', '', ''],
            ['', '', '', '', ''],
            ['', '', '', '', ''],
        ],
        evaluations: [
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
            ['Empty', 'Empty', 'Empty', 'Empty', 'Empty'],
        ],
        rowIndex: 0,
        charIndex: 0
    }
}

export default createStore({
    state() {
        return getDefaultState()
    },
    mutations: {
        resetGame: (state) => {
            Object.assign(state, getDefaultState())
        },
        setAnswer(state, answer) {
            state.answer = answer
        },
        setCharacter(state, { rowIndex, charIndex, char }) {
            state.gameGrid[rowIndex][charIndex] = char
        },
        setEvaluation(state, { evalIndex, evals }) {
            state.evaluations[evalIndex] = evals
        },
        incrementRowIndex(state) {
            state.rowIndex++
        },
        incrementCharIndex(state) {
            state.charIndex++
        },
        decrementCharIndex(state) {
            if (state.charIndex > 0) {  // Prevents going below index 0
               // console.log("Decreasing charIndex:", state.charIndex);
                state.charIndex--;
            }
        },
        resetCharIndex(state) {
            state.charIndex = 0
        },
        win(state) {
            state.gameStatus = 'WIN'
        },
        lose(state) {
            state.gameStatus = 'LOSE'
        }
    },
    getters: {
        onLastRow: (state) => {
          return state.rowIndex === 5
        },
        allCharsEntered: (state) => {
            return state.charIndex === 5
        }
    },
    actions: {
        submitCharacter({ state, commit, getters }, char) {
            if (getters.allCharsEntered || state.gameGrid[state.rowIndex][state.charIndex] !== '') {
                return; // Prevents overwriting the same spot
            }
            commit('setCharacter', { rowIndex: state.rowIndex, charIndex: state.charIndex, char });
            commit('incrementCharIndex');
        },
        undoLastCharacter({ state, commit }) {
           // console.warn("🔄 undoLastCharacter is triggered");
            //console.error("Backspace pressed!");
        
            if (state.charIndex > 0) {
                commit('decrementCharIndex');
                commit('setCharacter', { rowIndex: state.rowIndex, charIndex: state.charIndex, char: '' });
            } else {
                //console.log("⛔ Backspace blocked at index 0");
            }
        
            //console.log("➡️ After Backspace | charIndex:", state.charIndex);
        },
        submitGuess({ state, commit, getters }) {
            if(!getters.allCharsEntered) {
                return // can't submit if you haven't filled out all the letters
            }

            let evals = evaluateRow(state.gameGrid[state.rowIndex], state.answer)
            commit('setEvaluation', { evalIndex: state.rowIndex, evals })

            if(evals.every(e => e === 'Correct')) {
                commit('win') // Every character was correct - you win!
            } else if(getters.onLastRow) {
                commit('lose') // Not every character was correct and it was the last guess - you lose :(
            } else {
                // Go to the next guess
                commit('incrementRowIndex')
                commit('resetCharIndex')
            }
        }
    }
})
