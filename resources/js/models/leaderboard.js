import ApiClient from '../api-client';

export default class Leaderboard {

    rows = [];

    static async get() {
        const response = await ApiClient.getLeaderboard();

        const leaderboard = new Leaderboard();
        leaderboard.mapResponseToRows(response)

        return leaderboard;
    }

    async refresh() {
        const response = await ApiClient.getLeaderboard();
        this.mapResponseToRows(response);
    }

    mapResponseToRows(response) {
        this.rows = response.data.map((row, index) => ({
            position: index+1,
            user_name: row.user_name,
            total_wins: row.total_wins,
            total_score: row.total_score,
        }));
    }
}
