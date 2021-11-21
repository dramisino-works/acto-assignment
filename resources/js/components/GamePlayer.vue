<template>
    <b-form @submit.prevent="onSubmit">
        <b-form-group label="Name">
            <b-form-input 
                v-model="user.name" 
                placeholder="Enter your name"
                trim
            ></b-form-input>
        </b-form-group>

        <b-form-group label="Hand">
            <b-form-input 
                v-model="userHandInput" 
                placeholder="Enter your hand"
                trim
                :formatter="playerCardFormatter"
            ></b-form-input>
        </b-form-group>
        <b-button 
            type="submit" 
            variant="primary"
            :disabled="isSaving"
        >
            Play
        </b-button>
        <p class="mt-2">{{ validCardChoicesLabel }}</p>

        <div class="mx-auto" v-show="gameHasBeenPlayed">
            <p>Computer hand: {{ computerHandLabel }}</p>

            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column align-items-center mr-4">
                    <h4>User</h4>
                    <h2>{{ user.score }}</h2>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h4>Computer</h4>
                    <h2>{{ computer.score }}</h2>
                </div>
            </div>
        </div>
    </b-form>
</template>

<script>
import Player from '../models/player';
import Game from '../models/game';

export default {
    props: {
        user: Player,
        computer: Player,
        game: Game,
        isSaving: Boolean,
    },
    data() {
        return {
            userHandInput: '',
            gameHasBeenPlayed: false,
        }
    },
    computed: {
        validCardChoicesLabel() {
            return `Valid card choices include: ${Game.VALID_CARDS.join(', ')}`;
        },
        computerHandLabel() {
            return this.computer.hand.join(', ')
        }
    },
    methods: {
        async onSubmit() {
            this.game.reset();

            this.userHandInput.split(' ').forEach(card => {
                this.user.addCard(card);
                this.computer.addCard( Game.getRandomCard() )
            });

            this.game.play();

            this.gameHasBeenPlayed = true;

            this.$emit('gamePlayed');         
        },
        playerCardFormatter(value) {
            return value.toUpperCase();
        },
    },
}
</script>

<style scoped>
div.app {
    max-width: 600px;
}
</style>
