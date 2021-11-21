<template>
    <div class="app mx-auto p-4">
        <game-player
            class="mb-10"
            :user="user"
            :computer="computer"
            :game="game"
            @gamePlayed="onGamePlayed"
        ></game-player>

        <leaderboard-table 
            :leaderboard="leaderboard"
        ></leaderboard-table>
    </div>
</template>

<script>
import Game from './models/game'
import Player from './models/player'
import gamePlayer from './components/GamePlayer.vue';
import leaderboardTable from './components/LeaderboardTable.vue';
import notificationMixin from './notificationMixin';
import Leaderboard from './models/leaderboard';

export default {
    data() {
        return {
            user: null,
            computer: null,
            game: null,
            leaderboard: null,
            isSaving: false,
        }
    },
    async created() {
        this.user = new Player();
        this.computer = new Player();
        this.game = new Game(this.user, this.computer);
        this.leaderboard = new Leaderboard();

        this.leaderboard = await Leaderboard.get();
    },
    methods: {
        async onGamePlayed() {
         
            this.isSaving = true;

            try {
                await this.game.save();
                this.leaderboard.refresh();

                this.showSavedNotification();
            } catch (e) {
                this.showErrorNotification(e);
            } finally {
                this.isSaving = false;
            }   
        }
    },
    components:{
        gamePlayer,
        leaderboardTable,
    },
    mixins: [notificationMixin],
}
</script>

<style scoped>
div.app {
    max-width: 700px;
    height: 100%;
}
</style>
