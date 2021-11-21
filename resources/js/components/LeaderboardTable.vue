<template>
    <b-table striped :items="leaderboard.rows"></b-table>
</template>

<script>
import Leaderboard from '../models/leaderboard';
export default {
    props: {
        leaderboard: Leaderboard
    }
}
</script>
